<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Rh extends MY_Controller
{
    /**
     * author: Ramon Silva
     * email: silva018-mg@yahoo.com.br
     *
     */

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('rh_model');
        $this->data['menuDp'] = 'menuDpPessoal';
    }

    public function index()
    {
        $this->gerenciar();
    }

    public function gerenciar()
    {
        $this->load->library('pagination');
        $this->load->model('mapos_model');

        $where_array = [];

        $pesquisa = $this->input->get('pesquisa');
        $status = $this->input->get('status');
        $de = $this->input->get('data');
        $ate = $this->input->get('data2');

        if ($pesquisa) {
            $where_array['pesquisa'] = $pesquisa;
        }
        if ($status) {
            $where_array['status'] = $status;
        }
        if ($de) {
            $de = explode('/', $de);
            $de = $de[2] . '-' . $de[1] . '-' . $de[0];

            $where_array['de'] = $de;
        }
        if ($ate) {
            $ate = explode('/', $ate);
            $ate = $ate[2] . '-' . $ate[1] . '-' . $ate[0];

            $where_array['ate'] = $ate;
        }

        $this->data['configuration']['base_url'] = site_url('rh/gerenciar/');
        $this->data['configuration']['total_rows'] = $this->rh_model->count('dp');

        $this->pagination->initialize($this->data['configuration']);

        $this->data['results'] = $this->rh_model->getDp(
            'dp',
            'dp.*',
            $where_array,
            $this->data['configuration']['per_page'],
            $this->uri->segment(3)
        );

        
        $this->data['emitente'] = $this->mapos_model->getEmitente();
        $this->data['view'] = 'rh/dp';
        return $this->layout();
    }
    
     public function visualizar2()
    {
       
        $this->data['result'] = $this->rh_model->getById($this->uri->segment(3));
        $this->data['anexos'] = $this->rh_model->getAnexos($this->uri->segment(3));
        $this->data['anotacoes'] = $this->rh_model->getAnotacoes($this->uri->segment(3));
        
        
        $this->data['view'] = 'rh/visualizar2';
        return $this->layout();
    }
     public function visualizar()
    {
        if (!$this->uri->segment(3) || !is_numeric($this->uri->segment(3))) {
            $this->session->set_flashdata('error', 'Item não pode ser encontrado, parâmetro não foi passado corretamente.');
            redirect('mapos');
        }

        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar O.S.');
            redirect(base_url());
        }

        $this->data['custom_error'] = '';
        $this->data['texto_de_notificacao'] = $this->data['configuration']['notifica_whats'];

        $this->load->model('mapos_model');
        $this->data['result'] = $this->rh_model->getById($this->uri->segment(3));
        //$this->data['produtos'] = $this->rh_model->getProdutos($this->uri->segment(3));
       // $this->data['servicos'] = $this->rh_model->getServicos($this->uri->segment(3));
        $this->data['emitente'] = $this->mapos_model->getEmitente();
        $this->data['anexos'] = $this->rh_model->getAnexos($this->uri->segment(3));
        $this->data['anotacoes'] = $this->rh_model->getAnotacoes($this->uri->segment(3));
        $this->data['editavel'] = $this->rh_model->isEditable($this->uri->segment(3));
      
        $this->data['view'] = 'rh/visualizarOs';

       

        return $this->layout();
    }

    public function adicionar()
    {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'aRh')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para adicionar Funcionários');
            redirect('rh');
        }

        $this->load->library('form_validation');
        $this->data['custom_error'] = '';

        if ($this->form_validation->run('dp') == false) {
            $this->data['custom_error'] = (validation_errors() ? true : false);
        } else {
            $dataInicial = $this->input->post('dataInicial');
            $dataFinal = $this->input->post('dataFinal');
            

            try {
                $dataInicial = explode('/', $dataInicial);
                $dataInicial = $dataInicial[2] . '-' . $dataInicial[1] . '-' . $dataInicial[0];

                if ($dataFinal) {
                    $dataFinal = explode('/', $dataFinal);
                    $dataFinal = $dataFinal[2] . '-' . $dataFinal[1] . '-' . $dataFinal[0];
                } else {
                    $dataFinal = date('Y/m/d');
                }

                
            } catch (Exception $e) {
                $dataInicial = date('Y/m/d');
                $dataFinal = date('Y/m/d');
            }

            $data = [
                'dataInicial' => $dataInicial,
                'nomeFuncionario' => $this->input->post('nomeFuncionario'),
                'idFuncionario' => $this->input->post('idFuncionario'),
                'dataFinal' => $dataFinal,
                'status' => set_value('status'),
                'tecnico' => (!empty($this->input->post('tecnico'))) ? $this->input->post('tecnico') : NULL,
                'dataNascimento' => (!empty($this->input->post('dataNascimento'))) ? $this->input->post('dataNascimento') : NULL,
                'dpCpf' => (!empty($this->input->post('dpCpf'))) ? $this->input->post('dpCpf') : NULL,
                'dpRg' => (!empty($this->input->post('dpRg'))) ? $this->input->post('dpRg') : NULL,
                'sexo' => (!empty($this->input->post('sexo'))) ? $this->input->post('sexo') : NULL,
                'estadoCivil' => (!empty($this->input->post('estadoCivil'))) ? $this->input->post('estadoCivil') : NULL,
                'cep' => (!empty($this->input->post('cep'))) ? $this->input->post('cep') : NULL,
                'rua' => (!empty($this->input->post('rua'))) ? $this->input->post('rua') : NULL,
                'numero' => (!empty($this->input->post('numero'))) ? $this->input->post('numero') : NULL,
                'complemento' => (!empty($this->input->post('complemento'))) ? $this->input->post('complemento') : NULL,
                'bairro' => (!empty($this->input->post('bairro'))) ? $this->input->post('bairro') : NULL,
                'cidade' => (!empty($this->input->post('cidade'))) ? $this->input->post('cidade') : NULL,
                'estado' => (!empty($this->input->post('estado'))) ? $this->input->post('estado') : NULL,
            ];

            if (is_numeric($id = $this->rh_model->add('dp', $data, true))) {
                $this->session->set_flashdata('success', 'Funcionario adicionado com sucesso, você pode adicionar outras informações a ficha do funcionario nas abas de anexo e histórico!');
                log_info('Adicionou uma Funcionário');
                redirect(site_url('rh/editar/') . $id);
            } else {
                $this->data['custom_error'] = '<div class="alert">Ocorreu um erro.</div>';
            }
        }

        $this->data['view'] = 'rh/adicionarDp';
        return $this->layout();
    }

    public function editar()
    {
        if (!$this->uri->segment(3) || !is_numeric($this->uri->segment(3))) {
            $this->session->set_flashdata('error', 'Item não pode ser encontrado, parâmetro não foi passado corretamente.');
            redirect('rh');
        }

        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'eRh')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para editar funcionários');
            redirect(base_url());
        }

        $this->load->library('form_validation');
        $this->data['custom_error'] = '';
        


        if ($this->form_validation->run('dp') == false) {
            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {
            $dataInicial = $this->input->post('dataInicial');
            $dataFinal = $this->input->post('dataFinal');
           

            try {
                $dataInicial = explode('/', $dataInicial);
                $dataInicial = $dataInicial[2] . '-' . $dataInicial[1] . '-' . $dataInicial[0];

                $dataFinal = explode('/', $dataFinal);
                $dataFinal = $dataFinal[2] . '-' . $dataFinal[1] . '-' . $dataFinal[0];
            } catch (Exception $e) {
                $dataInicial = date('Y/m/d');
            }

            $data = [
                'dataInicial' => $dataInicial,
                'nomeFuncionario' => $this->input->post('nomeFuncionario'),
                'idFuncionario' => $this->input->post('idFuncionario'),
                'dataDemissao' => $this->input->post('dataDemissao'),
                //'dataFinal' => $dataFinal,
                'status' => set_value('status'),
                'tecnico' => (!empty($this->input->post('tecnico'))) ? $this->input->post('tecnico') : NULL,
                'dataNascimento' => (!empty($this->input->post('dataNascimento'))) ? $this->input->post('dataNascimento') : NULL,
                'dpCpf' => (!empty($this->input->post('dpCpf'))) ? $this->input->post('dpCpf') : NULL,
                'dpRg' => (!empty($this->input->post('dpRg'))) ? $this->input->post('dpRg') : NULL,
                'sexo' => (!empty($this->input->post('sexo'))) ? $this->input->post('sexo') : NULL,
                'estadoCivil' => (!empty($this->input->post('estadoCivil'))) ? $this->input->post('estadoCivil') : NULL,
                'cep' => (!empty($this->input->post('cep'))) ? $this->input->post('cep') : NULL,
                'rua' => (!empty($this->input->post('rua'))) ? $this->input->post('rua') : NULL,
                'numero' => (!empty($this->input->post('numero'))) ? $this->input->post('numero') : NULL,
                'complemento' => (!empty($this->input->post('complemento'))) ? $this->input->post('complemento') : NULL,
                'bairro' => (!empty($this->input->post('bairro'))) ? $this->input->post('bairro') : NULL,
                'cidade' => (!empty($this->input->post('cidade'))) ? $this->input->post('cidade') : NULL,
                'estado' => (!empty($this->input->post('estado'))) ? $this->input->post('estado') : NULL,
               
            ];
            

            if ($this->rh_model->edit('dp', $data, 'idDp', $this->input->post('idDp')) == true) {
            
                $this->session->set_flashdata('success', 'Registro editado com sucesso!');
                log_info('Alterou uma ficha de funcionário. ID: ' . $this->input->post('idDp'));
                redirect(site_url('rh/editar/') . $this->input->post('idDp'));
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro</p></div>';
            }
        }

        $this->data['result'] = $this->rh_model->getById($this->uri->segment(3));
        $this->data['anexos'] = $this->rh_model->getAnexos($this->uri->segment(3));
        $this->data['anotacoes'] = $this->rh_model->getAnotacoes($this->uri->segment(3));
        $this->load->model('mapos_model');
        $this->data['emitente'] = $this->mapos_model->getEmitente();

        $this->data['view'] = 'rh/editarDp';
        return $this->layout();
    }

   


    public function excluir()
    {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'dRh')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para excluir funcionários');
            redirect(base_url());
        }

        $id = $this->input->post('id');
        $this->rh_model->delete('anexos_dp', 'dp_id', $id);
        $this->rh_model->delete('dp', 'idDp', $id);
        
        log_info('Removeu uma funcionário: ' . $id);
        $this->session->set_flashdata('success', 'Funcionário excluído com sucesso!');
        redirect(site_url('rh/gerenciar/'));
    }


    public function autoCompleteCliente()
    {
        if (isset($_GET['term'])) {
            $q = strtolower($_GET['term']);
            $this->rh_model->autoCompleteCliente($q);
        }
    }

    public function autoCompleteUsuario()
    {
        if (isset($_GET['term'])) {
            $q = strtolower($_GET['term']);
            $this->rh_model->autoCompleteUsuario($q);
        }
    }


    public function anexar()
    {
       
        
        $this->load->library('upload');
        $this->load->library('image_lib');

        $directory = FCPATH . 'assets' . DIRECTORY_SEPARATOR . 'anexos' . DIRECTORY_SEPARATOR . date('m-Y') . DIRECTORY_SEPARATOR . 'registro-' . $this->input->post('idDpServico');

        // verifica se o diretorio existe e se e um diretorio
        if (!is_dir($directory . DIRECTORY_SEPARATOR . 'thumbs')) {
            // make directory for images and thumbs
            try {
                mkdir($directory . DIRECTORY_SEPARATOR . 'thumbs', 0755, true);
            } catch (Exception $e) {
                echo json_encode(['result' => false, 'mensagem' => $e->getMessage()]);
                die();
            }
        }

        $upload_conf = [
            'upload_path' => $directory,
            'allowed_types' => 'jpg|png|gif|jpeg|JPG|PNG|GIF|JPEG|pdf|PDF|cdr|CDR|docx|DOCX|txt', // formatos permitidos para anexos de os
            'max_size' => 0,
        ];

        $this->upload->initialize($upload_conf);

        foreach ($_FILES['userfile'] as $key => $val) {
            $i = 1;
            foreach ($val as $v) {
                $field_name = "file_" . $i;
                $_FILES[$field_name][$key] = $v;
                $i++;
            }
        }
        unset($_FILES['userfile']);

        $error = [];
        $success = [];

        foreach ($_FILES as $field_name => $file) {
            if (!$this->upload->do_upload($field_name)) {
                $error['upload'][] = $this->upload->display_errors();
            } else {
                $upload_data = $this->upload->data();

                if ($upload_data['is_image'] == 1) {

                    // set the resize config
                    $resize_conf = [

                        'source_image' => $upload_data['full_path'],
                        'new_image' => $upload_data['file_path'] . 'thumbs' . DIRECTORY_SEPARATOR . 'thumb_' . $upload_data['file_name'],
                        'width' => 200,
                        'height' => 125,
                    ];

                    $this->image_lib->initialize($resize_conf);

                    if (!$this->image_lib->resize()) {
                        $error['resize'][] = $this->image_lib->display_errors();
                    } else {
                        $success[] = $upload_data;
                        $this->load->model('rh_model');
                        $this->rh_model->anexar($this->input->post('idDpServico'), $upload_data['file_name'], base_url('assets' . DIRECTORY_SEPARATOR . 'anexos' . DIRECTORY_SEPARATOR . date('m-Y') . DIRECTORY_SEPARATOR . 'registro-' . $this->input->post('idDpServico')), 'thumb_' . $upload_data['file_name'], $directory);
                    }
                } else {
                    $success[] = $upload_data;

                    $this->load->model('rh_model');

                    $this->rh_model->anexar($this->input->post('idDpServico'), $upload_data['file_name'], base_url('assets' . DIRECTORY_SEPARATOR . 'anexos' . DIRECTORY_SEPARATOR . date('m-Y') . DIRECTORY_SEPARATOR . 'registro-' . $this->input->post('idDpServico')), '', $directory);
                }
            }
        }

        if (count($error) > 0) {
            echo json_encode(['result' => false, 'mensagem' => 'Nenhum arquivo foi anexado.']);
        } else {
            log_info('Adicionou anexo(s) a uma funcionário: ' . $this->input->post('idDpServico'));
            echo json_encode(['result' => true, 'mensagem' => 'Arquivo(s) anexado(s) com sucesso .']);
        }
    }
    
    

    public function excluirAnexo($id = null)
    {
        if ($id == null || !is_numeric($id)) {
            echo json_encode(['result' => false, 'mensagem' => 'Erro ao tentar excluir anexo.']);
        } else {
            $this->db->where('idAnexos', $id);
            $file = $this->db->get('anexos_dp', 1)->row();
            $idDp = $this->input->post('idDp');

            unlink($file->path . DIRECTORY_SEPARATOR . $file->anexo);

            if ($file->thumb != null) {
                unlink($file->path . DIRECTORY_SEPARATOR . 'thumbs' . DIRECTORY_SEPARATOR . $file->thumb);
            }

            if ($this->rh_model->delete('anexos_dp', 'idAnexos', $id) == true) {
                log_info('Removeu anexo de uma funcionário: ' . $idDp);
                echo json_encode(['result' => true, 'mensagem' => 'Anexo excluído com sucesso.']);
            } else {
                echo json_encode(['result' => false, 'mensagem' => 'Erro ao tentar excluir anexo.']);
            }
        }
    }

    public function downloadanexo($id = null)
    {
        if ($id != null && is_numeric($id)) {
            $this->db->where('idAnexos', $id);
            $file = $this->db->get('anexos_dp', 1)->row();

            $this->load->library('zip');
            $path = $file->path;
            $this->zip->read_file($path . '/' . $file->anexo);
            $this->zip->download('file' . date('d-m-Y-H.i.s') . '.zip');
        }
    }

   

    
     public function adicionarAnotacao()
    {
        $this->load->library('form_validation');
        if ($this->form_validation->run('anotacoes_dp') == false) {
            echo json_encode(validation_errors());
        } else {
            $data = [
                'anotacao' => $this->input->post('anotacao'),
                'data_hora' => date('Y-m-d H:i:s'),
                'dp_id' => $this->input->post('dp_id'),
                'responsavelAnotacao' => $this->input->post('responsavelAnotacao'),
            ];

            if ($this->rh_model->add('anotacoes_dp', $data) == true) {
                log_info('Adicionou um anexo ao registro do funcionário: ' . $this->input->get('dp_id'));
                echo json_encode(['result' => true]);
            } else {
                echo json_encode(['result' => false]);
            }
        }
    }

    public function excluirAnotacao()
    {
        $id = $this->input->post('idAnotacao');
        $idDp = $this->input->post('idDp');

        if ($this->rh_model->delete('anotacoes_dp', 'idAnotacoes', $id) == true) {
            log_info('Removeu anotação de uma funcionário: ' . $idDp);
            echo json_encode(['result' => true]);
        } else {
            echo json_encode(['result' => false]);
        }
    }
}
