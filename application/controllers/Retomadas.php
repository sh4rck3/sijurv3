<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Retomadas extends MY_Controller
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
        $this->load->model('retomadas_model');
        $this->data['menuRetomadas'] = 'Retomadas';
        //$this->data['menuConfiguracoes'] = 'Permissões';
    }

    public function index()
    {
        $this->gerenciar();
    }

    public function gerenciar()
    {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'vRetomadas')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para adicionar Localizadores');
            redirect(base_url());
        }
        
        $this->load->model('retomadas_model');
        $this->load->library('pagination');

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

        $this->data['configuration']['base_url'] = site_url('retomadas/gerenciar/');
        $this->data['configuration']['total_rows'] = $this->retomadas_model->count('retomadas');

        $this->pagination->initialize($this->data['configuration']);

        $this->data['results'] = $this->retomadas_model->getRetomadas(
            'retomadas',
            'retomadas.*',
            $where_array,
            $this->data['configuration']['per_page'],
            $this->uri->segment(3)
        );
        $this->data['view'] = 'retomadas/retomadas';
        return $this->layout();
    }
    
    //adicionando contato
     public function adicionar()
    {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'aRetomadas')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para adicionar Localizadores');
            redirect(base_url());
        }

        $this->load->library('form_validation');
        $this->data['custom_error'] = '';

        if ($this->form_validation->run('retomadas') == false) {
            $this->data['custom_error'] = (validation_errors() ? true : false);
        } else {
            $data = [
                'nomeLocalizador' => (!empty($this->input->post('nomeLocalizador'))) ? $this->input->post('nomeLocalizador') : NULL,
                'cpf' => (!empty($this->input->post('cpf'))) ? $this->input->post('cpf') : NULL,
                'fone' => (!empty($this->input->post('fone'))) ? $this->input->post('fone') : NULL,
                'outroFone' => (!empty($this->input->post('outroFone'))) ? $this->input->post('outroFone') : NULL,
                'emailLocalizador' => (!empty($this->input->post('emailLocalizador'))) ? $this->input->post('emailLocalizador') : NULL,
                'areasAtuacao' => (!empty($this->input->post('areasAtuacao'))) ? $this->input->post('areasAtuacao') : NULL,
                'uf' => (!empty($this->input->post('uf'))) ? $this->input->post('uf') : NULL,
                'obs' => (!empty($this->input->post('obs'))) ? $this->input->post('obs') : NULL,
                'responsavel' => (!empty($this->input->post('responsavel'))) ? $this->input->post('responsavel') : NULL,
                'DT_REGISTRO' => date('Y-m-d H:i')
            ];
            
                $this->retomadas_model->add('retomadas', $data);
                $this->session->set_flashdata('success', 'Localizador adicionado com sucesso');
                redirect(site_url('retomadas'));
           
        }
      
        $this->data['view'] = 'retomadas/addRetomadas';
        return $this->layout();
    }
    
    //excluindo registros retomadas
    
    public function excluir()
    {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para excluir');
            redirect(base_url());
        }

        $id = $this->input->post('id');
        
        $this->retomadas_model->delete('retomadas', 'idLocalizador', $id);
        
        log_info('Removeu um registro. ID: ' . $id);
        $this->session->set_flashdata('success', 'registro excluído com sucesso!');
        redirect(site_url('retomadas/gerenciar/'));
    }
    
    //editar retomadas
    
    public function editar()
    {
        if (!$this->uri->segment(3) || !is_numeric($this->uri->segment(3))) {
            $this->session->set_flashdata('error', 'Item não pode ser encontrado, parâmetro não foi passado corretamente.');
            redirect('rh');
        }

        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'eRetomadas')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para editar localizadores');
            redirect(base_url());
        }

        $this->load->library('form_validation');
        $this->data['custom_error'] = '';
        


        if ($this->form_validation->run('retomadas') == false) {
            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {
             $data = [
                'nomeLocalizador' => (!empty($this->input->post('nomeLocalizador'))) ? $this->input->post('nomeLocalizador') : NULL,
                'cpf' => (!empty($this->input->post('cpf'))) ? $this->input->post('cpf') : NULL,
                'fone' => (!empty($this->input->post('fone'))) ? $this->input->post('fone') : NULL,
                'outroFone' => (!empty($this->input->post('outroFone'))) ? $this->input->post('outroFone') : NULL,
                'emailLocalizador' => (!empty($this->input->post('emailLocalizador'))) ? $this->input->post('emailLocalizador') : NULL,
                'areasAtuacao' => (!empty($this->input->post('areasAtuacao'))) ? $this->input->post('areasAtuacao') : NULL,
                'uf' => (!empty($this->input->post('uf'))) ? $this->input->post('uf') : NULL,
                'obs' => (!empty($this->input->post('obs'))) ? $this->input->post('obs') : NULL,
                'responsavel' => (!empty($this->input->post('responsavel'))) ? $this->input->post('responsavel') : NULL,
                'status' => (!empty($this->input->post('status'))) ? $this->input->post('status') : NULL,
                'DT_REGISTRO' => date('Y-m-d H:i')
            ];
            

            if ($this->retomadas_model->edit('retomadas', $data, 'idLocalizador', $this->input->post('idLocalizador')) == true) {
            
                $this->session->set_flashdata('success', 'Registro editado com sucesso!');
                log_info('Alterou uma ficha de funcionário. ID: ' . $this->input->post('idLocalizador'));
                redirect(site_url('retomadas'));
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro</p></div>';
            }
        }
        //$this->load->model('retomadas_model');
        $this->data['result'] = $this->retomadas_model->getById($this->uri->segment(3));
       // $this->data['anexos'] = $this->rh_model->getAnexos($this->uri->segment(3));
        //$this->data['anotacoes'] = $this->rh_model->getAnotacoes($this->uri->segment(3));
        //$this->load->model('mapos_model');
        //$this->data['emitente'] = $this->mapos_model->getEmitente();

        $this->data['view'] = 'retomadas/editarRetomadas';
        return $this->layout();
    }
    //relatorio dos localizadores
    public function retomadasRapid()
    {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'eRetomadas')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para gerar relatórios de retomadas.');
            redirect(base_url());
        }

        $data['produtos'] = $this->retomadas_model->retomadasRapid();
        $this->load->model('Mapos_model');
        $data['emitente'] = $this->Mapos_model->getEmitente();
        $data['title'] = 'Relatório de Retomadas';
        $data['topo'] = $this->load->view('retomadas/imprimir/imprimirTopo', $data, true);

        $this->load->helper('mpdf');
        $html = $this->load->view('retomadas/imprimir/imprimirProdutos', $data, true);
        pdf_create($html, 'relatorio_produtos' . date('d/m/y'), true);
    }
    public function retomadasRapid2()
    {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'rFinanceiro')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para gerar relatórios financeiros.');
            redirect(base_url());
        }

        $format = $this->input->get('format');

        if ($format == 'xls') {
            $lancamentos = $this->retomadas_model->financeiroRapid(true);

            $lancamentosFormatados = array_map(function ($item) {
                return [
                    'idLocalizador' => $item['idLocalizador'],
                    'nomeLocalizador' => $item['nomeLocalizador'],
                    'cpf' => $item['cpf'],
                    'fone' => $item['fone'],
                    'outroFone' => $item['outroFone'],
                    'DT_REGISTRO' => $item['DT_REGISTRO'],
                    'areasAtuacao' => $item['areasAtuacao'],
                    'uf' => $item['uf'],
                    'obs' => $item['obs'],
                ];
            }, $lancamentos);

            $cabecalho = [
                'ID Localizador' => 'integer',
                'Nome' => 'string',
                'CPF' => 'string',
                'Fone' => 'string',
                'Fone2' => 'string',
                'Data do registro' => 'string',
                'Área de atuação' => 'string',
                'UF' => 'string',
                'Observação' => 'string',
            ];

            $writer = new XLSXWriter();

            $writer->writeSheetHeader('Sheet1', $cabecalho);
            foreach ($lancamentosFormatados as $lancamento) {
                $writer->writeSheetRow('Sheet1', $lancamento);
            }

            $arquivo = $writer->writeToString();
            $this->load->helper('download');
            force_download('relatorio_retomadas.xlsx', $arquivo);

            return;
        }

        $data['lancamentos'] = $this->retomadas_model->financeiroRapid();
        $this->load->model('Mapos_model');
        $data['emitente'] = $this->Mapos_model->getEmitente();
        $data['title'] = 'Relatório Retomadas';
        $data['topo'] = $this->load->view('relatorios/imprimir/imprimirTopo', $data, true);

        $this->load->helper('mpdf');
        $html = $this->load->view('relatorios/imprimir/imprimirProdutos', $data, true);
        pdf_create($html, 'relatorio_retomadas' . date('d/m/y'), true);
    }
}
