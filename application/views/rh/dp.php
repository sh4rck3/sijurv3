<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/jquery-ui/css/smoothness/jquery-ui-1.9.2.custom.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/table-custom.css" />
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-ui/js/jquery-ui-1.9.2.custom.js"></script>
<script src="<?php echo base_url() ?>assets/js/sweetalert2.all.min.js"></script>

<div class="span12" style="margin-left: 0">
    <form method="get" action="<?php echo base_url(); ?>index.php/rh/gerenciar">
        <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vRh')) { ?>
            <div class="span3">
                <a href="<?php echo base_url(); ?>index.php/rh/adicionar" class="btn btn-success span12"><i class="fas fa-plus"></i> Adicionar Funcionário</a>
            </div>
        <?php
        } ?>

    </form>
</div>

<div class="widget-box">
    <div class="widget-title">
        <span class="icon">
            <i class="fas fa-diagnoses"></i>
        </span>
        <h5>Ficha do funcionário</h5>
    </div>
    <div class="widget-content nopadding tab-content">
        <div class="table-responsive">
            <table class="table table-bordered ">
                <thead>
                    <tr style="background-color: #2D335B">
                        <th>N° de registro</th>
                        <th>Funcionário</th>
                        
                        <th>Data Contratação</th>
                        <th>Data Desligamento</th>
                       
                       
                        <th>Status</th>
                        
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // var_dump($results);
                    if (!$results) {
                        
                        echo '<tr>
                                    <td colspan="10">Nenhuma funcionário cadastrado</td>
                                  </tr>';
                    }
                    $this->load->model('rh_model');
                    foreach ($results as $r) {
                        
                        $dataInicial = date(('d/m/Y'), strtotime($r->dataInicial));
                        if ($r->dataDemissao != null) {
                            $dataFinal = date(('d/m/Y'), strtotime($r->dataDemissao));
                        } else {
                            $dataFinal = "";
                        }
                        

                        switch ($r->status) {
                            case 'Ativo':
                                $cor = '#00cd00';
                                break;
                            case 'Demitido':
                                $cor = '#FF4500';
                                break;
                            case 'Férias':
                                $cor = '#CDB380';
                                break;
                            case 'Atestado':
                                $cor = '#CDB380';
                                break;
                           
                            default:
                                $cor = '#E0E4CC';
                                break;
                        }
                       
                        echo '<tr>';
                        echo '<td>' . $r->idDp . '</td>';
                        echo '<td>' . $r->nomeFuncionario . '</td>';
                     
                        echo '<td>' . $dataInicial . '</td>';
                        echo '<td>' . $dataFinal . '</td>';
                        //echo '<td>' . $vencGarantia . '</td>';
                        //echo '<td>R$ ' . number_format($r->totalProdutos + $r->totalServicos, 2, ',', '.') . '</td>';
                      //  echo '<td>R$ ' . number_format($r->valorTotal, 2, ',', '.') . '</td>';
                        echo '<td><span class="badge" style="background-color: ' . $cor . '; border-color: ' . $cor . '">' . $r->status . '</span> </td>';
                       
                        echo '<td>';

                        

                        if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vRh')) {
                            echo '<a style="margin-right: 1%" href="' . base_url() . 'index.php/rh/visualizar/' . $r->idDp . '" class="btn-nwe" title="Ver mais detalhes"><i class="bx bx-show"></i></a>';
                        }
                        if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eRh')) {
                            echo '<a style="margin-right: 1%" href="' . base_url() . 'index.php/rh/editar/' . $r->idDp . '" class="btn-nwe3" title="Editar"><i class="bx bx-edit"></i></a>';
                        }
                        if ($this->permission->checkPermission($this->session->userdata('permissao'), 'dRh')) {
                            echo '<a href="#modal-excluir" role="button" data-toggle="modal" os="' . $r->idDp . '" class="btn-nwe4" title="Excluir"><i class="bx bx-trash-alt"></i></a>    ';
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
    <form action="<?php echo base_url() ?>index.php/rh/excluir" method="post">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h5 id="myModalLabel">Excluir Funcionário</h5>
        </div>
        <div class="modal-body">
            <input type="hidden" id="idDp" name="id" value="" />
            <h5 style="text-align: center">Deseja realmente excluir este funcionário?</h5>
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
            $('#idDp').val(os);
        });
        $(document).on('click', '#excluir-notificacao', function(event) {
            event.preventDefault();
            $.ajax({
                    url: '<?php echo site_url() ?>/rh/excluir_notificacao',
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
