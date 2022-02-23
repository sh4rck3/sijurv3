<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/jquery-ui/css/smoothness/jquery-ui-1.9.2.custom.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/table-custom.css" />
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-ui/js/jquery-ui-1.9.2.custom.js"></script>
<script src="<?php echo base_url() ?>assets/js/sweetalert2.all.min.js"></script>

<div class="span12" style="margin-left: 0">
    <form method="get" action="<?php echo base_url(); ?>index.php/ti/parque">
        <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'aParque')) { ?>
            <div class="span3">
                <div>
                <a href="<?php echo base_url(); ?>index.php/ti/adicionarParque" class="btn btn-success span12"><i class="fas fa-plus"></i> Adicionar Novo PC</a>
                </div>
                <div>
                <a href="<?php echo base_url(); ?>index.php/ti/adicionarPeriferico" class="btn btn-info span12"><i class="fas fa-plus"></i> Adicionar Periferico</a>
                </div>
                
            </div>
        <?php
        } ?>

        <div class="span3">
            <input type="text" name="pesquisa" id="pesquisa" placeholder="Nome da etiqueta ou MAC" class="span12" value="">
        </div>
        <div class="span2">
            <select name="status[]" id="status" class="span12" multiple>
                <option value="">Selecione status</option>
                <option value="Em uso">Em uso</option>
               
                <option value="Orçamento">Orçamento</option>
                <option value="Finalizado">Finalizado</option>
                <option value="Cancelado">Cancelado</option>
                <option value="Aguardando Peças">Aguardando Peças</option>
                <option value="Guardado">Guardado</option>
            </select>

        </div>

        <div class="span3">
            <input type="text" name="data" autocomplete="off" id="data" placeholder="Data Cadastro" class="span6 datepicker" value="">
           
        </div>
        <div class="span3">
            <select name="tipoProduto" id="tipoProduto" class="span12">
                <option value="">Selecione status</option>
                <option value="Computador">Computador</option>
                <option value="Fone">Fone</option>
                <option value="Monitor">Monitor</option>
                <option value="Telefone">Telefone</option>
                
            </select>
           
        </div>
        <div class="span1">
            <button class="span12 btn"><i class="fas fa-search"></i></button>
        </div>
    </form>
</div>

<div class="widget-box">
    <div class="widget-title">
        <span class="icon">
            <i class="fas fa-diagnoses"></i>
        </span>
        <h5>Computadores da empresa</h5>
    </div>
    <div class="widget-content nopadding tab-content">
        <div class="table-responsive">
            <table class="table table-bordered ">
                <thead>
                    <tr style="background-color: #2D335B">
                        <th>N° sistema</th>
                        <th>Setor</th>
                        <th>Nº Série(etiqueta)</th>
                        <th>Responsável</th>
                        <th>Processador</th>
                        <th>Memoria</th>
                        <th>HD</th>
                        <th>Data Inicial</th>
                        <th>Tipo produto</th>
                        <th>Status</th>
                      
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    if (!$results) {
                        echo '<tr>
                                    <td colspan="10">Nenhuma PC Cadastrado</td>
                                  </tr>';
                    }
                    $this->load->model('os_model');
                    foreach ($results as $r) {
                        $dataInicial = date(('d/m/Y'), strtotime($r->dataInicial));
                        if ($r->dataFinal != null) {
                            $dataFinal = date(('d/m/Y'), strtotime($r->dataFinal));
                        } else {
                            $dataFinal = "";
                        }
                        if ($this->input->get('pesquisa') === null && is_array(json_decode($configuration['chamados_status_list']))) {
                            if (in_array($r->status, json_decode($configuration['chamados_status_list'])) != true) {
                                continue;
                            }
                        }
                                                
                        switch ($r->status) {
                            case 'Em uso':
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
                        echo '<td>' . $r->idParque . '</td>';
                        echo '<td>' . $r->setor . '</td>';
                        echo '<td>' . $r->numeroSerie . '</td>';
                        echo '<td>' . $r->nome . '</td>';
                        echo '<td>' . $r->processador . '</td>';
                        echo '<td>' . $r->memory . '</td>';
                        echo '<td>' . $r->hardDrive . '</td>';
                        echo '<td>' . $dataInicial . '</td>';
                        echo '<td>' . $r->tipoProduto . '</td>';
                       
                       
                        echo '<td><span class="badge" style="background-color: ' . $cor . '; border-color: ' . $cor . '">' . $r->status . '</span> </td>';
                        
                        echo '<td>';

                        

                        if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vParque1')) {
                            echo '<a style="margin-right: 1%" href="' . base_url() . 'index.php/ti/visualizar/' . $r->idParque . '" class="btn-nwe" title="Ver mais detalhes"><i class="bx bx-show"></i></a>';
                        }
                        if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eParque')) {
                            echo '<a style="margin-right: 1%" href="' . base_url() . 'index.php/ti/editarParque/' . $r->idParque . '" class="btn-nwe3" title="Editar"><i class="bx bx-edit"></i></a>';
                        }
                        if ($this->permission->checkPermission($this->session->userdata('permissao'), 'dParque') ) {
                            echo '<a href="#modal-excluir" role="button" data-toggle="modal" os="' . $r->idParque . '" class="btn-nwe4" title="Excluir"><i class="bx bx-trash-alt"></i></a>  ';
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
    <form action="<?php echo base_url() ?>index.php/ti/excluirParque" method="post">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h5 id="myModalLabel">Excluir Registro</h5>
        </div>
        <div class="modal-body">
            <input type="hidden" id="idParque" name="id" value="" />
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
            $('#idParque').val(os);
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
