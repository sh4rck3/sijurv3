<?php



class Tv_model extends CI_Model
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

    public function getTv($table, $fields)
    {
        $this->db->select($fields);
        $this->db->from($table);
        

        return $this->db->get()->row();
    }
    
     public function gettvteste()
    {
        $query = "select * from SIJUR2.tv WHERE idTv = (SELECT MAX(idTv) from SIJUR2.tv) ";

        //$this->db->order_by('descricao', 'asc');

        return $this->db->query($query)->result();
    }
    
    //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ acompanhamento mensal de performance *****************************************************************
    //Anapolis
    //Anapolis Varejo ########################################
     public function getComercialMoAnapolis()
    {
        $query = 'SELECT SUM(mora) AS totalMoAnapolis FROM `AcomPerformance` WHERE regional = "Regional Anápolis" AND conta = "COMERCIAL" AND segmento = "Varejo" AND mora IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
     public function getComercialLpAnapolis()
    {
        $query = 'SELECT SUM(lucroPerdido) AS totalMoAnapolis FROM `AcomPerformance` WHERE regional = "Regional Anápolis" AND conta = "COMERCIAL" AND segmento = "Varejo" AND lucroPerdido IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
    
    //Anapolis Prime #############################################
    
     public function getComercialMoAnapolisPrime()
    {
        $query = 'SELECT SUM(mora) AS total FROM `AcomPerformance` WHERE regional = "Regional Anápolis" AND conta = "COMERCIAL" AND segmento = "Prime" AND mora IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
     public function getComercialLpAnapolisPrime()
    {
        $query = 'SELECT SUM(lucroPerdido) AS total FROM `AcomPerformance` WHERE regional = "Regional Anápolis" AND conta = "COMERCIAL" AND segmento = "Prime" AND lucroPerdido IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
    
    //anapolis Veiculos varejo))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))
    
     public function getVAnapolisVarejoLp()
    {
        $query = 'SELECT SUM(lucroPerdido) AS total FROM `AcomPerformance` WHERE regional = "Regional Anápolis"  AND conta = "VEICULO" AND segmento = "Varejo" AND lucroPerdido IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
      public function getVAnapolisVarejoMo()
    {
        $query = 'SELECT SUM(mora) AS total FROM `AcomPerformance` WHERE regional = "Regional Anápolis"  AND conta = "VEICULO" AND segmento = "Varejo" AND mora IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
    
    //anapolis Veiculos Prime))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))
    
     public function getVAnapolisPrimeLp()
    {
        $query = 'SELECT SUM(lucroPerdido) AS total FROM `AcomPerformance` WHERE regional = "Regional Anápolis" AND conta = "VEICULO" AND segmento = "Prime" AND lucroPerdido IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
      public function getVAnapolisPrimeMo()
    {
        $query = 'SELECT SUM(mora) AS total FROM `AcomPerformance` WHERE regional = "Regional Anápolis" AND conta = "VEICULO" AND segmento = "Prime" AND mora IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
    
    
    //anapolis imovellllllllllllllllllllllllllllllllllllllllllllll====================================================
     //anapolis Veiculos varejo))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))
    
     public function getIAnapolisVarejoLp()
    {
        $query = 'SELECT SUM(lucroPerdido) AS total FROM `AcomPerformance` WHERE regional = "Regional Anápolis"  AND conta = "IMÓVEL" AND segmento = "Varejo" AND lucroPerdido IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
      public function getIAnapolisVarejoMo()
    {
        $query = 'SELECT SUM(mora) AS total FROM `AcomPerformance` WHERE regional = "Regional Anápolis"  AND conta = "IMÓVEL" AND segmento = "Varejo" AND mora IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
    
    //anapolis Veiculos Prime))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))
    
     public function getIAnapolisPrimeLp()
    {
        $query = 'SELECT SUM(lucroPerdido) AS total FROM `AcomPerformance` WHERE regional = "Regional Anápolis" AND conta = "IMÓVEL" AND segmento = "Prime" AND lucroPerdido IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
      public function getIAnapolisPrimeMo()
    {
        $query = 'SELECT SUM(mora) AS total FROM `AcomPerformance` WHERE regional = "Regional Anápolis" AND conta = "IMÓVEL" AND segmento = "Prime" AND mora IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
    
     //Brasilia Norte Comercial ##################################################################################################
     //brasilia norte comercial varejo))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))
    
     public function getCBrasilianVarejoLp()
    {
        $query = 'SELECT SUM(lucroPerdido) AS total FROM `AcomPerformance` WHERE regional = "Brasilia NORTE"  AND conta = "COMERCIAL" AND segmento = "Varejo" AND lucroPerdido IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
      public function getCBrasilianVarejoMo()
    {
        $query = 'SELECT SUM(mora) AS total FROM `AcomPerformance` WHERE regional = "Brasilia NORTE"  AND conta = "COMERCIAL" AND segmento = "Varejo" AND mora IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
    
    //brasilia norte comercial prime))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))
    
     public function getCBrasilianPrimeLp()
    {
        $query = 'SELECT SUM(lucroPerdido) AS total FROM `AcomPerformance` WHERE regional = "Brasilia NORTE" AND conta = "COMERCIAL" AND segmento = "Prime" AND lucroPerdido IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
      public function getCBrasilianPrimeMo()
    {
        $query = 'SELECT SUM(mora) AS total FROM `AcomPerformance` WHERE regional = "Brasilia NORTE" AND conta = "COMERCIAL" AND segmento = "Prime" AND mora IS NOT NULL';
        return $this->db->query($query)->result_array();
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
    
    
    
    //Brasilia Norte veiculo ##################################################################################################
     //brasilia norte veiculo varejo))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))
    
     public function getVBrasilianVarejoLp()
    {
        $query = 'SELECT SUM(lucroPerdido) AS total FROM `AcomPerformance` WHERE regional = "Brasilia NORTE"  AND conta = "VEICULO" AND segmento = "Varejo" AND lucroPerdido IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
      public function getVBrasilianVarejoMo()
    {
        $query = 'SELECT SUM(mora) AS total FROM `AcomPerformance` WHERE regional = "Brasilia NORTE"  AND conta = "VEICULO" AND segmento = "Varejo" AND mora IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
    
    //brasilia norte veiculo prime))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))
    
     public function getVBrasilianPrimeLp()
    {
        $query = 'SELECT SUM(lucroPerdido) AS total FROM `AcomPerformance` WHERE regional = "Brasilia NORTE" AND conta = "VEICULO" AND segmento = "Prime" AND lucroPerdido IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
      public function getVBrasilianPrimeMo()
    {
        $query = 'SELECT SUM(mora) AS total FROM `AcomPerformance` WHERE regional = "Brasilia NORTE" AND conta = "VEICULO" AND segmento = "Prime" AND mora IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
    
    
     //Brasilia Norte imoveis ##################################################################################################
     //brasilia norte imoveis varejo))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))
    
     public function getIBrasilianVarejoLp()
    {
        $query = 'SELECT SUM(lucroPerdido) AS total FROM `AcomPerformance` WHERE regional = "Brasilia NORTE"  AND conta = "IMÓVEL" AND segmento = "Varejo" AND lucroPerdido IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
      public function getIBrasilianVarejoMo()
    {
        $query = 'SELECT SUM(mora) AS total FROM `AcomPerformance` WHERE regional = "Brasilia NORTE"  AND conta = "IMÓVEL" AND segmento = "Varejo" AND mora IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
    
    //brasilia norte veiculo prime))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))
    
     public function getIBrasilianPrimeLp()
    {
        $query = 'SELECT SUM(lucroPerdido) AS total FROM `AcomPerformance` WHERE regional = "Brasilia NORTE" AND conta = "IMÓVEL" AND segmento = "Prime" AND lucroPerdido IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
      public function getIBrasilianPrimeMo()
    {
        $query = 'SELECT SUM(mora) AS total FROM `AcomPerformance` WHERE regional = "Brasilia NORTE" AND conta = "IMÓVEL" AND segmento = "Prime" AND mora IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
    
    
    
    
    
      //Brasilia Sul Comercial ##################################################################################################
     //brasilia Sul comercial PRIME))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))
    
     public function getCBrasiliasVarejoLp()
    {
        $query = 'SELECT SUM(lucroPerdido) AS total FROM `AcomPerformance` WHERE regional = "Brasilia SUL"  AND conta = "COMERCIAL" AND segmento = "Varejo" AND lucroPerdido IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
      public function getCBrasiliasVarejoMo()
    {
        $query = 'SELECT SUM(mora) AS total FROM `AcomPerformance` WHERE regional = "Brasilia SUL"  AND conta = "COMERCIAL" AND segmento = "Varejo" AND mora IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
    
    //brasilia sul comercial PRIME))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))
    
     public function getCBrasiliasPrimeLp()
    {
        $query = 'SELECT SUM(lucroPerdido) AS total FROM `AcomPerformance` WHERE regional = "Brasilia SUL" AND conta = "COMERCIAL" AND segmento = "Prime" AND lucroPerdido IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
      public function getCBrasiliasPrimeMo()
    {
        $query = 'SELECT SUM(mora) AS total FROM `AcomPerformance` WHERE regional = "Brasilia SUL" AND conta = "COMERCIAL" AND segmento = "Prime" AND mora IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
    
     //Brasilia sul veiculo ##################################################################################################
     //brasilia sul veiculo VAREJO))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))
    
     public function getVBrasiliasVarejoLp()
    {
        $query = 'SELECT SUM(lucroPerdido) AS total FROM `AcomPerformance` WHERE regional = "Brasilia SUL"  AND conta = "VEICULO" AND segmento = "Varejo" AND lucroPerdido IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
      public function getVBrasiliasVarejoMo()
    {
        $query = 'SELECT SUM(mora) AS total FROM `AcomPerformance` WHERE regional = "Brasilia SUL"  AND conta = "VEICULO" AND segmento = "Varejo" AND mora IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
    
    //brasilia sul veiculo PRIME))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))
    
     public function getVBrasiliasPrimeLp()
    {
        $query = 'SELECT SUM(lucroPerdido) AS total FROM `AcomPerformance` WHERE regional = "Brasilia SUL" AND conta = "VEICULO" AND segmento = "Prime" AND lucroPerdido IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
      public function getVBrasiliasPrimeMo()
    {
        $query = 'SELECT SUM(mora) AS total FROM `AcomPerformance` WHERE regional = "Brasilia SUL" AND conta = "VEICULO" AND segmento = "Prime" AND mora IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
    
    
     //Brasilia sul imoveis ##################################################################################################
     //brasilia sul imoveis VAREJO))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))
    
     public function getIBrasiliasVarejoLp()
    {
        $query = 'SELECT SUM(lucroPerdido) AS total FROM `AcomPerformance` WHERE regional = "Brasilia SUL"  AND conta = "IMÓVEL" AND segmento = "Varejo" AND lucroPerdido IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
      public function getIBrasiliasVarejoMo()
    {
        $query = 'SELECT SUM(mora) AS total FROM `AcomPerformance` WHERE regional = "Brasilia SUL"  AND conta = "IMÓVEL" AND segmento = "Varejo" AND mora IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
    
    //brasilia sul imoveis PRIME))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))
    
     public function getIBrasiliasPrimeLp()
    {
        $query = 'SELECT SUM(lucroPerdido) AS total FROM `AcomPerformance` WHERE regional = "Brasilia SUL" AND conta = "IMÓVEL" AND segmento = "Prime" AND lucroPerdido IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
      public function getIBrasiliasPrimeMo()
    {
        $query = 'SELECT SUM(mora) AS total FROM `AcomPerformance` WHERE regional = "Brasilia SUL" AND conta = "IMÓVEL" AND segmento = "Prime" AND mora IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
    
    
    
      //campoGrandeN Comercial ##################################################################################################
     //campoGrandeNN comercial PRIME))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))
    
     public function getCcampoGrandeNVarejoLp()
    {
        $query = 'SELECT SUM(lucroPerdido) AS total FROM `AcomPerformance` WHERE regional = "Regional CAMPO GRANDE NORTE"  AND conta = "COMERCIAL" AND segmento = "Varejo" AND lucroPerdido IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
      public function getCcampoGrandeNVarejoMo()
    {
        $query = 'SELECT SUM(mora) AS total FROM `AcomPerformance` WHERE regional = "Regional CAMPO GRANDE NORTE"  AND conta = "COMERCIAL" AND segmento = "Varejo" AND mora IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
    
    //campoGrandeN comercial PRIME ))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))
    
     public function getCcampoGrandeNPrimeLp()
    {
        $query = 'SELECT SUM(lucroPerdido) AS total FROM `AcomPerformance` WHERE regional = "Regional CAMPO GRANDE NORTE" AND conta = "COMERCIAL" AND segmento = "Prime" AND lucroPerdido IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
      public function getCcampoGrandeNPrimeMo()
    {
        $query = 'SELECT SUM(mora) AS total FROM `AcomPerformance` WHERE regional = "Regional CAMPO GRANDE NORTE" AND conta = "COMERCIAL" AND segmento = "Prime" AND mora IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
    
     //campoGrandeN veiculo ##################################################################################################
     //campoGrandeN veiculo VAREJO ))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))
    
     public function getVcampoGrandeNVarejoLp()
    {
        $query = 'SELECT SUM(lucroPerdido) AS total FROM `AcomPerformance` WHERE regional = "Regional CAMPO GRANDE NORTE"  AND conta = "VEICULO" AND segmento = "Varejo" AND lucroPerdido IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
      public function getVcampoGrandeNVarejoMo()
    {
        $query = 'SELECT SUM(mora) AS total FROM `AcomPerformance` WHERE regional = "Regional CAMPO GRANDE NORTE"  AND conta = "VEICULO" AND segmento = "Varejo" AND mora IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
    
    //campoGrandeN veiculo PRIME ))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))
    
     public function getVcampoGrandeNPrimeLp()
    {
        $query = 'SELECT SUM(lucroPerdido) AS total FROM `AcomPerformance` WHERE regional = "Regional CAMPO GRANDE NORTE" AND conta = "VEICULO" AND segmento = "Prime" AND lucroPerdido IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
      public function getVcampoGrandeNPrimeMo()
    {
        $query = 'SELECT SUM(mora) AS total FROM `AcomPerformance` WHERE regional = "Regional CAMPO GRANDE NORTE" AND conta = "VEICULO" AND segmento = "Prime" AND mora IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
    
    
     //campoGrandeN imoveis ##################################################################################################
     //campoGrandeN imoveis VAREJO ))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))
    
     public function getIcampoGrandeNVarejoLp()
    {
        $query = 'SELECT SUM(lucroPerdido) AS total FROM `AcomPerformance` WHERE regional = "Regional CAMPO GRANDE NORTE"  AND conta = "IMÓVEL" AND segmento = "Varejo" AND lucroPerdido IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
      public function getIcampoGrandeNVarejoMo()
    {
        $query = 'SELECT SUM(mora) AS total FROM `AcomPerformance` WHERE regional = "Regional CAMPO GRANDE NORTE"  AND conta = "IMÓVEL" AND segmento = "Varejo" AND mora IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
    
    //campoGrandeN imoveis PRIME ))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))
    
     public function getIcampoGrandeNPrimeLp()
    {
        $query = 'SELECT SUM(lucroPerdido) AS total FROM `AcomPerformance` WHERE regional = "Regional CAMPO GRANDE NORTE" AND conta = "IMÓVEL" AND segmento = "Prime" AND lucroPerdido IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
      public function getIcampoGrandeNPrimeMo()
    {
        $query = 'SELECT SUM(mora) AS total FROM `AcomPerformance` WHERE regional = "Regional CAMPO GRANDE NORTE" AND conta = "IMÓVEL" AND segmento = "Prime" AND mora IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
    
    
    
    
    //$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
    
      //campoGrandeS Comercial ##################################################################################################
     //campoGrandeS comercial PRIME))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))
    
     public function getCcampoGrandeSVarejoLp()
    {
        $query = 'SELECT SUM(lucroPerdido) AS total FROM `AcomPerformance` WHERE regional = "Regional CAMPO GRANDE SUL"  AND conta = "COMERCIAL" AND segmento = "Varejo" AND lucroPerdido IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
      public function getCcampoGrandeSVarejoMo()
    {
        $query = 'SELECT SUM(mora) AS total FROM `AcomPerformance` WHERE regional = "Regional CAMPO GRANDE SUL"  AND conta = "COMERCIAL" AND segmento = "Varejo" AND mora IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
    
    //campoGrandeS comercial PRIME ))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))
    
     public function getCcampoGrandeSPrimeLp()
    {
        $query = 'SELECT SUM(lucroPerdido) AS total FROM `AcomPerformance` WHERE regional = "Regional CAMPO GRANDE SUL" AND conta = "COMERCIAL" AND segmento = "Prime" AND lucroPerdido IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
      public function getCcampoGrandeSPrimeMo()
    {
        $query = 'SELECT SUM(mora) AS total FROM `AcomPerformance` WHERE regional = "Regional CAMPO GRANDE SUL" AND conta = "COMERCIAL" AND segmento = "Prime" AND mora IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
    
     //campoGrandeS veiculo ##################################################################################################
     //campoGrandeS veiculo VAREJO ))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))
    
     public function getVcampoGrandeSVarejoLp()
    {
        $query = 'SELECT SUM(lucroPerdido) AS total FROM `AcomPerformance` WHERE regional = "Regional CAMPO GRANDE SUL"  AND conta = "VEICULO" AND segmento = "Varejo" AND lucroPerdido IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
      public function getVcampoGrandeSVarejoMo()
    {
        $query = 'SELECT SUM(mora) AS total FROM `AcomPerformance` WHERE regional = "Regional CAMPO GRANDE SUL"  AND conta = "VEICULO" AND segmento = "Varejo" AND mora IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
    
    //campoGrandeS veiculo PRIME ))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))
    
     public function getVcampoGrandeSPrimeLp()
    {
        $query = 'SELECT SUM(lucroPerdido) AS total FROM `AcomPerformance` WHERE regional = "Regional CAMPO GRANDE SUL" AND conta = "VEICULO" AND segmento = "Prime" AND lucroPerdido IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
      public function getVcampoGrandeSPrimeMo()
    {
        $query = 'SELECT SUM(mora) AS total FROM `AcomPerformance` WHERE regional = "Regional CAMPO GRANDE SUL" AND conta = "VEICULO" AND segmento = "Prime" AND mora IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
    
    
     //campoGrandeS imoveis ##################################################################################################
     //campoGrandeS imoveis VAREJO ))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))
    
     public function getIcampoGrandeSVarejoLp()
    {
        $query = 'SELECT SUM(lucroPerdido) AS total FROM `AcomPerformance` WHERE regional = "Regional CAMPO GRANDE SUL"  AND conta = "IMÓVEL" AND segmento = "Varejo" AND lucroPerdido IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
      public function getIcampoGrandeSVarejoMo()
    {
        $query = 'SELECT SUM(mora) AS total FROM `AcomPerformance` WHERE regional = "Regional CAMPO GRANDE SUL"  AND conta = "IMÓVEL" AND segmento = "Varejo" AND mora IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
    
    //campoGrandeS imoveis PRIME ))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))
    
     public function getIcampoGrandeSPrimeLp()
    {
        $query = 'SELECT SUM(lucroPerdido) AS total FROM `AcomPerformance` WHERE regional = "Regional CAMPO GRANDE SUL" AND conta = "IMÓVEL" AND segmento = "Prime" AND lucroPerdido IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
      public function getIcampoGrandeSPrimeMo()
    {
        $query = 'SELECT SUM(mora) AS total FROM `AcomPerformance` WHERE regional = "Regional CAMPO GRANDE SUL" AND conta = "IMÓVEL" AND segmento = "Prime" AND mora IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
    
    
    
    
     //$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
    
      //cuiaba Comercial ##################################################################################################
     //cuiaba comercial PRIME))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))
    
     public function getCcuiabaVarejoLp()
    {
        $query = 'SELECT SUM(lucroPerdido) AS total FROM `AcomPerformance` WHERE regional = "Regional CUIABÁ"  AND conta = "COMERCIAL" AND segmento = "Varejo" AND lucroPerdido IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
      public function getCcuiabaVarejoMo()
    {
        $query = 'SELECT SUM(mora) AS total FROM `AcomPerformance` WHERE regional = "Regional CUIABÁ"  AND conta = "COMERCIAL" AND segmento = "Varejo" AND mora IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
    
    //cuiaba comercial PRIME ))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))
    
     public function getCcuiabaPrimeLp()
    {
        $query = 'SELECT SUM(lucroPerdido) AS total FROM `AcomPerformance` WHERE regional = "Regional CUIABÁ" AND conta = "COMERCIAL" AND segmento = "Prime" AND lucroPerdido IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
      public function getCcuiabaPrimeMo()
    {
        $query = 'SELECT SUM(mora) AS total FROM `AcomPerformance` WHERE regional = "Regional CUIABÁ" AND conta = "COMERCIAL" AND segmento = "Prime" AND mora IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
    
     //cuiaba veiculo ##################################################################################################
     //cuiaba veiculo VAREJO ))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))
    
     public function getVcuiabaVarejoLp()
    {
        $query = 'SELECT SUM(lucroPerdido) AS total FROM `AcomPerformance` WHERE regional = "Regional CUIABÁ"  AND conta = "VEICULO" AND segmento = "Varejo" AND lucroPerdido IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
      public function getVcuiabaVarejoMo()
    {
        $query = 'SELECT SUM(mora) AS total FROM `AcomPerformance` WHERE regional = "Regional CUIABÁ"  AND conta = "VEICULO" AND segmento = "Varejo" AND mora IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
    
    //cuiaba veiculo PRIME ))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))
    
     public function getVcuiabaPrimeLp()
    {
        $query = 'SELECT SUM(lucroPerdido) AS total FROM `AcomPerformance` WHERE regional = "Regional CUIABÁ" AND conta = "VEICULO" AND segmento = "Prime" AND lucroPerdido IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
      public function getVcuiabaPrimeMo()
    {
        $query = 'SELECT SUM(mora) AS total FROM `AcomPerformance` WHERE regional = "Regional CUIABÁ" AND conta = "VEICULO" AND segmento = "Prime" AND mora IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
    
    
     //cuiaba imoveis ##################################################################################################
     //cuiaba imoveis VAREJO ))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))
    
     public function getIcuiabaVarejoLp()
    {
        $query = 'SELECT SUM(lucroPerdido) AS total FROM `AcomPerformance` WHERE regional = "Regional CUIABÁ"  AND conta = "IMÓVEL" AND segmento = "Varejo" AND lucroPerdido IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
      public function getIcuiabaVarejoMo()
    {
        $query = 'SELECT SUM(mora) AS total FROM `AcomPerformance` WHERE regional = "Regional CUIABÁ"  AND conta = "IMÓVEL" AND segmento = "Varejo" AND mora IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
    
    //cuiaba imoveis PRIME ))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))
    
     public function getIcuiabaPrimeLp()
    {
        $query = 'SELECT SUM(lucroPerdido) AS total FROM `AcomPerformance` WHERE regional = "Regional CUIABÁ" AND conta = "IMÓVEL" AND segmento = "Prime" AND lucroPerdido IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
      public function getIcuiabaPrimeMo()
    {
        $query = 'SELECT SUM(mora) AS total FROM `AcomPerformance` WHERE regional = "Regional CUIABÁ" AND conta = "IMÓVEL" AND segmento = "Prime" AND mora IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
    
    //$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
    //$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
     //$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
    
      //goiania Comercial ##################################################################################################
     //goiania comercial PRIME))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))
    
     public function getCgoianiaVarejoLp()
    {
        $query = 'SELECT SUM(lucroPerdido) AS total FROM `AcomPerformance` WHERE regional = "Regional Goiânia"  AND conta = "COMERCIAL" AND segmento = "Varejo" AND lucroPerdido IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
      public function getCgoianiaVarejoMo()
    {
        $query = 'SELECT SUM(mora) AS total FROM `AcomPerformance` WHERE regional = "Regional Goiânia"  AND conta = "COMERCIAL" AND segmento = "Varejo" AND mora IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
    
    //goiania comercial PRIME ))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))
    
     public function getCgoianiaPrimeLp()
    {
        $query = 'SELECT SUM(lucroPerdido) AS total FROM `AcomPerformance` WHERE regional = "Regional Goiânia" AND conta = "COMERCIAL" AND segmento = "Prime" AND lucroPerdido IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
      public function getCgoianiaPrimeMo()
    {
        $query = 'SELECT SUM(mora) AS total FROM `AcomPerformance` WHERE regional = "Regional Goiânia" AND conta = "COMERCIAL" AND segmento = "Prime" AND mora IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
    
     //goiania veiculo ##################################################################################################
     //goiania veiculo VAREJO ))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))
    
     public function getVgoianiaVarejoLp()
    {
        $query = 'SELECT SUM(lucroPerdido) AS total FROM `AcomPerformance` WHERE regional = "Regional Goiânia"  AND conta = "VEICULO" AND segmento = "Varejo" AND lucroPerdido IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
      public function getVgoianiaVarejoMo()
    {
        $query = 'SELECT SUM(mora) AS total FROM `AcomPerformance` WHERE regional = "Regional Goiânia"  AND conta = "VEICULO" AND segmento = "Varejo" AND mora IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
    
    //goiania veiculo PRIME ))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))
    
     public function getVgoianiaPrimeLp()
    {
        $query = 'SELECT SUM(lucroPerdido) AS total FROM `AcomPerformance` WHERE regional = "Regional Goiânia" AND conta = "VEICULO" AND segmento = "Prime" AND lucroPerdido IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
      public function getVgoianiaPrimeMo()
    {
        $query = 'SELECT SUM(mora) AS total FROM `AcomPerformance` WHERE regional = "Regional Goiânia" AND conta = "VEICULO" AND segmento = "Prime" AND mora IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
    
    
     //goiania imoveis ##################################################################################################
     //goiania imoveis VAREJO ))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))
    
     public function getIgoianiaVarejoLp()
    {
        $query = 'SELECT SUM(lucroPerdido) AS total FROM `AcomPerformance` WHERE regional = "Regional Goiânia"  AND conta = "IMÓVEL" AND segmento = "Varejo" AND lucroPerdido IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
      public function getIgoianiaVarejoMo()
    {
        $query = 'SELECT SUM(mora) AS total FROM `AcomPerformance` WHERE regional = "Regional Goiânia"  AND conta = "IMÓVEL" AND segmento = "Varejo" AND mora IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
    
    //goiania imoveis PRIME ))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))
    
     public function getIgoianiaPrimeLp()
    {
        $query = 'SELECT SUM(lucroPerdido) AS total FROM `AcomPerformance` WHERE regional = "Regional Goiânia" AND conta = "IMÓVEL" AND segmento = "Prime" AND lucroPerdido IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
      public function getIgoianiaPrimeMo()
    {
        $query = 'SELECT SUM(mora) AS total FROM `AcomPerformance` WHERE regional = "Regional Goiânia" AND conta = "IMÓVEL" AND segmento = "Prime" AND mora IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
    
    
     //$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
    //$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
     //$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
    
      //palmas Comercial ##################################################################################################
     //palmas comercial PRIME))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))
    
     public function getCpalmasVarejoLp()
    {
        $query = 'SELECT SUM(lucroPerdido) AS total FROM `AcomPerformance` WHERE regional = "Regional PALMAS"  AND conta = "COMERCIAL" AND segmento = "Varejo" AND lucroPerdido IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
      public function getCpalmasVarejoMo()
    {
        $query = 'SELECT SUM(mora) AS total FROM `AcomPerformance` WHERE regional = "Regional PALMAS"  AND conta = "COMERCIAL" AND segmento = "Varejo" AND mora IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
    
    //palmas comercial PRIME ))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))
    
     public function getCpalmasPrimeLp()
    {
        $query = 'SELECT SUM(lucroPerdido) AS total FROM `AcomPerformance` WHERE regional = "Regional PALMAS" AND conta = "COMERCIAL" AND segmento = "Prime" AND lucroPerdido IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
      public function getCpalmasPrimeMo()
    {
        $query = 'SELECT SUM(mora) AS total FROM `AcomPerformance` WHERE regional = "Regional PALMAS" AND conta = "COMERCIAL" AND segmento = "Prime" AND mora IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
    
     //palmas veiculo ##################################################################################################
     //palmas veiculo VAREJO ))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))
    
     public function getVpalmasVarejoLp()
    {
        $query = 'SELECT SUM(lucroPerdido) AS total FROM `AcomPerformance` WHERE regional = "Regional PALMAS"  AND conta = "VEICULO" AND segmento = "Varejo" AND lucroPerdido IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
      public function getVpalmasVarejoMo()
    {
        $query = 'SELECT SUM(mora) AS total FROM `AcomPerformance` WHERE regional = "Regional PALMAS"  AND conta = "VEICULO" AND segmento = "Varejo" AND mora IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
    
    //palmas veiculo PRIME ))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))
    
     public function getVpalmasPrimeLp()
    {
        $query = 'SELECT SUM(lucroPerdido) AS total FROM `AcomPerformance` WHERE regional = "Regional PALMAS" AND conta = "VEICULO" AND segmento = "Prime" AND lucroPerdido IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
      public function getVpalmasPrimeMo()
    {
        $query = 'SELECT SUM(mora) AS total FROM `AcomPerformance` WHERE regional = "Regional PALMAS" AND conta = "VEICULO" AND segmento = "Prime" AND mora IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
    
    
     //palmas imoveis ##################################################################################################
     //palmas imoveis VAREJO ))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))
    
     public function getIpalmasVarejoLp()
    {
        $query = 'SELECT SUM(lucroPerdido) AS total FROM `AcomPerformance` WHERE regional = "Regional PALMAS"  AND conta = "IMÓVEL" AND segmento = "Varejo" AND lucroPerdido IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
      public function getIpalmasVarejoMo()
    {
        $query = 'SELECT SUM(mora) AS total FROM `AcomPerformance` WHERE regional = "Regional PALMAS"  AND conta = "IMÓVEL" AND segmento = "Varejo" AND mora IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
    
    //palmas imoveis PRIME ))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))
    
     public function getIpalmasPrimeLp()
    {
        $query = 'SELECT SUM(lucroPerdido) AS total FROM `AcomPerformance` WHERE regional = "Regional PALMAS" AND conta = "IMÓVEL" AND segmento = "Prime" AND lucroPerdido IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
      public function getIpalmasPrimeMo()
    {
        $query = 'SELECT SUM(mora) AS total FROM `AcomPerformance` WHERE regional = "Regional PALMAS" AND conta = "IMÓVEL" AND segmento = "Prime" AND mora IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
    
    
    
      //$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
    //$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
     //$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
    
      //rioVerde Comercial ##################################################################################################
     //rioVerde comercial PRIME))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))
    
     public function getCrioVerdeVarejoLp()
    {
        $query = 'SELECT SUM(lucroPerdido) AS total FROM `AcomPerformance` WHERE regional = "Regional RIO VERDE"  AND conta = "COMERCIAL" AND segmento = "Varejo" AND lucroPerdido IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
      public function getCrioVerdeVarejoMo()
    {
        $query = 'SELECT SUM(mora) AS total FROM `AcomPerformance` WHERE regional = "Regional RIO VERDE"  AND conta = "COMERCIAL" AND segmento = "Varejo" AND mora IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
    
    //rioVerde comercial PRIME ))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))
    
     public function getCrioVerdePrimeLp()
    {
        $query = 'SELECT SUM(lucroPerdido) AS total FROM `AcomPerformance` WHERE regional = "Regional RIO VERDE" AND conta = "COMERCIAL" AND segmento = "Prime" AND lucroPerdido IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
      public function getCrioVerdePrimeMo()
    {
        $query = 'SELECT SUM(mora) AS total FROM `AcomPerformance` WHERE regional = "Regional RIO VERDE" AND conta = "COMERCIAL" AND segmento = "Prime" AND mora IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
    
     //rioVerde veiculo ##################################################################################################
     //rioVerde veiculo VAREJO ))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))
    
     public function getVrioVerdeVarejoLp()
    {
        $query = 'SELECT SUM(lucroPerdido) AS total FROM `AcomPerformance` WHERE regional = "Regional RIO VERDE"  AND conta = "VEICULO" AND segmento = "Varejo" AND lucroPerdido IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
      public function getVrioVerdeVarejoMo()
    {
        $query = 'SELECT SUM(mora) AS total FROM `AcomPerformance` WHERE regional = "Regional RIO VERDE"  AND conta = "VEICULO" AND segmento = "Varejo" AND mora IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
    
    //rioVerde veiculo PRIME ))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))
    
     public function getVrioVerdePrimeLp()
    {
        $query = 'SELECT SUM(lucroPerdido) AS total FROM `AcomPerformance` WHERE regional = "Regional RIO VERDE" AND conta = "VEICULO" AND segmento = "Prime" AND lucroPerdido IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
      public function getVrioVerdePrimeMo()
    {
        $query = 'SELECT SUM(mora) AS total FROM `AcomPerformance` WHERE regional = "Regional RIO VERDE" AND conta = "VEICULO" AND segmento = "Prime" AND mora IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
    
    
     //rioVerde imoveis ##################################################################################################
     //rioVerde imoveis VAREJO ))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))
    
     public function getIrioVerdeVarejoLp()
    {
        $query = 'SELECT SUM(lucroPerdido) AS total FROM `AcomPerformance` WHERE regional = "Regional RIO VERDE"  AND conta = "IMÓVEL" AND segmento = "Varejo" AND lucroPerdido IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
      public function getIrioVerdeVarejoMo()
    {
        $query = 'SELECT SUM(mora) AS total FROM `AcomPerformance` WHERE regional = "Regional RIO VERDE"  AND conta = "IMÓVEL" AND segmento = "Varejo" AND mora IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
    
    //rioVerde imoveis PRIME ))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))
    
     public function getIrioVerdePrimeLp()
    {
        $query = 'SELECT SUM(lucroPerdido) AS total FROM `AcomPerformance` WHERE regional = "Regional RIO VERDE" AND conta = "IMÓVEL" AND segmento = "Prime" AND lucroPerdido IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
      public function getIrioVerdePrimeMo()
    {
        $query = 'SELECT SUM(mora) AS total FROM `AcomPerformance` WHERE regional = "Regional RIO VERDE" AND conta = "IMÓVEL" AND segmento = "Prime" AND mora IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
    
    
      //$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
    //$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
     //$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
    
      //sinop Comercial ##################################################################################################
     //sinop comercial PRIME))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))
    
     public function getCsinopVarejoLp()
    {
        $query = 'SELECT SUM(lucroPerdido) AS total FROM `AcomPerformance` WHERE regional = "Regional SINOP"  AND conta = "COMERCIAL" AND segmento = "Varejo" AND lucroPerdido IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
      public function getCsinopVarejoMo()
    {
        $query = 'SELECT SUM(mora) AS total FROM `AcomPerformance` WHERE regional = "Regional SINOP"  AND conta = "COMERCIAL" AND segmento = "Varejo" AND mora IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
    
    //sinop comercial PRIME ))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))
    
     public function getCsinopPrimeLp()
    {
        $query = 'SELECT SUM(lucroPerdido) AS total FROM `AcomPerformance` WHERE regional = "Regional SINOP" AND conta = "COMERCIAL" AND segmento = "Prime" AND lucroPerdido IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
      public function getCsinopPrimeMo()
    {
        $query = 'SELECT SUM(mora) AS total FROM `AcomPerformance` WHERE regional = "Regional SINOP" AND conta = "COMERCIAL" AND segmento = "Prime" AND mora IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
    
     //sinop veiculo ##################################################################################################
     //sinop veiculo VAREJO ))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))
    
     public function getVsinopVarejoLp()
    {
        $query = 'SELECT SUM(lucroPerdido) AS total FROM `AcomPerformance` WHERE regional = "Regional SINOP"  AND conta = "VEICULO" AND segmento = "Varejo" AND lucroPerdido IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
      public function getVsinopVarejoMo()
    {
        $query = 'SELECT SUM(mora) AS total FROM `AcomPerformance` WHERE regional = "Regional SINOP"  AND conta = "VEICULO" AND segmento = "Varejo" AND mora IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
    
    //sinop veiculo PRIME ))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))
    
     public function getVsinopPrimeLp()
    {
        $query = 'SELECT SUM(lucroPerdido) AS total FROM `AcomPerformance` WHERE regional = "Regional SINOP" AND conta = "VEICULO" AND segmento = "Prime" AND lucroPerdido IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
      public function getVsinopPrimeMo()
    {
        $query = 'SELECT SUM(mora) AS total FROM `AcomPerformance` WHERE regional = "Regional SINOP" AND conta = "VEICULO" AND segmento = "Prime" AND mora IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
    
    
     //sinop imoveis ##################################################################################################
     //sinop imoveis VAREJO ))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))
    
     public function getIsinopVarejoLp()
    {
        $query = 'SELECT SUM(lucroPerdido) AS total FROM `AcomPerformance` WHERE regional = "Regional SINOP"  AND conta = "IMÓVEL" AND segmento = "Varejo" AND lucroPerdido IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
      public function getIsinopVarejoMo()
    {
        $query = 'SELECT SUM(mora) AS total FROM `AcomPerformance` WHERE regional = "Regional SINOP"  AND conta = "IMÓVEL" AND segmento = "Varejo" AND mora IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
    
    //sinop imoveis PRIME ))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))))
    
     public function getIsinopPrimeLp()
    {
        $query = 'SELECT SUM(lucroPerdido) AS total FROM `AcomPerformance` WHERE regional = "Regional SINOP" AND conta = "IMÓVEL" AND segmento = "Prime" AND lucroPerdido IS NOT NULL';
        return $this->db->query($query)->result_array();
    }
      public function getIsinopPrimeMo()
    {
        $query = 'SELECT SUM(mora) AS total FROM `AcomPerformance` WHERE regional = "Regional SINOP" AND conta = "IMÓVEL" AND segmento = "Prime" AND mora IS NOT NULL';
        return $this->db->query($query)->result_array();
    }

    //imagem safra
    
      public function getimgSafra()
    {
        $query = 'SELECT MAX(idAnexos) AS id, url, anexo FROM anexosSafra WHERE idAnexos = (SELECT MAX(idAnexos) FROM anexosSafra)';
        return $this->db->query($query)->result_array();
    }
    

}
