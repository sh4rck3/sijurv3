<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/jquery-ui/css/smoothness/jquery-ui-1.9.2.custom.css" />
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
                <h5>Ficha do funcionário</h5>
               
            </div>
            <div class="widget-content nopadding tab-content">
                <div class="span12" id="divProdutosServicos" style=" margin-left: 0">
                    <ul class="nav nav-tabs">
                        <li class="active" id="tabDetalhes"><a href="#tab1" data-toggle="tab">Detalhes do funcionário</a></li>
                       
                        <li id="tabAnexos"><a href="#tab4" data-toggle="tab">Anexos</a></li>
                        <li id="tabAnotacoes"><a href="#tab5" data-toggle="tab">Anotações</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab1">
                            <div class="span12" id="divCadastrarOs">
                                <form action="<?php echo current_url(); ?>" method="post" id="formOs">
                                    <?php echo form_hidden('idDp', $result->idDp) ?>
                                    <div class="span12" style="padding: 1%; margin-left: 0">
                                        <h3>N° registro interno:
                                            <?php echo $result->idDp; //var_dump($result); ?>
                                        </h3>
                                        <div class="span6" style="margin-left: 0">
                                            <label for="nomeFuncionario">Nome do Funcionário</label>
                                            <input id="nomeFuncionario" class="span12" type="text" name="nomeFuncionario" value="<?php echo $result->nomeFuncionario ?>" />
                                        </div>
                                         <div class="span2">
                                            <label for="tecnico">Responsável pelo cadastro</label>
                                            <input id="tecnico" class="span12" type="text" name="tecnico" value="<?= $this->session->userdata('nome'); ?>" readonly />
                                            <input id="usuarios_id" class="span12" type="hidden" name="usuarios_id" value="<?= $this->session->userdata('id'); ?>" />
                                        </div>
                                         <div class="span2">
                                            <label for="dataInicial">Data de contratação</label>
                                            <input id="dataInicial" autocomplete="off" class="span12 datepicker" type="text" name="dataInicial" value="<?php echo date('d/m/Y'); ?>" />
                                        </div>
                                         <div class="span2">
                                            <label for="dataDemissao">Data demissão</label>
                                            <input id="dataDemissao" autocomplete="off" class="span12 datepicker" type="text" name="dataDemissao"  />
                                        </div>
                                       
                                    </div>
                                    <div class="span12" style="padding: 1%; margin-left: 0">
                                        <div class="span2">
                                            <label for="status">Status<span class="required">*</span></label>
                                            <select class="span12" name="status" id="status" >
                                                <option <?php if ($result->status == NULL) {echo 'selected';} ?> value="">-Selecione-</option>
                                                <option <?php if ($result->status == 'Ativo') {echo 'selected';} ?> value="Ativo">Ativo </option>
                                                <option <?php if ($result->status == 'Demitido') {echo 'selected';} ?> value="Demitido">Demitido </option>
                                                <option <?php if ($result->status == 'Férias') {echo 'selected';} ?> value="Férias">Férias </option>
                                            </select>
                                        </div>
                                        <div class="span2">
                                            <label for="dataNascimento">Data de Nascimento</label>
                                            <input id="dataNascimento" autocomplete="off" class="span12 datepicker" type="text" name="dataNascimento" value="<?php echo $result->dataNascimento ?>" />
                                        </div>
                                       <div class="span2">
                                            <label for="dpCpf">CPF</label>
                                            <input id="dpCpf" class="span12" type="text" name="dpCpf" value="<?php echo $result->dpCpf ?>"/>
                                            
                                        </div>
                                       <div class="span2">
                                            <label for="dpRg">RG</label>
                                            <input id="dpRg" class="span12" type="text" name="dpRg" value="<?php echo $result->dpRg ?>" />
                                            
                                        </div>
                                        <div class="span2">
                                        <label for="sexo" class="control-label">Sexo</label>
                                        
                                                    <select  name="sexo" id="sexo" value="">
                                                        <option <?php if ($result->sexo == NULL) {echo 'selected';} ?> value="">--Selecione--</option>
                                                        <option <?php if ($result->sexo == 'M') {echo 'selected';} ?> value="M">Masculino</option>
                                                        <option <?php if ($result->sexo == 'F') {echo 'selected';} ?> value="F">Feminino</option>
                                                    </select>
                                       
                                        </div>
                                        <div class="span2">
                                        <label for="estadoCivil" class="control-label">Estado Cívil</label>
                                        
                                                    <select  name="estadoCivil" id="estadoCivil" value="">
                                                        <option <?php if ($result->estadoCivil == NULL) {echo 'selected';} ?> value="">--Selecione--</option>
                                                        <option <?php if ($result->estadoCivil == 'Solteiro') {echo 'selected';} ?> value="Solteiro">Solteiro</option>
                                                        <option <?php if ($result->estadoCivil == 'Casado') {echo 'selected';} ?> value="Casado">Casado</option>
                                                        <option <?php if ($result->estadoCivil == 'Divorciado') {echo 'selected';} ?> value="Divorciado">Divorciado</option>
                                                        <option <?php if ($result->estadoCivil == 'Viúvo') {echo 'selected';} ?> value="Viúvo">Viúvo</option> 
                                                    </select>
                                       
                                        </div>
                                     
                                    </div>
                                    <div class="span12" style="padding: 1%; margin-left: 0">
                                         <div class="span2">
                                                <label for="cep" class="control-label">CEP</label>
                                                
                                                    <input id="cep" type="text" name="cep" value="<?php echo $result->cep ?>"/>
                                                
                                            </div>
                                            <div class="span2">
                                                <label for="rua" class="control-label">Rua</label>
                                                
                                                    <input id="rua" type="text" name="rua" value="<?php echo $result->rua ?>"/>
                                               
                                            </div>
                                            <div class="span2">
                                                <label for="numero" class="control-label">Número</label>
                                                
                                                    <input id="numero" type="text" name="numero"
                                                           value="<?php echo $result->numero ?>"/>
                                                
                                            </div>
                                            <div class="span2">
                                                <label for="complemento" class="control-label">Complemento</label>
                                               
                                                    <input id="complemento" type="text" name="complemento"
                                                           value="<?php echo $result->complemento ?>"/>
                                                
                                            </div>
                                            <div class="span2">
                                                <label for="bairro" class="control-label">Bairro</label>
                                                
                                                    <input id="bairro" type="text" name="bairro"
                                                           value="<?php echo $result->bairro ?>"/>
                                                
                                            </div>
                                            <div class="span2">
                                                <label for="cidade" class="control-label">Cidade</label>
                                                
                                                    <input id="cidade" type="text" name="cidade"
                                                           value="<?php echo $result->cidade ?>"/>
                                                
                                            </div>
                                    </div>
                                   
                                    <div class="span12" style="padding: 1%; margin-left: 0">
                                        <div class="span6 offset3" style="text-align: center">
                                        
                                            <button class="btn btn-primary" id="btnContinuar"><i class="fas fa-sync-alt"></i> Atualizar
                                            </button>
                                            <?php if ($result->garantias_id) { ?> <a target="_blank" title="Imprimir Termo de Garantia" class="btn btn-inverse" href="<?php echo site_url() ?>/garantias/imprimir/<?php echo $result->garantias_id; ?>"><i class="fas fa-text-width"></i> Imprimir Termo de
                                                    Garantia</a> <?php } ?>
                                            <a href="<?php echo base_url() ?>index.php/rh" class="btn"><i class="fas fa-backward"></i> Voltar</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                       

                        <!--Anexos-->
                        <div class="tab-pane" id="tab4">
                            <div class="span12" style="padding: 1%; margin-left: 0">
                                <div class="span12 well" style="padding: 1%; margin-left: 0" id="form-anexos">
                                    <form id="formAnexos" enctype="multipart/form-data" action="javascript:;" accept-charset="utf-8" s method="post">
                                        <div class="span10">
                                            <input type="hidden" name="idDpServico" id="idDpServico" value="<?php echo $result->idDp; ?>" />
                                            <label for="">Anexo</label>
                                            <input type="button" id="loadFileXml" value="Escolha o arquivo" onclick="document.getElementById('file').click();" />
                                            <input type="file" id="file" class="span12" name="userfile[]" multiple="multiple" size="20" style="display:none"  />
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

                                    <a href="#modal-anotacao" id="btn-anotacao" role="button" data-toggle="modal" class="btn btn-success"><i class="fas fa-plus"></i> Adicionar anotação</a>
                                    <hr>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Responsável</th>
                                                <th>Anotação</th>
                                                <th>Data/Hora</th>
                                                <th>Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($anotacoes as $a) {
                                                echo '<tr>';
                                                echo '<td>' . $a->responsavelAnotacao . '</td>';
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
<div id="modal-anexo" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
<div id="modal-anotacao" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                <input type="hidden" name="dp_id" value="<?php echo $result->idDp; ?>">
                <input type="hidden" name="responsavelAnotacao" value="<?= $this->session->userdata('nome'); ?>">
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
    
     $(document).ready(function() {
        
        $(".money").maskMoney();

        $('#recebido').click(function(event) {
            var flag = $(this).is(':checked');
            if (flag == true) {
                $('#divRecebimento').show();
            } else {
                $('#divRecebimento').hide();
            }
        });

        

        $("#formOs").validate({
            rules: {
                nomeFuncionario: {
                    required: true
                }
            },
            messages: {
                nomeFuncionario: {
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
            submitHandler: function(form) {
                var dados = $(form).serialize();
                $("#divFormAnotacoes").html("<div class='progress progress-info progress-striped active'><div class='bar' style='width: 100%'></div></div>");

                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>index.php/rh/adicionarAnotacao",
                    data: dados,
                    dataType: 'json',
                    success: function(data) {
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
            submitHandler: function(form) {
                //var dados = $( form ).serialize();
                var dados = new FormData(form);
                $("#form-anexos").hide('1000');
                $("#divAnexos").html("<div class='progress progress-info progress-striped active'><div class='bar' style='width: 100%'></div></div>");
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>index.php/rh/anexar",
                    data: dados,
                    mimeType: "multipart/form-data",
                    contentType: false,
                    cache: false,
                    processData: false,
                    dataType: 'json',
                    success: function(data) {
                        if (data.result == true) {
                            $("#divAnexos").load("<?php echo current_url(); ?> #divAnexos");
                            $("#userfile").val('');

                        } else {
                            $("#divAnexos").html('<div class="alert fade in"><button type="button" class="close" data-dismiss="alert">×</button><strong>Atenção!</strong> ' + data.mensagem + '</div>');
                        }
                    },
                    error: function() {
                        $("#divAnexos").html('<div class="alert alert-danger fade in"><button type="button" class="close" data-dismiss="alert">×</button><strong>Atenção!</strong> Ocorreu um erro. Verifique se você anexou o(s) arquivo(s).</div>');
                    }
                });
                $("#form-anexos").show('1000');
                return false;
            }
        });

        $(document).on('click', '.anexo', function(event) {
            event.preventDefault();
            var link = $(this).attr('link');
            var id = $(this).attr('imagem');
            var url = '<?php echo base_url(); ?>index.php/rh/excluirAnexo/';
            $("#div-visualizar-anexo").html('<img src="' + link + '" alt="">');
            $("#excluir-anexo").attr('link', url + id);

            $("#download").attr('href', "<?php echo base_url(); ?>index.php/rh/downloadanexo/" + id);

        });

        $(document).on('click', '#excluir-anexo', function(event) {
            event.preventDefault();
            var link = $(this).attr('link');
            var idOS = "<?php echo $result->idDp ?>"
            $('#modal-anexo').modal('hide');
            $("#divAnexos").html("<div class='progress progress-info progress-striped active'><div class='bar' style='width: 100%'></div></div>");

            $.ajax({
                type: "POST",
                url: link,
                dataType: 'json',
                data: "idOs=" + idOS,
                success: function(data) {
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

        $(document).on('click', '.anotacao', function(event) {
            var idAnotacao = $(this).attr('idAcao');
            var idOS = "<?php echo $result->idDp ?>"
            if ((idAnotacao % 1) == 0) {
                $("#divAnotacoes").html("<div class='progress progress-info progress-striped active'><div class='bar' style='width: 100%'></div></div>");
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>index.php/rh/excluirAnotacao",
                    data: "idAnotacao=" + idAnotacao + "&idOs=" + idOS,
                    dataType: 'json',
                    success: function(data) {
                        if (data.result == true) {
                            $("#divAnotacoes").load("<?php echo current_url(); ?> #divAnotacoes");

                        } else {
                            Swal.fire({
                                type: "error",
                                title: "Atenção",
                                text: "Ocorreu um erro ao tentar excluir Anotação."
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
