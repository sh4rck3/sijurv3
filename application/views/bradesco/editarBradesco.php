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
                <h5>Bradesco Analitico</h5>
                <div class="buttons">
                    
                    <a title="Visualizar OS" class="btn btn-mini btn-inverse"
                       href="<?php echo site_url() ?>/bradesco/visualizar/<?php echo $result->idBradesco; ?>"><i
                                class="fas fa-eye"></i> Visualizar Registro</a>
                    <a target="_blank" title="Imprimir OS" class="btn btn-mini btn-inverse"
                       href="<?php echo site_url() ?>/bradesco/imprimir/<?php echo $result->idBradesco; ?>"><i
                                class="fas fa-print"></i> Imprimir A4</a>
                   

                 
                </div>
            </div>
            <?php //echo $_SESSION['nome']; // var_dump($session['nome']); ?>
            <div class="widget-content nopadding tab-content">
                <div class="span12" id="divProdutosServicos" style=" margin-left: 0">
                    <ul class="nav nav-tabs">
                        <li class="active" id="tabDetalhes"><a href="#tab1" data-toggle="tab">Detalhes do registro</a></li>
                        
                    </ul>
                    <div class="tab-content">
                        
                        <?php //echo CI_VERSION;
                       // echo $_SESSION['kbum'];
                        ?>
                        
                        <div class="tab-pane active" id="tab1">
                            <div class="span12" id="divCadastrarOs">
                                <?php //var_dump($result) ?>
                                <form action="<?php echo current_url(); ?>" method="post" id="formOs">
                                    <?php echo form_hidden('idBradesco', $result->idBradesco) ?>
                                    <div class="span12" style="padding: 1%; margin-left: 0">
                                        <h3>N° do registro:
                                            <?php echo $result->idBradesco; ?>
                                        </h3>
                                    </div>
                                    <div class="span12" style="padding: 1%; margin-left: 0">
                                        
                                        <div class="span2" style="margin-left: 0">
                                            <label >GCPJ<span class="required">*</span></label>
                                            <input class="span12" id="GCPJ" autocomplete="off"  type="text" name="GCPJ" value="<?php echo $result->GCPJ ?>" readonly />
                                        </div>
                                        <div class="span2">
                                            <label for="DataEntrada">Data de entrada</label>
                                            <input id="DataEntrada" autocomplete="off" class="span12" type="date" name="DataEntrada" value="<?php echo $result->DataEntrada ?>" />
                                        </div>
                                        <div class="span3" >
                                            <label for="CLIENTE">Cliente<span class="required">*</span></label>
                                            <input id="CLIENTE" class="span12" type="text" name="CLIENTE"
                                                   value="<?php echo $result->CLIENTE ?>"/>
                                           
                                            
                                        </div>
                                        <div class="span3" >
                                            <label for="RESPONSAVEL">Responsável pela inicial<span class="required">*</span></label>
                                            <input id="RESP_INICIAL" class="span12" type="text" name="RESP_INICIAL"
                                                   value="<?php echo $result->RESP_INICIAL ?>"/>
                                           
                                            
                                        </div>
                                        <div class="span2">
                                            <label for="RESPONSAVEL">Responsável no sistema<span
                                                        class="required">*</span></label>
                                            <input id="RESPONSAVEL" class="span12" type="text" name="RESPONSAVEL"
                                                   value="<?php 
                                                    if (isset($result->RESPONSAVEL)){
                                                    echo $_SESSION['nome']; //echo $result->RESPONSAVEL;
                                                   } else {
                                                       echo $_SESSION['nome'];    
                                                   }
                                                   
                                                   //echo $result->RESPONSAVEL ?>" readonly/>
                                            
                                        </div>
                                        
                                    </div>
                                    <div class="span12" style="padding: 1%; margin-left: 0">
                                        <div class="span6">
                                            <label for="OBS">Observacao(Situacao2)<span class="required">*</span></label>
                                            <select class="span12" name="OBS" id="OBS" >
                                               
                                            <?php
                                            if(isset($result->OBS)){
                                                echo '<option value="'.$result->OBS.'">'.$result->OBS.'</option>';
                                                
                                                
                                            }else{
                                                echo '<option value="">--Selecione--</option>';
                                            }
                                            ?>    
                                                
                                            <?php
                                             foreach ($result2 as $p) { 
                                                    echo '<option value="' . $p->OBS . '">' . $p->OBS . '</option>';
                                             } ?>
                                                <option value="VAI AJUIZAR">VAI AJUIZAR</option>
                                            </select>
