<link href="<?= base_url('assets/css/custom.css'); ?>" rel="stylesheet">
<div class="row-fluid" style="margin-top: 0">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="fas fa-diagnoses"></i>
                </span>
                <h5>Informações do GCPJ</h5>
                <div class="buttons">
                    

                    <a target="_blank" title="Imprimir OS" class="btn btn-mini btn-inverse"
                       href="<?php echo site_url() ?>/bradesco/imprimir/<?php echo $result->idBradesco; ?>"><i
                                class="fas fa-print"></i> Imprimir A4</a>
                    
                    

                    
                    
                </div>
            </div>
            <div class="widget-content" id="printOs">
                <div class="invoice-content">
                    <div class="invoice-head" style="margin-bottom: 0">

                     

                        <table class="table table-condensend">
                            <tbody>
                            <tr>
                                <td style="width: 50%; padding-left: 0">
                                    <ul>
                                        <li>
                                                <span>
                                                    <h5><b>CLIENTE</b></h5>
                                                    <span><b>GCPJ:</b><i>  <?php echo $result->GCPJ ?></i></span><br/>
                                                    <span><b>Cliente:</b>  <i><?php echo $result->CLIENTE ?></i></span><br/>
                                                    <span><b>Agência:</b> <?php echo $result->AGENCIA ?></span><br>
                                                    <span><b>Conta: </b><?php echo $result->CONTA ?></span><br>
                                                    <span><b>Carteira:</b> <?php echo $result->CARTEIRA ?></span><br>
                                                    <span><b>Contato: </b><?php echo $result->CONTRATO ?></span>
                                        </li>
                                    </ul>
                                </td>
                                <td style="width: 50%; padding-left: 0">
                                    <ul>
                                        <li>
                                                <span>
                                                    <h5><b>Informações</b></h5>
                                                </span>
                                            <span></span> <br/>
                                            <span><b>Responsável pela inicial: </b><?php echo $result->RESP_INICIAL ?> </span><br/>
                                            <span><b>Editado/Criado por: </b><?php echo $result->RESPONSAVEL ?></span><br>
                                            <span><b>Data da ultima edição/alteração: </b><?php echo $result->data_tempo ?></span>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <table class="table table-condensend">
                            <tbody>
                            <tr>
                                <td style="width: 50%; padding-left: 0">
                                    <ul>
                                        <li>
                                                <span>
                                                    <h5><b>Informações do processo</b></h5>
                                                    
                                                    <span><b>Status:</b> <?php echo $result->STATUS ?></span><br>
                                                    <span><b>Observação: </b><?php echo $result->OBS ?></span><br>
                                                    <span><b>Situação:</b> <?php echo $result->SITUAC ?></span><br>
                                                    <span><b>Iniciais: </b><?php echo $result->situacao_iniciais ?></span><br>
                                                    <span><b>Data de Ret.Controladoria: </b><?php if (!$result->DT_RET_CONTROL){echo 'Sem data definida';}else{echo $result->DT_RET_CONTROL; } ?></span><br>
                                                    <span><b>Observação (Histórico): </b><?php if (!$result->OBSERVACAO){echo 'Sem informação';}else{echo $result->OBSERVACAO; }  ?> </span><br/>
                                                    <span><b>Data do Ajuizamento: </b><?php if (!$result->DT_AJUIZ){echo 'Sem informação';}else{echo $result->DT_AJUIZ; }  ?> </span><br/>
                                        </li>
                                    </ul>
                                </td>
                                <td style="width: 50%; padding-left: 0">
                                    <ul>
                                        <li>
                                                <span>
                                                    <h5><b></b></h5>
                                                </span>
                                            <span></span> <br/>
                                            
                                   
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                            </tbody>
                        </table>

                    </div>

                    
                </div>
            </div>
        </div>
    </div>
</div>






