<?php

use Piggly\Pix\StaticPayload;

class Bradesco_model extends CI_Model
{

    /**
     * author: Ramon Silva
     * email: silva018-mg@yahoo.com.br
     *
     */

    public function __construct()
    {
        parent::__construct();
    }

    public function get($table, $fields, $where = '', $perpage = 0, $start = 0, $one = false, $array = 'array')
    {
        $this->db->select($fields . ',clientes.nomeCliente, clientes.celular as celular_cliente');
        $this->db->from($table);
        $this->db->join('clientes', 'clientes.idClientes = os.clientes_id');
        $this->db->limit($perpage, $start);
        $this->db->order_by('idOs', 'desc');
        if ($where) {
            $this->db->where($where);
        }

        $query = $this->db->get();

        $result = !$one ? $query->result() : $query->row();

        return $result;
    }

    public function getOs($table, $fields, $where = [], $perpage = 0, $start = 0, $one = false, $array = 'array')
    {
        $lista_clientes = [];
        if ($where) {
            if (array_key_exists('pesquisa', $where)) {
                $this->db->select('idBradesco');
                $this->db->like('GCPJ', $where['pesquisa']);
                $this->db->limit(5);
                $clientes = $this->db->get('bradesco_analitico')->result();

                foreach ($clientes as $c) {
                    array_push($lista_clientes, $c->idBradesco);
                }
            }
        }

        $this->db->select($fields);
        $this->db->from($table);
       // $this->db->join('clientes', 'clientes.idClientes = os.clientes_id');
      //  $this->db->join('usuarios', 'usuarios.idUsuarios = os.usuarios_id');
       // $this->db->join('garantias', 'garantias.idGarantias = os.garantias_id', 'left');
       // $this->db->join('produtos_os', 'produtos_os.os_id = os.idOs', 'left');
       // $this->db->join('servicos_os', 'servicos_os.os_id = os.idOs', 'left');

        // condicionais da pesquisa

        // condicional de status
        if (array_key_exists('status', $where)) {
            $this->db->where_in('RESP_INICIAL', $where['status']);
        }

        // condicional de clientes
        if (array_key_exists('pesquisa', $where)) {
            if ($lista_clientes != null) {
                $this->db->where_in('bradesco_analitico.idBradesco', $lista_clientes);
            }
        }

        // condicional data inicial
        if (array_key_exists('de', $where)) {
            $this->db->where('DataEntrada >=', $where['de']);
        }
        // condicional data final
        if (array_key_exists('ate', $where)) {
            $this->db->where('DataEntrada <=', $where['ate']);
        }

        $this->db->limit($perpage, $start);
        $this->db->order_by('bradesco_analitico.idBradesco', 'desc');
        $this->db->group_by('bradesco_analitico.idBradesco');

        $query = $this->db->get();

        $result = !$one ? $query->result() : $query->row();

        return $result;
    }
    
    

    public function getById($id)
    {
        $this->db->select('bradesco_analitico.*');
        $this->db->from('bradesco_analitico');
       // $this->db->join('clientes', 'clientes.idClientes = os.clientes_id');
      //  $this->db->join('usuarios', 'usuarios.idUsuarios = os.usuarios_id');
      //  $this->db->join('garantias', 'garantias.idGarantias = os.garantias_id', 'left');
        $this->db->where('bradesco_analitico.idBradesco', $id);
        $this->db->limit(1);

        return $this->db->get()->row();
    }

    public function getByIdCobrancas($id)
    {
        $this->db->select('os.*, clientes.*, clientes.celular as celular_cliente, garantias.refGarantia, usuarios.telefone as telefone_usuario, usuarios.email as email_usuario, usuarios.nome,cobrancas.os_id,cobrancas.idCobranca,cobrancas.status');
        $this->db->from('os');
        $this->db->join('clientes', 'clientes.idClientes = os.clientes_id');
        $this->db->join('usuarios', 'usuarios.idUsuarios = os.usuarios_id');
        $this->db->join('cobrancas', 'cobrancas.os_id = os.idOs');
        $this->db->join('garantias', 'garantias.idGarantias = os.garantias_id', 'left');
        $this->db->where('os.idOs', $id);
        $this->db->limit(1);

        return $this->db->get()->row();
    }

