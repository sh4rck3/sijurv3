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
            <?php //var_dump($result2); ?>
            <div class="widget-title">
                <span class="icon">
                    <i class="icon-tags"></i>
                </span>
                <h5>Cadastro de novo registro</h5>
            </div>
            <div class="widget-content nopadding tab-content">
                <div class="span12" id="divProdutosServicos" style=" margin-left: 0">

                    <ul class="nav nav-tabs">
                        <li class="active" id="tabDetalhes"><a href="#tab1" data-toggle="tab">Detalhes do registro</a></li>
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
                                            <label >GCPJ<span class="required">*</span></label>
                                            <input class="span12" id="GCPJ" autocomplete="off"  type="text" name="GCPJ"  />
                                        </div>
                                        <div class="span2">
                                            <label for="DataEntrada">Data de entrada</label>
                                            <input id="DataEntrada" autocomplete="off" class="span12" type="date" name="DataEntrada" value="<?php echo date('Y-m-d'); ?>" readonly/>
                                        </div>
                                        <div class="span4">
                                            <label for="CLIENTE">Cliente</label>
                                            <input id="CLIENTE" class="span12" type="text" name="CLIENTE" value="" />
                                            
                                        </div>
                                        <div class="span4">
                                            <label for="RESP_INICIAL">Responsável pela Inicial</label>
                                            <input id="RESP_INICIAL" class="span12" type="text" name="RESP_INICIAL" value="" />
                                            <input id="RESPONSAVEL" class="span12" type="hidden" name="RESPONSAVEL" value="<?= $this->session->userdata('nome'); ?>" />
                                        </div>
                                    </div>
                                    <div class="span12" style="padding: 1%; margin-left: 0">
                                        <div class="span6">
                                            <label for="OBS">Observação(Situação 2)<span class="required">*</span></label>
                                            <select class="span12" name="OBS" id="OBS" value="">
                                                <option value="">--Selecione--</option>
                                            <?php
                                             foreach ($result2 as $p) { 
                                                    echo '<option value="' . $p->OBS . '">' . $p->OBS . '</option>';
                                             } ?>
                                            </select>
<!--                                            <input id="OBS" class="span12" type="text" name="OBS" value="" />-->
                                            
                                        </div>
                                        <div class="span6">
                                            <label for="SITUAC">Pre-Juridic</label>
                                            <input id="SITUAC" class="span12" type="text" name="SITUAC" value="" />
                                            
                                        </div>
                                        
                                    </div>
                                    <div class="span12" style="padding: 1%; margin-left: 0">
                                        <div class="span12">
                                            <label for="OBS">Situação-Iniciais<span class="required">*</span></label>
                                            <select class="span12" name="situacao_iniciais" id="situacao_iniciais" value="">
                                                <option value="">--Selecione--</option>
                                            <?php
                                             foreach ($resultInicial as $p) { 
                                                    echo '<option value="' . $p->situacao_iniciais . '">' . $p->situacao_iniciais . '</option>';
                                             } ?>
                                            </select>
