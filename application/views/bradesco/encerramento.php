<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/jquery-ui/css/smoothness/jquery-ui-1.9.2.custom.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/table-custom.css" />
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-ui/js/jquery-ui-1.9.2.custom.js"></script>
<script src="<?php echo base_url() ?>assets/js/sweetalert2.all.min.js"></script>
 <div class="span3">
                
 </div><?php //var_dump($results); ?>
<!--<div class="span12" style="margin-left: 0">
    <form method="get" action="<?php echo base_url(); ?>index.php/bradesco/gerenciar">
        <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'aOs')) { ?>
            <div class="span3">
                <a href="<?php echo base_url(); ?>index.php/bradesco/adicionar" class="btn btn-success span12"><i class="fas fa-plus"></i> Adicionar novo registro</a>
            </div>
        <?php
        } ?>

        <div class="span3">
            <input type="text" name="pesquisa" id="pesquisa" placeholder="Número de GCPJ" class="span12" value="">
        </div>
        <div class="span2">
            <select name="status[]" id="status" class="span12" multiple>
                <option value="">Selecione Resp.Inicial</option>
                <option value="Luiz Eduardo">Luiz Eduardo</option>
                <option value="Jessivan Araujo">Jessivan Araujo</option>
                <option value="Vitor Mendes">Vitor Mendes</option>
                
            </select>

        </div>

        <div class="span3">
            <input type="text" name="data" autocomplete="off" id="data" placeholder="Data de cadastro" class="span6 datepicker" value="">
            
        </div>
        <div class="span1">
            <button class="span12 btn"><i class="fas fa-search"></i></button>
        </div>
    </form>
</div>-->

<div class="widget-box">
    <div class="widget-title">
        <span class="icon">
            <i class="fas fa-diagnoses"></i>
        </span>
        <h5>Planilha de controle do Bradesco -> Total de registros com a observação: Aguardando Encerramentos: <?php print_r($totalEncerramento); ?></h5>
        
    </div>
    <div class="widget-content nopadding tab-content">
        <div class="table-responsive">
            <table class="table table-bordered ">
                <thead>
                    <tr style="background-color: #2D335B">
                        <th>ID</th>
                        <th>GCPJ</th>
                        <th>Cliente</th>
                        <th>Data de Entrada</th>
                        <th>Dias de Vida</th>
                        <th>Status</th>
                        <th>Responsável Inicial</th>
                        <th>Situação</th>
                        
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    if (!$results) {
                        echo '<tr>
                                    <td colspan="10">Nenhuma OS Cadastrada</td>
                                  </tr>';
                    }
                    $this->load->model('bradesco_model');
                    //var_dump($results);
                    foreach ($results as $r) {
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
                            case 'Aberto':
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
                        
                        switch ($r->OBS) {
                            case 'AGUARDANDO ENCERRAMENTO':
                                $cor2 = '#DAA520';
                                break;
                            case 'Pendente':
                                $cor2 = '#B22222';
                                break;
                            case 'PENDENTE - DOCUMENTO':
                                $cor2 = '#CDB380';
                                break;
                            case 'AJUIZADO':
                                $cor2 = '#008000';
                                break;
                            case 'EM FASE DE NOTIFICAÇÃO':
                                $cor2 = '#8B4513';
                                break;
                            case 'OK NO PRAZO':
                                $cor2 = '#256';
                                break;
                            case 'CARTORÁRIO':
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
                        echo '<td>' . $r->idBradesco . '</td>';
                         echo '<td>' . $r->GCPJ . '</td>';
                          echo '<td>' . $r->CLIENTE . '</td>';
                        echo '<td>' . date('d/m/Y', strtotime($r->DataEntrada)) . '</td>';
                        echo '<td>' . $r->lifeTime . '</td>';
                       
                     echo '<td><span class="badge" style="background-color: ' . $cor . '; border-color: ' . $cor . '">' . $r->STATUS . '</span> </td>';
                     echo '<td>' . $r->RESP_INICIAL . '</td>';
                     echo '<td><span class="badge" style="background-color: ' . $cor2 . '; border-color: ' . $cor2 . '">' . $r->OBS . '</span> </td>';
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
            </table>
        </div>
    </div>
</div>

<?php echo $this->pagination->create_links(); ?>

<!-- Modal -->
<div id="modal-excluir" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form action="<?php echo base_url() ?>index.php/bradesco/excluir" method="post">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h5 id="myModalLabel">Excluir registro</h5>
        </div>
        <div class="modal-body">
            <input type="hidden" id="idOs" name="id" value="" />
            <h5 style="text-align: center">Deseja realmente excluir este registro?</h5>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
            <button class="btn btn-danger">Excluir</button>
        </div>
    </form>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('click', 'a', function(event) {
            var os = $(this).attr('os');
            $('#idOs').val(os);
        });
        $(document).on('click', '#excluir-notificacao', function(event) {
            event.preventDefault();
            $.ajax({
                    url: '<?php echo site_url() ?>/bradesco/excluir_notificacao',
                    type: 'GET',
                    dataType: 'json',
                })
                .done(function(data) {
                    if (data.result == true) {
                        Swal.fire({
                            type: "success",
                            title: "Sucesso",
                            text: "Notificação excluída com sucesso."
                        });
                        location.reload();
                    } else {
                        Swal.fire({
                            type: "success",
                            title: "Sucesso",
                            text: "Ocorreu um problema ao tentar exlcuir notificação."
                        });
                    }
                });
        });
        $(".datepicker").datepicker({
            dateFormat: 'dd/mm/yy'
        });
    });
</script>
