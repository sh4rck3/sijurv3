<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Bradesco extends MY_Controller
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
        $this->load->model('bradesco_model');
        $this->data['menuBradesco'] = 'Bradesco';
    }

    public function index()
    {
        $this->gerenciar();
    }

    public function gerenciar()
    {
         if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'vBradesco')) {
            $this->session->set_flashdata('error', 'Você não tem visualizar a planilha do Bradesco');
            redirect(base_url());
        } 
        
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

        $this->data['configuration']['base_url'] = site_url('bradesco/gerenciar/');
        $this->data['configuration']['total_rows'] = $this->bradesco_model->count('bradesco_analitico');

        $this->pagination->initialize($this->data['configuration']);

        $this->data['results'] = $this->bradesco_model->getOs(
            'bradesco_analitico',
            'bradesco_analitico.*, DATEDIFF(NOW(),bradesco_analitico.DataEntrada) AS lifeTime',
            $where_array,
            $this->data['configuration']['per_page'],
            $this->uri->segment(3)
        );

        $this->data['texto_de_notificacao'] = $this->data['configuration']['notifica_whats'];
        $this->data['emitente'] = $this->mapos_model->getEmitente();
        $this->data['view'] = 'bradesco/bradesco';
        return $this->layout();
    }
    
    

    public function adicionar()
    {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'aBradesco')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para adicionar a planilha');
            redirect(base_url());
        }

        $this->load->library('form_validation');
        $this->data['custom_error'] = '';

        if ($this->form_validation->run('bradesco') == false) {
            $this->data['custom_error'] = (validation_errors() ? true : false);
        } else {
           

            $data = [
                
                'GCPJ' => $this->input->post('GCPJ'),
                'DataEntrada' => (!empty($this->input->post('DataEntrada'))) ? $this->input->post('DataEntrada') : NULL,
                'adv_responsavel' => (!empty($this->input->post('adv_responsavel'))) ? $this->input->post('adv_responsavel') : NULL,
                'AGENCIA' => (!empty($this->input->post('AGENCIA'))) ? $this->input->post('AGENCIA') : NULL,
                'CONTA' => (!empty($this->input->post('CONTA'))) ? $this->input->post('CONTA') : NULL,
                'CARTEIRA' => (!empty($this->input->post('CARTEIRA'))) ? $this->input->post('CARTEIRA') : NULL,
                'CONTRATO' => (!empty($this->input->post('CONTRATO'))) ? $this->input->post('CONTRATO') : NULL,
                'CLIENTE' => (!empty($this->input->post('CLIENTE'))) ? $this->input->post('CLIENTE') : NULL,
                'STATUS' => (!empty($this->input->post('STATUS'))) ? $this->input->post('STATUS') : NULL,
                'OBS' => (!empty($this->input->post('OBS'))) ? $this->input->post('OBS') : NULL,
                'SITUAC' => (!empty($this->input->post('SITUAC'))) ? $this->input->post('SITUAC') : NULL,
                'DT_RET_CONTROL' => (!empty($this->input->post('DT_RET_CONTROL'))) ? $this->input->post('DT_RET_CONTROL') : NULL,
                'RESP_INICIAL' => (!empty($this->input->post('RESP_INICIAL'))) ? $this->input->post('RESP_INICIAL') : NULL,
                'DT_AJUIZ' => (!empty($this->input->post('DT_AJUIZ'))) ? $this->input->post('DT_AJUIZ') : NULL,
                'OBSERVACAO' => (!empty($this->input->post('OBSERVACAO'))) ? $this->input->post('OBSERVACAO') : NULL,
                'RESPONSAVEL' => (!empty($this->input->post('RESPONSAVEL'))) ? $this->input->post('RESPONSAVEL') : NULL,
                'situacao_iniciais' => (!empty($this->input->post('situacao_iniciais'))) ? $this->input->post('situacao_iniciais') : NULL,
                'data_tempo' => date('Y-m-d H:i'),
                'dataCadastro' => date('Y-m-d H:i')
               
               
                
            ];

            if (is_numeric($id = $this->bradesco_model->add('bradesco_analitico', $data, true))) {
                $this->session->set_flashdata('success', 'GCPJ adicionado com sucesso, mantenha os dados atualizados para que o sistema possa te ajudar!');
                redirect(site_url('bradesco/editar/') . $id);
            } else {
                $this->data['custom_error'] = '<div class="alert">Ocorreu um erro.</div>';
            }
        }
        $this->data['result2'] = $this->bradesco_model->getSituacao2();
        $this->data['resultInicial'] = $this->bradesco_model->getSituacaoIniciais();
        $this->data['resultadv'] = $this->bradesco_model->geadvResponsavel();
        $this->data['view'] = 'bradesco/adicionarBradesco';
        return $this->layout();
    }

    public function editar()
    {
        //$this->load->model('ci_sessions_model');
        
        if (!$this->uri->segment(3) || !is_numeric($this->uri->segment(3))) {
            $this->session->set_flashdata('error', 'Item não pode ser encontrado, parâmetro não foi passado corretamente.');
            redirect('mapos');
        }

        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'eBradesco')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para editar registros');
            redirect(base_url());
        }

        $this->load->library('form_validation');
        $this->data['custom_error'] = '';
        $this->data['texto_de_notificacao'] = $this->data['configuration']['notifica_whats'];
        if ($this->form_validation->run('bradesco') == false) {
            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {
        

            $data = [
                 'GCPJ' => $this->input->post('GCPJ'),
                'DataEntrada' => (!empty($this->input->post('DataEntrada'))) ? $this->input->post('DataEntrada') : NULL,
                'adv_responsavel' => (!empty($this->input->post('adv_responsavel'))) ? $this->input->post('adv_responsavel') : NULL,
                'AGENCIA' => (!empty($this->input->post('AGENCIA'))) ? $this->input->post('AGENCIA') : NULL,
                'CONTA' => (!empty($this->input->post('CONTA'))) ? $this->input->post('CONTA') : NULL,
                'CARTEIRA' => (!empty($this->input->post('CARTEIRA'))) ? $this->input->post('CARTEIRA') : NULL,
                'CONTRATO' => (!empty($this->input->post('CONTRATO'))) ? $this->input->post('CONTRATO') : NULL,
                'CLIENTE' => (!empty($this->input->post('CLIENTE'))) ? $this->input->post('CLIENTE') : NULL,
                'STATUS' => (!empty($this->input->post('STATUS'))) ? $this->input->post('STATUS') : NULL,
                'OBS' => (!empty($this->input->post('OBS'))) ? $this->input->post('OBS') : NULL,
                'SITUAC' => (!empty($this->input->post('SITUAC'))) ? $this->input->post('SITUAC') : NULL,
                'DT_RET_CONTROL' => (!empty($this->input->post('DT_RET_CONTROL'))) ? $this->input->post('DT_RET_CONTROL') : NULL,
                'RESP_INICIAL' => (!empty($this->input->post('RESP_INICIAL'))) ? $this->input->post('RESP_INICIAL') : NULL,
                'DT_AJUIZ' => (!empty($this->input->post('DT_AJUIZ'))) ? $this->input->post('DT_AJUIZ') : NULL,
                'OBSERVACAO' => (!empty($this->input->post('OBSERVACAO'))) ? $this->input->post('OBSERVACAO') : NULL,
                'RESPONSAVEL' => (!empty($this->input->post('RESPONSAVEL'))) ? $this->input->post('RESPONSAVEL') : NULL,
                'situacao_iniciais' => (!empty($this->input->post('situacao_iniciais'))) ? $this->input->post('situacao_iniciais') : NULL,
                'data_tempo' => date('Y-m-d H:i')
                
            ];
           

            if ($this->bradesco_model->edit('bradesco_analitico', $data, 'idBradesco', $this->input->post('idBradesco')) == true) {
                $this->load->model('mapos_model');
                $this->load->model('usuarios_model');

              


                $this->session->set_flashdata('success', 'GCPJ editado com sucesso!');
                log_info('Alterou uma Registro. ID: ' . $this->input->post('idBradesco'));
                redirect(site_url('bradesco/editar/') . $this->input->post('idBradesco'));
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro</p></div>';
            }
        }
        $this->data['result2'] = $this->bradesco_model->getSituacao2();
        $this->data['result'] = $this->bradesco_model->getById($this->uri->segment(3));
        $this->data['resultInicial'] = $this->bradesco_model->getSituacaoIniciais();
        $this->data['resultadv'] = $this->bradesco_model->geadvResponsavel();
        $this->load->model('mapos_model');
        $this->data['emitente'] = $this->mapos_model->getEmitente();

        $this->data['view'] = 'bradesco/editarBradesco';
        return $this->layout();
    }

    public function visualizar()
    {
        if (!$this->uri->segment(3) || !is_numeric($this->uri->segment(3))) {
            $this->session->set_flashdata('error', 'Item não pode ser encontrado, parâmetro não foi passado corretamente.');
            redirect('mapos');
        }

        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'vBradesco')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar os registros');
            redirect(base_url());
        }

        $this->data['custom_error'] = '';
        $this->data['texto_de_notificacao'] = $this->data['configuration']['notifica_whats'];

        $this->load->model('mapos_model');
        $this->data['result'] = $this->bradesco_model->getById($this->uri->segment(3));
       
        $this->data['view'] = 'bradesco/visualizarBradesco';

        return $this->layout();
    }

    public function imprimir()
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
        $this->load->model('mapos_model');
        $this->data['result'] = $this->bradesco_model->getById($this->uri->segment(3));
        //$this->data['produtos'] = $this->bradesco_model->getProdutos($this->uri->segment(3));
        //$this->data['servicos'] = $this->bradesco_model->getServicos($this->uri->segment(3));
        $this->data['emitente'] = $this->mapos_model->getEmitente();
