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
                <h5>Cadastro de ficha do Funcionários</h5>
            </div>
            <div class="widget-content nopadding tab-content">
                <div class="span12" id="divProdutosServicos" style=" margin-left: 0">

                    <ul class="nav nav-tabs">
                        <li class="active" id="tabDetalhes"><a href="#tab1" data-toggle="tab">Detalhes da ficha do funcionário</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab1">
                            <div class="span12" id="divCadastrarOs">
                                <?php if ($custom_error == true) { ?>
                                    <div class="span12 alert alert-danger" id="divInfo" style="padding: 1%;">Dados incompletos, verifique os campos com asterisco ou se selecionou corretamente cliente, responsável e garantia.<br />Ou se tem um cliente e um termo de garantia cadastrado.</div>
                                <?php
                                } ?>
                                <form action="<?php echo current_url(); ?>" method="post" id="formDp">
                                    <div class="span12" style="padding: 1%">
                                        <div class="span6">
                                            <label for="nomeFuncionario">Nome completo<span class="required">*</span></label>
                                            <input id="nomeFuncionario" class="span12" type="text" name="nomeFuncionario" value="" />
                                            <input id="idFuncionario" class="span12" type="hidden" name="idFuncionario" value="" />
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
                                            <label for="dataFinal">Data desligamento</label>
                                            <input id="dataFinal" autocomplete="off" class="span12 datepicker" type="text" name="dataFinal" value="" />
                                        </div>
                                    </div>
                                    <div class="span12" style="padding: 1%; margin-left: 0">
                                        <div class="span2">
                                            <label for="status">Status do funcionário</label>
                                            <select class="span12" name="status" id="status" >
                                                <option value="">-Selecione-</option>
                                                <option value="Ativo">Ativo</option>
                                                <option value="Demitido">Demitido</option>
                                                <option value="Ferias">Férias</option>
                                                <option value="Atestado">Atestado</option>
                                              
                                            </select>
                                        </div>
                                        <div class="span2">
                                            <label for="dataNascimento">Data de Nascimento</label>
                                            <input id="dataNascimento" autocomplete="off" class="span12 datepicker" type="text" name="dataNascimento" value="" />
                                        </div>
                                       <div class="span2">
                                            <label for="dpCpf">CPF</label>
                                            <input id="dpCpf" class="span12" type="text" name="dpCpf" />
                                            
                                        </div>
                                       <div class="span2">
                                            <label for="dpRg">RG</label>
                                            <input id="dpRg" class="span12" type="text" name="dpRg" />
                                            
                                        </div>
                                        <div class="span2">
                                        <label for="sexo" class="control-label">Sexo</label>
                                        
                                                    <select  name="sexo" id="sexo" value="">
                                                        <option value="">--Selecione--</option>
                                                        <option value="M">Masculino</option>
                                                        <option value="F">Feminino</option>
                                                    </select>
                                       
                                        </div>
                                        <div class="span2">
                                        <label for="estadoCivil" class="control-label">Estado Cívil</label>
                                        
                                                    <select  name="estadoCivil" id="estadoCivil" value="">
                                                        <option value="">--Selecione--</option>
                                                        <option value="Solteiro">Solteiro</option>
                                                        <option value="Casado">Casado</option>
                                                        <option value="Divorciado">Divorciado</option>
                                                        <option value="Viúvo">Viúvo</option> 
                                                    </select>
                                       
                                        </div>
                                        
                                    </div>
                                    <div class="span12" style="padding: 1%; margin-left: 0">
                                         <div class="span2">
                                                <label for="cep" class="control-label">CEP</label>
                                                
                                                    <input id="cep" type="text" name="cep" value="<?php echo set_value('cep'); ?>"/>
                                                
                                            </div>
                                            <div class="span2">
                                                <label for="rua" class="control-label">Rua</label>
                                                
                                                    <input id="rua" type="text" name="rua" value="<?php echo set_value('rua'); ?>"/>
                                               
                                            </div>
                                            <div class="span2">
                                                <label for="numero" class="control-label">Número</label>
                                                
                                                    <input id="numero" type="text" name="numero"
                                                           value="<?php echo set_value('numero'); ?>"/>
                                                
                                            </div>
                                            <div class="span2">
                                                <label for="complemento" class="control-label">Complemento</label>
                                               
                                                    <input id="complemento" type="text" name="complemento"
                                                           value="<?php echo set_value('complemento'); ?>"/>
                                                
                                            </div>
                                            <div class="span2">
                                                <label for="bairro" class="control-label">Bairro</label>
                                                
                                                    <input id="bairro" type="text" name="bairro"
                                                           value="<?php echo set_value('bairro'); ?>"/>
                                                
                                            </div>
                                            <div class="span2">
                                                <label for="cidade" class="control-label">Cidade</label>
                                                
                                                    <input id="cidade" type="text" name="cidade"
                                                           value="<?php echo set_value('cidade'); ?>"/>
                                                
                                            </div>
                                    </div>
                                    <div class="span12" style="padding: 1%; margin-left: 0">
                                            <div class="control-group" class="control-label">
                                                <label for="estado" class="control-label">Estado</label>
                                                <div class="controls">
                                                    <select id="estado" name="estado">
                                                        <option value="">Selecione...</option>
                                                    </select>
                                                </div>
                                            </div>
                                    </div>
                                    
                                    <div class="span12" style="padding: 1%; margin-left: 0">
                                        <div class="span6 offset3" style="text-align: center">
                                            <button class="btn btn-success" id="btnContinuar"><i class="fas fa-plus"></i> Continuar</button>
                                            <a href="<?php echo base_url() ?>index.php/dp" class="btn"><i class="fas fa-backward"></i> Voltar</a>
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
  
     $.getJSON('<?php echo base_url() ?>assets/json/estados.json', function (data) {
            for (i in data.estados) {
                $('#estado').append(new Option(data.estados[i].nome, data.estados[i].sigla));
                var curState = '<?php echo set_value('estado'); ?>';
                if (curState) {
                    $("#estado option[value=" + curState + "]").prop("selected", true);
                }
            }
        });
    function limpa_formulario_cep() {
        // Limpa valores do formulário de cep.
        $("#rua").val("");
        $("#bairro").val("");
        $("#cidade").val("");
        $("#estado").val("");
    }
    
       
     //Quando o campo cep perde o foco.
    $("#cep").blur(function () {

        //Nova variável "cep" somente com dígitos.
        var cep = $(this).val().replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.

            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.

            if (validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                $("#rua").val("...");
                $("#bairro").val("...");
                $("#cidade").val("...");
                $("#estado").val("...");

                //Consulta o webservice viacep.com.br/
                $.getJSON("https://viacep.com.br/ws/" + cep.replace(/\./g, '') + "/json/?callback=?", function (dados) {

                    if (!("erro" in dados)) {
                        //Atualiza os campos com os valores da consulta.
                        $("#rua").val(dados.logradouro);
                        $("#bairro").val(dados.bairro);
                        $("#cidade").val(dados.localidade);
                        $("#estado").val(dados.uf);
                    } //end if.
                    else {
                        //CEP pesquisado não foi encontrado.
                        limpa_formulario_cep();
                        Swal.fire({
                            type: "warning",
                            title: "Atenção",
                            text: "CEP não encontrado."
                        });
                    }
                });
            } //end if.
            else {
                //cep é inválido.
                limpa_formulario_cep();
                Swal.fire({
                    type: "error",
                    title: "Atenção",
                    text: "Formato de CEP inválido."
                });
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulario_cep();
        }
    });
    $(document).ready(function() {
       
        
        $("#nomeFuncionario").autocomplete({
            source: "<?php echo base_url(); ?>index.php/dp/autoCompleteUsuario",
            minLength: 1,
            select: function(event, ui) {
                $("#idFuncionario").val(ui.item.id);
            }
        });
        $("#tecnico").autocomplete({
            source: "<?php echo base_url(); ?>index.php/dp/autoCompleteUsuario",
            minLength: 1,
            select: function(event, ui) {
                $("#usuarios_id").val(ui.item.id);
            }
        });
        
        $("#formDp").validate({
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
        $(".datepicker").datepicker({
            dateFormat: 'dd/mm/yy'
        });
        $('.editor').trumbowyg({
            lang: 'pt_br'
        });
    });
</script>