    public function getProdutos($id = null)
    {
        $this->db->select('produtos_os.*, produtos.*');
        $this->db->from('produtos_os');
        $this->db->join('produtos', 'produtos.idProdutos = produtos_os.produtos_id');
        $this->db->where('os_id', $id);

        return $this->db->get()->result();
    }

    public function getServicos($id = null)
    {
        $this->db->select('servicos_os.*, servicos.nome, servicos.preco as precoVenda');
        $this->db->from('servicos_os');
        $this->db->join('servicos', 'servicos.idServicos = servicos_os.servicos_id');
        $this->db->where('os_id', $id);

        return $this->db->get()->result();
    }

    public function add($table, $data, $returnId = false)
    {
        $this->db->insert($table, $data);
        if ($this->db->affected_rows() == '1') {
            if ($returnId == true) {
                return $this->db->insert_id($table);
            }
            return true;
        }

        return false;
    }

    public function edit($table, $data, $fieldID, $ID)
    {
        $this->db->where($fieldID, $ID);
        $this->db->update($table, $data);

        if ($this->db->affected_rows() >= 0) {
            return true;
        }

        return false;
    }

    public function delete($table, $fieldID, $ID)
    {
        $this->db->where($fieldID, $ID);
        $this->db->delete($table);
        if ($this->db->affected_rows() == '1') {
            return true;
        }

        return false;
    }

    public function count($table)
    {
        return $this->db->count_all($table);
    }