//        $this->data['qrCode'] = $this->bradesco_model->getQrCode(
//            $this->uri->segment(3),
//            $this->data['configuration']['pix_key'],
//            $this->data['emitente'][0]
//        );

        $this->load->view('bradesco/imprimirBradesco', $this->data);
    }

    public function imprimirTermica()
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
        $this->load->model('mapos_model');
        $this->data['result'] = $this->os_model->getById($this->uri->segment(3));
        $this->data['produtos'] = $this->os_model->getProdutos($this->uri->segment(3));
        $this->data['servicos'] = $this->os_model->getServicos($this->uri->segment(3));
        $this->data['emitente'] = $this->mapos_model->getEmitente();

        $this->load->view('os/imprimirOsTermica', $this->data);
    }

    public function enviar_email()
    {
        if (!$this->uri->segment(3) || !is_numeric($this->uri->segment(3))) {
            $this->session->set_flashdata('error', 'Item não pode ser encontrado, parâmetro não foi passado corretamente.');
            redirect('mapos');
        }

        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para enviar O.S. por e-mail.');
            redirect(base_url());
        }

        $this->load->model('mapos_model');
        $this->load->model('usuarios_model');
        $this->data['result'] = $this->os_model->getById($this->uri->segment(3));
        if (!isset($this->data['result']->email)) {
            $this->session->set_flashdata('error', 'O cliente não tem e-mail cadastrado.');
            redirect(site_url('os'));
        }

        $this->data['produtos'] = $this->os_model->getProdutos($this->uri->segment(3));
        $this->data['servicos'] = $this->os_model->getServicos($this->uri->segment(3));
        $this->data['emitente'] = $this->mapos_model->getEmitente();

        if (!isset($this->data['emitente'][0]->email)) {
            $this->session->set_flashdata('error', 'Efetue o cadastro dos dados de emitente');
            redirect(site_url('os'));
        }

        $idOs = $this->uri->segment(3);

        $emitente = $this->data['emitente'][0];
        $tecnico = $this->usuarios_model->getById($this->data['result']->usuarios_id);

        // Verificar configuração de notificação
        $ValidarEmail = false;
        if ($this->data['configuration']['os_notification'] != 'nenhum') {
            $remetentes = [];
            switch ($this->data['configuration']['os_notification']) {
                case 'todos':
                    array_push($remetentes, $this->data['result']->email);
                    array_push($remetentes, $tecnico->email);
                    array_push($remetentes, $emitente->email);
                    $ValidarEmail = true;
                    break;
                case 'cliente':
                    array_push($remetentes, $this->data['result']->email);
                    $ValidarEmail = true;
                    break;
                case 'tecnico':
                    array_push($remetentes, $tecnico->email);
                    break;
                case 'emitente':
                    array_push($remetentes, $emitente->email);
                    break;
                default:
                    array_push($remetentes, $this->data['result']->email);
                    $ValidarEmail = true;
                    break;
            }

            if ($ValidarEmail) {
                if (empty($this->data['result']->email) || !filter_var($this->data['result']->email, FILTER_VALIDATE_EMAIL)) {
                    $this->session->set_flashdata('error', 'Por favor preencha o email do cliente');
                    redirect(site_url('os/visualizar/').$this->uri->segment(3));
                }
            }

            $enviouEmail = $this->enviarOsPorEmail($idOs, $remetentes, 'Ordem de Serviço');

            if ($enviouEmail) {
                $this->session->set_flashdata('success', 'O email está sendo processado e será enviado em breve.');
                log_info('Enviou e-mail para o cliente: ' . $this->data['result']->nomeCliente . '. E-mail: ' . $this->data['result']->email);
                redirect(site_url('os'));
            } else {
                $this->session->set_flashdata('error', 'Ocorreu um erro ao enviar e-mail.');
                redirect(site_url('os'));
            }
        }

        $this->session->set_flashdata('success', 'O sistema está com uma configuração ativada para não notificar. Entre em contato com o administrador.');
        redirect(site_url('os'));
    }

    public function excluir()
    {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'dBradesco')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para da planilha');
            redirect(base_url());
        }

        $id = $this->input->post('id');
        $os = $this->bradesco_model->getByIdCobrancas($id);
        if ($os == null) {
            $os = $this->bradesco_model->getById($id);
            if ($os == null) {
                $this->session->set_flashdata('error', 'Erro ao tentar excluir Registro');
                redirect(base_url() . 'index.php/bradesco/gerenciar/');
            }
        }

       

        $this->bradesco_model->delete('bradesco_analitico', 'idBradesco', $id);
        

        log_info('Removeu uma Registro ID: ' . $id);
        $this->session->set_flashdata('success', 'Registro excluído com sucesso!');
        redirect(site_url('bradesco/gerenciar/'));
    }

    public function autoCompleteProduto()
    {
        if (isset($_GET['term'])) {
            $q = strtolower($_GET['term']);
            $this->os_model->autoCompleteProduto($q);
        }
    }

    public function autoCompleteProdutoSaida()
    {
        if (isset($_GET['term'])) {
            $q = strtolower($_GET['term']);
            $this->os_model->autoCompleteProdutoSaida($q);
        }
    }

    public function autoCompleteCliente()
    {
        if (isset($_GET['term'])) {
            $q = strtolower($_GET['term']);
            $this->bradesco_model->autoCompleteCliente($q);
        }
    }

    public function autoCompleteUsuario()
    {
        if (isset($_GET['term'])) {
            $q = strtolower($_GET['term']);
            $this->bradesco_model->autoCompleteUsuario($q);
        }
    }
    
     public function autoCompleteSituacao()
    {
        if (isset($_GET['term'])) {
            $q = strtolower($_GET['term']);
            $this->bradesco_model->autoCompleteSituacao($q);
        }
    }
    
      public function autoCompleteGCPJ()
    {
        if (isset($_GET['term'])) {
            $q = strtolower($_GET['term']);
            $this->bradesco_model->autoCompleteGCPJ($q);
        }
    }

    public function autoCompleteTermoGarantia()
    {
        if (isset($_GET['term'])) {
            $q = strtolower($_GET['term']);
            $this->os_model->autoCompleteTermoGarantia($q);
        }
    }

    public function autoCompleteServico()
    {
        if (isset($_GET['term'])) {
            $q = strtolower($_GET['term']);
            $this->os_model->autoCompleteServico($q);
        }
    }

    public function adicionarProduto()
    {
        $this->load->library('form_validation');

        if ($this->form_validation->run('adicionar_produto_os') === false) {
            $errors = validation_errors();

            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(400)
                ->set_output(json_encode($errors));
        }

        $preco = $this->input->post('preco');
        $quantidade = $this->input->post('quantidade');
        $subtotal = $preco * $quantidade;
        $produto = $this->input->post('idProduto');
        $data = [
            'quantidade' => $quantidade,
            'subTotal' => $subtotal,
            'produtos_id' => $produto,
            'preco' => $preco,
            'os_id' => $this->input->post('idOsProduto'),
        ];

        $id = $this->input->post('idOsProduto');
        $os = $this->os_model->getById($id);
        if ($os == null) {
            $this->session->set_flashdata('error', 'Erro ao tentar inserir produto na OS.');
            redirect(base_url() . 'index.php/os/gerenciar/');
        }

        if ($this->os_model->add('produtos_os', $data) == true) {
            $this->load->model('produtos_model');

            if ($this->data['configuration']['control_estoque']) {
                $this->produtos_model->updateEstoque($produto, $quantidade, '-');
            }
            log_info('Adicionou produto a uma OS. ID (OS): ' . $this->input->post('idOsProduto'));

            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode(['result' => true]));
        } else {
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(500)
                ->set_output(json_encode(['result' => false]));
        }
    }

    public function excluirProduto()
    {
        $id = $this->input->post('idProduto');
        $idOs = $this->input->post('idOs');

        $os = $this->os_model->getById($idOs);
        if ($os == null) {
            $this->session->set_flashdata('error', 'Erro ao tentar excluir produto na OS.');
            redirect(base_url() . 'index.php/os/gerenciar/');
        }

        if ($this->os_model->delete('produtos_os', 'idProdutos_os', $id) == true) {
            $quantidade = $this->input->post('quantidade');
            $produto = $this->input->post('produto');

            $this->load->model('produtos_model');

            if ($this->data['configuration']['control_estoque']) {
                $this->produtos_model->updateEstoque($produto, $quantidade, '+');
            }
            log_info('Removeu produto de uma OS. ID (OS): ' . $idOs);

            echo json_encode(['result' => true]);
        } else {
            echo json_encode(['result' => false]);
        }
    }

    public function adicionarServico()
    {
        $this->load->library('form_validation');

        if ($this->form_validation->run('adicionar_servico_os') === false) {
            $errors = validation_errors();

            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(400)
                ->set_output(json_encode($errors));
        }

        $data = [
            'servicos_id' => $this->input->post('idServico'),
            'quantidade' => $this->input->post('quantidade'),
            'preco' => $this->input->post('preco'),
            'os_id' => $this->input->post('idOsServico'),
            'subTotal' => $this->input->post('preco') * $this->input->post('quantidade'),
        ];

        if ($this->os_model->add('servicos_os', $data) == true) {
            log_info('Adicionou serviço a uma OS. ID (OS): ' . $this->input->post('idOsServico'));

            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode(['result' => true]));
        } else {
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(500)
                ->set_output(json_encode(['result' => false]));
        }
    }

    public function excluirServico()
    {
        $ID = $this->input->post('idServico');
        $idOs = $this->input->post('idOs');

        if ($this->os_model->delete('servicos_os', 'idServicos_os', $ID) == true) {
            log_info('Removeu serviço de uma OS. ID (OS): ' . $idOs);
            echo json_encode(['result' => true]);
        } else {
            echo json_encode(['result' => false]);
        }
    }

    public function anexar()
    {
        $this->load->library('upload');
        $this->load->library('image_lib');

        $directory = FCPATH . 'assets' . DIRECTORY_SEPARATOR . 'anexos' . DIRECTORY_SEPARATOR . date('m-Y') . DIRECTORY_SEPARATOR . 'OS-' . $this->input->post('idOsServico');

        // If it exist, check if it's a directory
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
                        $this->load->model('Os_model');
                        $this->Os_model->anexar($this->input->post('idOsServico'), $upload_data['file_name'], base_url('assets' . DIRECTORY_SEPARATOR . 'anexos' . DIRECTORY_SEPARATOR . date('m-Y') . DIRECTORY_SEPARATOR . 'OS-' . $this->input->post('idOsServico')), 'thumb_' . $upload_data['file_name'], $directory);
                    }
                } else {
                    $success[] = $upload_data;

                    $this->load->model('Os_model');

                    $this->Os_model->anexar($this->input->post('idOsServico'), $upload_data['file_name'], base_url('assets' . DIRECTORY_SEPARATOR . 'anexos' . DIRECTORY_SEPARATOR . date('m-Y') . DIRECTORY_SEPARATOR . 'OS-' . $this->input->post('idOsServico')), '', $directory);
                }
            }
        }

        if (count($error) > 0) {
            echo json_encode(['result' => false, 'mensagem' => 'Nenhum arquivo foi anexado.']);
        } else {
            log_info('Adicionou anexo(s) a uma OS. ID (OS): ' . $this->input->post('idOsServico'));
            echo json_encode(['result' => true, 'mensagem' => 'Arquivo(s) anexado(s) com sucesso .']);
        }
    }

    public function excluirAnexo($id = null)
    {
        if ($id == null || !is_numeric($id)) {
            echo json_encode(['result' => false, 'mensagem' => 'Erro ao tentar excluir anexo.']);
        } else {
            $this->db->where('idAnexos', $id);
            $file = $this->db->get('anexos', 1)->row();
            $idOs = $this->input->post('idOs');

            unlink($file->path . DIRECTORY_SEPARATOR . $file->anexo);

            if ($file->thumb != null) {
                unlink($file->path . DIRECTORY_SEPARATOR . 'thumbs' . DIRECTORY_SEPARATOR . $file->thumb);
            }

            if ($this->os_model->delete('anexos', 'idAnexos', $id) == true) {
                log_info('Removeu anexo de uma OS. ID (OS): ' . $idOs);
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
            $file = $this->db->get('anexos', 1)->row();

            $this->load->library('zip');
            $path = $file->path;
            $this->zip->read_file($path . '/' . $file->anexo);
            $this->zip->download('file' . date('d-m-Y-H.i.s') . '.zip');
        }
    }

    public function faturar()
    {
        $this->load->library('form_validation');
        $this->data['custom_error'] = '';

        if ($this->form_validation->run('receita') == false) {
            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {
            $vencimento = $this->input->post('vencimento');
            $recebimento = $this->input->post('recebimento');

            try {
                $vencimento = explode('/', $vencimento);
                $vencimento = $vencimento[2] . '-' . $vencimento[1] . '-' . $vencimento[0];

                if ($recebimento != null) {
                    $recebimento = explode('/', $recebimento);
                    $recebimento = $recebimento[2] . '-' . $recebimento[1] . '-' . $recebimento[0];
                }
            } catch (Exception $e) {
                $vencimento = date('Y/m/d');
            }

            $data = [
                'descricao' => set_value('descricao'),
                'valor' => $this->input->post('valor'),
                'clientes_id' => $this->input->post('clientes_id'),
                'data_vencimento' => $vencimento,
                'data_pagamento' => $recebimento,
                'baixado' => $this->input->post('recebido') ?: 0,
                'cliente_fornecedor' => set_value('cliente'),
                'forma_pgto' => $this->input->post('formaPgto'),
                'tipo' => $this->input->post('tipo'),
                'observacoes' => set_value('observacoes'),
                'usuarios_id' => $this->session->userdata('id'),
            ];

            $editavel = $this->os_model->isEditable($this->input->post('idOs'));
            if (!$editavel) {
                return $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(200)
                    ->set_output(json_encode(['result' => false]));
            }

            if ($this->os_model->add('lancamentos', $data) == true) {
                $os = $this->input->post('os_id');

                $this->db->set('faturado', 1);
                $this->db->set('valorTotal', $this->input->post('valor'));
                $this->db->set('status', 'Faturado');
                $this->db->where('idOs', $os);
                $this->db->update('os');

                log_info('Faturou uma OS. ID: ' . $os);

                $this->session->set_flashdata('success', 'OS faturada com sucesso!');
                $json = ['result' => true];
                echo json_encode($json);
                die();
            } else {
                $this->session->set_flashdata('error', 'Ocorreu um erro ao tentar faturar OS.');
                $json = ['result' => false];
                echo json_encode($json);
                die();
            }
        }

        $this->session->set_flashdata('error', 'Ocorreu um erro ao tentar faturar OS.');
        $json = ['result' => false];
        echo json_encode($json);
    }

    private function enviarOsPorEmail($idOs, $remetentes, $assunto)
    {
        $dados = [];

        $this->load->model('mapos_model');
        $dados['result'] = $this->os_model->getById($idOs);
        if (!isset($dados['result']->email)) {
            return false;
        }

        $dados['produtos'] = $this->os_model->getProdutos($idOs);
        $dados['servicos'] = $this->os_model->getServicos($idOs);
        $dados['emitente'] = $this->mapos_model->getEmitente();

        $emitente = $dados['emitente'][0]->email;
        if (!isset($emitente)) {
            return false;
        }

        $html = $this->load->view('os/emails/os', $dados, true);

        $this->load->model('email_model');

        $remetentes = array_unique($remetentes);
        foreach ($remetentes as $remetente) {
            $headers = ['From' => $emitente, 'Subject' => $assunto, 'Return-Path' => ''];
            $email = [
                'to' => $remetente,
                'message' => $html,
                'status' => 'pending',
                'date' => date('Y-m-d H:i:s'),
                'headers' => serialize($headers),
            ];
            $this->email_model->add('email_queue', $email);
        }

        return true;
    }

    public function adicionarAnotacao()
    {
        $this->load->library('form_validation');
        if ($this->form_validation->run('anotacoes_os') == false) {
            echo json_encode(validation_errors());
        } else {
            $data = [
                'anotacao' => $this->input->post('anotacao'),
                'data_hora' => date('Y-m-d H:i:s'),
                'os_id' => $this->input->post('os_id'),
            ];

            if ($this->os_model->add('anotacoes_os', $data) == true) {
                log_info('Adicionou anotação a uma OS. ID (OS): ' . $this->input->post('os_id'));
                echo json_encode(['result' => true]);
            } else {
                echo json_encode(['result' => false]);
            }
        }
    }

    public function excluirAnotacao()
    {
        $id = $this->input->post('idAnotacao');
        $idOs = $this->input->post('idOs');

        if ($this->os_model->delete('anotacoes_os', 'idAnotacoes', $id) == true) {
            log_info('Removeu anotação de uma OS. ID (OS): ' . $idOs);
            echo json_encode(['result' => true]);
        } else {
            echo json_encode(['result' => false]);
        }
    }
    
    public function encerramento()
    {
        $this->load->library('pagination');
        $this->load->model('mapos_model');
        $this->data['results'] = $this->bradesco_model->getAguardandoEncerramento();
        $this->data['totalEncerramento'] = $this->bradesco_model->getAguardandoEncerramentoCount();
        $this->data['view'] = 'bradesco/encerramento';
        return $this->layout();
    }
    
    public function pesquisaPainel()
    {
        $termo = $this->input->get('pesquisa');
        $this->load->library('pagination');
        $this->load->model('mapos_model');
        $this->data['termoPesquisado'] = $termo;
        $this->data['results'] = $this->bradesco_model->getPesquisaPainel($termo);
        $this->data['totalEncerramento'] = $this->bradesco_model->getPesquisaPainelCount($termo);
        $this->data['view'] = 'bradesco/pesquisaPainel';
        return $this->layout();
    }
    
     public function pesquisaPainelStatus()
    {
        $termo = $this->input->get('pesquisa');
        $this->load->library('pagination');
        $this->load->model('mapos_model');
        $this->data['termoPesquisado'] = $termo;
        $this->data['results'] = $this->bradesco_model->getPesquisaPainelStatus($termo);
        $this->data['totalEncerramento'] = $this->bradesco_model->getPesquisaPainelCountStatus($termo);
        $this->data['view'] = 'bradesco/pesquisaPainel';
        return $this->layout();
    }
    
     public function UserPendente()
    {
        $termo = $this->input->get('pesquisa');
        $this->load->library('pagination');
        $this->load->model('mapos_model');
        $this->data['termoPesquisado'] = $termo;
        $this->data['results'] = $this->bradesco_model->getUserPendente($termo);
        $this->data['totalEncerramento'] = $this->bradesco_model->getUserPendenteCount($termo);
        $this->data['view'] = 'bradesco/pesquisaPainel';
        return $this->layout();
    }
    
     public function UserPendenteCount()
    {
        $termo = $this->input->get('pesquisa');
        $this->load->library('pagination');
        $this->load->model('mapos_model');
        $this->data['termoPesquisado'] = $termo;
        $this->data['results'] = $this->bradesco_model->getPesquisaPainelStatus($termo);
        $this->data['totalEncerramento'] = $this->bradesco_model->getPesquisaPainelCountStatus($termo);
        $this->data['view'] = 'bradesco/pesquisaPainel';
        return $this->layout();
    }
    
    //// acesso do painel a registros por mes
    
    public function gerenciarMes()
    {
        $this->load->library('pagination');
        $this->load->model('mapos_model');

        $where_array = [];

        $pesquisa = $this->input->get('pesquisa');
        $pendente = $this->input->get('pendente');
        $status = $this->input->get('status');
        

        if ($pesquisa) {
            $where_array['pesquisa'] = $pesquisa;
        }
         if ($pendente) {
            $where_array['pendente'] = $pendente;
        }
        if ($status) {
            $where_array['pendente'] = $status;
        }
        
        $this->data['configuration']['base_url'] = site_url('bradesco/gerenciarMes/');
        $this->data['configuration']['total_rows'] = $this->bradesco_model->count('bradesco_analitico');

        //$this->pagination->initialize($this->data['configuration']);

        $this->data['results'] = $this->bradesco_model->getMes(
            'bradesco_analiticoTEMP',
            'bradesco_analiticoTEMP.*, DATEDIFF(NOW(),bradesco_analiticoTEMP.DataEntrada) AS lifeTime',
            $where_array,
            $this->data['configuration']['per_page'],
            $this->uri->segment(3)
        );

       
        $this->data['view'] = 'bradesco/bradescoMes';
        return $this->layout();
    }
}