<!--                                            <input id="OBS" class="span12" type="text" name="OBS" value="" />-->
                                            
                                        </div>
                                        <div class="span6">
                                            <label for="SITUAC">Pre-Juridico</label>
                                            <input id="SITUAC" class="span12" type="text" name="SITUAC" value="<?php echo $result->SITUAC ?>" />
                                            
                                        </div>
                                        
                                    </div>
                                    <div class="span12" style="padding: 1%; margin-left: 0">
                                        <div class="span12">
                                            <label for="situacao_iniciais">Situação-Iniciais<span class="required">*</span></label>
                                            <select class="span12" name="situacao_iniciais" id="situacao_iniciais" value="">
                                            <?php
                                            if(isset($result->situacao_iniciais)){
                                                echo '<option value="'.$result->situacao_iniciais.'">'.$result->situacao_iniciais.'</option>';
                                                
                                            }else{
                                                echo '<option value="">--Selecione--</option>';
                                            }
                                            ?>    
                                                
                                            <?php
                                             foreach ($resultInicial as $p) { 
                                                    echo '<option value="' . $p->situacao_iniciais . '">' . $p->situacao_iniciais . '</option>';
                                             } ?>
                                            </select>
<!--                                            <input id="OBS" class="span12" type="text" name="OBS" value="" />-->
                                            
                                        </div>
                                        
                                        
                                    </div>
                                    <?php //var_dump($resultInicial); ?>
                                    
                                    <div class="span12" style="padding: 1%; margin-left: 0">
                                        <div class="span4">
                                            <label for="STATUS">Status</label>
                                            <select class="span12" name="STATUS" id="status" value="">
                                                 <option <?php if ($result->STATUS == 'NULL') {echo 'selected';} ?> value="">Selecione</option>
                                                 <option <?php if ($result->STATUS == 'Pendente') {echo 'selected';} ?> value="Pendente">Pendente</option>
                                                 <option <?php if ($result->STATUS == 'ENCERRADO') {echo 'selected';} ?> value="ENCERRADO">ENCERRADO</option>
                                                 <option <?php if ($result->STATUS == 'OK NO PRAZO') {echo 'selected';} ?> value="OK NO PRAZO">OK NO PRAZO</option>
                                                 <option <?php if ($result->STATUS == 'AJUIZADO') {echo 'selected';} ?> value="AJUIZADO">AJUIZADO</option>
                                                
                                               
                                            </select>
                                        </div>
                                         
                                        
                                        <div class="span1">
                                            <label >Agencia</label>
                                            <input class="span12" id="AGENCIA" autocomplete="off" " type="text" name="AGENCIA" value="<?php echo $result->AGENCIA; ?>" />
                                        </div>
                                        <div class="span1">
                                            <label >Conta</label>
                                            <input class="span12" id="CONTA" autocomplete="off" type="text" name="CONTA" value="<?php echo $result->CONTA; ?>" />
                                        </div>
                                        <div class="span1">
                                            <label >Carteira</label>
                                            <input class="span12" id="CARTEIRA" autocomplete="off"  type="text" name="CARTEIRA" value="<?php echo $result->CARTEIRA; ?>" />
                                        </div>
                                        <div class="span1">
                                            <label >Contrato</label>
                                            <input class="span12" id="CONTRATO" autocomplete="off"  type="text" name="CONTRATO" value="<?php echo $result->CONTRATO; ?>" />
                                        </div>
                                        <div class="span2">
                                            <label for="dataInicial">Data RetControladoria</label>
                                            <input id="DT_RET_CONTROL" autocomplete="off" class="span12" type="date" name="DT_RET_CONTROL" value="<?php echo $result->DT_RET_CONTROL; ?>" />
                                        </div>
                                        <div class="span2">
                                            <label for="dataInicial">Data Ahuizamento</label>
                                            <input id="DT_AJUIZ" autocomplete="off" class="span12 " type="date" name="DT_AJUIZ" value="<?php echo $result->DT_AJUIZ; ?>" />
                                        </div>
                                        
                                       

                                    </div>
                                     <div class="span6" style="padding: 1%; margin-left: 0">
                                        <label for="descricaoProduto">
                                            <h4>Observação</h4>
                                        </label>
                                         <textarea class="span6 editor" name="OBSERVACAO" id="OBSERVACAO" cols="30" rows="3"><?php echo $result->OBSERVACAO; ?></textarea>
                                    </div>
                                    <div class="span2" style="padding: 1%; margin-left: 0">
                                            <label for="adv_responsavel">Adv.Resp</label>
                                            
                                            <select class="span12" name="adv_responsavel" id="adv_responsavel" value="">
                                                <option value="<?php echo $result->adv_responsavel ?>"><?php echo $result->adv_responsavel ?></option>
                                            <?php 
                                                     foreach ($resultadv as $p) { 
                                                            echo '<option value="' . $p->adv_responsavel . '">' . $p->adv_responsavel . '</option>';
                                                     }
                                                     
                                                    
                                                    ?>
                                            </select>
                                        </div>
                                    
                                    <div class="span12" style="padding: 1%; margin-left: 0">
                                        <div class="span6 offset3" style="text-align: center">
                                            
                                            <button class="btn btn-primary" id="btnContinuar"><i
                                                        class="fas fa-sync-alt"></i> Atualizar
                                            </button>
                                            
                                            <a href="<?php echo base_url() ?>index.php/bradesco" class="btn"><i
                                                        class="fas fa-backward"></i> Voltar</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!--Produtos-->
                        
                        <!--Serviços-->
                        
                        <!--Anexos-->
                        

                        <!--Anotações-->
                        
                        <!-- Fim tab anotações -->
                    </div>
                </div>
                &nbsp
            </div>
        </div>
    </div>
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

        $("#formFaturar").validate({
            rules: {
                descricao: {
                    required: true
                },
                cliente: {
                    required: true
                },
                valor: {
                    required: true
                },
                vencimento: {
                    required: true
                }

            },
            messages: {
                descricao: {
                    required: 'Campo Requerido.'
                },
                cliente: {
                    required: 'Campo Requerido.'
                },
                valor: {
                    required: 'Campo Requerido.'
                },
                vencimento: {
                    required: 'Campo Requerido.'
                }
            },
            submitHandler: function (form) {
                var dados = $(form).serialize();
                $('#btn-cancelar-faturar').trigger('click');
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>index.php/os/faturar",
                    data: dados,
                    dataType: 'json',
                    success: function (data) {
                        if (data.result == true) {

                            window.location.reload(true);
                        } else {
                            Swal.fire({
                                type: "error",
                                title: "Atenção",
                                text: "Ocorreu um erro ao tentar faturar OS."
                            });
                            $('#progress-fatura').hide();
                        }
                    }
                });

                return false;
            }
        });

        $("#produto").autocomplete({
            source: "<?php echo base_url(); ?>index.php/os/autoCompleteProduto",
            minLength: 2,
            select: function (event, ui) {
                $("#idProduto").val(ui.item.id);
                $("#estoque").val(ui.item.estoque);
                $("#preco").val(ui.item.preco);
                $("#quantidade").focus();
            }
        });

        $("#servico").autocomplete({
            source: "<?php echo base_url(); ?>index.php/os/autoCompleteServico",
            minLength: 2,
            select: function (event, ui) {
                $("#idServico").val(ui.item.id);
                $("#preco_servico").val(ui.item.preco);
                $("#quantidade_servico").focus();
            }
        });


        $("#cliente1").autocomplete({
            source: "<?php echo base_url(); ?>index.php/bradesco/autoCompleteCliente",
            minLength: 2,
            select: function (event, ui) {
                $("#clientes_id1").val(ui.item.id);
            }
        });
         $("#CLIENTE").autocomplete({
            source: "<?php echo base_url(); ?>index.php/bradesco/autoCompleteCliente",
            minLength: 1,
            select: function(event, ui) {
                $("#CLIENTE").val(ui.item.id);
            }
        });
        
         $("#SITUAC").autocomplete({
            source: "<?php echo base_url(); ?>index.php/bradesco/autoCompleteSituacao",
            minLength: 1,
            select: function(event, ui) {
                $("#SITUAC").val(ui.item.id);
            }
        });
        
         $("#RESP_INICIAL").autocomplete({
            source: "<?php echo base_url(); ?>index.php/bradesco/autoCompleteUsuario",
            minLength: 1,
            select: function(event, ui) {
                $("#RESP_INICIAL").val(ui.item.id);
            }
        });

        $("#tecnico").autocomplete({
            source: "<?php echo base_url(); ?>index.php/bradesco/autoCompleteUsuario",
            minLength: 2,
            select: function (event, ui) {
                $("#usuarios_id").val(ui.item.id);
            }
        });

        $("#termoGarantia").autocomplete({
            source: "<?php echo base_url(); ?>index.php/os/autoCompleteTermoGarantia",
            minLength: 1,
            select: function (event, ui) {
                if (ui.item.id) {
                    $("#garantias_id").val(ui.item.id);
                }
            }
        });

        $('#termoGarantia').on('change', function () {
            if (!$(this).val() && $("#garantias_id").val()) {
                $("#garantias_id").val('');
                Swal.fire({
                    type: "success",
                    title: "Sucesso",
                    text: "Termo de garantia removido"
                });
            }
        });

        $("#formOs").validate({
            rules: {
                cliente: {
                    required: true
                },
                tecnico: {
                    required: true
                },
                dataInicial: {
                    required: true
                },
                dataFinal: {
                    required: true
                }
            },
            messages: {
                cliente: {
                    required: 'Campo Requerido.'
                },
                tecnico: {
                    required: 'Campo Requerido.'
                },
                dataInicial: {
                    required: 'Campo Requerido.'
                },
                dataFinal: {
                    required: 'Campo Requerido.'
                }
            },
            errorClass: "help-inline",
            errorElement: "span",
            highlight: function (element, errorClass, validClass) {
                $(element).parents('.control-group').addClass('error');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).parents('.control-group').removeClass('error');
                $(element).parents('.control-group').addClass('success');
            }
        });

        $("#formProdutos").validate({
            rules: {
                produto: {
                    required: true
                },
                preco: {
                    required: true
                },
                quantidade: {
                    required: true
                }
            },
            messages: {
                produto: {
                    required: 'Insira o produto'
                },
                preco: {
                    required: 'Insira o preço'
                },
                quantidade: {
                    required: 'Insira a quantidade'
                }
            },
            submitHandler: function (form) {
                var quantidade = parseInt($("#quantidade").val());
                var estoque = parseInt($("#estoque").val());

                <?php if (!$configuration['control_estoque']) {
                                            echo 'estoque = 1000000';
                                        }; ?>

                if (estoque < quantidade) {
                    Swal.fire({
                        type: "error",
                        title: "Atenção",
                        text: "Você não possui estoque suficiente."
                    });
                } else {
                    var dados = $(form).serialize();
                    $("#divProdutos").html("<div class='progress progress-info progress-striped active'><div class='bar' style='width: 100%'></div></div>");
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>index.php/os/adicionarProduto",
                        data: dados,
                        dataType: 'json',
                        success: function () {
                            $("#divProdutos").load("<?php echo current_url(); ?> #divProdutos");
                            $("#quantidade").val('');
                            $("#preco").val('');
                            $("#produto").val('').focus();
                        },
                        error: function () {
                            $("#divProdutos").load("<?php echo current_url(); ?> #divProdutos");
                            Swal.fire({
                                type: "error",
                                title: "Atenção",
                                text: "Ocorreu um erro ao tentar adicionar produto."
                            });
                        },
                        complete: function () {
                            $("#idProduto").val('');
                        }
                    });
                    return false;
                }
            }
        });

        $("#formServicos").validate({
            rules: {
                servico: {
                    required: true
                },
                preco: {
                    required: true
                },
                quantidade: {
                    required: true
                },
            },
            messages: {
                servico: {
                    required: 'Insira um serviço'
                },
                preco: {
                    required: 'Insira o preço'
                },
                quantidade: {
                    required: 'Insira a quantidade'
                },
            },
            submitHandler: function (form) {
                var dados = $(form).serialize();

                $("#divServicos").html("<div class='progress progress-info progress-striped active'><div class='bar' style='width: 100%'></div></div>");
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>index.php/os/adicionarServico",
                    data: dados,
                    dataType: 'json',
                    success: function () {
                        $("#divServicos").load("<?php echo current_url(); ?> #divServicos");
                        $("#quantidade_servico").val('');
                        $("#preco_servico").val('');
                        $("#servico").val('').focus();
                    },
                    error: function () {
                        $("#divServicos").load("<?php echo current_url(); ?> #divServicos");
                        Swal.fire({
                            type: "error",
                            title: "Atenção",
                            text: "Ocorreu um erro ao tentar adicionar serviço."
                        });
                    },
                    complete: function () {
                        $("#idServico").val('');
                    }
                });
                return false;
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
                    url: "<?php echo base_url(); ?>index.php/os/adicionarAnotacao",
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
                    url: "<?php echo base_url(); ?>index.php/os/anexar",
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
            var url = '<?php echo base_url(); ?>index.php/os/excluirAnexo/';
            $("#div-visualizar-anexo").html('<img src="' + link + '" alt="">');
            $("#excluir-anexo").attr('link', url + id);

            $("#download").attr('href', "<?php echo base_url(); ?>index.php/os/downloadanexo/" + id);

        });

        

        $(document).on('click', '.anotacao', function (event) {
            var idAnotacao = $(this).attr('idAcao');
            var idOS = "<?php echo $result->idBradesco; ?>"

            if ((idAnotacao % 1) == 0) {
                $("#divAnotacoes").html("<div class='progress progress-info progress-striped active'><div class='bar' style='width: 100%'></div></div>");
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>index.php/os/excluirAnotacao",
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
