<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/jquery-ui/css/smoothness/jquery-ui-1.9.2.custom.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/table-custom.css" />
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-ui/js/jquery-ui-1.9.2.custom.js"></script>
<script src="<?php echo base_url() ?>assets/js/sweetalert2.all.min.js"></script>

<div class="span12" style="margin-left: 0">
    <form method="get" action="<?php echo base_url(); ?>index.php/dp/bradescoPesquisa">
        <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'aProduto')) { ?>

            

<div class="span12">
<!--    <a href="<?php echo base_url(); ?>index.php/dp/adicionar" class="btn btn-success span6"><i class="fas fa-plus"></i> Adicionar Remessa Bradesco</a> -->
    <a href="<?php echo base_url(); ?>index.php/dp/importBradesco" class="btn btn-success span4"><i class="fas fa-plus"></i> Importar Remessa Bradesco</a> <br><br>
            </div>

        <?php
        } ?>

        <div class="span3">
            <input type="text" name="pesquisa" id="pesquisa" placeholder="Número do GCPJ a pesquisar" class="span12" value="">
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
        <h5>Remessa CDL</h5> <br>
        
        Quantidade de registros encontrados: <?php print_r($countPesquisa); ?>    ->>>a soma dos valores e igual a: <?php print_r($somaPesquisa); ?>
    </div>
    <div class="widget-content nopadding tab-content">
        <div class="table-responsive">
            <table class="table table-bordered ">
                <thead>
                    <tr style="background-color: #2D335B">
                        
                        <th>Remessa</th>
                        <th>Cod.Exyon</th>
                        <th>Tipo de Ação</th>
                        <th>N.Processo</th>
                        <th>Cliente</th>
                        <th>CPF/CNPJ</th>
                       
                        <th>Comarca</th>
                        <th>UF</th>
                        <th>Valor</th>
                        <th>Dat.Despesa</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    if (!$results) {
                        echo '<tr>
                                    <td colspan="10">Nenhuma Remessa Cadastrada</td>
                                  </tr>';
                    }
                    $this->load->model('dp_model');
                    foreach ($results as $r) {
                        require 'modal.php';
                        //$dataInicial = date(('d/m/Y'), strtotime($r->DATA_DA_DESPESA));
                        echo '<tr>';
                        echo '<td>' . $r->REMESSA_N . '</td>';
                        echo '<td>' . $r->COD_CAUSA_EXYON . '</td>';
                        echo '<td>' . $r->TIPO_DE_ACAO . '</td>';
                        echo '<td>' . $r->N_DO_PROCESSO . '</td>';
                        echo '<td>' . $r->NOME_DO_CLIENTE . '</td>';
                        echo '<td>' . $r->CPF_CNPJ_CLIENTE . '</td>';
                       
                        echo '<td>' . $r->COMARCA . '</td>';
                        echo '<td>' . $r->UF . '</td>';
                        echo '<td> R$ ' . number_format($r->VALOR, 2, ',', '.') . '</td>';
                        echo '<td>' . date('d/m/Y', strtotime($r->DATA_DA_DESPESA)) . '</td>';
                        echo '<td>';

                        

                        if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vProduto')) {
                            echo '<a style="margin-right: 1%" href="#modal-ver' . $r->idCdl . '" role="button" data-toggle="modal"  class="btn tip-top" title="Ver mais detalhes"><i class="fas fa-eye"></i></a>';
                        }
                        if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eProduto'))  {
                            echo '<a style="margin-right: 1%" href="' . base_url() . 'index.php/dp/editar/' . $r->idCdl . '" class="btn btn-info tip-top" title="Editar registro"><i class="fas fa-edit"></i></a>';
                        }
                        if ($this->permission->checkPermission($this->session->userdata('permissao'), 'dProduto') ) {
                            echo '<a href="#modal-excluir" role="button" data-toggle="modal" os="' . $r->idCdl . '" class="btn btn-danger tip-top" title="Excluir registro"><i class="fas fa-trash-alt"></i></a>  ';
                        }
                        echo '</td>';
                        echo '</tr>';
                       } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>



<!-- Modal -->
<div id="modal-excluir" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form action="<?php echo base_url() ?>index.php/dp/excluir" method="post">
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
