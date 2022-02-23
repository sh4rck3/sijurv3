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
                <h5>Inventário</h5>
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
                                                <option value="cordos Bradesco">Acordos Bradesco</option>
                                                <option value="RH">RH</option>
                                                <option value="Retomadas">Retomadas</option>
                                                <option value="Acordos Safra">Acordos Safra</option>
                                                <option value="Controladoria">Controladoria</option>
                                                <option value="Setor Jurídico">Setor Jurídico</option>
                                                <option value="PC TV">PC TV</option>
                                            </select>
                                          
                                        </div>
                                        <div class="span2">
                                            <label for="numeroSerie">Nº de Série<span class="required">*</span></label>
                                            <input id="numeroSerie" class="span12" type="text" name="numeroSerie" value="" />
                                          
                                        </div>
                                        <div class="span2">
                                             <label for="marca">Marca</label>
                                            <select class="span12" name="marca" id="marca">
                                                <option value="">--Selecione--</option>
                                                <option value="Lenovo">Lenovo</option>
                                                <option value="Dell">Dell</option>
                                                <option value="LG">LG</option>
                                                <option value="HP">HP</option>
                                                <option value="Accer">Accer</option>
                                               
                                            </select>
                                          
                                        </div>
                                        <div class="span2">
                                            <label for="modelo">Modelo</label>
                                            <input id="modelo" class="span12" type="text" name="modelo" value="" />
                                          
                                        </div>
                                        <div class="span2">
                                            <label for="processador">Processador</label>
                                            <input id="processador" class="span12" type="text" name="processador" value="" />
                                          
                                        </div>
                                        <div class="span2">
                                            <label for="tecnico">Técnico<span class="required">*</span></label>
                                            <input id="tecnico" class="span12" type="text" name="tecnico" value="<?= $this->session->userdata('nome'); ?>" readonly/>
                                            <input id="usuarios_id" class="span12" type="hidden" name="usuarios_id" value="<?= $this->session->userdata('id'); ?>" />
                                        </div>
                                    </div>
                                    <div class="span12" style="padding: 1%; margin-left: 0">
                                          <div class="span2">
                                            <label for="memory">Memória</label>
                                            <input id="memory" class="span12" type="text" name="memory" value="" />
                                          
                                        </div>
                                        <div class="span2">
                                            <label for="hardDrive">HD</label>
                                            <input id="hardDrive" class="span12" type="text" name="hardDrive" value="" />
                                          
                                        </div>
                                        <div class="span2">
                                            <label for="mac">MAC</label>
                                            <input id="mac" class="span12" type="text" name="mac" value="" />
                                          
                                        </div>
                                        
                                        <div class="span2">
                                            <label for="dataInicial">Data Entrada<span class="required">*</span></label>
                                            <input id="dataInicial" autocomplete="off" class="span12 datepicker" type="text" name="dataInicial" value="<?php echo date('d/m/Y'); ?>" readonly/>
                                        </div>
                                        <div class="span2">
                                            <label for="status">Status</label>
                                            <select class="span12" name="status" id="status" value="">
                                                <option value="Orçamento">Orçamento</option>
                                                <option value="Aberto">Aberto</option>
                                                <option value="Em Andamento">Em Andamento</option>
                                                <option value="Finalizado">Finalizado</option>
                                                <option value="Cancelado">Cancelado</option>
                                                <option value="Aguardando Peças">Aguardando Peças</option>
                                                <option value="Guardado">Guardado</option>
                                                <option value="Defeito">Defeito</option>
                                            </select>
                                        </div>
                                        <div class="span2">
                                            <label for="status">Tipo Produto</label>
                                            <select name="tipoProduto" id="tipoProduto" class="span12">
                                                <option value="">Selecione status</option>
                                                <option value="Computador">Computador</option>
                                                <option value="Fone">Fone</option>
                                                <option value="Monitor">Monitor</option>
                                                <option value="Telefone">Telefone</option>

                                            </select>
                                        </div>

                                        
                                    </div>
                                     <div class="span12" style="padding: 1%; margin-left: 0">
                                          <div class="span4">
                                            <label for="office">Office</label>
                                            <input id="office" class="span12" type="text" name="office" value="" />
                                          
                                        </div>
                                         <div class="span4">
                                            <label for="windows">Windows</label>
                                            <input id="windows" class="span12" type="text" name="windows" value="" />
                                          
                                        </div>
<!--                                        <div class="span4">
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
                                        </div>-->
                                     </div>
                                    <div class="span6" style="padding: 1%; margin-left: 0">
                                        <label for="descricaoProduto">
                                            <h4>Descrição Produto/Serviço</h4>
                                        </label>
                                        <textarea class="span12 editor" name="descricaoProduto" id="descricaoProduto" cols="30" rows="5"></textarea>
                                    </div>
                                    <div class="span6" style="padding: 1%; margin-left: 0">
                                        <label for="defeito">
                                            <h4>Defeito</h4>
                                        </label>
                                        <textarea class="span12 editor" name="defeito" id="defeito" cols="30" rows="5"></textarea>
                                    </div>
                                    <div class="span6" style="padding: 1%; margin-left: 0">
                                        <label for="observacoes">
                                            <h4>Observações</h4>
                                        </label>
                                        <textarea class="span12 editor" name="observacoes" id="observacoes" cols="30" rows="5"></textarea>
                                    </div>
                                    <div class="span6" style="padding: 1%; margin-left: 0">
                                        <label for="laudoTecnico">
                                            <h4>Laudo Técnico</h4>
                                        </label>
                                        <textarea class="span12 editor" name="laudoTecnico" id="laudoTecnico" cols="30" rows="5"></textarea>
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
        $("#numeroSerie").autocomplete({
            source: "<?php echo base_url(); ?>index.php/ti/autoCompleteEtiqueta",
            minLength: 1,
            select: function(event, ui) {
                $("#numeroSerie").val(ui.item.id);
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
