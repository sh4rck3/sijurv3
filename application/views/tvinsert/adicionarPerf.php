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
                <h5>Cadastro de informações da acompanhamento de performance</h5>
               
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
                                            <label for="dataInsercao">Data<span class="required">*</span></label>
                                            <input id="dataInsercao" class="span12" type="text" name="dataInsercao" value="<?php echo date('d/m/Y'); ?>" readonly />
                                        </div>
                                        <div class="span4" >
                                            <label for="nomeCliente">Nome do Cliente</label>
                                            <input class="span12" type="text" name="nomeCliente" id="nomeCliente"/>
                                        </div>
                                        <div class="span2" >
                                            <label for="agencia">Agência</label>
                                            <input class="span12" type="text" name="agencia" id="agencia"/>
                                        </div>
                                        <div class="span2" >
                                            <label for="conta">Conta</label>
                                            <select class="span12" name="conta" id="conta">
                                                <option value="">--Selecione--</option>
                                                <option value="IMOVEL">IMOVEL</option>
                                                <option value="COMERCIAL">COMERCIAL</option>
                                                <option value="VEICULO">VEICULO</option>
                                               
                                            </select>
                                        </div>
                                        <div class="span2" >
                                            <label for="regional">Regional</label>
                                             <select class="span12" name="regional" id="regional">
                                                <option value="">--Selecione--</option>
                                                <option value="Regional Anápolis">Regional Anápolis</option>
                                                <option value="Regional Goiânia">Regional Goiânia</option>
                                                <option value="Regional RIO VERDE">Regional RIO VERDE</option>
                                                <option value="Brasilia SUL">Brasilia SUL</option>
                                                <option value="Brasilia NORTE">Brasilia NORTE</option>
                                                <option value="Regional SINOP">Regional SINOP</option>
                                                <option value="Regional CAMPO GRANDE NORTE">Regional CAMPO GRANDE NORTE</option>
                                                <option value="Regional CAMPO GRANDE SUL">Regional CAMPO GRANDE SUL</option>
<!--                                                <option value="LP">Lucro Perdido</option>-->
                                            </select>
                                            
                                        </div>
                                    </div>
                                    <div class="span12" style="padding: 1%; margin-left: 0px;">
                                        
                                        <div class="span2" >
                                            <label for="valorAcordo">Valor do acordo</label>
                                            <input class="span12 money" type="text" name="valorAcordo" id="valorAcordo"/>
                                        </div>
                                        <div class="span2" >
                                            <label for="LpMo">Tipop de contrato</label>
                                            <select class="span12" name="LpMo" id="LpMo">
                                                <option value="">--Selecione--</option>
                                                <option value="MO">Mora</option>
                                                <option value="LP">Lucro Perdido</option>
                                            </select>
                                        </div>
                                        <div class="span2" >
                                            <label for="segmento">Segmento</label>
                                            <select class="span12" name="segmento" id="segmento">
                                                <option value="">--Selecione--</option>
                                                <option value="Varejo">Varejo</option>
                                                <option value="Prime">Prime</option>
                                            </select>
                                        </div>
                                        
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
                nomeCliente: {
                    required: true
                },
                regional: {
                    required: true
                },
                conta: {
                    required: true
                },
                valorAcordo: {
                    required: true
                }
                segmento: {
                    required: true
                }
            },
            messages: {
                nomeCliente: {
                    required: 'Campo Requerido.'
                },
                regional: {
                    required: 'Campo Requerido.'
                },
                conta: {
                    required: 'Campo Requerido.'
                },
                valorAcordo: {
                    required: 'Campo Requerido.'
                },
                 segmento: {
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
