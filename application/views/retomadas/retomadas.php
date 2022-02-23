<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/jquery-ui/css/smoothness/jquery-ui-1.9.2.custom.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/table-custom.css" />
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-ui/js/jquery-ui-1.9.2.custom.js"></script>
<script src="<?php echo base_url() ?>assets/js/sweetalert2.all.min.js"></script>

<div class="span12" style="margin-left: 0">
    <form method="get" action="<?php echo base_url(); ?>index.php/retomadas/gerenciar">
        <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vRetomadas')) { ?>

            
<div class="span12" style="margin-left: 0">
<div class="span6">
    <a href="<?php echo base_url(); ?>index.php/retomadas/adicionar" class="btn btn-success span6"><i class="fas fa-plus"></i> Adicionar Contato</a> 
    
            </div>
<div class="span6">
    <a href="<?php echo base_url(); ?>index.php/retomadas/retomadasRapid2?format=xls" class="btn btn-success span6"><i class="fas fa-plus"></i> Exportar</a> 
    
            </div>
</div><br><br>
        <?php
        } ?>

        <div class="span3">
            <input type="text" name="pesquisa" id="pesquisa" placeholder="Nome do localizador ou area de tuação" class="span12" value="">
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
        <h5>Localizadores</h5>
    </div>
    <div class="widget-content nopadding tab-content">
        <div class="table-responsive">
            <table class="table table-bordered ">
                <thead>
                    <tr style="background-color: #2D335B">
                        
                        <th>ID</th>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Fone 1</th>
                        <th>Fone2</th>
                        <th>E-mail</th>
                        <th>UF</th>
                        <th>Atuação</th>
                        <th>Observação</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    if (!$results) {
                        echo '<tr>
                                    <td colspan="10">Nenhuma registro Cadastrado</td>
                                  </tr>';
                    }
                    $this->load->model('os_model');
                    foreach ($results as $r) {
                        

                        echo '<tr>';
                        echo '<td>' . $r->idLocalizador . '</td>';
                        echo '<td>' . $r->nomeLocalizador . '</td>';
                        echo '<td>' . $r->cpf . '</td>';
                        echo '<td>' . $r->fone . '</td>';
                        echo '<td>' . $r->outroFone . '</td>';
                        echo '<td>' . $r->emailLocalizador . '</td>';
                        echo '<td>' . $r->uf . '</td>';
                        echo '<td>' . $r->areasAtuacao . '</td>';
                        echo '<td>' . $r->obs . '</td>';
                       
                        echo '<td>';
//                        if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vArquivo')) {
//                            echo '<a style="margin-right: 1%" href="' . base_url() . 'index.php/controladoria/visualizarbradesnotifi/' . $r->idLocalizador . '" class="btn tip-top" title="Ver mais detalhes"><i class="fas fa-eye"></i></a>';
//                        }
                        if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eRetomadas')) {
                            echo '<a style="margin-right: 1%" href="' . base_url() . 'index.php/retomadas/editar/' . $r->idLocalizador . '" class="btn-nwe3" title="Editar"><i class="bx bx-edit"></i></a>';
                        }
                        if ($this->permission->checkPermission($this->session->userdata('permissao'), 'dRetomadas')) {
                            echo '<a href="#modal-excluir" role="button" data-toggle="modal" os="' . $r->idLocalizador . '" class="btn-nwe4" title="Excluir"><i class="bx bx-trash-alt"></i></a>';
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
    <form action="<?php echo base_url() ?>index.php/retomadas/excluir" method="post">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h5 id="myModalLabel">Excluir registro</h5>
        </div>
        <div class="modal-body">
            <input type="hidden" id="idOs" name="id" value="" />
            <h5 style="text-align: center">Deseja realmente excluir este registro</h5>
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
                    url: '<?php echo site_url() ?>/dp/excluir_notificacao',
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
