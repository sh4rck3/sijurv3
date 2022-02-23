<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/jquery-ui/css/smoothness/jquery-ui-1.9.2.custom.css" />
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-ui/js/jquery-ui-1.9.2.custom.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.validate.js"></script>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/trumbowyg/ui/trumbowyg.css">
<script type="text/javascript" src="<?php echo base_url() ?>assets/trumbowyg/trumbowyg.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/trumbowyg/langs/pt_br.js"></script>

<div class="row-fluid" style="margin-top:0">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="fas fa-cash-register"></i>
                </span>
                <h5>Cadastro de venda</h5>
                <?php 
                //var_dump($results);
                 foreach ($results as $r) {
                        $meta_comercial = $r->comercial_meta;
                        $batido_comercial = $r->comercial_batido;
                        $meta_veiculo = $r->veiculo_meta;
                        $batido_veiculo = $r->veiculo_batido;
                        $meta_imovel = $r->imovel_meta;
                        $batido_imovel = $r->imovel_batido;
                    }
                   // echo 'R$' . number_format($meta_comercial, 2, ',', '.') . ' Valor';
                ?>
            </div>
            <div class="widget-content nopadding tab-content">
                <div class="span12" id="divProdutosServicos" style=" margin-left: 0">
                    <ul class="nav nav-tabs">
                        <li class="active" id="tabDetalhes"><a href="#tab1" data-toggle="tab">Detalhes das informações</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab1">
                            <div class="span12" id="divCadastrarOs">
                                <?php if ($custom_error == true) { ?>
                                    <div class="span12 alert alert-danger" id="divInfo" style="padding: 1%;">Dados incompletos, verifique os campos com asterisco ou se selecionou corretamente cliente e responsável.</div>
                                <?php } ?>
                                <form action="<?php echo current_url(); ?>" method="post" id="formVendas">
                                    <div class="span12" style="padding: 1%">
                                        <div class="span2">
                                            <label for="data_atualizacao">Data<span class="required">*</span></label>
                                            <input id="data_atualizacao" class="span12 datepicker" type="text" name="data_atualizacao" value="<?php echo date('d/m/Y'); ?>" readonly />
                                        </div>
                                    </div>
                                     <div class="span12" style="padding: 1%; margin-left: 0px;">
                                        <h3>Meta</h3>
                                    </div>
                                    <div class="span12" style="padding: 1%; margin-left: 0px;">
                                        <div class="span2" >
                                            <label for="comercial_meta">Valor meta da carteira comercial*</label>
                                            
                                           
                                            <input class="span12 money" type="text" name="comercial_meta" id="comercial_meta" value="<?php echo number_format($meta_comercial, 2, ',', '.') ?>"/>
                                        </div>
                                        <div class="span2" >
                                            <label for="veiculo_meta">Valor meta da carteira veiculo*</label>
                                            
                                            
                                            <input class="span12 money" type="text" name="veiculo_meta" id="veiculo_meta" value="<?php echo number_format($meta_veiculo, 2, ',', '.') ?>"/>
                                        </div>
                                        <div class="span2" >
                                            <label for="imovel_meta">Valor meta da carteira imovel*</label>
                                           
                                           
                                            <input class="span12 money" type="text" name="imovel_meta" id="imovel_meta" value="<?php echo number_format($meta_imovel, 2, ',', '.') ?>"/>
                                        </div>
                                    </div>
                                    <div class="span12" style="padding: 1%; margin-left: 0px;">
                                        <h3>Valor Batido</h3>
                                    </div>
                                        <div class="span12" style="padding: 1%; margin-left: 0px;">
                                        
                                        
                                         <div class="span2" >
                                            <label for="comercial_batido">Valor batido da carteira comercial*</label>
                                            
                                            
                                            <input class="span12 money" type="text" name="comercial_batido" id="comercial_batido"/>
                                        </div>
                                        
                                         <div class="span2" >
                                            <label for="veiculo_batido">Valor batido da carteira veiculo*</label>
                                            
                                            
                                            <input class="span12 money" type="text" name="veiculo_batido" id="veiculo_batido"/>
                                        </div>
                                            <div class="span2" >
                                            <label for="imovel_batido">Valor batido da carteira imovel*</label>
                                            
                                            <input class="span12 money" type="text" name="imovel_batido" id="imovel_batido"/>
                                        </div>
                                        
                                    </div>
                                    <div class="span12" style="padding: 1%; margin-left: 0px;">
                                        
                                        
                                         
                                        
                                    </div>

                                   

                                    <div class="span12" style="padding: 1%; margin-left: 0">
                                        <div class="span6 offset3" style="text-align: center">
                                            <button class="btn btn-success" id="btnContinuar"><i class="fas fa-share"></i> Continuar</button>
                                            <a href="<?php echo base_url() ?>index.php/vendas" class="btn"><i class="fas fa-backward"></i> Voltar</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                &nbsp
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url(); ?>assets/js/maskmoney.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function ($) {

        $(".money").maskMoney();

        $('#pago').click(function (event) {
            var flag = $(this).is(':checked');
            if (flag == true) {
                $('#divPagamento').show();
            } else {
                $('#divPagamento').hide();
            }
        });


        $('#recebido').click(function (event) {
            var flag = $(this).is(':checked');
            if (flag == true) {
                $('#divRecebimento').show();
            } else {
                $('#divRecebimento').hide();
            }
        });

        $('#pagoEditar').click(function (event) {
            var flag = $(this).is(':checked');
            if (flag == true) {
                $('#divPagamentoEditar').show();
            } else {
                $('#divPagamentoEditar').hide();
            }
        });


        $("#formReceita").validate({
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
            submitHandler: function(form) {
                $("#submitReceita").attr("disabled", true);
                form.submit();
            }
        });


        $("#formDespesa").validate({
            rules: {
                descricao: {
                    required: true
                },
                fornecedor: {
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
                fornecedor: {
                    required: 'Campo Requerido.'
                },
                valor: {
                    required: 'Campo Requerido.'
                },
                vencimento: {
                    required: 'Campo Requerido.'
                }
            },
            submitHandler: function(form) {
                $("#submitDespesa").attr("disabled", true);
                form.submit();
            }
        });


        $(document).on('click', '.excluir', function (event) {
            $("#idExcluir").val($(this).attr('idLancamento'));
        });


        $(document).on('click', '.editar', function (event) {
            $("#idEditar").val($(this).attr('idLancamento'));
            $("#descricaoEditar").val($(this).attr('descricao'));
            $("#usuarioEditar").val($(this).attr('usuario'));
            $("#fornecedorEditar").val($(this).attr('cliente'));
            $("#observacoes_edit").val($(this).attr('observacoes'));
            $("#valorEditar").val($(this).attr('valor'));
            $("#vencimentoEditar").val($(this).attr('vencimento'));
            $("#pagamentoEditar").val($(this).attr('pagamento'));
            $("#formaPgtoEditar").val($(this).attr('formaPgto'));
            $("#tipoEditar").val($(this).attr('tipo'));
            $("#urlAtualEditar").val($(location).attr('href'));
            var baixado = $(this).attr('baixado');
            if (baixado == 1) {
                $("#pagoEditar").prop('checked', true);
                $("#divPagamentoEditar").show();
            } else {
                $("#pagoEditar").prop('checked', false);
                $("#divPagamentoEditar").hide();
            }


        });

        $(document).on('click', '#btnExcluir', function (event) {
            var id = $("#idExcluir").val();

            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>index.php/financeiro/excluirLancamento",
                data: "id=" + id,
                dataType: 'json',
                success: function (data) {
                    if (data.result == true) {
                        $("#btnCancelExcluir").trigger('click');
                        $("#divLancamentos").html('<div class="progress progress-striped active"><div class="bar" style="width: 100%;"></div></div>');
                        $("#divLancamentos").load($(location).attr('href') + " #divLancamentos");

                    } else {
                        $("#btnCancelExcluir").trigger('click');
                        Swal.fire({
                            type: "error",
                            title: "Atenção",
                            text: "Ocorreu um erro ao tentar excluir produto."
                        });
                    }
                }
            });
            return false;
        });
        let controlBaixa = "<?php echo $configuration['control_baixa']; ?>";
        let datePickerOptions = {
            dateFormat: 'dd/mm/yy',
        };
        if (controlBaixa === '1') {
            datePickerOptions.minDate = 0;
            datePickerOptions.maxDate = 0;
        }
        $(".datepicker2").datepicker(
            datePickerOptions
        );
        $(".datepicker").datepicker();
        $('#periodo').on('change', function (event) {
            const period = $('#periodo').val();

            switch (period) {
                case 'dia':
                    $('#vencimento_de').val(dayjs().locale('pt-br').format('DD/MM/YYYY'));
                    $('#vencimento_ate').val(dayjs().locale('pt-br').format('DD/MM/YYYY'));
                    break;
                case 'semana':
                    $('#vencimento_de').val(dayjs().startOf('week').locale('pt-br').format('DD/MM/YYYY'));
                    $('#vencimento_ate').val(dayjs().endOf('week').locale('pt-br').format('DD/MM/YYYY'));
                    break;
                case 'mes':
                    $('#vencimento_de').val(dayjs().startOf('month').locale('pt-br').format('DD/MM/YYYY'));
                    $('#vencimento_ate').val(dayjs().endOf('month').locale('pt-br').format('DD/MM/YYYY'));
                    break;
                case 'ano':
                    $('#vencimento_de').val(dayjs().startOf('year').locale('pt-br').format('DD/MM/YYYY'));
                    $('#vencimento_ate').val(dayjs().endOf('year').locale('pt-br').format('DD/MM/YYYY'));
                    break;
            }
        });

        $("#cliente_fornecedor").autocomplete({
            source: "<?php echo base_url(); ?>index.php/financeiro/autoCompleteClienteFornecedor",
            minLength: 1,
            select: function (event, ui) {
                $("#cliente_fornecedor").val(ui.item.value);
                $("#idFornecedor").val(ui.item.id);
            }
        });
        $("#cliente").autocomplete({
            source: "<?php echo base_url(); ?>index.php/financeiro/autoCompleteClienteAddReceita",
            minLength: 1,
            select: function (event, ui) {
                $("#cliente").val(ui.item.label);
                $("#idCliente").val(ui.item.id);
            }
        });
        $("#fornecedor").autocomplete({
            source: "<?php echo base_url(); ?>index.php/financeiro/autoCompleteClienteAddReceita",
            minLength: 1,
            select: function (event, ui) {
                $("#fornecedor").val(ui.item.label);
                $("#idFornecedor").val(ui.item.id);
            }
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.addclient').hide();
        $("#cliente").autocomplete({
            source: "<?php echo base_url(); ?>index.php/vendas/autoCompleteCliente",
            minLength: 1,
            close: function(ui) { if(ui.label == 'Adicionar cliente...')ui.target.value = '';},
            select: function(event, ui) {
                if(ui.item.label == 'Adicionar cliente...')
                    $('.addclient').show();
                else
                    {
                        $("#clientes_id").val(ui.item.id);
                        $('.addclient').hide();
                    }
            }
        });
        $("#tecnico").autocomplete({
            source: "<?php echo base_url(); ?>index.php/vendas/autoCompleteUsuario",
            minLength: 1,
            select: function(event, ui) {
                $("#usuarios_id").val(ui.item.id);
            }
        });
        $("#formVendas").validate({
            rules: {
                cliente: {
                    required: true
                },
                tecnico: {
                    required: true
                },
                dataVenda: {
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
                dataVenda: {
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
        $(".datepicker").datepicker({
            dateFormat: 'dd/mm/yy'
        });
        $('.editor').trumbowyg({
            lang: 'pt_br'
        });
        $('.addclient').hide();
    });
</script>
