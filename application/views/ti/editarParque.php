<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/jquery-ui/css/smoothness/jquery-ui-1.9.2.custom.css"/>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-ui/js/jquery-ui-1.9.2.custom.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.validate.js"></script>
<script src="<?php echo base_url() ?>assets/js/sweetalert2.all.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/trumbowyg/ui/trumbowyg.css">
<script type="text/javascript" src="<?php echo base_url() ?>assets/trumbowyg/trumbowyg.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/trumbowyg/langs/pt_br.js"></script>

<style>
    .ui-datepicker {
        z-index: 99999 !important;
    }

    .trumbowyg-box {
        margin-top: 0;
        margin-bottom: 0;
    }

    textarea {
        resize: vertical;
    }
</style>
<div class="row-fluid" style="margin-top:0">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="fas fa-diagnoses"></i>
                </span>
                <h5>Inventário</h5>
                
            </div>
            <div class="widget-content nopadding tab-content">
                <div class="span12" id="divProdutosServicos" style=" margin-left: 0">
                    <ul class="nav nav-tabs">
                        <li class="active" id="tabDetalhes"><a href="#tab1" data-toggle="tab">Detalhes do equipamento</a></li>
                  
<!--                        <li id="tabAnexos"><a href="#tab4" data-toggle="tab">Anexos</a></li>-->
                        <li id="tabAnotacoes"><a href="#tab5" data-toggle="tab">Anotações</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab1">
                            <div class="span12" id="divCadastrarOs">
                                <form action="<?php echo current_url(); ?>" method="post" id="formOs">
                                    <?php echo form_hidden('idParque', $result->idParque) ?>
                                    <div class="span12" style="padding: 1%; margin-left: 0">
                                        <h3>N° sistema:
                                            <?php echo $result->idParque; ?>
                                        </h3>
                                       <div class="span2">
                                            <label for="setor">Setor</label>
                                            <select class="span12" name="setor" id="setor">
                                                <option <?php if ($result->setor == '') { echo 'selected';} ?> value="">--Selecione--</option>
                                                <option <?php if ($result->setor == 'TI') { echo 'selected';} ?> value="TI">TI</option>
                                                <option <?php if ($result->setor == 'Acordos Bradesco') { echo 'selected';} ?> value="Acordos Bradesco">Acordos Bradesco</option>
                                                <option <?php if ($result->setor == 'RH') { echo 'selected';} ?> value="RH">RH</option>
                                                <option <?php if ($result->setor == 'Retomadas') { echo 'selected';} ?> value="Retomadas">Retomadas</option>
                                                <option <?php if ($result->setor == 'Acordos Safra') { echo 'selected';} ?> value="Acordos Safra">Acordos Safra</option>
                                                <option <?php if ($result->setor == 'Controladoria') { echo 'selected';} ?> value="Controladoria">Controladoria</option>
                                                <option <?php if ($result->setor == 'Setor Jurídico') { echo 'selected';} ?> value="Setor Jurídico">Setor Jurídico</option>
                                                <option <?php if ($result->setor == 'PC TV') { echo 'selected';} ?> value="PC TV">PC TV</option>
                                            </select>
                                          
                                        </div>
                                        <div class="span2">
                                            <label for="numeroSerie">Nº série</label>
                                            <input id="numeroSerie" class="span12" type="text" name="numeroSerie" value="<?php echo $result->numeroSerie ?>"/>
                                        </div>
                                        <div class="span2">
                                            <label for="marca">Marca</label>
                                            <input id="marca" class="span12" type="text" name="marca" value="<?php echo $result->marca ?>"/>
                                        </div>
                                         <div class="span2">
                                            <label for="modelo">Modelo</label>
                                            <input id="modelo" class="span12" type="text" name="modelo" value="<?php echo $result->modelo ?>"/>
                                        </div>
                                         <div class="span2">
                                            <label for="processador">Processador</label>
                                            <input id="processador" class="span12" type="text" name="processador" value="<?php echo $result->processador ?>"/>
                                        </div>
                                        <div class="span2">
                                            <label for="tecnico">Técnico<span class="required">*</span></label>
                                            <input id="tecnico" class="span12" type="text" name="tecnico" value="<?php echo $result->nome ?>"/>
                                            <input id="usuarios_id" class="span12" type="hidden" name="usuarios_id" value="<?php echo $result->usuarios_id ?>"/>
                                        </div>
                                    </div>
                                    <div class="span12" style="padding: 1%; margin-left: 0">
                                         <div class="span2">
                                            <label for="memory">Memória</label>
                                            <input id="memory" class="span12" type="text" name="memory" value="<?php echo $result->memory ?>"/>
                                           
                                        </div>
                                         <div class="span2">
                                            <label for="hardDrive">HD</label>
                                            <input id="hardDrive" class="span12" type="text" name="hardDrive" value="<?php echo $result->hardDrive ?>"/>
                                            
                                        </div>
                                         <div class="span2">
                                            <label for="mac">MAC</label>
                                            <input id="mac" class="span12" type="text" name="mac" value="<?php echo $result->mac ?>"/>
                                            
                                        </div>
                                        <div class="span2">
                                            <label for="status">Status<span class="required">*</span></label>
                                            <select class="span12" name="status" id="status" value="">
                                                <option <?php if ($result->status == 'Em uso') { echo 'selected';} ?> value="Em uso">Em uso </option>
                                                <option <?php if ($result->status == 'Baixa') { echo 'selected';} ?> value="Baixa">Baixa </option>
                                                <option <?php if ($result->status == 'Com defeito') { echo 'selected';} ?> value="Com defeito">Com defeito </option>
                                                <option <?php if ($result->status == 'Orçamento') { echo 'selected';} ?> value="Orçamento">Orçamento </option>
                                                <option <?php if ($result->status == 'Aberto') {echo 'selected';} ?> value="Aberto">Aberto</option>
                                                <option <?php if ($result->status == 'Faturado') { echo 'selected';} ?> value="Faturado">Faturado</option>
                                                <option <?php if ($result->status == 'Negociação') {echo 'selected';} ?> value="Negociação">Negociação</option>
                                                <option <?php if ($result->status == 'Em Andamento') {echo 'selected';} ?> value="Em Andamento">Em Andamento</option>
                                                <option <?php if ($result->status == 'Finalizado') {echo 'selected';} ?> value="Finalizado">Finalizado</option>
                                                <option <?php if ($result->status == 'Cancelado') {echo 'selected';} ?> value="Cancelado">Cancelado</option>
                                                <option <?php if ($result->status == 'Aguardando Peças') {echo 'selected';} ?> value="Aguardando Peças">Aguardando Peças</option>
                                                <option <?php if ($result->status == 'Guardado') {echo 'selected';} ?> value="Guardado">Guardado</option>
                                                <option <?php if ($result->status == 'Defeito') {echo 'selected';} ?> value="Defeito">Defeito</option>
                                            </select>
                                        </div>
                                        <div class="span2">
                                            <label for="dataInicial">Data Cadastro</label>
                                            <input id="dataInicial" autocomplete="off" class="span12 datepicker"
                                                   type="text" name="dataInicial"
                                                   value="<?php echo date('d/m/Y', strtotime($result->dataInicial)); ?>" readonly/>
                                        </div>
                                        <div class="span2">
                                            <label for="tipoProduto">Tipo produto</label>
                                            <select class="span12" name="tipoProduto" id="tipoProduto" value="">
                                                    <option value="">Selecione status</option>
                                                    <option <?php if ($result->status == 'Computador') { echo 'selected';} ?> value="Computador">Computador</option>
                                                    <option <?php if ($result->status == 'Fone') { echo 'selected';} ?> value="Fone">Fone</option>
                                                    <option <?php if ($result->status == 'Monitor') { echo 'selected';} ?> value="Monitor">Monitor</option>
                                                    <option <?php if ($result->status == 'Telefone') { echo 'selected';} ?> value="Telefone">Telefone</option>
                                                    
                                            </select>
                                        </div>
                                       
                                        
                                    </div>
                                    <div class="span12" style="padding: 1%; margin-left: 0">
                                          <div class="span6">
                                            <label for="office">Office</label>
                                            <input id="office" class="span12" type="text" name="office" value="<?php echo $result->office ?>" />
                                          
                                        </div>
                                         <div class="span6">
                                            <label for="windows">Windows</label>
                                            <input id="windows" class="span12" type="text" name="windows" value="<?php echo $result->windows ?>" />
                                          
                                        </div>
                                     </div>
                                    <div class="span6" style="padding: 1%; margin-left: 0">
                                        <label for="descricaoProduto">
                                            <h4>Descrição Produto/Serviço</h4>
                                        </label>
                                        <textarea class="span12 editor" name="descricaoProduto" id="descricaoProduto"
                                                  cols="30" rows="5"><?php echo $result->descricaoProduto ?></textarea>
                                    </div>
                                    <div class="span6" style="padding: 1%; margin-left: 0">
                                        <label for="defeito">
                                            <h4>Defeito</h4>
                                        </label>
                                        <textarea class="span12 editor" name="defeito" id="defeito" cols="30"
                                                  rows="5"><?php echo $result->defeito ?></textarea>
                                    </div>
                                    <div class="span6" style="padding: 1%; margin-left: 0">
                                        <label for="observacoes">
                                            <h4>Observações</h4>
                                        </label>
                                        <textarea class="span12 editor" name="observacoes" id="observacoes" cols="30"
                                                  rows="5"><?php echo $result->observacoes ?></textarea>
                                    </div>
                                    <div class="span6" style="padding: 1%; margin-left: 0">
                                        <label for="laudoTecnico">
                                            <h4>Laudo Técnico</h4>
                                        </label>
                                        <textarea class="span12 editor" name="laudoTecnico" id="laudoTecnico" cols="30"
                                                  rows="5"><?php echo $result->laudoTecnico ?></textarea>
                                    </div>
                                    <div class="span12" style="padding: 1%; margin-left: 0">
                                        <div class="span6 offset3" style="text-align: center">
                                          
                                            <button class="btn btn-primary" id="btnContinuar"><i
                                                        class="fas fa-sync-alt"></i> Atualizar
                                            </button>
                                            
                                            <a href="<?php echo base_url() ?>index.php/ti/parque" class="btn"><i
                                                        class="fas fa-backward"></i> Voltar</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                        <!--Anexos-->
                        <div class="tab-pane" id="tab4">
                            <div class="span12" style="padding: 1%; margin-left: 0">
                                <div class="span12 well" style="padding: 1%; margin-left: 0" id="form-anexos">
                                    <form id="formAnexos" enctype="multipart/form-data" action="javascript:;"
                                          accept-charset="utf-8" s method="post">
                                        <div class="span10">
                                            <input type="hidden" name="idParqueAnexo" id="idParqueAnexo" value="<?php echo $result->idParque; ?>"/>
                                            <label for="">Anexo</label>
                                            <input type="file" class="span12" name="userfile[]" multiple="multiple" size="20"/>
                                        </div>
                                        <div class="span2">
                                            <label for="">.</label>
                                            <button class="btn btn-success span12"><i class="fas fa-paperclip"></i>
                                                Anexar
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <div class="span12 pull-left" id="divAnexos" style="margin-left: 0">
                                    <?php
                                    foreach ($anexos as $a) {
                                        if ($a->thumb == null) {
                                            $thumb = base_url() . 'assets/img/icon-file.png';
                                            $link = base_url() . 'assets/img/icon-file.png';
                                        } else {
                                            $thumb = $a->url . '/thumbs/' . $a->thumb;
                                            $link = $a->url . '/' . $a->anexo;
                                        }
                                        echo '<div class="span3" style="min-height: 150px; margin-left: 0">
                                                    <a style="min-height: 150px;" href="#modal-anexo" imagem="' . $a->idAnexos . '" link="' . $link . '" role="button" class="btn anexo span12" data-toggle="modal">
                                                        <img src="' . $thumb . '" alt="">
                                                    </a>
                                                    <span>' . $a->anexo . '</span>
                                                </div>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>

                        <!--Anotações-->
                        <div class="tab-pane" id="tab5">
                            <div class="span12" style="padding: 1%; margin-left: 0">

                                <div class="span12" id="divAnotacoes" style="margin-left: 0">

                                    <a href="#modal-anotacao" id="btn-anotacao" role="button" data-toggle="modal"
                                       class="btn btn-success"><i class="fas fa-plus"></i> Adicionar anotação</a>
                                    <hr>
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Anotação</th>
                                            <th>Data/Hora</th>
                                            <th>Ações</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        foreach ($anotacoes as $a) {
                                            echo '<tr>';
                                            echo '<td>' . $a->anotacao . '</td>';
                                            echo '<td>' . date('d/m/Y H:i:s', strtotime($a->data_hora)) . '</td>';
                                            echo '<td><span idAcao="' . $a->idAnotacoes . '" title="Excluir Anotação" class="btn btn-danger anotacao"><i class="fas fa-trash-alt"></i></span></td>';
                                            echo '</tr>';
                                        }
                                        if (!$anotacoes) {
                                            echo '<tr><td colspan="2">Nenhuma anotação cadastrada</td></tr>';
                                        }

                                        ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <!-- Fim tab anotações -->
                    </div>
                </div>
                &nbsp
            </div>
        </div>
    </div>
</div>

<!-- Modal visualizar anexo -->
<div id="modal-anexo" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Visualizar Anexo</h3>
    </div>
    <div class="modal-body">
        <div class="span12" id="div-visualizar-anexo" style="text-align: center">
            <div class='progress progress-info progress-striped active'>
                <div class='bar' style='width: 100%'></div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Fechar</button>
        <a href="" id-imagem="" class="btn btn-inverse" id="download">Download</a>
        <a href="" link="" class="btn btn-danger" id="excluir-anexo">Excluir Anexo</a>
    </div>
</div>

<!-- Modal cadastro anotações -->
<div id="modal-anotacao" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <form action="#" method="POST" id="formAnotacao">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Adicionar Anotação</h3>
        </div>
        <div class="modal-body">
            <div class="span12" id="divFormAnotacoes" style="margin-left: 0"></div>
            <div class="span12" style="margin-left: 0">
                <label for="anotacao">Anotação</label>
                <textarea class="span12" name="anotacao" id="anotacao" cols="30" rows="3"></textarea>
                <input type="hidden" name="os_id" value="<?php echo $result->idParque; ?>">
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true" id="btn-close-anotacao">Fechar</button>
            <button class="btn btn-primary">Adicionar</button>
        </div>
    </form>
</div>



<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.validate.js"></script>
<script src="<?php echo base_url(); ?>assets/js/maskmoney.js"></script>

<script type="text/javascript">
    $(document).ready(function () {

        $(".money").maskMoney();

        $('#recebido').click(function (event) {
            var flag = $(this).is(':checked');
            if (flag == true) {
                $('#divRecebimento').show();
            } else {
                $('#divRecebimento').hide();
            }
        });

        $(document).on('click', '#btn-faturar', function (event) {
            event.preventDefault();
            valor = $('#total-venda').val();
            total_servico = $('#total-servico').val();
            valor = valor.replace(',', '');
            total_servico = total_servico.replace(',', '');
            total_servico = parseFloat(total_servico);
            valor = parseFloat(valor);
            $('#valor').val(valor + total_servico);
        });

       

      

        $("#tecnico").autocomplete({
            source: "<?php echo base_url(); ?>index.php/os/autoCompleteUsuario",
            minLength: 2,
            select: function (event, ui) {
                $("#usuarios_id").val(ui.item.id);
            }
        });

       


        $("#formOs").validate({
            rules: {
                numeroSerie: {
                    required: true
                }
            },
            messages: {
                numeroSerie: {
                    required: 'Campo Requerido.'
                }
            },
            errorClass: "help-inline",
            errorElement: "span",
            highlight: function(element, errorClass, validClass) {
                $(element).parents('.control-group').addClass('error');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).parents('.control-group').removeClass('error');
                $(element).parents('.control-group').addClass('success');
            }
        });

        

        $("#formAnotacao").validate({
            rules: {
                anotacao: {
                    required: true
                }
            },
            messages: {
                anotacao: {
                    required: 'Insira a anotação'
                }
            },
            submitHandler: function (form) {
                var dados = $(form).serialize();
                $("#divFormAnotacoes").html("<div class='progress progress-info progress-striped active'><div class='bar' style='width: 100%'></div></div>");

                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>index.php/ti/adicionarAnotacao",
                    data: dados,
                    dataType: 'json',
                    success: function (data) {
                        if (data.result == true) {
                            $("#divAnotacoes").load("<?php echo current_url(); ?> #divAnotacoes");
                            $("#anotacao").val('');
                            $('#btn-close-anotacao').trigger('click');
                            $("#divFormAnotacoes").html('');
                        } else {
                            Swal.fire({
                                type: "error",
                                title: "Atenção",
                                text: "Ocorreu um erro ao tentar adicionar anotação."
                            });
                        }
                    }
                });
                return false;
            }
        });

        $("#formAnexos").validate({
            submitHandler: function (form) {
                //var dados = $( form ).serialize();
                var dados = new FormData(form);
                $("#form-anexos").hide('1000');
                $("#divAnexos").html("<div class='progress progress-info progress-striped active'><div class='bar' style='width: 100%'></div></div>");
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>index.php/ti/anexar",
                    data: dados,
                    mimeType: "multipart/form-data",
                    contentType: false,
                    cache: false,
                    processData: false,
                    dataType: 'json',
                    success: function (data) {
                        if (data.result == true) {
                            $("#divAnexos").load("<?php echo current_url(); ?> #divAnexos");
                            $("#userfile").val('');

                        } else {
                            $("#divAnexos").html('<div class="alert fade in"><button type="button" class="close" data-dismiss="alert">×</button><strong>Atenção!</strong> ' + data.mensagem + '</div>');
                        }
                    },
                    error: function () {
                        $("#divAnexos").html('<div class="alert alert-danger fade in"><button type="button" class="close" data-dismiss="alert">×</button><strong>Atenção!</strong> Ocorreu um erro. Verifique se você anexou o(s) arquivo(s).</div>');
                    }
                });
                $("#form-anexos").show('1000');
                return false;
            }
        });

       

      
        $(document).on('click', '.anexo', function (event) {
            event.preventDefault();
            var link = $(this).attr('link');
            var id = $(this).attr('imagem');
            var url = '<?php echo base_url(); ?>index.php/ti/excluirAnexo/';
            $("#div-visualizar-anexo").html('<img src="' + link + '" alt="">');
            $("#excluir-anexo").attr('link', url + id);

            $("#download").attr('href', "<?php echo base_url(); ?>index.php/ti/downloadanexo/" + id);

        });

        $(document).on('click', '#excluir-anexo', function (event) {
            event.preventDefault();

            var link = $(this).attr('link');
            var idOS = "<?php echo $result->idParque; ?>"

            $('#modal-anexo').modal('hide');
            $("#divAnexos").html("<div class='progress progress-info progress-striped active'><div class='bar' style='width: 100%'></div></div>");

            $.ajax({
                type: "POST",
                url: link,
                dataType: 'json',
                data: "idOs=" + idOS,
                success: function (data) {
                    if (data.result == true) {
                        $("#divAnexos").load("<?php echo current_url(); ?> #divAnexos");
                    } else {
                        Swal.fire({
                            type: "error",
                            title: "Atenção",
                            text: data.mensagem
                        });
                    }
                }
            });
        });

        $(document).on('click', '.anotacao', function (event) {
            var idAnotacao = $(this).attr('idAcao');
            var idOS = "<?php echo $result->idParque; ?>"

            if ((idAnotacao % 1) == 0) {
                $("#divAnotacoes").html("<div class='progress progress-info progress-striped active'><div class='bar' style='width: 100%'></div></div>");
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>index.php/ti/excluirAnotacao",
                    data: "idAnotacao=" + idAnotacao + "&idOs=" + idOS,
                    dataType: 'json',
                    success: function (data) {
                        if (data.result == true) {
                            $("#divAnotacoes").load("<?php echo current_url(); ?> #divAnotacoes");

                        } else {
                            Swal.fire({
                                type: "error",
                                title: "Atenção",
                                text: "Ocorreu um erro ao tentar excluir serviço."
                            });
                        }
                    }
                });
                return false;
            }
        });

        $(".datepicker").datepicker({
            dateFormat: 'dd/mm/yy'
        });

        $('.editor').trumbowyg({
            lang: 'pt_br'
        });
    });
</script>
