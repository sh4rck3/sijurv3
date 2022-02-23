<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Tv extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Conecte_model');
        $this->load->model('vendas_model');
        $this->load->model('tv_model');
    }

    public function index()
    {
        //$this->data['results'] = 2;
        //$this->data['results'] = $this->vendas_model->getValores();
        //$this->data['results'] = $this->tv_model->getAguardandoEncerramentoCount();
       //$this->load->view('mapos/tv');
        
        //$data['os'] = $this->Conecte_model->getLastOs($this->session->userdata('cliente_id'));
        $data['results'] = $this->tv_model->gettvteste();
        $this->load->view('mapos/tv', $data);
        
       
    }
      public function bradesco()
    {
        // comercial
        //varejo
        $data['anapolisVarejoLp'] = $this->tv_model->getComercialLpAnapolis();
        $data['anapolisVarejoMo'] = $this->tv_model->getComercialMoAnapolis();
        //prime
        $data['anapolisPrimeLp'] = $this->tv_model->getComercialLpAnapolisPrime();
        $data['anapolisPrimeMo'] = $this->tv_model->getComercialMoAnapolisPrime();
        //veiculo
        //varejo
        $data['getVAnapolisVarejoLp'] = $this->tv_model->getVAnapolisVarejoLp();
        $data['getVAnapolisVarejoMo'] = $this->tv_model->getVAnapolisVarejoMo();
         //prime
        $data['getVAnapolisPrimeLp'] = $this->tv_model->getVAnapolisPrimeLp();
        $data['getVAnapolisPrimeMo'] = $this->tv_model->getVAnapolisPrimeMo();
        //imovel
        //varejo
        $data['getIAnapolisVarejoLp'] = $this->tv_model->getIAnapolisVarejoLp();
        $data['getIAnapolisVarejoMo'] = $this->tv_model->getIAnapolisVarejoMo();
         //prime
        $data['getIAnapolisPrimeLp'] = $this->tv_model->getIAnapolisPrimeLp();
        $data['getIAnapolisPrimeMo'] = $this->tv_model->getIAnapolisPrimeMo();
        
        $this->load->view('mapos/bradescoTv', $data);
        
       
    }

    public function sair()
    {
        $this->session->sess_destroy();
        redirect('tv');
    }
    
    
      public function brasiliaNorte()
    {
        // comercial
        //  //varejo
        $data['getCBrasilianVarejoLp'] = $this->tv_model->getCBrasilianVarejoLp();
        $data['getCBrasilianVarejoMo'] = $this->tv_model->getCBrasilianVarejoMo();
         //prime
        $data['getCBrasilianPrimeLp'] = $this->tv_model->getCBrasilianPrimeLp();
        $data['getCBrasilianPrimeMo'] = $this->tv_model->getCBrasilianPrimeMo();
        
        // veiculo
        //  //varejo
        $data['getVBrasilianVarejoLp'] = $this->tv_model->getVBrasilianVarejoLp();
        $data['getVBrasilianVarejoMo'] = $this->tv_model->getVBrasilianVarejoMo();
         //prime
        $data['getVBrasilianPrimeLp'] = $this->tv_model->getVBrasilianPrimeLp();
        $data['getVBrasilianPrimeMo'] = $this->tv_model->getVBrasilianPrimeMo();
        
         // imoveis
        //  //varejo
        $data['getIBrasilianVarejoLp'] = $this->tv_model->getIBrasilianVarejoLp();
        $data['getIBrasilianVarejoMo'] = $this->tv_model->getIBrasilianVarejoMo();
         //prime
        $data['getIBrasilianPrimeLp'] = $this->tv_model->getIBrasilianPrimeLp();
        $data['getIBrasilianPrimeMo'] = $this->tv_model->getIBrasilianPrimeMo();
        
        $this->load->view('tv/brasiliaNorte', $data);
        
       
    }
    
      public function brasiliaSul()
    {
        // comercial
        //  //varejo
        $data['getCBrasiliasVarejoLp'] = $this->tv_model->getCBrasiliasVarejoLp();
        $data['getCBrasiliasVarejoMo'] = $this->tv_model->getCBrasiliasVarejoMo();
         //prime
        $data['getCBrasiliasPrimeLp'] = $this->tv_model->getCBrasiliasPrimeLp();
        $data['getCBrasiliasPrimeMo'] = $this->tv_model->getCBrasiliasPrimeMo();
        
        // veiculo
        //  //varejo
        $data['getVBrasiliasVarejoLp'] = $this->tv_model->getVBrasiliasVarejoLp();
        $data['getVBrasiliasVarejoMo'] = $this->tv_model->getVBrasiliasVarejoMo();
         //prime
        $data['getVBrasiliasPrimeLp'] = $this->tv_model->getVBrasiliasPrimeLp();
        $data['getVBrasiliasPrimeMo'] = $this->tv_model->getVBrasiliasPrimeMo();
        
         // imoveis
        //  //varejo
        $data['getIBrasiliasVarejoLp'] = $this->tv_model->getIBrasiliasVarejoLp();
        $data['getIBrasiliasVarejoMo'] = $this->tv_model->getIBrasiliasVarejoMo();
         //prime
        $data['getIBrasiliasPrimeLp'] = $this->tv_model->getIBrasiliasPrimeLp();
        $data['getIBrasiliasPrimeMo'] = $this->tv_model->getIBrasiliasPrimeMo();
        
        $this->load->view('tv/brasiliaSul', $data);
        
       
    }
    
      public function campoGrandeN()
    {
        // comercial
        //  //varejo
        $data['getCcampoGrandeNVarejoLp'] = $this->tv_model->getCcampoGrandeNVarejoLp();
        $data['getCcampoGrandeNVarejoMo'] = $this->tv_model->getCcampoGrandeNVarejoMo();
         //prime
        $data['getCcampoGrandeNPrimeLp'] = $this->tv_model->getCcampoGrandeNPrimeLp();
        $data['getCcampoGrandeNPrimeMo'] = $this->tv_model->getCcampoGrandeNPrimeMo();
        
        // veiculo
        //  //varejo
        $data['getVcampoGrandeNVarejoLp'] = $this->tv_model->getVcampoGrandeNVarejoLp();
        $data['getVcampoGrandeNVarejoMo'] = $this->tv_model->getVcampoGrandeNVarejoMo();
         //prime
        $data['getVcampoGrandeNPrimeLp'] = $this->tv_model->getVcampoGrandeNPrimeLp();
        $data['getVcampoGrandeNPrimeMo'] = $this->tv_model->getVcampoGrandeNPrimeMo();
        
         // imoveis
        //  //varejo
        $data['getIcampoGrandeNVarejoLp'] = $this->tv_model->getIcampoGrandeNVarejoLp();
        $data['getIcampoGrandeNVarejoMo'] = $this->tv_model->getIcampoGrandeNVarejoMo();
         //prime
        $data['getIcampoGrandeNPrimeLp'] = $this->tv_model->getIcampoGrandeNPrimeLp();
        $data['getIcampoGrandeNPrimeMo'] = $this->tv_model->getIcampoGrandeNPrimeMo();
        
        $this->load->view('tv/campoGrandeN', $data);
        
       
    }
    
       public function campoGrandeS()
    {
        // comercial
        //  //varejo
        $data['getCcampoGrandeSVarejoLp'] = $this->tv_model->getCcampoGrandeSVarejoLp();
        $data['getCcampoGrandeSVarejoMo'] = $this->tv_model->getCcampoGrandeSVarejoMo();
         //prime
        $data['getCcampoGrandeSPrimeLp'] = $this->tv_model->getCcampoGrandeSPrimeLp();
        $data['getCcampoGrandeSPrimeMo'] = $this->tv_model->getCcampoGrandeSPrimeMo();
        
        // veiculo
        //  //varejo
        $data['getVcampoGrandeSVarejoLp'] = $this->tv_model->getVcampoGrandeSVarejoLp();
        $data['getVcampoGrandeSVarejoMo'] = $this->tv_model->getVcampoGrandeSVarejoMo();
         //prime
        $data['getVcampoGrandeSPrimeLp'] = $this->tv_model->getVcampoGrandeSPrimeLp();
        $data['getVcampoGrandeSPrimeMo'] = $this->tv_model->getVcampoGrandeSPrimeMo();
        
         // imoveis
        //  //varejo
        $data['getIcampoGrandeSVarejoLp'] = $this->tv_model->getIcampoGrandeSVarejoLp();
        $data['getIcampoGrandeSVarejoMo'] = $this->tv_model->getIcampoGrandeSVarejoMo();
         //prime
        $data['getIcampoGrandeSPrimeLp'] = $this->tv_model->getIcampoGrandeSPrimeLp();
        $data['getIcampoGrandeSPrimeMo'] = $this->tv_model->getIcampoGrandeSPrimeMo();
        
        $this->load->view('tv/campoGrandeS', $data);
        
       
    }
    
      public function cuiaba()
    {
        // comercial
        //  //varejo
        $data['getCcuiabaVarejoLp'] = $this->tv_model->getCcuiabaVarejoLp();
        $data['getCcuiabaVarejoMo'] = $this->tv_model->getCcuiabaVarejoMo();
         //prime
        $data['getCcuiabaPrimeLp'] = $this->tv_model->getCcuiabaPrimeLp();
        $data['getCcuiabaPrimeMo'] = $this->tv_model->getCcuiabaPrimeMo();
        
        // veiculo
        //  //varejo
        $data['getVcuiabaVarejoLp'] = $this->tv_model->getVcuiabaVarejoLp();
        $data['getVcuiabaVarejoMo'] = $this->tv_model->getVcuiabaVarejoMo();
         //prime
        $data['getVcuiabaPrimeLp'] = $this->tv_model->getVcuiabaPrimeLp();
        $data['getVcuiabaPrimeMo'] = $this->tv_model->getVcuiabaPrimeMo();
        
         // imoveis
        //  //varejo
        $data['getIcuiabaVarejoLp'] = $this->tv_model->getIcuiabaVarejoLp();
        $data['getIcuiabaVarejoMo'] = $this->tv_model->getIcuiabaVarejoMo();
         //prime
        $data['getIcuiabaPrimeLp'] = $this->tv_model->getIcuiabaPrimeLp();
        $data['getIcuiabaPrimeMo'] = $this->tv_model->getIcuiabaPrimeMo();
        
        $this->load->view('tv/cuiaba', $data);
        
       
    }
    
      public function goiania()
    {
        // comercial
        //  //varejo
        $data['getCgoianiaVarejoLp'] = $this->tv_model->getCgoianiaVarejoLp();
        $data['getCgoianiaVarejoMo'] = $this->tv_model->getCgoianiaVarejoMo();
         //prime
        $data['getCgoianiaPrimeLp'] = $this->tv_model->getCgoianiaPrimeLp();
        $data['getCgoianiaPrimeMo'] = $this->tv_model->getCgoianiaPrimeMo();
        
        // veiculo
        //  //varejo
        $data['getVgoianiaVarejoLp'] = $this->tv_model->getVgoianiaVarejoLp();
        $data['getVgoianiaVarejoMo'] = $this->tv_model->getVgoianiaVarejoMo();
         //prime
        $data['getVgoianiaPrimeLp'] = $this->tv_model->getVgoianiaPrimeLp();
        $data['getVgoianiaPrimeMo'] = $this->tv_model->getVgoianiaPrimeMo();
        
         // imoveis
        //  //varejo
        $data['getIgoianiaVarejoLp'] = $this->tv_model->getIgoianiaVarejoLp();
        $data['getIgoianiaVarejoMo'] = $this->tv_model->getIgoianiaVarejoMo();
         //prime
        $data['getIgoianiaPrimeLp'] = $this->tv_model->getIgoianiaPrimeLp();
        $data['getIgoianiaPrimeMo'] = $this->tv_model->getIgoianiaPrimeMo();
        
        $this->load->view('tv/goiania', $data);
        
       
    }
    
      public function palmas()
    {
        // comercial
        //  //varejo
        $data['getCpalmasVarejoLp'] = $this->tv_model->getCpalmasVarejoLp();
        $data['getCpalmasVarejoMo'] = $this->tv_model->getCpalmasVarejoMo();
         //prime
        $data['getCpalmasPrimeLp'] = $this->tv_model->getCpalmasPrimeLp();
        $data['getCpalmasPrimeMo'] = $this->tv_model->getCpalmasPrimeMo();
        
        // veiculo
        //  //varejo
        $data['getVpalmasVarejoLp'] = $this->tv_model->getVpalmasVarejoLp();
        $data['getVpalmasVarejoMo'] = $this->tv_model->getVpalmasVarejoMo();
         //prime
        $data['getVpalmasPrimeLp'] = $this->tv_model->getVpalmasPrimeLp();
        $data['getVpalmasPrimeMo'] = $this->tv_model->getVpalmasPrimeMo();
        
         // imoveis
        //  //varejo
        $data['getIpalmasVarejoLp'] = $this->tv_model->getIpalmasVarejoLp();
        $data['getIpalmasVarejoMo'] = $this->tv_model->getIpalmasVarejoMo();
         //prime
        $data['getIpalmasPrimeLp'] = $this->tv_model->getIpalmasPrimeLp();
        $data['getIpalmasPrimeMo'] = $this->tv_model->getIpalmasPrimeMo();
        
        $this->load->view('tv/palmas', $data);
        
       
    }
    
       public function rioVerde()
    {
        // comercial
        //  //varejo
        $data['getCrioVerdeVarejoLp'] = $this->tv_model->getCrioVerdeVarejoLp();
        $data['getCrioVerdeVarejoMo'] = $this->tv_model->getCrioVerdeVarejoMo();
         //prime
        $data['getCrioVerdePrimeLp'] = $this->tv_model->getCrioVerdePrimeLp();
        $data['getCrioVerdePrimeMo'] = $this->tv_model->getCrioVerdePrimeMo();
        
        // veiculo
        //  //varejo
        $data['getVrioVerdeVarejoLp'] = $this->tv_model->getVrioVerdeVarejoLp();
        $data['getVrioVerdeVarejoMo'] = $this->tv_model->getVrioVerdeVarejoMo();
         //prime
        $data['getVrioVerdePrimeLp'] = $this->tv_model->getVrioVerdePrimeLp();
        $data['getVrioVerdePrimeMo'] = $this->tv_model->getVrioVerdePrimeMo();
        
         // imoveis
        //  //varejo
        $data['getIrioVerdeVarejoLp'] = $this->tv_model->getIrioVerdeVarejoLp();
        $data['getIrioVerdeVarejoMo'] = $this->tv_model->getIrioVerdeVarejoMo();
         //prime
        $data['getIrioVerdePrimeLp'] = $this->tv_model->getIrioVerdePrimeLp();
        $data['getIrioVerdePrimeMo'] = $this->tv_model->getIrioVerdePrimeMo();
        
        $this->load->view('tv/rioVerde', $data);
        
       
    }

    
      public function sinop()
    {
        // comercial
        //  //varejo
        $data['getCsinopVarejoLp'] = $this->tv_model->getCsinopVarejoLp();
        $data['getCsinopVarejoMo'] = $this->tv_model->getCsinopVarejoMo();
         //prime
        $data['getCsinopPrimeLp'] = $this->tv_model->getCsinopPrimeLp();
        $data['getCsinopPrimeMo'] = $this->tv_model->getCsinopPrimeMo();
        
        // veiculo
        //  //varejo
        $data['getVsinopVarejoLp'] = $this->tv_model->getVsinopVarejoLp();
        $data['getVsinopVarejoMo'] = $this->tv_model->getVsinopVarejoMo();
         //prime
        $data['getVsinopPrimeLp'] = $this->tv_model->getVsinopPrimeLp();
        $data['getVsinopPrimeMo'] = $this->tv_model->getVsinopPrimeMo();
        
         // imoveis
        //  //varejo
        $data['getIsinopVarejoLp'] = $this->tv_model->getIsinopVarejoLp();
        $data['getIsinopVarejoMo'] = $this->tv_model->getIsinopVarejoMo();
         //prime
        $data['getIsinopPrimeLp'] = $this->tv_model->getIsinopPrimeLp();
        $data['getIsinopPrimeMo'] = $this->tv_model->getIsinopPrimeMo();
        
        $this->load->view('tv/sinop', $data);
        
       
    }
    
      public function safra()
    {
         //prime
        //$data['getIsinopPrimeLp'] = $this->tv_model->getIsinopPrimeLp();
        $data['safraImg'] = $this->tv_model->getimgSafra();
//        $this->load->model('Os_model');
//        $data['teste'] = $this->Os_model->getTv('anexosSafra');
        
        $this->load->view('tv/safra', $data);
        
       
    }

    
}
