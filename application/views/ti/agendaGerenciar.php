<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/jquery-ui/css/smoothness/jquery-ui-1.9.2.custom.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/table-custom.css" />
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-ui/js/jquery-ui-1.9.2.custom.js"></script>
<script src="<?php echo base_url() ?>assets/js/sweetalert2.all.min.js"></script>


            <div class="span3">
                <a href="<?php echo base_url(); ?>index.php/agenda" class="btn btn-info span12"> Voltar</a>
            </div><br><br>
       

<div class="widget-box">
    <div class="widget-title">
        <span class="icon">
            <i class="fas fa-diagnoses"></i>
        </span>
        <h5>Registros da Agenda</h5>
    </div>
    <div class="widget-content nopadding tab-content">
        <div class="table-responsive">
            <table class="table table-bordered ">
                <thead>
                    <tr style="background-color: #2D335B">
                        <th>N° do registro</th>
                        <th>Cliente</th>
                        <th>Responsável</th>
                        
                        <th>Data Final</th>
                        
                        
                        <th>Status</th>
                        
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    if (!$results) {
                        echo '<tr>
                                    <td colspan="10">Nenhuma evento Cadastrado</td>
                                  </tr>';
                    }
                    $this->load->model('os_model');
                    foreach ($results as $r) {
                       
                        if ($this->input->get('pesquisa') === null && is_array(json_decode($configuration['os_status_list']))) {
                            if (in_array($r->status, json_decode($configuration['os_status_list'])) != true) {
                                continue;
                            }
                        }
                                                
                        switch ($r->status) {
                            case 'Aberto':
                                $cor = '#00cd00';
                                break;
                            case 'Em Andamento':
                                $cor = '#436eee';
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
                            case 'Finalizado':
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
                       
                        echo '<tr>';
                        echo '<td>' . $r->idOs . '</td>';
                        echo '<td>' . $r->clienteAgenda . '</td>';
                        echo '<td>' . $r->observacoes . '</td>';
                        
                        echo '<td>' . $r->dataFinal . '</td>';
                        
                        echo '<td><span class="badge" style="background-color: ' . $cor . '; border-color: ' . $cor . '">' . $r->status . '</span> </td>';
                       
                        echo '<td>';

                      

                        
                        if (($this->permission->checkPermission($this->session->userdata('permissao'), 'vxOs'))) {
                            echo '<a style="margin-right: 1%" href="' . base_url() . 'index.php/os/editar/' . $r->idOs . '" class="btn btn-info tip-top" title="Editar OS"><i class="fas fa-edit"></i></a>';
                        }
                        if ($this->permission->checkPermission($this->session->userdata('permissao'), 'dOs')) {
                            echo '<a href="#modal-excluir" role="button" data-toggle="modal" os="' . $r->idOs . '" class="btn btn-danger tip-top" title="Excluir da Agenda"><i class="fas fa-trash-alt"></i></a>  ';
                        }
                        echo '</td>';
                        echo '</tr>';
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php echo $this->pagination->create_links(); ?>

<!-- Modal -->
<div id="modal-excluir" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form action="<?php echo base_url() ?>index.php/agenda/excluir" method="post">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h5 id="myModalLabel">Excluir OS</h5>
        </div>
        <div class="modal-body">
            <input type="hidden" id="idOs" name="id" value="" />
            <h5 style="text-align: center">Deseja realmente excluir registro da Agenda?</h5>
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
                    url: '<?php echo site_url() ?>/os/excluir_notificacao',
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