<!--                                            <input id="OBS" class="span12" type="text" name="OBS" value="" />-->
                                            
                                        </div>
                                        
                                        
                                    </div>
                                    <div class="span12" style="padding: 1%; margin-left: 0">
                                        <div class="span4">
                                            <label for="STATUS">Status</label>
                                            <select class="span12" name="STATUS" id="status" value="">
                                                <option value="">--Selecione--</option>
                                                <option value="Pendente">Pendente</option>
                                                <option value="ENCERRADO">ENCERRADO</option>
                                                <option value="OK NO PRAZO">OK NO PRAZO</option>
                                                
                                            </select>
                                        </div>
                                         
                                        
                                        <div class="span1">
                                            <label >Agencia</label>
                                            <input class="span12" id="AGENCIA" autocomplete="off" " type="text" name="AGENCIA" value="" />
                                        </div>
                                        <div class="span1">
                                            <label >Conta</label>
                                            <input class="span12" id="CONTA" autocomplete="off" type="text" name="CONTA" value="" />
                                        </div>
                                        <div class="span1">
                                            <label >Carteira</label>
                                            <input class="span12" id="CARTEIRA" autocomplete="off"  type="text" name="CARTEIRA" value="" />
                                        </div>
                                        <div class="span1">
                                            <label >Contrato</label>
                                            <input class="span12" id="CONTRATO" autocomplete="off"  type="text" name="CONTRATO" value="" />
                                        </div>
                                        <div class="span2">
                                            <label for="dataInicial">Data RetControladoria</label>
                                            <input id="DT_RET_CONTROL" autocomplete="off" class="span12" type="date" name="DT_RET_CONTROL" value="<?php echo date('d/m/Y'); ?>" />
                                        </div>
                                        <div class="span2">
                                            <label for="dataInicial">Data Ahuizamento</label>
                                            <input id="DT_AJUIZ" autocomplete="off" class="span12 " type="date" name="DT_AJUIZ" value="<?php echo date('d/m/Y'); ?>" />
                                        </div>
                                        
                                       

                                    </div>
                                    <div class="span6" style="padding: 1%; margin-left: 0">
                                        <label for="descricaoProduto">
                                            <h4>Observação</h4>
                                        </label>
                                        <textarea class="span6 editor" name="OBSERVACAO" id="OBSERVACAO" cols="30" rows="5"></textarea>
                                    </div>
                                    <div class="span2" style="padding: 1%; margin-left: 0">
                                            <label for="adv_responsavel">Adv.Resp</label>
                                       <select class="span12" name="adv_responsavel" id="adv_responsavel" value="">
                                                <option value="">--Selecione--</option>
                                            <?php
                                             foreach ($resultadv as $p) { 
                                                    echo '<option value="' . $p->adv_responsavel . '">' . $p->adv_responsavel . '</option>';
                                             } ?>
                                            </select>
                                        </div>
<!--                                    <div class="span6" style="padding: 1%; margin-left: 0">
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
                                    </div>-->
                                    <div class="span12" style="padding: 1%; margin-left: 0">
                                        <div class="span6 offset3" style="text-align: center">
                                            <button class="btn btn-success" id="btnContinuar"><i class="fas fa-plus"></i> Continuar</button>
                                            <a href="<?php echo base_url() ?>index.php/bradesco" class="btn"><i class="fas fa-backward"></i> Voltar</a>
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
        $("#CLIENTE").autocomplete({
            source: "<?php echo base_url(); ?>index.php/bradesco/autoCompleteCliente",
            minLength: 1,
            select: function(event, ui) {
                $("#CLIENTE").val(ui.item.id);
            }
        });
        
        $("#RESP_INICIAL").autocomplete({
            source: "<?php echo base_url(); ?>index.php/bradesco/autoCompleteUsuario",
            minLength: 1,
            select: function(event, ui) {
                $("#RESP_INICIAL").val(ui.item.id);
            }
        });
        
        $("#GCPJ").autocomplete({
            source: "<?php echo base_url(); ?>index.php/bradesco/autoCompleteGCPJ",
            minLength: 1,
            select: function(event, ui) {
                $("#GCPJ").val(ui.item.id);
            }
        });
        $("#tecnico").autocomplete({
            source: "<?php echo base_url(); ?>index.php/bradesco/autoCompleteUsuario",
            minLength: 1,
            select: function(event, ui) {
                $("#usuarios_id").val(ui.item.id);
            }
        });
        
       $("#SITUAC").autocomplete({
            source: "<?php echo base_url(); ?>index.php/bradesco/autoCompleteSituacao",
            minLength: 1,
            select: function(event, ui) {
                $("#SITUAC").val(ui.item.id);
            }
        });
        

        $("#formOs").validate({
            rules: {
                GCPJ: {
                    required: true
                }

            },
            messages: {
                GCPJ: {
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
