<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/jquery-ui/css/smoothness/jquery-ui-1.9.2.custom.css" />
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-ui/js/jquery-ui-1.9.2.custom.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.validate.js"></script>

<link rel="stylesheet" href="<?php echo base_url() ?>assets/trumbowyg/ui/trumbowyg.css">
<script type="text/javascript" src="<?php echo base_url() ?>assets/trumbowyg/trumbowyg.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/trumbowyg/langs/pt_br.js"></script>

<style>
    .ui-datepicker {
        z-index: 9999 !important;
    }

    .trumbowyg-box {
        margin-top: 0;
        margin-bottom: 0;
    }
</style>

<div class="row-fluid" style="margin-top:0">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="icon-tags"></i>
                </span>
                <h5>Cadastro de remessa CDL</h5>
            </div>
            <div class="widget-content nopadding tab-content">
                <div class="span12" id="divProdutosServicos" style=" margin-left: 0">

                    <ul class="nav nav-tabs">
                        <li class="active" id="tabDetalhes"><a href="#tab1" data-toggle="tab">Detalhes da do registro</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab1">
                            <div class="span12" id="divCadastrarOs">
                                <?php if ($custom_error == true) { ?>
                                    <div class="span12 alert alert-danger" id="divInfo" style="padding: 1%;">Dados incompletos, verifique os campos com asterisco ou se selecionou corretamente cliente, responsável e garantia.<br />Ou se tem um cliente e um termo de garantia cadastrado.</div>
                                <?php
                                } ?>
                                <form action="<?php echo current_url(); ?>" method="post" id="formOs">
                                    <div class="span12" style="padding: 1%">
                                        <div class="span3">
                                            <label for="NOME_DO_CLIENTE">Cliente<span class="required">*</span></label>
                                            <input id="NOME_DO_CLIENTE" class="span12" type="text" name="NOME_DO_CLIENTE" value="" />
                                           
                                        </div>
                                        <div class="span2">
                                            <label for="tecnico">Responsável<span class="required">*</span></label>
                                            <input id="tecnico" class="span12" type="text" name="tecnico" value="<?= $this->session->userdata('nome'); ?>" />
                                            <input id="responsavel" class="span12" type="hidden" name="responsavel" value="<?= $this->session->userdata('nome'); ?>" />
                                        </div>
                                        <div class="span2">
                                            <label for="DATA_DA_DESPESA">Data da despesa</label>
                                            <input id="DATA_DA_DESPESA" class="span12" type="date" name="DATA_DA_DESPESA" value="" />
                                        </div>
                                    </div>
                                    <div class="span12" style="margin-left: 0px;">
                                        <div class="span3">
                                            <label for="NOME_DO_ESCRITORIO">Nome do escritório</label>
                                            <input id="NOME_DO_ESCRITORIO" class="span12" type="text" name="NOME_DO_ESCRITORIO" value="" />
                                        </div>
                                        <div class="span2">
                                            <label for="REMESSA_N">Número da remessa</label>
                                            <input id="REMESSA_N" class="span12" type="text" name="REMESSA_N" value="" />
                                        </div>
                                        <div class="span2">
                                            <label for="COD_CAUSA_EXYON">Codigo do E-xyon</label>
                                            <input id="COD_CAUSA_EXYON" class="span12" type="text" name="COD_CAUSA_EXYON" value="" />
                                        </div>
                                        <div class="span2">
                                            <label for="TIPO_DE_ACAO">Tipo de ação</label>
                                            <input id="TIPO_DE_ACAO" class="span12" type="text" name="TIPO_DE_ACAO" value="" />
                                        </div>
                                         <div class="span2">
                                            <label for="N_DO_PROCESSO">Número de processo</label>
                                            <input id="N_DO_PROCESSO" class="span12" type="text" name="N_DO_PROCESSO" value="" />
                                        </div>
                                    </div>
                                    <div class="span12" style="margin-left: 0px;">
                                        <div class="span3">
                                            <label for="CPF_CNPJ_CLIENTE">CPF CNPJ</label>
                                            <input id="CPF_CNPJ_CLIENTE" class="span12" type="text" name="CPF_CNPJ_CLIENTE" value="" />
                                        </div>
                                        <div class="span2">
                                            <label for="COMARCA">Comarca</label>
                                            <input id="COMARCA" class="span12" type="text" name="COMARCA" value="" />
                                        </div>
                                        <div class="span2">
                                            <label for="UF">UF</label>
                                            <input id="UF" class="span12" type="text" name="UF" value="" />
                                        </div>
                                        <div class="span3">
                                            <label for="DESCRICAO_DAS_CUSTAS_DES">Descrição de custas e despesas</label>
                                            <input id="DESCRICAO_DAS_CUSTAS_DES" class="span12" type="text" name="DESCRICAO_DAS_CUSTAS_DES" value="" />
                                        </div>
                                         <div class="span2">
                                            <label for="VALOR">Valor</label>
                                            <input id="VALOR" class="span12 money" type="text" name="VALOR" value="" />
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="span12" style="padding: 1%; margin-left: 0">
                                        <div class="span6 offset3" style="text-align: center">
                                            <button class="btn btn-success" id="btnContinuar"><i class="fas fa-plus"></i> Continuar</button>
                                            <a href="<?php echo base_url() ?>index.php/os" class="btn"><i class="fas fa-backward"></i> Voltar</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                .
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url(); ?>assets/js/maskmoney.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        
        $(".money").maskMoney();
        
        $("#cliente").autocomplete({
            source: "<?php echo base_url(); ?>index.php/os/autoCompleteCliente",
            minLength: 1,
            select: function(event, ui) {
                $("#clientes_id").val(ui.item.id);
            }
        });
        $("#tecnico").autocomplete({
            source: "<?php echo base_url(); ?>index.php/os/autoCompleteUsuario",
            minLength: 1,
            select: function(event, ui) {
                $("#usuarios_id").val(ui.item.id);
            }
        });
        $("#termoGarantia").autocomplete({
            source: "<?php echo base_url(); ?>index.php/os/autoCompleteTermoGarantia",
            minLength: 1,
            select: function(event, ui) {
                $("#garantias_id").val(ui.item.id);
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
    });
</script>

