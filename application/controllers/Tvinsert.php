<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Tvinsert extends MY_Controller
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
        $this->load->model('tvinsert_model');
        $this->data['menuTvinsert'] = 'Tvinsert';
    }

    public function index()
    {
        $this->gerenciar();
    }

    public function gerenciar()
    {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'vTv')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar vendas.');
            redirect(base_url());
        }

        $this->load->library('pagination');

        $this->data['configuration']['base_url'] = site_url('tvinsert/gerenciar/');
        $this->data['configuration']['total_rows'] = $this->tvinsert_model->count('tv');

        $this->pagination->initialize($this->data['configuration']);

        $this->data['results'] = $this->tvinsert_model->getTv('tv', '*', '', $this->data['configuration']['per_page'], $this->uri->segment(3));

        $this->data['view'] = 'tvinsert/vendas';
        return $this->layout();
    }
    
    public function adicionar()
    {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'aVenda')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para adicionar O.S.');
            redirect(base_url());
        }

        $this->load->library('form_validation');
        $this->data['custom_error'] = '';

        if ($this->form_validation->run('tv') == false) {
            $this->data['custom_error'] = (validation_errors() ? true : false);
        } else {
//            $numero = $this->input->post('comercial_meta'); // 2.223,42
//            
//            $SemPonto  = str_replace('.', '', $numero );
//            $SemVirgula  = str_replace(',', '.', $SemPonto);
            
            $numeroCM = $this->input->post('comercial_meta'); // 2.223,42
            $tiraPonto  = str_replace('.', '', $numeroCM );
            $comercial_meta  = str_replace(',', '.', $tiraPonto);
            
            $numeroCB = $this->input->post('comercial_batido'); // 2.223,42
            $tiraPonto  = str_replace('.', '', $numeroCB );
            $comercial_batido  = str_replace(',', '.', $tiraPonto);
            
            $numeroVM = $this->input->post('veiculo_meta'); // 2.223,42
            $tiraPonto  = str_replace('.', '', $numeroVM );
            $veiculo_meta  = str_replace(',', '.', $tiraPonto);
            
            $numeroVB = $this->input->post('veiculo_batido'); // 2.223,42
            $tiraPonto  = str_replace('.', '', $numeroVB );
            $veiculo_batido  = str_replace(',', '.', $tiraPonto);
            
            $numeroIM = $this->input->post('imovel_meta'); // 2.223,42
            $tiraPonto  = str_replace('.', '', $numeroIM );
            $imovel_meta  = str_replace(',', '.', $tiraPonto);
            
            $numeroIB = $this->input->post('imovel_batido'); // 2.223,42
            $tiraPonto  = str_replace('.', '', $numeroIB );
            $imovel_batido  = str_replace(',', '.', $tiraPonto);
            

            $data = [
               
                'comercial_meta' => (!empty($comercial_meta)) ? $comercial_meta : NULL,
                'comercial_batido' => (!empty($comercial_batido)) ? $comercial_batido : NULL,
                'veiculo_meta' => (!empty($veiculo_meta)) ? $veiculo_meta : NULL,
                'veiculo_batido' => (!empty($veiculo_batido)) ? $veiculo_batido : NULL,
                'imovel_meta' => (!empty($imovel_meta)) ? $imovel_meta : NULL,
                'imovel_batido' => (!empty($imovel_batido)) ? $imovel_batido : NULL,
                'data_atualizacao' => (!empty($this->input->post('data_atualizacao'))) ? $this->input->post('data_atualizacao') : NULL
            ];

            if (is_numeric($id = $this->tvinsert_model->add('tv', $data, true))) {
                
                $this->session->set_flashdata('success', 'Informções adicionadas com sucesso!');
                //log_info('Adicionou uma OS');
                redirect(site_url('vendas'));
            } else {
                $this->data['custom_error'] = '<div class="alert">Ocorreu um erro.</div>';
            }
        }
       $this->load->model('tv_model');
       $this->data['results'] = $this->tv_model->gettvteste();
       $this->data['view'] = 'tvinsert/adicionarVenda';
        return $this->layout();
    }

    public function adicionar2()
    {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'aVenda')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para adicionar Vendas.');
            redirect(base_url());
        }

        $this->load->library('form_validation');
        $this->data['custom_error'] = '';

       

            $data = [
                
                'comercial_meta' => (!empty($this->input->post('comercial_meta'))) ? $this->input->post('comercial_meta') : NULL,
                'comercial_batido' => (!empty($this->input->post('comercial_batido'))) ? $this->input->post('comercial_batido') : NULL,
                'veiculo_meta' => (!empty($this->input->post('veiculo_meta'))) ? $this->input->post('veiculo_meta') : NULL,
                'veiculo_batido' => (!empty($this->input->post('veiculo_batido'))) ? $this->input->post('veiculo_batido') : NULL,
                'imovel_meta' => (!empty($this->input->post('imovel_meta'))) ? $this->input->post('imovel_meta') : NULL,
                'imovel_batido' => (!empty($this->input->post('imovel_batido'))) ? $this->input->post('imovel_batido') : NULL,
                'data_atualizacao' => (!empty($this->input->post('data_atualizacao'))) ? $this->input->post('data_atualizacao') : NULL
                
               
            ];

            if (is_numeric($id = $this->tvinsert_model->add('tv', $data, true))) {
                $this->session->set_flashdata('success', 'Informações inseridas com sucesso.');
                
                redirect(site_url('tvinsert/') . $id);
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
            }
        

        $this->data['view'] = 'tvinsert/adicionarVenda';
        return $this->layout();
    }

    public function editar()
    {
        if (!$this->uri->segment(3) || !is_numeric($this->uri->segment(3))) {
            $this->session->set_flashdata('error', 'Item não pode ser encontrado, parâmetro não foi passado corretamente.');
            redirect('mapos');
        }

        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'eVenda')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para editar vendas');
            redirect(base_url());
        }

        $this->load->library('form_validation');
        $this->data['custom_error'] = '';

        if ($this->form_validation->run('vendas') == false) {
            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {
            $dataVenda = $this->input->post('dataVenda');

            try {
                $dataVenda = explode('/', $dataVenda);
                $dataVenda = $dataVenda[2] . '-' . $dataVenda[1] . '-' . $dataVenda[0];
            } catch (Exception $e) {
                $dataVenda = date('Y/m/d');
            }

            $data = [
                'dataVenda' => $dataVenda,
                'observacoes' => $this->input->post('observacoes'),
                'observacoes_cliente' => $this->input->post('observacoes_cliente'),
                'usuarios_id' => $this->input->post('usuarios_id'),
                'clientes_id' => $this->input->post('clientes_id'),
            ];

            if ($this->tvinsert_model->edit('vendas', $data, 'idVendas', $this->input->post('idVendas')) == true) {
                $this->session->set_flashdata('success', 'Venda editada com sucesso!');
                log_info('Alterou uma venda. ID: ' . $this->input->post('idVendas'));
                redirect(site_url('tvinsert/editar/') . $this->input->post('idVendas'));
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro</p></div>';
            }
        }

        $this->data['result'] = $this->tvinsert_model->getById($this->uri->segment(3));
        $this->data['produtos'] = $this->tvinsert_model->getProdutos($this->uri->segment(3));
        $this->data['view'] = 'tvinsert/editarVenda';
        return $this->layout();
    }

    public function visualizar()
    {
        if (!$this->uri->segment(3) || !is_numeric($this->uri->segment(3))) {
            $this->session->set_flashdata('error', 'Item não pode ser encontrado, parâmetro não foi passado corretamente.');
            redirect('mapos');
        }

        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'vVenda')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar vendas.');
            redirect(base_url());
        }

        $this->data['custom_error'] = '';
        $this->load->model('mapos_model');
        $this->data['result'] = $this->tvinsert_model->getById($this->uri->segment(3));
        $this->data['produtos'] = $this->tvinsert_model->getProdutos($this->uri->segment(3));
        $this->data['emitente'] = $this->mapos_model->getEmitente();
        $this->data['modalGerarPagamento'] = $this->load->view(
            'cobrancas/modalGerarPagamento',
            [
                'id' => $this->uri->segment(3),
                'tipo' => 'venda',
            ],
            true
        );

        $this->data['view'] = 'tvinsert/visualizarVenda';

        return $this->layout();
    }


    public function imprimir()
    {
        if (!$this->uri->segment(3) || !is_numeric($this->uri->segment(3))) {
            $this->session->set_flashdata('error', 'Item não pode ser encontrado, parâmetro não foi passado corretamente.');
            redirect('mapos');
        }

        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'vVenda')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar vendas.');
            redirect(base_url());
        }

        $this->data['custom_error'] = '';
        $this->load->model('mapos_model');
        $this->data['result'] = $this->tvinsert_model->getById($this->uri->segment(3));
        $this->data['produtos'] = $this->tvinsert_model->getProdutos($this->uri->segment(3));
        $this->data['emitente'] = $this->mapos_model->getEmitente();
        $this->data['qrCode'] = $this->tvinsert_model->getQrCode(
            $this->uri->segment(3),
            $this->data['configuration']['pix_key'],
            $this->data['emitente'][0]
        );

        $this->load->view('tvinsert/imprimirVenda', $this->data);
    }

    public function imprimirTermica()
    {
        if (!$this->uri->segment(3) || !is_numeric($this->uri->segment(3))) {
            $this->session->set_flashdata('error', 'Item não pode ser encontrado, parâmetro não foi passado corretamente.');
            redirect('mapos');
        }

        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'vVenda')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar vendas.');
            redirect(base_url());
        }

        $this->data['custom_error'] = '';
        $this->load->model('mapos_model');
        $this->data['result'] = $this->tvinsert_model->getById($this->uri->segment(3));
        $this->data['produtos'] = $this->tvinsert_model->getProdutos($this->uri->segment(3));
        $this->data['emitente'] = $this->mapos_model->getEmitente();

        $this->load->view('tvinsert/imprimirVendaTermica', $this->data);
    }

    public function excluir()
    {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'dVenda')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para excluir vendas');
            redirect(base_url());
        }

        $this->load->model('tvinsert_model');

        

        
        $this->tvinsert_model->delete('tv', 'idTv', $id);
       

        

        $this->session->set_flashdata('success', 'Informação excluida com sucesso');
        redirect(site_url('tvinsert/gerenciar/'));
    }

    public function autoCompleteProduto()
    {
        if (isset($_GET['term'])) {
            $q = strtolower($_GET['term']);
            $this->tvinsert_model->autoCompleteProduto($q);
        }
    }

    public function autoCompleteCliente()
    {
        if (isset($_GET['term'])) {
            $q = strtolower($_GET['term']);
            $this->tvinsert_model->autoCompleteCliente($q);
        }
    }

    public function autoCompleteUsuario()
    {
        if (isset($_GET['term'])) {
            $q = strtolower($_GET['term']);
            $this->tvinsert_model->autoCompleteUsuario($q);
        }
    }

    public function adicionarProduto()
    {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'eVenda')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para editar vendas.');
            redirect(base_url());
        }

        $this->load->library('form_validation');
        $this->form_validation->set_rules('quantidade', 'Quantidade', 'trim|required');
        $this->form_validation->set_rules('idProduto', 'Produto', 'trim|required');
        $this->form_validation->set_rules('idVendasProduto', 'Vendas', 'trim|required');

        if ($this->form_validation->run() == false) {
            echo json_encode(['result' => false]);
        } else {
            $preco = $this->input->post('preco');
            $quantidade = $this->input->post('quantidade');
            $subtotal = $preco * $quantidade;
            $produto = $this->input->post('idProduto');
            $data = [
                'quantidade' => $quantidade,
                'subTotal' => $subtotal,
                'produtos_id' => $produto,
                'preco' => $preco,
                'vendas_id' => $this->input->post('idVendasProduto'),
            ];

            if ($this->tvinsert_model->add('itens_de_vendas', $data) == true) {
                $this->load->model('produtos_model');

                if ($this->data['configuration']['control_estoque']) {
                    $this->produtos_model->updateEstoque($produto, $quantidade, '-');
                }

                log_info('Adicionou produto a uma venda.');

                echo json_encode(['result' => true]);
            } else {
                echo json_encode(['result' => false]);
            }
        }
    }

    public function excluirProduto()
    {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'eVenda')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para editar Vendas');
            redirect(base_url());
        }

        $ID = $this->input->post('idProduto');
        if ($this->tvinsert_model->delete('itens_de_vendas', 'idItens', $ID) == true) {
            $quantidade = $this->input->post('quantidade');
            $produto = $this->input->post('produto');

            $this->load->model('produtos_model');

            if ($this->data['configuration']['control_estoque']) {
                $this->produtos_model->updateEstoque($produto, $quantidade, '+');
            }

            log_info('Removeu produto de uma venda.');
            echo json_encode(['result' => true]);
        } else {
            echo json_encode(['result' => false]);
        }
    }

    public function faturar()
    {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'eVenda')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para editar Vendas');
            redirect(base_url());
        }

        $this->load->library('form_validation');
        $this->data['custom_error'] = '';

        if ($this->form_validation->run('receita') == false) {
            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {
            $venda_id = $this->input->post('vendas_id');
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
                'vendas_id' => $venda_id,
                'descricao' => set_value('descricao'),
                'valor' => $this->input->post('valor'),
                'clientes_id' => $this->input->post('clientes_id'),
                'data_vencimento' => $vencimento,
                'data_pagamento' => $recebimento,
                'baixado' => $this->input->post('recebido') == 1 ? true : false,
                'cliente_fornecedor' => set_value('cliente'),
                'forma_pgto' => $this->input->post('formaPgto'),
                'tipo' => $this->input->post('tipo'),
                'usuarios_id' => $this->session->userdata('id'),
            ];

            if ($this->tvinsert_model->add('lancamentos', $data) == true) {
                $venda = $this->input->post('vendas_id');

                $this->db->set('faturado', 1);
                $this->db->set('valorTotal', $this->input->post('valor'));
                $this->db->where('idVendas', $venda);
                $this->db->update('vendas');

                log_info('Faturou uma venda.');

                $this->session->set_flashdata('success', 'Venda faturada com sucesso!');
                $json = ['result' => true];
                echo json_encode($json);
                die();
            } else {
                $this->session->set_flashdata('error', 'Ocorreu um erro ao tentar faturar venda.');
                $json = ['result' => false];
                echo json_encode($json);
                die();
            }
        }

        $this->session->set_flashdata('error', 'Ocorreu um erro ao tentar faturar venda.');
        $json = ['result' => false];
        echo json_encode($json);
    }
    
    //acompanhamento performance mensal bradesco
    
    
     public function acomPerformance()
    {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'vVenda')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar vendas.');
            redirect(base_url());
        }

        $this->load->library('pagination');

        $this->data['configuration']['base_url'] = site_url('tvinsert/acomPerformance/');
        $this->data['configuration']['total_rows'] = $this->tvinsert_model->count('AcomPerformance');

        $this->pagination->initialize($this->data['configuration']);

        $this->data['results'] = $this->tvinsert_model->getPerf('AcomPerformance', '*', '', $this->data['configuration']['per_page'], $this->uri->segment(3));

        $this->data['view'] = 'tvinsert/acomPerformance';
        return $this->layout();
    }
    
    public function adicionarPerf()
    {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'aVenda')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para adicionar informações a TV');
            redirect(base_url());
        }

        $this->load->library('form_validation');
        $this->data['custom_error'] = '';

        if ($this->form_validation->run('acomPerf') == false) {
            $this->data['custom_error'] = (validation_errors() ? true : false);
        } else {
            $dataInicial = $this->input->post('dataInsercao');
           
            try {
                $dataInicial = explode('/', $dataInicial);
                $dataInicial = $dataInicial[2] . '-' . $dataInicial[1] . '-' . $dataInicial[0];

            } catch (Exception $e) {
                $dataInicial = date('Y/m/d');
                
            }
            $numValorAcordo= $this->input->post('valorAcordo'); // 2.223,42
            $tiraPonto  = str_replace('.', '', $numValorAcordo );
            $valorAcordo  = str_replace(',', '.', $tiraPonto);
            
            if($this->input->post('LpMo') == 'LP'){
               $lucroPerdido = $valorAcordo; 
            }
            if($this->input->post('LpMo') == 'MO'){
               $mora = $valorAcordo; 
            }
            
            $data = [
               
                'valorAcordo' => (!empty($valorAcordo)) ? $valorAcordo : NULL,
                'dataInsercao' => (!empty($dataInicial)) ? $dataInicial : NULL,
                'nomeCliente' => (!empty($this->input->post('nomeCliente'))) ? $this->input->post('nomeCliente') : NULL,
                'agencia' => (!empty($this->input->post('agencia'))) ? $this->input->post('agencia') : NULL,
                'regional' => (!empty($this->input->post('regional'))) ? $this->input->post('regional') : NULL,
                'conta' => (!empty($this->input->post('conta'))) ? $this->input->post('conta') : NULL,
                'LpMo' => (!empty($this->input->post('LpMo'))) ? $this->input->post('LpMo') : NULL,
                'segmento' => (!empty($this->input->post('segmento'))) ? $this->input->post('segmento') : NULL,
                'lucroPerdido' => (!empty($lucroPerdido)) ? $lucroPerdido : NULL,
                'mora' => (!empty($mora)) ? $mora : NULL,
            ];

            if (is_numeric($id = $this->tvinsert_model->add('AcomPerformance', $data, true))) {
                
                $this->session->set_flashdata('success', 'Informções adicionadas com sucesso!');
                log_info('Adicionou reg. performance');
                redirect(site_url('tvinsert/acomPerformance'));
            } else {
                $this->data['custom_error'] = '<div class="alert">Ocorreu um erro.</div>';
            }
        }
       
       $this->data['view'] = 'tvinsert/adicionarPerf';
        return $this->layout();
    }
    
    //excluir performance registro
  
    
    public function excluirPerf()
    {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'dVenda')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para excluir informaçõesS.');
            redirect(base_url());
        }

        $id = $this->input->post('id');
      
        $this->tvinsert_model->delete('AcomPerformance', 'idPerf', $id);
        log_info('Removeu uma Registro ID: ' . $id);
        $this->session->set_flashdata('success', 'Registro excluída com sucesso!');
        redirect(site_url('tvinsert/acomPerformance/'));
    }
    
    //editando perf acompanhamanto do mes
    public function editarPerf()
    {
        if (!$this->uri->segment(3) || !is_numeric($this->uri->segment(3))) {
            $this->session->set_flashdata('error', 'Item não pode ser encontrado, parâmetro não foi passado corretamente.');
            redirect('mapos');
        }

        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'eVenda')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para editar vendas');
            redirect(base_url());
        }

        $this->load->library('form_validation');
        $this->data['custom_error'] = '';

        if ($this->form_validation->run('acomPerf') == false) {
            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {
            $dataVenda = $this->input->post('dataVenda');

            try {
                $dataVenda = explode('/', $dataVenda);
                $dataVenda = $dataVenda[2] . '-' . $dataVenda[1] . '-' . $dataVenda[0];
            } catch (Exception $e) {
                $dataVenda = date('Y/m/d');
            }

            $data = [
                'dataVenda' => $dataVenda,
                'observacoes' => $this->input->post('observacoes'),
                'observacoes_cliente' => $this->input->post('observacoes_cliente'),
                'usuarios_id' => $this->input->post('usuarios_id'),
                'clientes_id' => $this->input->post('clientes_id'),
            ];

            if ($this->tvinsert_model->edit('vendas', $data, 'idVendas', $this->input->post('idVendas')) == true) {
                $this->session->set_flashdata('success', 'Venda editada com sucesso!');
                log_info('Alterou uma venda. ID: ' . $this->input->post('idVendas'));
                redirect(site_url('tvinsert/editarPerf/') . $this->input->post('idVendas'));
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro</p></div>';
            }
        }

        $this->data['result'] = $this->tvinsert_model->getByIdPerf($this->uri->segment(3));
       
        $this->data['view'] = 'tvinsert/editarPerf';
        return $this->layout();
    }
    
       public function imagemSafra()
    {
        //$this->load->model('Os_model');
       // $this->data['results'] = $this->Os_model->getTv('anexosSafra');
        $this->data['view'] = 'tvinsert/imagemSafra';

        return $this->layout();
    }
}
