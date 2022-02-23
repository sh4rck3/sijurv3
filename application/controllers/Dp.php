<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Dp extends MY_Controller
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
        $this->load->model('dp_model');
        $this->data['menuDp'] = 'DP';
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

        $this->data['configuration']['base_url'] = site_url('dp/gerenciar/');
        $this->data['configuration']['total_rows'] = $this->dp_model->count('cdl');

        $this->pagination->initialize($this->data['configuration']);

        $this->data['results'] = $this->dp_model->getCdl(
            'cdl',
            'cdl.*',
            $where_array,
            $this->data['configuration']['per_page'],
            $this->uri->segment(3)
        );

        $this->data['texto_de_notificacao'] = $this->data['configuration']['notifica_whats'];
        $this->data['emitente'] = $this->mapos_model->getEmitente();
        $this->data['view'] = 'dp/dp';
        return $this->layout();
    }
    
     public function bradesco()
    {
        $this->load->library('pagination');
        $this->load->model('mapos_model');

        $where_array = [];

        $pesquisa = $this->input->get('pesquisa');
        $status = $this->input->get('status');
       

        if ($pesquisa) {
            $where_array['pesquisa'] = $pesquisa;
        }
        if ($status) {
            $where_array['status'] = $status;
        }
        

        $this->data['configuration']['base_url'] = site_url('dp/bradesco/');
        $this->data['configuration']['total_rows'] = $this->dp_model->count('bradesco');

        $this->pagination->initialize($this->data['configuration']);

        $this->data['results'] = $this->dp_model->getBradesco(
            'bradesco',
            'bradesco.*',
            $where_array,
            $this->data['configuration']['per_page'],
            $this->uri->segment(3)
        );
        $this->data['teste4'] = $this->dp_model->getBradescoSum(
            'bradesco',
            'bradesco.*',
            $where_array,
            $this->uri->segment(3)
        );
        //$this->data['teste'] = $this->dp_model->getSoma();
        $total = $this->dp_model->getSoma();
           foreach ($total as $r) {
                     $valorTotal = $r->total ;
                    // $nomeEsteira = $r->nomeCliente ;
                 }
        
        $this->data['teste'] = $valorTotal;
        $this->data['view'] = 'dp/dpBradesco';
        return $this->layout();
    }
    
     public function bradescoPesquisa()
    {
        $this->load->library('pagination');
        $this->load->model('mapos_model');

        $where_array = [];

        $pesquisa = $this->input->get('pesquisa');
        $status = $this->input->get('status');
       

        if ($pesquisa) {
            $where_array['pesquisa'] = $pesquisa;
        }
        if ($status) {
            $where_array['status'] = $status;
        }
        

        $this->data['results'] = $this->dp_model->getBradescoPesquisa(
            'bradesco',
            'bradesco.*',
            $where_array
        );
        $this->data['countPesquisa'] = $this->dp_model->getBradescoPesquisaCount(
            'bradesco',
            'bradesco.*',
            $where_array
        );
        
        $this->data['somaPesquisa'] = $this->dp_model->getBradescoPesquisaSoma(
            'bradesco',
            'bradesco.*',
            $where_array
        );
        
        
        $this->data['view'] = 'dp/dpBradescoPesquisa';
        return $this->layout();
    }

     public function cdlPesquisa()
    {
        $this->load->library('pagination');
        $this->load->model('mapos_model');

        $where_array = [];

        $pesquisa = $this->input->get('pesquisa');
        $status = $this->input->get('status');
       

        if ($pesquisa) {
            $where_array['pesquisa'] = $pesquisa;
        }
        if ($status) {
            $where_array['status'] = $status;
        }
        

        $this->data['results'] = $this->dp_model->getCdlPesquisa(
            'cdl',
            'cdl.*',
            $where_array
        );
        $this->data['countPesquisa'] = $this->dp_model->getCdlPesquisaCount(
            'cdl',
            'cdl.*',
            $where_array
        );
        
        $this->data['somaPesquisa'] = $this->dp_model->getCdlPesquisaSoma(
            'cdl',
            'cdl.*',
            $where_array
        );
        
        $this->data['view'] = 'dp/dpCdlPesquisa';
        return $this->layout();
    }

    public function adicionar()
    {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'aDp')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para adicionar registros');
            redirect(base_url());
        }

        $this->load->library('form_validation');
        $this->data['custom_error'] = '';

        if ($this->form_validation->run('remessa_cdl') == false) {
            $this->data['custom_error'] = (validation_errors() ? true : false);
        } else {
           
            $data = [
                'NOME_DO_ESCRITORIO' => (!empty($this->input->post('NOME_DO_ESCRITORIO'))) ? $this->input->post('NOME_DO_ESCRITORIO') : NULL,
                'REMESSA_N' => (!empty($this->input->post('REMESSA_N'))) ? $this->input->post('REMESSA_N') : NULL,
                'COD_CAUSA_EXYON' => (!empty($this->input->post('COD_CAUSA_EXYON'))) ? $this->input->post('COD_CAUSA_EXYON') : NULL,
                'TIPO_DE_ACAO' => (!empty($this->input->post('TIPO_DE_ACAO'))) ? $this->input->post('TIPO_DE_ACAO') : NULL,
                'N_DO_PROCESSO' => (!empty($this->input->post('N_DO_PROCESSO'))) ? $this->input->post('N_DO_PROCESSO') : NULL,
                'NOME_DO_CLIENTE' => (!empty($this->input->post('NOME_DO_CLIENTE'))) ? $this->input->post('NOME_DO_CLIENTE') : NULL,
                'CPF_CNPJ_CLIENTE' => (!empty($this->input->post('CPF_CNPJ_CLIENTE'))) ? $this->input->post('CPF_CNPJ_CLIENTE') : NULL,
                'COMARCA' => (!empty($this->input->post('COMARCA'))) ? $this->input->post('COMARCA') : NULL,
                'UF' => (!empty($this->input->post('UF'))) ? $this->input->post('UF') : NULL,
                'DESCRICAO_DAS_CUSTAS_DES' => (!empty($this->input->post('DESCRICAO_DAS_CUSTAS_DES'))) ? $this->input->post('DESCRICAO_DAS_CUSTAS_DES') : NULL,
                'VALOR' => (!empty($this->input->post('VALOR'))) ? $this->input->post('VALOR') : NULL,
                'DATA_DA_DESPESA' => (!empty($this->input->post('DATA_DA_DESPESA'))) ? $this->input->post('DATA_DA_DESPESA') : NULL,
                'responsavel' => (!empty($this->input->post('responsavel'))) ? $this->input->post('responsavel') : NULL
            ];

            if (is_numeric($id = $this->dp_model->add('cdl', $data, true))) {
                
                $this->session->set_flashdata('success', 'Registro adicionada com sucesso!');
                log_info('Adicionou uma registro');
                redirect(site_url('dp/editar/') . $id);
            } else {
                $this->data['custom_error'] = '<div class="alert">Ocorreu um erro.</div>';
            }
        }

        $this->data['view'] = 'dp/adicionarDp';
        return $this->layout();
    }

    public function editar()
    {
        if (!$this->uri->segment(3) || !is_numeric($this->uri->segment(3))) {
            $this->session->set_flashdata('error', 'Item não pode ser encontrado, parâmetro não foi passado corretamente.');
            redirect('dp');
        }

        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'eDp')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para editar as remessas');
            redirect(base_url());
        }

        $this->load->library('form_validation');
        $this->data['custom_error'] = '';
        

        if ($this->form_validation->run('remessa_cdl') == false) {
            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {
           

            $data = [
               // 'idCdl' => (!empty($this->input->post('idCdl'))) ? $this->input->post('idCdl') : NULL,
               'NOME_DO_ESCRITORIO' => (!empty($this->input->post('NOME_DO_ESCRITORIO'))) ? $this->input->post('NOME_DO_ESCRITORIO') : NULL,
                'REMESSA_N' => (!empty($this->input->post('REMESSA_N'))) ? $this->input->post('REMESSA_N') : NULL,
                'COD_CAUSA_EXYON' => (!empty($this->input->post('COD_CAUSA_EXYON'))) ? $this->input->post('COD_CAUSA_EXYON') : NULL,
                'TIPO_DE_ACAO' => (!empty($this->input->post('TIPO_DE_ACAO'))) ? $this->input->post('TIPO_DE_ACAO') : NULL,
                'N_DO_PROCESSO' => (!empty($this->input->post('N_DO_PROCESSO'))) ? $this->input->post('N_DO_PROCESSO') : NULL,
                'NOME_DO_CLIENTE' => (!empty($this->input->post('NOME_DO_CLIENTE'))) ? $this->input->post('NOME_DO_CLIENTE') : NULL,
                'CPF_CNPJ_CLIENTE' => (!empty($this->input->post('CPF_CNPJ_CLIENTE'))) ? $this->input->post('CPF_CNPJ_CLIENTE') : NULL,
                'COMARCA' => (!empty($this->input->post('COMARCA'))) ? $this->input->post('COMARCA') : NULL,
                'UF' => (!empty($this->input->post('UF'))) ? $this->input->post('UF') : NULL,
                'DESCRICAO_DAS_CUSTAS_DES' => (!empty($this->input->post('DESCRICAO_DAS_CUSTAS_DES'))) ? $this->input->post('DESCRICAO_DAS_CUSTAS_DES') : NULL,
                'VALOR' => (!empty($this->input->post('VALOR'))) ? $this->input->post('VALOR') : NULL,
                'DATA_DA_DESPESA' => (!empty($this->input->post('DATA_DA_DESPESA'))) ? $this->input->post('DATA_DA_DESPESA') : NULL
            ];
           
            if ($this->dp_model->edit('cdl', $data, 'idCdl', $this->input->post('idCdl')) == true) {
                $this->session->set_flashdata('success', 'Registro editado com sucesso!');
                log_info('Alterou uma registro. ID: ' . $this->input->post('idCdl'));
                redirect(site_url('dp/editar/') . $this->input->post('idCdl'));
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro</p></div>';
            }
        }

        $this->data['result'] = $this->dp_model->getById($this->uri->segment(3));
        $this->load->model('mapos_model');
        $this->data['emitente'] = $this->mapos_model->getEmitente();

        $this->data['view'] = 'dp/editarDp';
        return $this->layout();
    }

    public function visualizar()
    {
        if (!$this->uri->segment(3) || !is_numeric($this->uri->segment(3))) {
            $this->session->set_flashdata('error', 'Item não pode ser encontrado, parâmetro não foi passado corretamente.');
            redirect('dp');
        }

        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'vDp')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar o registro');
            redirect(base_url());
        }

        $this->data['custom_error'] = '';
        $this->data['texto_de_notificacao'] = $this->data['configuration']['notifica_whats'];

        $this->load->model('mapos_model');
        $this->data['result'] = $this->os_model->getById($this->uri->segment(3));
        $this->data['produtos'] = $this->os_model->getProdutos($this->uri->segment(3));
        $this->data['servicos'] = $this->os_model->getServicos($this->uri->segment(3));
        $this->data['emitente'] = $this->mapos_model->getEmitente();
        $this->data['anexos'] = $this->os_model->getAnexos($this->uri->segment(3));
        $this->data['anotacoes'] = $this->os_model->getAnotacoes($this->uri->segment(3));
        $this->data['editavel'] = $this->os_model->isEditable($this->uri->segment(3));
        $this->data['modalGerarPagamento'] = $this->load->view(
            'cobrancas/modalGerarPagamento',
            [
                'id' => $this->uri->segment(3),
                'tipo' => 'os',
            ],
            true
        );
        $this->data['view'] = 'dp/visualizarDp';

        if ($return = $this->os_model->valorTotalOS($this->uri->segment(3))) {
            $this->data['totalServico'] = $return['totalServico'];
            $this->data['totalProdutos'] = $return['totalProdutos'];
        }

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
        $this->data['result'] = $this->os_model->getById($this->uri->segment(3));
        $this->data['produtos'] = $this->os_model->getProdutos($this->uri->segment(3));
        $this->data['servicos'] = $this->os_model->getServicos($this->uri->segment(3));
        $this->data['emitente'] = $this->mapos_model->getEmitente();
        $this->data['qrCode'] = $this->os_model->getQrCode(
            $this->uri->segment(3),
            $this->data['configuration']['pix_key'],
            $this->data['emitente'][0]
        );

        $this->load->view('os/imprimirOs', $this->data);
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
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'dProduto')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para excluir registros');
            redirect(base_url());
        }

        $id = $this->input->post('id');
        $os = $this->dp_model->getByIdCobrancas($id);
        if ($os == null) {
            $os = $this->dp_model->getById($id);
            if ($os == null) {
                $this->session->set_flashdata('error', 'Erro ao tentar excluir OS.');
                redirect(base_url() . 'index.php/dp/gerenciar/');
            }
        }

        

       
        $this->dp_model->delete('cdl', 'idCdl', $id);
        

        log_info('Removeu uma registro ID: ' . $id);
        $this->session->set_flashdata('success', 'registro excluído com sucesso!');
        redirect(site_url('dp/gerenciar/'));
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
            $this->os_model->autoCompleteCliente($q);
        }
    }

    public function autoCompleteUsuario()
    {
        if (isset($_GET['term'])) {
            $q = strtolower($_GET['term']);
            $this->os_model->autoCompleteUsuario($q);
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
    
    public function import()
    {
       // $this->load->view('dp/csvToMySQL');
        $this->data['view'] = 'dp/csvToMySQL';
        return $this->layout();
    }
    
  
    
    public function importBradesco()
    {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'aDp')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para adicionar registros');
            redirect(base_url());
        }
       // $this->load->view('dp/csvToMySQL');
        $this->data['view'] = 'dp/csvToMySQLbra';
        return $this->layout();
    }
    
    public function upload_file(){
        
            $csvMimes = array('application/vnd.ms-excel','text/plain','text/csv','text/tsv');
            
	    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'],$csvMimes)){
                
	        if(is_uploaded_file($_FILES['file']['tmp_name'])){
	            
	            //open uploaded csv file with read only mode
	            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
	            
	            // skip first line
	            // if your csv file have no heading, just comment the next line
	           fgetcsv($csvFile);
                    
                   
	            
	            //parse data from csv file line by line
	            while(($line = fgetcsv($csvFile)) !== FALSE){
	                //check whether financeiro already exists in database with same email
	                
	                    $this->db->insert("cdl", array("NOME_DO_ESCRITORIO"=>$line[0],
                                                           "REMESSA_N"=>$line[1],
                                                           "COD_CAUSA_EXYON"=>$line[2], 
                                                           "TIPO_DE_ACAO"=>$line[3], 
                                                           "N_DO_PROCESSO"=>$line[4], 
                                                           "NOME_DO_CLIENTE"=>$line[5], 
                                                           "CPF_CNPJ_CLIENTE"=>$line[6], 
                                                           "COMARCA"=>$line[7], 
                                                           "UF"=>$line[8], 
                                                           "DESCRICAO_DAS_CUSTAS_DES"=>$line[9], 
                                                           "VALOR"=>$line[10], 
                                                           "DATA_DA_DESPESA"=>$line[11], 
                                                           "responsavel"=>$this->session->userdata('nome').'-import'
                                    ));
	                
	            }
	            
	            //close opened csv file
	            fclose($csvFile);

	            $this->data["status3"] = '<h1>Arquivo importado com sucesso</h1>';
                    //$this->session->set_flashdata('success', 'Registro editado com sucesso!');
	        }else{
	            $this->data["status2"] = 'Erro ao Importar, layout errado';
	        }
	    }else{
	        $this->data["status1"] = 'Arquivo nao corresponde ao CSV';
	    }
	    //$this->load->view('dp/csvToMySQL',$qstring);
            //$this->data['qstring'] = $qstring;
            $this->data['view'] = 'dp/csvToMySQL';
            return $this->layout();
            
            

            
	}
        
        public function upload_fileBradesco(){
        
            $csvMimes = array('application/vnd.ms-excel','text/plain','text/csv','text/tsv');
            
	    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'],$csvMimes)){
                
	        if(is_uploaded_file($_FILES['file']['tmp_name'])){
	            
	            //open uploaded csv file with read only mode
	            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
	            
	            // skip first line
	            // if your csv file have no heading, just comment the next line
	           fgetcsv($csvFile);
                    
                   
	            
	            //parse data from csv file line by line
	            while(($line = fgetcsv($csvFile)) !== FALSE){
	                //check whether financeiro already exists in database with same email
	                
	                    
                            $this->db->insert("bradesco", array("cod_escritorio"=>$line[0],
                                                                "nome_escritorio"=>$line[1], 
                                                                "recolhi_bra_outr"=>$line[2], 
                                                                "num_remessa"=>$line[3], 
                                                                "num_gcpj"=>$line[4], 
                                                                "uf"=>$line[5], "num_processo"=>$line[6], 
                                                                "acao_ajuizada"=>$line[7], 
                                                                "reu_autor"=>$line[8], 
                                                                "empresa_banco"=>$line[9], 
                                                                "nome_cliente"=>$line[10], 
                                                                "cpf_cnpj"=>$line[11], 
                                                                "ndbqcng"=>$line[12], 
                                                                "cdbqcng"=>$line[13], 
                                                                "agencia"=>$line[14], 
                                                                "conta"=>$line[15], 
                                                                "contrato"=>$line[16], 
                                                                "descricao_despesas"=>$line[17], 
                                                                "valor"=>$line[18], 
                                                                "carteira"=>$line[19], 
                                                                "quant_dias"=>$line[20], 
                                                                "distancia"=>$line[21], 
                                                                "codigo_barras"=>$line[22], 
                                                                "tipo_guia"=>$line[23], 
                                                                "data_vencimento"=>$line[24], 
                                                                "duplicidade"=>$line[25], 
                                                                "justifi_duplicidade"=>$line[26],
                                                                "responsavel"=>$this->session->userdata('nome').'-import'
                                    ));
	                
	            }
	            
	            //close opened csv file
	            fclose($csvFile);

	            $this->data["status3"] = '<h1>Arquivo importado com sucesso</h1>';
                    //$this->session->set_flashdata('success', 'Registro editado com sucesso!');
	        }else{
	            $this->data["status2"] = 'Erro ao Importar, layout errado';
	        }
	    }else{
	        $this->data["status1"] = 'Arquivo nao corresponde ao CSV';
	    }
	    //$this->load->view('dp/csvToMySQL',$qstring);
            //$this->data['qstring'] = $qstring;
            $this->data['view'] = 'dp/csvToMySQLbra';
            return $this->layout();
            
            

            
	}
        
        public function delete_file(){
            if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'dDp')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para adicionar registros');
            redirect(base_url());
        }
            $num_remessa = $this->input->post('num_remessa');
            //$id = 49426;
           // echo $id2;
            if(!empty($num_remessa)){
                
                $this->db->delete("cdl",  array('REMESSA_N' => $num_remessa));
                
                $this->data["status3"] = '<h1>Remessa deletada com sucesso</h1>';
                
                
            
            }else{
	        $this->data["status1"] = 'Remessa nao corresponde a uma existente';
	    }
	    $this->data['view'] = 'dp/csvToMySQL';
            return $this->layout();
           
            
        }
        
        public function delete_fileBradesco(){
            if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'dDp')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para adicionar registros');
            redirect(base_url());
        }
            $num_remessa = $this->input->post('num_remessa');
            //$id = 49426;
           // echo $id2;
            if(!empty($num_remessa)){
                
                $this->db->delete("bradesco",  array('num_remessa' => $num_remessa));
                
                $this->data["status3"] = '<h1>Remessa deletada com sucesso</h1>';
                
                
            
            }else{
	        $this->data["status1"] = 'Remessa nao corresponde a uma existente';
	    }
	    $this->data['view'] = 'dp/csvToMySQL';
            return $this->layout();
           
            
        }
        
        public function delete_id(){
            $id = $this->input->post('id');
            //$id = 49426;
           // echo $id2;
            if(!empty($id)){
                
                $this->db->delete("cdl",  array('idCdl' => $id));
                
                $this->data["status3"] = '<h1>Número registro, deletada com sucesso</h1>';
                
                
            
            }else{
	        $this->data["status1"] = 'ID não corresponde a um existente';
	    }
	    $this->data['view'] = 'dp/csvToMySQL';
            return $this->layout();
           
            
        }
        
         public function delete_idBradesco(){
            $id = $this->input->post('id');
            //$id = 49426;
           // echo $id2;
            if(!empty($id)){
                
                $this->db->delete("bradesco",  array('id' => $id));
                
                $this->data["status3"] = '<h1>Número registro, deletada com sucesso</h1>';
                
                
            
            }else{
	        $this->data["status1"] = 'ID não corresponde a um existente';
	    }
	    $this->data['view'] = 'dp/csvToMySQL';
            return $this->layout();
           
            
        }
}
