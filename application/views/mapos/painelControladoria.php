<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) {
    //echo 'tem permissão';
    ?>
<!--   personalizado -->
<div class="row-fluid" style="margin-top: 0">

    <div class="span12">
        
        <div class="widget-box">
            <div class="widget-title"><span class="icon"><i class="icon-signal"></i></span><h5>Registros por mes</h5></div>
            <div class="widget-content">
                <div class="row-fluid">
                     <div class="widget-box"><h5>Entrada de registros por mes</h5></div>
                    <div class="span12" >
                        <?php
                         //var_dump($total_contratosUF);
                        if($porMes != null){
                                    foreach ($porMes as $c) {
                                        //echo $c->REGISTROS;
                                        switch ($c->ENTRADA_MES) {
                                    case '1':
                                        $mes_sel = 'Janeiro';
                                        break;
                                    case '2':
                                       $mes_sel = 'Fevereiro';
                                        break;
                                    case '3':
                                        $mes_sel = 'Março';
                                        break;
                                    case '4':
                                       $mes_sel = 'Abril';
                                        break;
                                    case '5':
                                       $mes_sel = 'Maio';
                                        break;
                                    case '6':
                                       $mes_sel = 'Junho';
                                        break;
                                    case '7':
                                        $mes_sel = 'Julho';
                                        break;
                                    case '8':
                                        $mes_sel = 'Agosto';
                                        break;
                                    case '9':
                                       $mes_sel = 'Setembro';
                                        break;
                                    case '10':
                                        $mes_sel = 'Outubro';
                                        break;
                                    case '11':
                                        $mes_sel = 'Novembro';
                                        break;
                                    case '12':
                                        $mes_sel = 'Dezembro';
                                        break;
                                    default:
                                        $cor = '#E0E4CC';
                                        break;
                                }
                               if(empty($mes_sel)){
                                   $mes_sel = 'sem mes';
                               }
                                        echo '<div style="float: left; margin-left: 20px; height: 100px; width: 150px; ">';
                                        
                                            echo '<table class="table table-bordered ">';
                                                echo '<tr>';
                                                    echo '<th style="font-size: 15px;">'.$mes_sel.'</th>';
                                                                                                   
                                                echo '<tr>';
                                                 echo '<tr>';
                                                    echo '<td style="text-align: center; font-size: 18px;"><a href="'.base_url().'index.php/bradesco/gerenciarMes?pesquisa='.$c->ENTRADA_MES.'"><b>'.$c->QUANTIDADE_MES.'</b></a></td>';
                                                                                                   
                                                echo '<tr>';

                                            echo '</table>';
                            
                                        echo '</div>';
                                    }            
                                    }else{
                                        echo 'Nenhuma registro em aberto'; 
                                        
                                    }
                        
                        ?>
                    </div>
                     <div class="widget-box"><h5>Status "PENDENTE" por mes</h5></div>
                    <div class="span12" >
                        <?php
                         //var_dump($total_contratosUF);
                        if($porMesStatus != null){
                                    foreach ($porMesStatus as $c) {
                                        //echo $c->REGISTROS;
                                        switch ($c->MES) {
                                    case '1':
                                        $mes_sel2 = 'Janeiro';
                                        break;
                                    case '2':
                                       $mes_sel2 = 'Fevereiro';
                                        break;
                                    case '3':
                                        $mes_sel2 = 'Março';
                                        break;
                                    case '4':
                                       $mes_sel2 = 'Abril';
                                        break;
                                    case '5':
                                       $mes_sel2 = 'Maio';
                                        break;
                                    case '6':
                                       $mes_sel2 = 'Junho';
                                        break;
                                    case '7':
                                        $mes_sel2 = 'Julho';
                                        break;
                                    case '8':
                                        $mes_sel2 = 'Agosto';
                                        break;
                                    case '9':
                                       $mes_sel2 = 'Setembro';
                                        break;
                                    case '10':
                                        $mes_sel2 = 'Outubro';
                                        break;
                                    case '11':
                                        $mes_sel2 = 'Novembro';
                                        break;
                                    case '12':
                                        $mes_sel2 = 'Dezembro';
                                        break;
                                    default:
                                        $cor = '#E0E4CC';
                                        break;
                                }
                                        echo '<div style="float: left; margin-left: 20px; height: 100px; width: 150px; ">';
                                        
                                            echo '<table class="table table-bordered ">';
                                                echo '<tr>';
                                                    echo '<th style="font-size: 15px;">'.$mes_sel2.'</th>';
                                                                                                   
                                                echo '<tr>';
                                                 echo '<tr>';
                                                    echo '<td style="text-align: center; font-size: 18px;"><a href="'.base_url().'index.php/bradesco/gerenciarMes?pesquisa='.$c->MES.'&pendente=PENDENTE"><b>'.$c->QT.'</b></a></td>';
                                                                                                   
                                                echo '<tr>';

                                            echo '</table>';
                            
                                        echo '</div>';
                                    }            
                                    }else{
                                        echo 'Nenhuma registro em aberto'; 
                                        
                                    }
                        
                        ?>
                    </div>
                     
                     <div class="widget-box"><h5>Status "AJUIZADO" e "OK NO PRAZO" por mes</h5></div>
                    <div class="span12" >
                        <?php
                         //var_dump($total_contratosUF);
                        if($porMesAjuizado != null){
                                    foreach ($porMesAjuizado as $c) {
                                        //echo $c->REGISTROS;
                                        switch ($c->MES) {
                                    case '1':
                                        $mes_sel3 = 'Janeiro';
                                        break;
                                    case '2':
                                       $mes_sel3 = 'Fevereiro';
                                        break;
                                    case '3':
                                        $mes_sel3 = 'Março';
                                        break;
                                    case '4':
                                       $mes_sel3 = 'Abril';
                                        break;
                                    case '5':
                                       $mes_sel3 = 'Maio';
                                        break;
                                    case '6':
                                       $mes_sel3 = 'Junho';
                                        break;
                                    case '7':
                                        $mes_sel3 = 'Julho';
                                        break;
                                    case '8':
                                        $mes_sel3 = 'Agosto';
                                        break;
                                    case '9':
                                       $mes_sel3 = 'Setembro';
                                        break;
                                    case '10':
                                        $mes_sel3 = 'Outubro';
                                        break;
                                    case '11':
                                        $mes_sel3 = 'Novembro';
                                        break;
                                    case '12':
                                        $mes_sel3 = 'Dezembro';
                                        break;
                                    default:
                                        $cor = '#E0E4CC';
                                        break;
                                }
                                        echo '<div style="float: left; margin-left: 20px; height: 100px; width: 150px; ">';
                                        
                                            echo '<table class="table table-bordered ">';
                                                echo '<tr>';
                                                    echo '<th style="font-size: 15px;">'.$mes_sel3.'</th>';
                                                                                                   
                                                echo '<tr>';
                                                 echo '<tr>';
                                                    echo '<td style="text-align: center; font-size: 18px;"><a href="'.base_url().'index.php/bradesco/gerenciarMes?pesquisa='.$c->MES.'&pendente=Ajuizado"><b>'.$c->QT.'</b></a></td>';
                                                                                                   
                                                echo '<tr>';

                                            echo '</table>';
                            
                                        echo '</div>';
                                    }            
                                    }else{
                                        echo 'Nenhuma registro em aberto'; 
                                        
                                    }
                        
                        ?>
                    </div>
                    
                     <div class="widget-box"><h5>Status "Encerrado" por mes</h5></div>
                    <div class="span12" >
                        <?php
                         //var_dump($total_contratosUF);
                        if($porMesEncerrado != null){
                                    foreach ($porMesEncerrado as $c) {
                                        //echo $c->REGISTROS;
                                        switch ($c->MES) {
                                    case '1':
                                        $mes_sel3 = 'Janeiro';
                                        break;
                                    case '2':
                                       $mes_sel3 = 'Fevereiro';
                                        break;
                                    case '3':
                                        $mes_sel3 = 'Março';
                                        break;
                                    case '4':
                                       $mes_sel3 = 'Abril';
                                        break;
                                    case '5':
                                       $mes_sel3 = 'Maio';
                                        break;
                                    case '6':
                                       $mes_sel3 = 'Junho';
                                        break;
                                    case '7':
                                        $mes_sel3 = 'Julho';
                                        break;
                                    case '8':
                                        $mes_sel3 = 'Agosto';
                                        break;
                                    case '9':
                                       $mes_sel3 = 'Setembro';
                                        break;
                                    case '10':
                                        $mes_sel3 = 'Outubro';
                                        break;
                                    case '11':
                                        $mes_sel3 = 'Novembro';
                                        break;
                                    case '12':
                                        $mes_sel3 = 'Dezembro';
                                        break;
                                    default:
                                        $cor = '#E0E4CC';
                                        break;
                                }
                                        echo '<div style="float: left; margin-left: 20px; height: 100px; width: 150px; ">';
                                        
                                            echo '<table class="table table-bordered ">';
                                                echo '<tr>';
                                                    echo '<th style="font-size: 15px;">'.$mes_sel3.'</th>';
                                                                                                   
                                                echo '<tr>';
                                                 echo '<tr>';
                                                    echo '<td style="text-align: center; font-size: 18px;"><a href="'.base_url().'index.php/bradesco/gerenciarMes?pesquisa='.$c->MES.'&pendente=ENCERRADO"><b>'.$c->QT.'</b></a></td>';
                                                                                                   
                                                echo '<tr>';

                                            echo '</table>';
                            
                                        echo '</div>';
                                    }            
                                    }else{
                                        echo 'Nenhuma registro em aberto'; 
                                        
                                    }
                        
                        ?>
                    </div>
            
                </div>
               
             
            </div>
            
        </div>
        
    </div>
</div>
<!--fim personalozado-->
<div class="row-fluid" style="margin-top: 0">

    <div class="span12">

        <div class="widget-box">
            <div class="widget-title"><span class="icon"><i class="fas fa-signal"></i></span>
                <h5>Base Geral Bradesco</h5>
            </div>
            <div class="widget-content">
                <div class="row-fluid">
                    <div class="span12">
                        <ul class="site-stats">
                            <label>Controladoria</label>
                            <li class="bg_lh"><i class="fas fa-users"></i> <strong>
                                    <?= $this->db->count_all('bradesco_analitico'); ?></strong> <small>Total de contratos Bradesco</small></li>
                            <li class="bg_lh"><a href="http://sijur.dunice.net/index.php/bradesco/pesquisapainel?pesquisa=AJUIZADO" style="color: white;"><i class="fas fa-shopping-bag"></i> <strong>
                                    <?php print_r($ajuizados); ?></strong> <small>Ajuizados </small></a></li>
                            <li class="bg_lh"><a href="http://sijur.dunice.net/index.php/bradesco/pesquisapainel?pesquisa=ENCERRADO" style="color: white;"><i class="fas fa-diagnoses"></i> <strong>
                                    <?php print_r($encerrados); ?></strong> <small>Encerrados</small></a></li>
                            <li class="bg_lh"><a href="http://sijur.dunice.net/index.php/bradesco/pesquisapainelstatus?pesquisa=Pendente" style="color: white;"><i class="fas fa-wrench"></i> <strong>
                                    <?php print_r($pendentes); ?></strong> <small>Pendentes ->(Campo: STATUS)</small></a></li>
                            <hr>
                            <label>Pré  Jurídico</label>
                            <?php
                         //var_dump($total_contratosUF);
                        if($painelPreJuridico != null){
                                    foreach ($painelPreJuridico as $c) {
                                        echo '<li class="bg_lh">';
                                                echo '<a href="http://sijur.dunice.net/index.php/bradesco/pesquisapainel?pesquisa='.$c->OBS.'" style="color: white;">';
                                                    echo '<i class="fas fa-wrench"></i>';
                                                    echo '<strong>'.$c->QT.'</strong>';
                                                    echo '<small>'.$c->OBS.'</small>';           
                                                echo '</a>';
                                        echo '</li>';
                                    }            
                                    }else{
                                        echo 'Nenhuma registro em aberto'; 
                                        
                                    }
                        
                        ?>
                                                      
                            <label>Jurídico</label>
                            <li class="bg_lh"><a href="http://sijur.dunice.net/index.php/bradesco/pesquisapainel?pesquisa=CARTORÁRIO" style="color: white;"><i class="fas fa-wrench"></i> <strong>
                                    <?php print_r($situacaoAjuizado); ?></strong> <small>CARTORÁRIO</small></a></li>

                        </ul>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="row-fluid" style="margin-top: 0">

    <div class="span12">

        <div class="widget-box">
            <div class="widget-title"><span class="icon"><i class="fas fa-signal"></i></span>
                <h5>Iniciais Pendentes</h5>
            </div>
            <div class="widget-content">
                <div class="row-fluid">
                    <div class="span12">
                        <ul class="site-stats">
                            <label>Controle de iniciais</label>
                             <li class="bg_lh"><a href="http://sijur.dunice.net/index.php/bradesco/userpendente?pesquisa=Luiz+Eduardo" style="color: white;"><i class="fas fa-diagnoses"></i> <strong>
                                    <?php print_r($devedor1Count); ?></strong> <small>Luiz Eduardo</small></a></li>
                            <li class="bg_lh"><a href="http://sijur.dunice.net/index.php/bradesco/userpendente?pesquisa=Erika+Alencar" style="color: white;"><i class="fas fa-diagnoses"></i> <strong>
                                    <?php print_r($devedor2Count); ?></strong> <small>Erika Alencar</small></a></li>
                            <li class="bg_lh"><a href="http://sijur.dunice.net/index.php/bradesco/userpendente?pesquisa=Sarah+Silva" style="color: white;"><i class="fas fa-diagnoses"></i> <strong>
                                    <?php print_r($devedor3Count); ?></strong> <small>Sarah Silva</small></a></li>
                            <li class="bg_lh"><a href="http://sijur.dunice.net/index.php/bradesco/userpendente?pesquisa=Thainá+Sousa" style="color: white;"><i class="fas fa-diagnoses"></i> <strong>
                                    <?php print_r($devedor4Count); ?></strong> <small>Thainá Sousa</small></a></li>
                            

                        </ul>

                    </div>
                    
<!--                  <table class="table table-bordered ">
                        <thead>
                            <tr style="background-color: #2D335B">
                               
                                <th>GCPJ</th>
                                <th>Cliente</th>
                                <th>Data Ret.Controladoria</th>
                                <th>Dias de Vida</th>
                                <th>Status</th>
                                <th>Responsável Inicial</th>
                                <th>Iniciais</th>

                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            if (!$tarefas) {
                                echo '<tr>
                                            <td colspan="10">Nenhum Registro ainda</td>
                                          </tr>';
                            }
                            $this->load->model('bradesco_model');
                            //var_dump($results);
                            foreach ($tarefas as $r) {
        //                        $dataInicial = date(('d/m/Y'), strtotime($r->dataInicial));
        //                        if ($r->dataFinal != null) {
        //                            $dataFinal = date(('d/m/Y'), strtotime($r->dataFinal));
        //                        } else {
        //                            $dataFinal = "";
        //                        }
        //                        if ($this->input->get('pesquisa') === null && is_array(json_decode($configuration['os_status_list']))) {
        //                            if (in_array($r->status, json_decode($configuration['os_status_list'])) != true) {
        //                                continue;
        //                            }
        //                        }

                                switch ($r->STATUS) {
                                    case 'AJUIZADO':
                                        $cor = '#00cd00';
                                        break;
                                    case 'Pendente':
                                        $cor = '#B22222';
                                        break;
                                    case 'Orçamento':
                                        $cor = '#CDB380';
                                        break;
                                    case 'Negociação':
                                        $cor = '#AEB404';
                                        break;
                                    case 'Cancelado':
                                        $cor = '#CD0000';
                                        break;
                                    case 'OK NO PRAZO':
                                        $cor = '#256';
                                        break;
                                    case 'Faturado':
                                        $cor = '#B266FF';
                                        break;
                                    case 'Aguardando Peças':
                                        $cor = '#FF7F00';
                                        break;
                                    default:
                                        $cor = '#E0E4CC';
                                        break;
                                }

                                switch ($r->situacao_iniciais) {
                                    case 'AGUARDANDO ENCERRAMENTO':
                                        $cor2 = '#DAA520';
                                        break;
                                    case 'Pendente':
                                        $cor2 = '#B22222';
                                        break;
                                    case 'AGUARDANDO PGTO DE CUSTAS':
                                        $cor2 = '#CDB380';
                                        break;
                                    case 'PRE-ANÁLISE':
                                        $cor2 = '#008000';
                                        break;
                                    case 'EM FASE DE NOTIFICAÇÃO':
                                        $cor2 = '#8B4513';
                                        break;
                                    case 'EM ANÁLISE DA DOCUMENTAÇÃO':
                                        $cor2 = '#256';
                                        break;
                                    case 'CORREÇÃO':
                                        $cor2 = '#B266FF';
                                        break;
                                    case 'VAI AJUIZAR':
                                        $cor2 = '#7FFF00';
                                        break;
                                     case 'PROTESTO':
                                        $cor2 = '#363636';
                                        break;
                                    default:
                                        $cor2 = '#E0E4CC';
                                        break;
                                }
        //                        $vencGarantia = '';
        //
        //                        if ($r->garantia && is_numeric($r->garantia)) {
        //                            $vencGarantia = dateInterval($r->dataFinal, $r->garantia);
        //                        }

                                echo '<tr>';
                                
                                 echo '<td>' . $r->GCPJ . '</td>';
                                  echo '<td>' . $r->CLIENTE . '</td>';
                                echo '<td>' . date('d/m/Y', strtotime($r->DT_RET_CONTROL)) . '</td>';
                                echo '<td>' . $r->lifeTime . '</td>';

                             echo '<td><span class="badge" style="background-color: ' . $cor . '; border-color: ' . $cor . '">' . $r->STATUS . '</span> </td>';
                             echo '<td>' . $r->RESP_INICIAL . '</td>';
                             echo '<td><span class="badge" style="background-color: ' . $cor2 . '; border-color: ' . $cor2 . '">' . $r->situacao_iniciais . '</span> </td>';
                              //  echo '<td>' . $r->refGarantia . '</td>';
                               echo '<td>';
        //
        //                        $editavel = $this->os_model->isEditable($r->idOs);
        //
                                if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) {
                                    echo '<a style="margin-right: 1%" href="' . base_url() . 'index.php/bradesco/visualizar/' . $r->idBradesco . '" class="btn tip-top" title="Ver mais detalhes"><i class="fas fa-eye"></i></a>';
                                }
                                if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) {
                                    echo '<a style="margin-right: 1%" href="' . base_url() . 'index.php/bradesco/editar/' . $r->idBradesco . '" class="btn btn-info tip-top" title="Editar OS"><i class="fas fa-edit"></i></a>';
                                }
                                if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) {
                                    echo '<a href="#modal-excluir" role="button" data-toggle="modal" os="' . $r->idBradesco . '" class="btn btn-danger tip-top" title="Excluir OS"><i class="fas fa-trash-alt"></i></a>  ';
                                }
                                echo '</td>';
                                //echo '</tr>';
                           } ?>
                        </tbody>
                    </table>  -->

                </div>
            </div>
        </div>
    </div>
</div>

<?php
}?>