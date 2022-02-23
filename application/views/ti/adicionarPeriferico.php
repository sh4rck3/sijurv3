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
                <h5>Inventário de Fones</h5>
            </div>
            <div class="widget-content nopadding tab-content">
                <div class="span12" id="divProdutosServicos" style=" margin-left: 0">

                    <ul class="nav nav-tabs">
                        <li class="active" id="tabDetalhes"><a href="#tab1" data-toggle="tab">Detalhes do Equipamento</a></li>
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
                                        <div class="span2">
                                            <label for="setor">Setor</label>
                                            <select class="span12" name="setor" id="setor">
                                                <option value="">--Selecione--</option>
                                                <option value="TI">TI</option>
                                                <option value="Acordos Bradesco">Acordos Bradesco</option>
                                                <option value="RH">RH</option>
                                                <option value="Retomadas">Retomadas</option>
                                                <option value="Iniciais">Iniciais</option>
                                                <option value="Acordos Safra">Acordos Safra</option>
                                                <option value="Controladoria">Controladoria</option>
                                                <option value="Setor Jurídico1">Setor Jurídico1</option>
                                                <option value="Setor Jurídico2">Setor Jurídico2</option>
                                                <option value="Setor Jurídico3">Setor Jurídico3</option>
                                                <option value="Setor Jurídico4">Setor Jurídico4</option>
                                            </select>
                                          
                                        </div>
                                         <div class="span2">
                                            <label for="status">Status</label>
                                            <select class="span12" name="status" id="status" value="">
                                                <option value="Em uso">Em uso</option>
                                                <option value="Guardado">Guardado</option>
                                                <option value="Com defeito">Com defeito</option>
                                                
                                            </select>
                                        </div>
                                        <div class="span2">
                                            <label for="tipoProduto">Tipo do produto</label>
                                            <select class="span12" name="tipoProduto" id="tipoProduto" >
                                                <option value="">--Selecione--</option>
                                                <option value="Computador">Computador</option>
                                                <option value="Monitor">Monitor</option>
                                                <option value="Fone">Fone</option>
                                                <option value="Base">Base</option>
                                                <option value="Telefone IP">Telefone IP</option>
                                                <option value="Notebook">Notebook</option>
                                                
                                            </select>
                                        </div>
                                         <div class="span2">
                                            <label for="quantidade">Quantidade<span class="required">*</span></label>
                                            <input id="quantidade" autocomplete="off" class="span12" type="number" name="quantidade"/>
                                        </div>
                                        <div class="span2">
                                            <label for="dataInicial">Data Entrada<span class="required">*</span></label>
                                            <input id="dataInicial" autocomplete="off" class="span12 datepicker" type="text" name="dataInicial" value="<?php echo date('d/m/Y'); ?>" readonly/>
                                        </div>
                                       
                                        <div class="span2">
                                            <label for="tecnico">Técnico<span class="required">*</span></label>
                                            <input id="tecnico" class="span12" type="text" name="tecnico" value="<?= $this->session->userdata('nome'); ?>" readonly/>
                                            <input id="usuarios_id" class="span12" type="hidden" name="usuarios_id" value="<?= $this->session->userdata('id'); ?>" />
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
<script type="text/javascript">
    $(document).ready(function() {
        $("#cliente").autocomplete({
            source: "<?php echo base_url(); ?>index.php/ti/autoCompleteCliente",
            minLength: 1,
            select: function(event, ui) {
                $("#clientes_id").val(ui.item.id);
            }
        });
        $("#tecnico").autocomplete({
            source: "<?php echo base_url(); ?>index.php/ti/autoCompleteUsuario",
            minLength: 1,
            select: function(event, ui) {
                $("#usuarios_id").val(ui.item.id);
            }
        });
        $("#termoGarantia").autocomplete({
            source: "<?php echo base_url(); ?>index.php/ti/autoCompleteTermoGarantia",
            minLength: 1,
            select: function(event, ui) {
                $("#garantias_id").val(ui.item.id);
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
        $(".datepicker").datepicker({
            dateFormat: 'dd/mm/yy'
        });
        $('.editor').trumbowyg({
            lang: 'pt_br'
        });
    });
</script>
