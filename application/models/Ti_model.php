<?php

use Piggly\Pix\StaticPayload;

class Ti_model extends CI_Model
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
                $this->db->select('idClientes');
                $this->db->like('nomeCliente', $where['pesquisa']);
                $this->db->limit(5);
                $clientes = $this->db->get('clientes')->result();

                foreach ($clientes as $c) {
                    array_push($lista_clientes, $c->idClientes);
                }
            }
        }

        $this->db->select($fields . ',clientes.nomeCliente, clientes.celular as celular_cliente, usuarios.nome, garantias.*');
        $this->db->from($table);
        $this->db->join('clientes', 'clientes.idClientes = os.clientes_id');
        $this->db->join('usuarios', 'usuarios.idUsuarios = os.usuarios_id');
        $this->db->join('garantias', 'garantias.idGarantias = os.garantias_id', 'left');
        $this->db->join('produtos_os', 'produtos_os.os_id = os.idOs', 'left');
        $this->db->join('servicos_os', 'servicos_os.os_id = os.idOs', 'left');

        // condicionais da pesquisa

        // condicional de status
        if (array_key_exists('status', $where)) {
            $this->db->where_in('status', $where['status']);
        }

        // condicional de clientes
        if (array_key_exists('pesquisa', $where)) {
            if ($lista_clientes != null) {
                $this->db->where_in('os.clientes_id', $lista_clientes);
            }
        }

        // condicional data inicial
        if (array_key_exists('de', $where)) {
            $this->db->where('dataInicial >=', $where['de']);
        }
        // condicional data final
        if (array_key_exists('ate', $where)) {
            $this->db->where('dataFinal <=', $where['ate']);
        }

        $this->db->limit($perpage, $start);
        $this->db->order_by('os.idOs', 'desc');
        $this->db->group_by('os.idOs');

        $query = $this->db->get();

        $result = !$one ? $query->result() : $query->row();

        return $result;
    }
    
    public function getagenda($table, $fields, $where = [], $perpage = 0, $start = 0, $one = false, $array = 'array')
    {
        

        $this->db->select($fields);
        $this->db->from($table);
       

       
        $this->db->limit($perpage, $start);
        $this->db->order_by('os.idOs', 'desc');
        $this->db->group_by('os.idOs');

        $query = $this->db->get();

        $result = !$one ? $query->result() : $query->row();

        return $result;
    }
    
     public function getChamadosCount($table)
    {
       return $this->db->count_all($table);
    }
    
     public function getChamadosCountDia($table)
    {
         $where = 'YEAR(CURDATE()) = YEAR(dataChamado) AND MONTH(CURDATE()) = MONTH(dataChamado) AND DAY(CURDATE()) = DAY(dataChamado)';
         $this->db->select('*');
         $this->db->from($table);
         $this->db->where($where);
       return $this->db->count_all_results();
    }
    
      public function getChamadosMesUsuario($table)
    {
         $where = 'MONTH(dataChamado) = MONTH(CURDATE()) GROUP BY usuarioChamado';
         $this->db->select('count(*) AS QT, usuarioChamado');
         $this->db->from($table);
         $this->db->where($where);
         $this->db->order_by('QT', 'desc');
         $this->db->limit(1);
       return $this->db->get()->result_array();
    }
    
     public function getBeep($table)
    {
         $where = 'YEAR(CURDATE()) = YEAR(dataChamado) AND MONTH(CURDATE()) = MONTH(dataChamado) AND DAY(CURDATE()) = DAY(dataChamado) AND status = "Novo" ';
         $this->db->select('*');
         $this->db->from($table);
         $this->db->where($where);
       return $this->db->count_all_results();
    }
    
     public function getProximoChamado($table)
    {
         $where = 'YEAR(CURDATE()) = YEAR(dataChamado) AND MONTH(CURDATE()) = MONTH(dataChamado) AND DAY(CURDATE()) = DAY(dataChamado) AND status = "Novo" ';
         $this->db->select('*, MIN(idClientes)');
         $this->db->from($table);
         $this->db->where($where);
       return $this->db->get()->result();
    }

    public function getById($id)
    {
        $this->db->select('os.*, clientes.*, clientes.celular as celular_cliente, garantias.refGarantia, usuarios.telefone as telefone_usuario, usuarios.email as email_usuario, usuarios.nome');
        $this->db->from('os');
        $this->db->join('clientes', 'clientes.idClientes = os.clientes_id');
        $this->db->join('usuarios', 'usuarios.idUsuarios = os.usuarios_id');
        $this->db->join('garantias', 'garantias.idGarantias = os.garantias_id', 'left');
        $this->db->where('os.idOs', $id);
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
        $this->db->like('nomeCliente', $q);
        $this->db->or_like('telefone', $q);
        $this->db->or_like('celular', $q);
        $query = $this->db->get('clientes');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $row_set[] = ['label' => $row['nomeCliente'] . ' | Telefone: ' . $row['telefone'] . ' | Celular: ' . $row['celular'], 'id' => $row['idClientes']];
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
    ///personalizado
    
    public function getParque($table, $fields, $where = [], $perpage = 0, $start = 0, $one = false, $array = 'array')
    {
        $lista_clientes = [];
        if ($where) {
            if (array_key_exists('pesquisa', $where)) {
                $this->db->select('idClientes');
                $this->db->like('nomeCliente', $where['pesquisa']);
                $this->db->limit(5);
                $clientes = $this->db->get('clientes')->result();

                foreach ($clientes as $c) {
                    array_push($lista_clientes, $c->idClientes);
                }
            }
        }

        $this->db->select($fields . ' ,usuarios.nome');
        $this->db->from($table);
        $this->db->join('usuarios', 'usuarios.idUsuarios = parque.usuarios_id');
        

        // condicionais da pesquisa

        // condicional de status
        if (array_key_exists('status', $where)) {
            $this->db->where_in('status', $where['status']);
        }
         // condicional de tipoProduto
        if (array_key_exists('tipoProduto', $where)) {
            $this->db->where_in('tipoProduto', $where['tipoProduto']);
        }
        

        // condicional de clientes
        if (array_key_exists('pesquisa', $where)) {
            $this->db->like('numeroSerie', $where['pesquisa']);
        }

        // condicional data inicial
        if (array_key_exists('de', $where)) {
            $this->db->where('dataInicial >=', $where['de']);
        }
        // condicional data final
        if (array_key_exists('ate', $where)) {
            $this->db->where('dataFinal <=', $where['ate']);
        }

        $this->db->limit($perpage, $start);
        $this->db->order_by('parque.idParque', 'desc');
        $this->db->group_by('parque.idParque');

        $query = $this->db->get();

        $result = !$one ? $query->result() : $query->row();

        return $result;
    }
    
    public function getByIdParque($id)
    {
        $this->db->select('parque.*, usuarios.nome');
        $this->db->from('parque');
        
        $this->db->join('usuarios', 'usuarios.idUsuarios = parque.usuarios_id');
       
        $this->db->where('parque.idParque', $id);
        $this->db->limit(1);

        return $this->db->get()->row();
    }
    
    //informações do parque tecnologico
       public function getPcUso($table)
    {
         $where = 'status = "Em uso" AND tipoProduto = "Computador"';
         $this->db->select('COUNT(*) as QT');
         $this->db->from($table);
         $this->db->where($where);
         //$this->db->order_by('QT', 'desc');
        // $this->db->limit(1);
       return $this->db->get()->result_array();
    }
    
        public function getPcMarca($table)
    {
         $where = 'status = "Em uso" AND tipoProduto = "Computador"';
         $this->db->select('COUNT(*) as QT, marca');
         $this->db->from($table);
         $this->db->where($where);
         $this->db->group_by('marca');
         //$this->db->order_by('QT', 'desc');
        // $this->db->limit(1);
       return $this->db->get()->result();
    }
        public function getPcSSD($table)
    {
         $where = 'status = "Em uso" AND hardDrive LIKE "%SSD%"';
         $this->db->select('count(*) AS QT, hardDrive');
         $this->db->from($table);
         $this->db->where($where);
         //$this->db->order_by('QT', 'desc');
        // $this->db->limit(1);
       return $this->db->get()->result_array();
    }
    
        public function getPcSemSSD($table)
    {
         $where = 'status = "Em uso" AND hardDrive NOT LIKE "%SSD%"';
         $this->db->select('count(*) AS QT, hardDrive');
         $this->db->from($table);
         $this->db->where($where);
         //$this->db->order_by('QT', 'desc');
        // $this->db->limit(1);
       return $this->db->get()->result_array();
    }
    
    //chamado por mes e usuario
    
       public function getChamadosMaisMes($table)
    {
         
         $query = 'SELECT count(*) as "CHAMADOS RESOLVIDOS",  IFNULL(tecnicoResponsavel,"Chamado em aberto") as "Técnico Responsável", CONCAT(ROUND((COUNT(*) * 100) / (SELECT COUNT(*) FROM chamados),2),"%") AS "PORCENTAGEM"  FROM chamados GROUP BY tecnicoResponsavel';

        return $this->db->query($query)->result_array();
    }
    
      //informações do parque tecnologico sobre pcs guardados
       public function getPcGuardado($table)
    {
         $where = 'status = "Guardado" AND tipoProduto = "Computador"';
         $this->db->select('COUNT(*) as QT');
         $this->db->from($table);
         $this->db->where($where);
         //$this->db->order_by('QT', 'desc');
        // $this->db->limit(1);
       return $this->db->get()->result_array();
    }
    
     //informações do parque tecnologico sobre fones
       public function getFonesUso($table)
    {
         $where = 'tipoProduto = "Fone"';
         $this->db->select('COUNT(*) as QT, setor');
         $this->db->from($table);
         $this->db->where($where);
         $this->db->group_by('setor');
        // $this->db->limit(1);
       return $this->db->get()->result();
       
       //SELECT COUNT(*) as QTD, setor FROM SIJUR2.parque WHERE status = "Em uso" AND tipoProduto = 'Fone' GROUP BY setor
       //SELECT COUNT(*) as QTD, status FROM SIJUR2.parque WHERE tipoProduto = 'Monitor' GROUP BY status



    }
    
    //informações do parque tecnologico sobre monitores
       public function getMonitores($table)
    {
         $where = 'tipoProduto = "Monitor"';
         $this->db->select('COUNT(*) as QT, status');
         $this->db->from($table);
         $this->db->where($where);
         $this->db->group_by('status');
        // $this->db->limit(1);
       return $this->db->get()->result();
       
       //SELECT COUNT(*) as QTD, setor FROM SIJUR2.parque WHERE status = "Em uso" AND tipoProduto = 'Fone' GROUP BY setor
       //SELECT COUNT(*) as QTD, status FROM SIJUR2.parque WHERE tipoProduto = 'Monitor' GROUP BY status



    }
    
    public function autoCompleteEtiqueta($q)
    {
        $this->db->select('*');
        $this->db->limit(5);
        $this->db->like('numeroSerie', $q);
        //$this->db->or_like('telefone', $q);
        //$this->db->or_like('celular', $q);
        $query = $this->db->get('parque');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $row_set[] = ['label' => $row['numeroSerie']];
            }
            echo json_encode($row_set);
        }
    }
}
