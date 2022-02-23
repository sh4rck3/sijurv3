<?php

use Piggly\Pix\StaticPayload;

class Retomadas_model extends CI_Model
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
    
    public function getRetomadas($table, $fields, $where = [], $perpage = 0, $start = 0, $one = false, $array = 'array')
    {
        
        $this->db->select($fields);
        $this->db->from($table);
       
        // condicional de status
        if (array_key_exists('status', $where)) {
            $this->db->where_in('status', $where['status']);
        }

        // condicional de clientes
        if (array_key_exists('pesquisa', $where)) {
            $this->db->like('nomeLocalizador', $where['pesquisa']);
            $this->db->or_like('areasAtuacao', $where['pesquisa']);
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
        $this->db->order_by('retomadas.idLocalizador', 'desc');
        $this->db->group_by('retomadas.idLocalizador');

        $query = $this->db->get();

        $result = !$one ? $query->result() : $query->row();

        return $result;
    }
    //contagem de dados da tabela
    public function count($table)
    {
        return $this->db->count_all($table);
    }
    //add informações na tabela
    public function add($table, $data)
    {
        $this->db->insert($table, $data);
        if ($this->db->affected_rows() == '1') {
            return true;
        }

        return false;
    }
    //deletando arquivos do da tabela
     public function delete($table, $fieldID, $ID)
    {
        $this->db->where($fieldID, $ID);
        $this->db->delete($table);
        if ($this->db->affected_rows() == '1') {
            return true;
        }

        return false;
    }
    
     public function getById($id)
    {
        $this->db->select('retomadas.*');
        $this->db->from('retomadas');
 //       $this->db->join('usuarios', 'usuarios.idUsuarios = dp.usuarios_id');
       
        $this->db->where('retomadas.idLocalizador', $id);
        $this->db->limit(1);

        return $this->db->get()->row();
    }
    
     public function retomadasRapid()
    {
        $query = "
            SELECT retomadas.*
            FROM retomadas
            
            ORDER BY idLocalizador
        ";

        return $this->db->query($query)->result();
    }
    
     public function financeiroRapid($array = false)
    {
//        $primeiroDiaMes = new \DateTime('first day of this month');
//        $ultimodiaMes = new DateTime('last day of this month');
//
//        $this->db->where('data_vencimento >=', $primeiroDiaMes->format('Y-m-d'));
//        $this->db->where('data_vencimento <=', $ultimodiaMes->format('Y-m-d'));
//        $this->db->order_by('data_vencimento', 'asc');
        $result = $this->db->get('retomadas');
        if ($array) {
            return $result->result_array();
        }

        return $result->result();
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

   
}
