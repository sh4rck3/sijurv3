<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Chamados extends MY_Controller
{

    /**
     * author: Ramon Silva
     * email: silva018-mg@yahoo.com.br
     *
     */

    public function __construct()
    {
        parent::__construct();

        $this->load->model('chamados_model');
        $this->data['menuTi'] = 'chamados';
    }

    public function index()
    {
        $this->gerenciar();
    }

    public function gerenciarTI()
    {
      
        $this->load->library('pagination');

        $this->data['configuration']['base_url'] = site_url('chamados/gerenciarTI/');
        $this->data['configuration']['total_rows'] = $this->chamados_model->count('chamados');

        $this->pagination->initialize($this->data['configuration']);

        $this->data['results'] = $this->chamados_model->get('chamados', '*', '', $this->data['configuration']['per_page'], $this->uri->segment(3));

        $this->data['view'] = 'chamados/chamados';
        return $this->layout();
    }
    
     public function gerenciar()
    {
      
        $this->load->library('pagination');

        $this->data['configuration']['base_url'] = site_url('chamados/gerenciar/');
        $this->data['configuration']['total_rows'] = $this->chamados_model->count('chamados');

        $this->pagination->initialize($this->data['configuration']);

        $this->data['results'] = $this->chamados_model->getNome('chamados', '*', $this->session->userdata('nome'), $this->data['configuration']['per_page'], $this->uri->segment(3));

        $this->data['view'] = 'chamados/chamados';
        return $this->layout();
    }
    
     public function gerenciar2()
    {
        $this->load->library('pagination');
        $this->load->model('mapos_model');

        $where_array = [];

        $pesquisa = $this->input->get('pesquisa');
       

        if ($pesquisa) {
            $where_array['pesquisa'] = $pesquisa;
        }
       

        $this->data['configuration']['base_url'] = site_url('chamados/gerenciar2/');
        $this->data['configuration']['total_rows'] = $this->chamados_model->count('chamados');

        $this->pagination->initialize($this->data['configuration']);

        $this->data['results'] = $this->chamados_model->getUserChamado(
            'chamados',
            'chamados.*',
            $where_array,
            $this->data['configuration']['per_page'],
            $this->uri->segment(3)
        );

        $this->data['view'] = 'chamados/chamados';
        return $this->layout();
    }

    public function adicionar()
    {
      
        $this->load->library('form_validation');
        $this->data['custom_error'] = '';

        if ($this->form_validation->run('chamado') == false) {
            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {
            $ext = strtolower(substr($_FILES['pic']['name'],-4)); //Pegando extensão do arquivo
            if(!empty($ext)){
                   // $ext = strtolower(substr($_FILES['pic']['name'],-4)); //Pegando extensão do arquivo
                
                    $new_name = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
                   // $dir = './imagens/'; //Diretório para uploads
                    $dir = FCPATH . 'assets/chamadosIMG' . DIRECTORY_SEPARATOR;

                    //gravando no banco de dados

                    //$this->load->model('Os_model');
                   // $this->Os_model->anexarSafra('999', $new_name, base_url('assets' . DIRECTORY_SEPARATOR), '', $dir);

                    move_uploaded_file($_FILES['pic']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo

                    $caminhoBaseURL = base_url('assets/chamadosIMG' . DIRECTORY_SEPARATOR);
                
                
               
             } else {
                $caminhoBaseURL = '';
                $new_name = '';
                $dir = '';
             }
            $data = [
                'usuarioChamado' => set_value('usuarioChamado'),
                'tipoChamado' => set_value('tipoChamado'),
                'status' => 'Novo',
                'observacao' => $this->input->post('observacao'),
                'dataChamado' => date('Y-m-d H:i'),
                'ipUsuarioChamado' => $this->input->post('ipUsuarioChamado'),
                'telefone' => $this->input->post('telefone'),
                'baseUrl' => $caminhoBaseURL,
                'nomeArquivo' => $new_name,
                'caminhoArquivo' => $dir,
                
                
            ];

            if ($this->chamados_model->add('chamados', $data) == true) {
                $this->session->set_flashdata('success', 'Chamado aberto com sucesso!Aguardo logo você será atendido');
                log_info('Adicionou um chamado.');
                redirect(site_url('chamados'));
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
            }
        }

        $this->data['view'] = 'chamados/adicionarChamado';
        return $this->layout();
    }

    public function editar()
    {
        if (!$this->uri->segment(3) || !is_numeric($this->uri->segment(3))) {
            $this->session->set_flashdata('error', 'Item não pode ser encontrado, parâmetro não foi passado corretamente.');
            redirect('mapos');
        }

        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'eCliente')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para editar clientes.');
            redirect(base_url());
        }

        $this->load->library('form_validation');
        $this->data['custom_error'] = '';

        if ($this->form_validation->run('respChamado') == false) {
            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {
            $data = [
                'status' => 'Fechado',
                'tecnicoResponsavel' => $this->input->post('tecnicoResponsavel'),
                'dataRespChamado' => date('Y-m-d'),
                'respostaTecnica' => $this->input->post('respostaTecnica'),
            ];

            if ($this->chamados_model->edit('chamados', $data, 'idClientes', $this->input->post('idClientes')) == true) {
                $this->session->set_flashdata('success', 'Cliente editado com sucesso!');
                log_info('Alterou um cliente. ID' . $this->input->post('idClientes'));
                redirect(site_url('chamados/editar/') . $this->input->post('idClientes'));
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro</p></div>';
            }
        }

        $this->data['result'] = $this->chamados_model->getById($this->uri->segment(3));
        $this->data['view'] = 'chamados/editarChamados';
        return $this->layout();
    }

    public function visualizar()
    {
        if (!$this->uri->segment(3) || !is_numeric($this->uri->segment(3))) {
            $this->session->set_flashdata('error', 'Item não pode ser encontrado, parâmetro não foi passado corretamente.');
            redirect('mapos');
        }

        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'vCliente')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar clientes.');
            redirect(base_url());
        }

        $this->data['custom_error'] = '';
        $this->data['result'] = $this->clientes_model->getById($this->uri->segment(3));
        $this->data['results'] = $this->clientes_model->getOsByCliente($this->uri->segment(3));
        $this->data['view'] = 'clientes/visualizar';
        return $this->layout();
    }

    public function excluir()
    {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'dCliente')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para excluir clientes.');
            redirect(base_url());
        }

        $id = $this->input->post('id');
        if ($id == null) {
            $this->session->set_flashdata('error', 'Erro ao tentar excluir cliente.');
            redirect(site_url('chamados/gerenciar/'));
        }

        $this->chamados_model->delete('chamados', 'idClientes', $id);
        log_info('Removeu um chamado. ID' . $id);

        $this->session->set_flashdata('success', 'Chamado excluido com sucesso!');
        redirect(site_url('chamados/gerenciar/'));
    }
    //adicionar cliente ao fluxo
    
     public function adicionarFluxo()
    {
          
//        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'aCliente')) {
//            $this->session->set_flashdata('error', 'Você não tem permissão para adicionar clientes.');
//            redirect(base_url());
//        }

        $this->load->library('form_validation');
        $this->data['custom_error'] = '';

        if ($this->form_validation->run('clientes') == false) {
            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {
            $data = [
                //antigos
                'nomeCliente' => set_value('nomeCliente'),
                'contato' => set_value('contato'),
                'documento' => set_value('documento'),
                'telefone' => set_value('telefone'),
                'celular' => set_value('celular'),
                'email' => set_value('email'),
                'rua' => set_value('rua'),
                'numero' => set_value('numero'),
                'complemento' => set_value('complemento'),
                'bairro' => set_value('bairro'),
                'cidade' => set_value('cidade'),
                'estado' => set_value('estado'),
                'cep' => set_value('cep'),
                'dataCadastro' => date('Y-m-d'),
                'fornecedor' => (set_value('fornecedor') == true ? 1 : 0),
                
                //personalizados
                'alfabetizado' => set_value('alfabetizado'),
                'sexo' => set_value('sexo'),
                'dataNascimento' => set_value('dataNascimento'),
                'estadoCivil' => set_value('estadoCivil'),
                'nomeDoPai' => set_value('nomeDoPai'),
                'nomeDaMae' => set_value('nomeDaMae'),
                'ufDoc' => set_value('ufDoc'),
                
                'orgaoEmpregador' => set_value('orgaoEmpregador'),
                'regimeJuridico' => set_value('regimeJuridico'),
                'situacaoEmpregador' => set_value('situacaoEmpregador'),
                'vinculoEmpregaticio' => set_value('vinculoEmpregaticio'),
                'profissao' => set_value('profissao'),
                'cargo' => set_value('cargo'),
                'valorDaRenda' => set_value('valorDaRenda'),
                'dataAdminissao' => set_value('dataAdminissao'),
                
                'tipoDeConta' => set_value('tipoDeConta'),
                'banco' => set_value('banco'),
                'agencia' => set_value('agencia'),
                'conta' => set_value('conta'),
                
                // novos dados
                'rg' => set_value('rg'),
                'orgaoExp' => set_value('orgaoExp'),
                'nomeRf1' => set_value('nomeRf1'),
                'nomeRf2' => set_value('nomeRf2'),
                'simulacaoBanco' => set_value('simulacaoBanco'),
                
            ];
            
//            if ($this->clientes_model->add('clientes', $data) == true) {
//                $this->session->set_flashdata('success', 'Cliente adicionado com sucesso!');
//                log_info('Adicionou um cliente.');
//                redirect(site_url('clientes/'));
//            } else {
//                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
//            }
            if (is_numeric($id = $this->clientes_model->add('clientes', $data, true))) {
                 if(!empty($id)){
                    
                 $data2 = [
                'dataInicial' => date('Y-m-d'),
                'clientes_id' => $id,
                'usuarios_id' => $this->input->post('usuarios_id'),
                'dataFinal' => date('Y-m-d'),
                //'garantia' => set_value('garantia'),
                //'garantias_id' => $termoGarantiaId,
                //'descricaoProduto' => set_value('descricaoProduto'),
                //'defeito' => set_value('defeito'),
                'status' => 'Solicitar simulação',
                'donoDaFicha' => $this->session->userdata('nome')
               // 'laudoTecnico' => set_value('laudoTecnico'),
               // 'faturado' => 0,
                ];
                $this->load->model('os_model');
                if (is_numeric($idFluxo = $this->os_model->add('os', $data2, true))) {
                $this->session->set_flashdata('error', 'Novo Registro SAcredi adicionado com sucesso, ->>>você precisa concluir o andamento!<<<-');
                log_info('Adicionou uma registro a SAcredi via fluxo');
                redirect(site_url('sacredi/editarSacrediFluxo/') . $idFluxo);
                }
               }
            } else {
                $this->data['custom_error'] = '<div class="alert">Ocorreu um erro.</div>';
            }
        }
        $this->data['menuFluxoInicio'] = 'clientes';
        $this->data['view'] = 'clientes/adicionarClienteFluxo';
        return $this->layout();
    }
 
    
    ///personalidado chamadoss******************************************************************************
    
    public function abrir()
    {
        if (!$this->uri->segment(3) || !is_numeric($this->uri->segment(3))) {
            $this->session->set_flashdata('error', 'Item não pode ser encontrado, parâmetro não foi passado corretamente.');
            redirect('chamados');
        }
        
        $data1 = [
                
                'status' => 'Aberto'
                
            ];
        
        $this->chamados_model->edit('chamados', $data1, 'idClientes', $this->uri->segment(3));
//        if ($this->chamados_model->edit('chamados', $data1, 'idClientes', $this->uri->segment(3)) == true) {
//                $this->session->set_flashdata('success', 'status alterado!');
//                
//            }
       redirect(site_url('chamados/responder/') . $this->uri->segment(3));

    }
    
    //responder chamado
    public function responder()
    {
        if (!$this->uri->segment(3) || !is_numeric($this->uri->segment(3))) {
            $this->session->set_flashdata('error', 'Item não pode ser encontrado, parâmetro não foi passado corretamente.');
            redirect('chamados/gerenciarTI');
        }
        
        

        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'eChamados')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para responder chamados.');
            redirect(base_url('chamados/gerenciarTI'));
        }

        $this->load->library('form_validation');
        $this->data['custom_error'] = '';

        if ($this->form_validation->run('respChamado') == false) {
            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {
            if($this->input->post('status') == 'Aberto' && (!empty($this->input->post('respostaTecnica')))){
                $data = [
                'status' => 'Fechado',
                'tecnicoResponsavel' => $this->input->post('tecnicoResponsavel'),
                'dataChamado' => date('Y-m-d H:i'),
                'respostaTecnica' => $this->input->post('respostaTecnica'),
            ];
            } else {
                $data = [
                'status' => $this->input->post('status'),
                'tecnicoResponsavel' => $this->input->post('tecnicoResponsavel'),
                'dataChamado' => date('Y-m-d H:i'),
                'respostaTecnica' => $this->input->post('respostaTecnica'),
            ];
            }
            

            if ($this->chamados_model->edit('chamados', $data, 'idClientes', $this->input->post('idClientes')) == true) {
                $this->session->set_flashdata('success', 'Chamado respondido com sucesso!');
                log_info('Respondeu um chamado. ID' . $this->input->post('idClientes'));
                redirect(site_url('chamados/gerenciarTI'));
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>deu ruim na inserção do banco de dados</p></div>';
                
            }
        }

        $this->data['result'] = $this->chamados_model->getById($this->uri->segment(3));
        $this->data['view'] = 'chamados/abrirChamados';
        return $this->layout();
    }
    
     public function gerenciarTIstatus()
    {
      
        


        $this->data['results'] = $this->chamados_model->getStatus('chamados', '*', '', $this->uri->segment(3));

        $this->data['view'] = 'chamados/chamadosStatus';
        return $this->layout();
    }
    
    

}
