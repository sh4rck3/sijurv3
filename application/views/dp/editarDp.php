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
                <h5>Remessas CDL</h5>
                
            </div>
            <div class="widget-content nopadding tab-content">
                <div class="span12" id="divProdutosServicos" style=" margin-left: 0">
                    <ul class="nav nav-tabs">
                        <li class="active" id="tabDetalhes"><a href="#tab1" data-toggle="tab">Detalhes da remessa</a></li>
                        
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab1">
                            <div class="span12" id="divCadastrarOs">
                                <form action="<?php echo current_url(); ?>" method="post" id="formOs">
                                    <?php echo form_hidden('idCdl', $result->idCdl) ?>
                                    <div class="span12" style="padding: 1%; margin-left: 0">
                                        <h3>N° registro CDL:
                                            <?php echo $result->idCdl; ?>
                                        </h3>
                                        <div class="span3" style="margin-left: 0">
                                            <label for="NOME_DO_CLIENTE">Nome do cliente<span class="required">*</span></label>
                                            <input id="NOME_DO_CLIENTE" class="span12" type="text" name="NOME_DO_CLIENTE" value="<?php echo $result->NOME_DO_CLIENTE ?>"/>
                                        </div>
                                         <div class="span2" >
                                            <label for="CPF_CNPJ_CLIENTE">CPF / CNPJ</label>
                                            <input id="CPF_CNPJ_CLIENTE" class="span12" type="text" name="CPF_CNPJ_CLIENTE" value="<?php echo $result->CPF_CNPJ_CLIENTE ?>"/>
                                        </div>
                                         <div class="span2" >
                                            <label for="NOME_DO_ESCRITORIO">Nome do escritório</label>
                                            <input id="NOME_DO_ESCRITORIO" class="span12" type="text" name="NOME_DO_ESCRITORIO" value="<?php echo $result->NOME_DO_ESCRITORIO ?>"/>
                                        </div>
                                         <div class="span2" >
                                            <label for="REMESSA_N">Número da remessa</label>
                                            <input id="REMESSA_N" class="span12" type="text" name="REMESSA_N" value="<?php echo $result->REMESSA_N ?>"/>
                                        </div>
                                        <div class="span3" >
                                            <label for="COD_CAUSA_EXYON">Código de causa exyon</label>
                                            <input id="COD_CAUSA_EXYON" class="span12" type="text" name="COD_CAUSA_EXYON" value="<?php echo $result->COD_CAUSA_EXYON ?>"/>
                                        </div>
                                        
                                    </div>
                                    <div class="span12" style="padding: 1%; margin-left: 0">
                                        
                                        <div class="span2" style="margin-left: 0">
                                            <label for="TIPO_DE_ACAO">Tipo de ação</label>
                                            <input id="TIPO_DE_ACAO" class="span12" type="text" name="TIPO_DE_ACAO" value="<?php echo $result->TIPO_DE_ACAO ?>"/>
                                        </div>
                                         <div class="span2" >
                                            <label for="N_DO_PROCESSO">Número do processo</label>
                                            <input id="N_DO_PROCESSO" class="span12" type="text" name="N_DO_PROCESSO" value="<?php echo $result->N_DO_PROCESSO ?>"/>
                                        </div>
                                         <div class="span2" >
                                            <label for="COMARCA">Comarca</label>
                                            <input id="COMARCA" class="span12" type="text" name="COMARCA" value="<?php echo $result->COMARCA ?>"/>
                                        </div>
                                         <div class="span1" >
                                            <label for="UF">UF</label>
                                            <input id="UF" class="span12" type="text" name="UF" value="<?php echo $result->UF ?>"/>
                                        </div>
                                        <div class="span2" >
                                            <label for="DESCRICAO_DAS_CUSTAS_DES">Descrição das custas</label>
                                            <input id="DESCRICAO_DAS_CUSTAS_DES" class="span12" type="text" name="DESCRICAO_DAS_CUSTAS_DES" value="<?php echo $result->DESCRICAO_DAS_CUSTAS_DES ?>"/>
                                        </div>
                                        <div class="span1" >
                                            <label for="VALOR">Valor</label>
                                            <input id="VALOR" class="span12 money" type="text" name="VALOR" value="<?php echo $result->VALOR ?>"/>
                                        </div>
                                        <div class="span2" >
                                            <label for="DATA_DA_DESPESA">Data da despesa</label>
                                            <input id="COMADATA_DA_DESPESARCA" class="span12" type="date" name="DATA_DA_DESPESA" value="<?php echo $result->DATA_DA_DESPESA ?>"/>
                                        </div>
                                        
                                    </div>
                                    
                                    
                                    <div class="span12" style="padding: 1%; margin-left: 0">
                                        <div class="span6 offset3" style="text-align: center">
                                       
                                            <button class="btn btn-primary" id="btnContinuar"><i
                                                        class="fas fa-sync-alt"></i> Atualizar
                                            </button>
                                           
                                            <a href="<?php echo base_url() ?>index.php/dp" class="btn"><i
                                                        class="fas fa-backward"></i> Voltar</a>
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





<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.validate.js"></script>
<script src="<?php echo base_url(); ?>assets/js/maskmoney.js"></script>

<script type="text/javascript">
    $(document).ready(function () {

        $(".money").maskMoney();
        
        $("#formOs").validate({
            rules: {
                NOME_DO_CLIENTE: {
                    required: true
                }
            },
            messages: {
                NOME_DO_CLIENTE: {
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

       

  

        $(".datepicker").datepicker({
            dateFormat: 'dd/mm/yy'
        });

        $('.editor').trumbowyg({
            lang: 'pt_br'
        });
    });
</script>