    public function autoCompleteProduto($q)
    {
        $this->db->select('*');
        $this->db->limit(5);
        $this->db->like('codDeBarra', $q);
        $this->db->or_like('descricao', $q);
        $query = $this->db->get('produtos');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $row_set[] = ['label' => $row['descricao'] . ' | Preço: R$ ' . $row['precoVenda'] . ' | Estoque: ' . $row['estoque'], 'estoque' => $row['estoque'], 'id' => $row['idProdutos'], 'preco' => $row['precoVenda']];
            }
            echo json_encode($row_set);
        }
    }

    public function autoCompleteProdutoSaida($q)
    {
        $this->db->select('*');
        $this->db->limit(5);
        $this->db->like('codDeBarra', $q);
        $this->db->or_like('descricao', $q);
        $this->db->where('saida', 1);
        $query = $this->db->get('produtos');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $row_set[] = ['label' => $row['descricao'] . ' | Preço: R$ ' . $row['precoVenda'] . ' | Estoque: ' . $row['estoque'], 'estoque' => $row['estoque'], 'id' => $row['idProdutos'], 'preco' => $row['precoVenda']];
            }
            echo json_encode($row_set);
        }
    }

    public function autoCompleteCliente($q)
    {
        $this->db->select('*');
        $this->db->limit(5);
        $this->db->like('CLIENTE', $q);
        //$this->db->or_like('telefone', $q);
        //$this->db->or_like('celular', $q);
        $query = $this->db->get('bradesco_analitico');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $row_set[] = ['label' => $row['CLIENTE']];
            }
            echo json_encode($row_set);
        }
    }

    public function autoCompleteUsuario($q)
    {
        $this->db->select('*');
        $this->db->limit(5);
        $this->db->like('nome', $q);
        $this->db->where('situacao', 1);
        $query = $this->db->get('usuarios');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $row_set[] = ['label' => $row['nome']];
            }
            echo json_encode($row_set);
        }
    }
    
     public function autoCompleteSituacao($q)
    {
        $this->db->select('*');
        $this->db->limit(5);
        $this->db->like('SITUAC', $q);
        $this->db->group_by('SITUAC');
        //$this->db->or_like('telefone', $q);
        //$this->db->or_like('celular', $q);
        $query = $this->db->get('bradesco_analitico');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $row_set[] = ['label' => $row['SITUAC']];
            }
            echo json_encode($row_set);
        }
    }
    
    public function autoCompleteGCPJ($q)
    {
        $this->db->select('*');
        $this->db->limit(7);
        $this->db->like('GCPJ', $q);
        //$this->db->group_by('SITUAC');
        //$this->db->or_like('telefone', $q);
        //$this->db->or_like('celular', $q);
        $query = $this->db->get('bradesco_analitico');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $row_set[] = ['label' => $row['GCPJ']];
            }
            echo json_encode($row_set);
        }
    }

    public function autoCompleteTermoGarantia($q)
    {
        $this->db->select('*');
        $this->db->limit(5);
        $this->db->like('LOWER(refGarantia)', $q);
        $query = $this->db->get('garantias');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $row_set[] = ['label' => $row['refGarantia'], 'id' => $row['idGarantias']];
            }
            echo json_encode($row_set);
        }
    }

    public function autoCompleteServico($q)
    {
        $this->db->select('*');
        $this->db->limit(5);
        $this->db->like('nome', $q);
        $query = $this->db->get('servicos');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $row_set[] = ['label' => $row['nome'] . ' | Preço: R$ ' . $row['preco'], 'id' => $row['idServicos'], 'preco' => $row['preco']];
            }
            echo json_encode($row_set);
        }
    }

    public function anexar($os, $anexo, $url, $thumb, $path)
    {
        $this->db->set('anexo', $anexo);
        $this->db->set('url', $url);
        $this->db->set('thumb', $thumb);
        $this->db->set('path', $path);
        $this->db->set('os_id', $os);

        return $this->db->insert('anexos');
    }

    public function getAnexos($os)
    {
        $this->db->where('os_id', $os);
        return $this->db->get('anexos')->result();
    }

    public function getAnotacoes($os)
    {
        $this->db->where('os_id', $os);
        $this->db->order_by('idAnotacoes', 'desc');

        return $this->db->get('anotacoes_os')->result();
    }

    public function getCobrancas($id = null)
    {
        $this->db->select('cobrancas.*');
        $this->db->from('cobrancas');
        $this->db->where('os_id', $id);

        return $this->db->get()->result();
    }

    public function criarTextoWhats($textoBase, $troca)
    {
        $procura = ["{CLIENTE_NOME}", "{NUMERO_OS}", "{STATUS_OS}", "{VALOR_OS}", "{DESCRI_PRODUTOS}", "{EMITENTE}", "{TELEFONE_EMITENTE}", "{OBS_OS}", "{DEFEITO_OS}", "{LAUDO_OS}", "{DATA_FINAL}", "{DATA_INICIAL}", "{DATA_GARANTIA}"];
        $textoBase = str_replace($procura, $troca, $textoBase);
        $textoBase = strip_tags($textoBase);
        $textoBase = htmlentities(urlencode($textoBase));
        return $textoBase;
    }

    public function valorTotalOS($id = null)
    {
        $totalServico = 0;
        $totalProdutos = 0;
        if ($servicos = $this->getServicos($id)) {
            foreach ($servicos as $s) {
                $preco = $s->preco ?: $s->precoVenda;
                $totalServico = $totalServico + ($preco * ($s->quantidade ?: 1));
            }
        }
        if ($produtos = $this->getProdutos($id)) {
            foreach ($produtos as $p) {
                $totalProdutos = $totalProdutos + $p->subTotal;
            }
        }

        return ['totalServico' => $totalServico, 'totalProdutos' => $totalProdutos];
    }

    public function isEditable($id = null)
    {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'eOs')) {
            return false;
        }
        if ($os = $this->getById($id)) {
            $osT = (int)($os->status === "Faturado" || $os->status === "Cancelado" || $os->faturado == 1);
            if ($osT) {
                return !(bool)$this->data['configuration']['control_editos'];
            }
        }
        return true;
    }

    public function getQrCode($id, $pixKey, $emitente)
    {
        if (empty($id) || empty($pixKey) || empty($emitente)) {
            return;
        }

        $result = $this->valorTotalOS($id);
        $amount = round(floatval($result['totalServico'] + $result['totalProdutos']), 2);

        if ($amount <= 0) {
            return;
        }

        $pix = (new StaticPayload())
            ->applyValidCharacters()
            ->applyUppercase()
            ->setPixKey(getPixKeyType($pixKey), $pixKey)
            ->setMerchantName($emitente->nome, true)
            ->setMerchantCity($emitente->cidade, true)
            ->setAmount($amount)
            ->setTid($id)
            ->setDescription(sprintf("%s OS %s", $emitente->nome, $id), true);

        return $pix->getQRCode();
    }
    //personalizado
    
   public function getSituacao2()
    {
        $query = "SELECT OBS FROM bradesco_analitico GROUP BY OBS";

        //$this->db->order_by('descricao', 'asc');

        return $this->db->query($query)->result();
    }
    
    public function lifeTime()
    {
        $query = "SELECT DATEDIFF(NOW(),DataEntrada) AS lifeTime FROM bradesco_analitico";

        //$this->db->order_by('descricao', 'asc');

        return $this->db->query($query)->result();
    }
    public function getAguardandoEncerramento()
    {
        $query = "SELECT *, DATEDIFF(NOW(),bradesco_analitico.DataEntrada) AS lifeTime FROM `bradesco_analitico` WHERE OBS = 'AGUARDANDO ENCERRAMENTO' ORDER BY idBradesco DESC";

        //$this->db->order_by('descricao', 'asc');

        return $this->db->query($query)->result();
    }
    public function getAguardandoEncerramentoCount()
    {
        
        
        $this->db->select('bradesco_analitico.*');
        $this->db->from('bradesco_analitico');
        //$this->db->join('clientes', 'clientes.idClientes = os.clientes_id');
        $this->db->where('bradesco_analitico.OBS', 'AGUARDANDO ENCERRAMENTO');
        //$this->db->limit(10);
        return $this->db->count_all_results();
        
        
    }
    
     public function getPesquisaPainel($termo)
    {
        //$query = "SELECT *, DATEDIFF(NOW(),bradesco_analitico.DataEntrada) AS lifeTime FROM `bradesco_analitico` WHERE OBS = '.$termo.' ORDER BY idBradesco DESC";
        //$query = "SELECT * FROM produtos WHERE idProdutos BETWEEN " . $this->db->escape($de) . " AND " . $this->db->escape($ate) . " ORDER BY idProdutos";

        //$this->db->order_by('descricao', 'asc');

        //return $this->db->query($query)->result();
        
        $this->db->select('bradesco_analitico.*, DATEDIFF(NOW(),bradesco_analitico.DataEntrada) AS lifeTime');
        $this->db->from('bradesco_analitico');
      
        $this->db->where('bradesco_analitico.OBS', $termo);
        $this->db->order_by('idBradesco', 'DESC');
        return $this->db->get()->result();
         
    }
    public function getPesquisaPainelCount($termo)
    {
        
        
        $this->db->select('bradesco_analitico.*');
        $this->db->from('bradesco_analitico');
        //$this->db->join('clientes', 'clientes.idClientes = os.clientes_id');
        $this->db->where('bradesco_analitico.OBS', $termo);
        //$this->db->limit(10);
        return $this->db->count_all_results();
        
        
    }
    
     public function getPesquisaPainelStatus($termo)
    {
        
        
        $this->db->select('bradesco_analitico.*, DATEDIFF(NOW(),bradesco_analitico.DataEntrada) AS lifeTime');
        $this->db->from('bradesco_analitico');
      
        $this->db->where('bradesco_analitico.STATUS', $termo);
        $this->db->order_by('idBradesco', 'DESC');
        return $this->db->get()->result();
         
    }
    public function getPesquisaPainelCountStatus($termo)
    {
        
        
        $this->db->select('bradesco_analitico.*');
        $this->db->from('bradesco_analitico');
        //$this->db->join('clientes', 'clientes.idClientes = os.clientes_id');
        $this->db->where('bradesco_analitico.STATUS', $termo);
        //$this->db->limit(10);
        return $this->db->count_all_results();
        
        
    }
    
     public function getSituacaoIniciais()
    {
        $query = "SELECT situacao_iniciais FROM situacao_inicial GROUP BY situacao_iniciais ORDER BY situacao_iniciais ASC";

        //$this->db->order_by('descricao', 'asc');

        return $this->db->query($query)->result();
    }
   
      public function getUserPendente($termo)
    {

          
        $this->db->select(
            'bradesco_analitico.*,
            DATEDIFF(NOW(),bradesco_analitico.DataEntrada) AS lifeTime'
        );
        $this->db->from('bradesco_analitico');
        $this->db->where('bradesco_analitico.STATUS', 'Pendente');
        $this->db->where('bradesco_analitico.RESP_INICIAL', $termo);
        $this->db->where('bradesco_analitico.OBS', 'VAI AJUIZAR');
        $this->db->or_where('bradesco_analitico.OBS', 'PRE-ANÁLISE');
       

        return $this->db->get()->result();
          
          
          
    }
    
    public function getUserPendenteCount($termo)
    {
        
        
        $this->db->select('*');
        $this->db->from('bradesco_analitico');
        $this->db->where('bradesco_analitico.STATUS', 'Pendente');
        $this->db->where('bradesco_analitico.RESP_INICIAL', $termo);
        $this->db->where('bradesco_analitico.OBS', 'VAI AJUIZAR');
        $this->db->or_where('bradesco_analitico.OBS', 'PRE-ANÁLISE');
        //$this->db->order_by('RESP_INICIAL', 'ASC');
        return $this->db->count_all_results();
        
        
    }
    
    //get por mes do painel bradesco analitico
    public function getMes($table, $fields, $where = [], $perpage = 0, $start = 0, $one = false, $array = 'array')
    {
        $query = 'CREATE TEMPORARY TABLE IF NOT EXISTS bradesco_analiticoTEMP SELECT  *, MONTH(DataEntrada) AS ENTRADA_MES, YEAR(DataEntrada) AS ANO_ENTRADA FROM bradesco_analitico; ';
        $this->db->query($query);
       
        $this->db->select($fields);
        $this->db->from($table);
       // $this->db->query('WHERE ENTRADA_MES = 4');
        
         // condicional de mes do painel bradesco
        if (array_key_exists('pesquisa', $where)) {
           $this->db->where('ENTRADA_MES =', $where['pesquisa']);
        }
       
         // condicional de mes do painel bradesco e status do painel bradesco
        if (array_key_exists('pendente', $where)) {
           $this->db->where('STATUS =', $where['pendente']);
        }
        if (array_key_exists('status', $where)) {
           $this->db->or_where('STATUS =', 'OK_NO_PRAZO');
        }
        
        //$this->db->order_by('bradesco_analiticoTEMP.idBradesco', 'desc');
        //$this->db->group_by('bradesco_analitico.idBradesco');

        $query = $this->db->get();

        $result = !$one ? $query->result() : $query->row();

        return $result;
    }
    
    
    //get por mes do painel bradesco analitico contando pendentes
    public function getMesCountPendente($table, $fields, $where = [], $perpage = 0, $start = 0, $one = false, $array = 'array')
    {
        $query = 'CREATE TEMPORARY TABLE IF NOT EXISTS bradesco_analiticoTEMP SELECT  *, MONTH(DataEntrada) AS ENTRADA_MES, YEAR(DataEntrada) AS ANO_ENTRADA FROM bradesco_analitico; ';
        $this->db->query($query);
       
        $this->db->select($fields);
        $this->db->from($table);
       // $this->db->query('WHERE ENTRADA_MES = 4');
        
         // condicional de mes do painel bradesco
        if (array_key_exists('pesquisa', $where)) {
           $this->db->where('ENTRADA_MES =', $where['pesquisa']);
        }
       
         // condicional de mes do painel bradesco e status do painel bradesco
        if (array_key_exists('pesquisa2', $where)) {
           $this->db->where('ENTRADA_MES =', $where['pesquisa2']);
        }
        
        //$this->db->order_by('bradesco_analiticoTEMP.idBradesco', 'desc');
        //$this->db->group_by('bradesco_analitico.idBradesco');

        $query = $this->db->get();

        $result = !$one ? $query->result() : $query->row();

        return $result;
    }
     //personalizado boatao drop down adv responsavel
     public function geadvResponsavel()
    {
        $query = "SELECT adv_responsavel FROM juridico3 GROUP BY adv_responsavel ORDER BY juridico3.adv_responsavel ASC";

        //$this->db->order_by('descricao', 'asc');

        return $this->db->query($query)->result();
    }
    
}
