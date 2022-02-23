<script src="<?php echo base_url() ?>assets/js/jquery.mask.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/sweetalert2.all.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/funcoes.js"></script>
<style>
    /* Hiding the checkbox, but allowing it to be focused */
    .badgebox {
        opacity: 0;
    }

    .badgebox + .badge {
        /* Move the check mark away when unchecked */
        text-indent: -999999px;
        /* Makes the badge's width stay the same checked and unchecked */
        width: 27px;
    }

    .badgebox:focus + .badge {
        /* Set something to make the badge looks focused */
        /* This really depends on the application, in my case it was: */
        /* Adding a light border */
        box-shadow: inset 0px 0px 5px;
        /* Taking the difference out of the padding */
    }

    .badgebox:checked + .badge {
        /* Move the check mark back when checked */
        text-indent: 0;
    }
</style>
<div class="row-fluid" style="margin-top:0">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title">
            <span class="icon">
            <i class="fas fa-user"></i>
            </span>
                <h5>Cadastro de Cliente</h5>
                <div class="buttons">
<!--                    <a title="Voltar" class="btn btn-mini btn-inverse" href="<?php echo site_url() ?>/clientes"><i
                                class="fas fa-arrow-left"></i> Voltar</a>-->
                </div>
            </div>
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">Informações Pessoais</a></li>
                <li><a data-toggle="tab" href="#menu2">Endereço</a></li>
                <li><a data-toggle="tab" href="#menu3">Dados Bancários</a></li>
                <li><a data-toggle="tab" href="#menu4">Dados da Ocupação</a></li>
            </ul>
            <form action="<?php echo current_url(); ?>" id="formCliente" method="post" class="form-horizontal">
                <div class="widget-content nopadding tab-content">
                    <?php if ($custom_error != '') {
    echo '<div class="alert alert-danger">' . $custom_error . '</div>';
} ?>
                    <div id="home" class="tab-pane fade in active">
                        <div> <!-- div do botao salvar inicio -->
                            <div style="float:left;">
                        <div class="control-group">
                            <label for="documento" class="control-label">CPF/CNPJ</label>
                            <div class="controls">
                                <input id="documento" class="cpfcnpj" type="text" name="documento"
                                       value="<?php echo set_value('documento'); ?>"/>
                                <button id="buscar_info_cnpj" class="btn btn-xs" type="button">Buscar Informações
                                    (CNPJ)
                                </button>
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="nomeCliente" class="control-label">Nome<span
                                        class="required">*</span></label>
                            <div class="controls">
                                <input id="nomeCliente" type="text" name="nomeCliente"
                                       value="<?php echo set_value('nomeCliente'); ?>"/>
                                <input id="usuarios_id" class="span12" type="hidden" name="usuarios_id" value="<?= $this->session->userdata('id'); ?>" />
                            </div>
                        </div>
                         <div class="control-group">
                            <label for="celular" class="control-label">Celular</label>
                            <div class="controls">
                                <input id="celular" type="text" name="celular"
                                       value="<?php echo set_value('celular'); ?>" placeholder="Ex DDD+Número->61988123232"/>
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label for="telefone" class="control-label">Telefone 1</label>
                            <div class="controls">
                                <input id="telefone" type="text" name="telefone"
                                       value="<?php echo set_value('telefone'); ?>" placeholder="Ex DDD+Número->61988123232"/>
                            </div>
                        </div>
                       
                        <div class="control-group">
                            <label for="contato" class="control-label">Telefone2:</label>
                            <div class="controls">
                                <input class="nomeCliente" type="text" name="contato"
                                       value="<?php echo set_value('contato'); ?>" placeholder="Ex DDD+Número->61988123232"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="email" class="control-label">Email</label>
                            <div class="controls">
                                <input id="email" type="text" name="email" value="<?php echo set_value('email'); ?>"/>
                            </div>
                        </div>
                       
                        </div>
                            <div style="float:left; margin-left: 10px;">
                                <div class="control-group">
                                    <label for="sexo" class="control-label">Sexo</label>
                                    <div class="controls">
                                        <select  name="sexo" id="sexo" value="">
                                            <option value="">--Selecione--</option>
                                            <option value="M">Masculino</option>
                                            <option value="F">Feminino</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label for="dataNascimento" class="control-label">Data de nascimento</label>
                                    <div class="controls">
                                        <input id="dataNascimento" type="date" name="dataNascimento" value="<?php echo set_value('dataNascimento'); ?>"/>
                                    </div>
                                </div>
                                    <div class="control-group">
                                        <label for="estadoCivil" class="control-label">Estado Civil</label>
                                        <div class="controls">
                                            <input id="estadoCivil" type="text" name="estadoCivil" value="<?php echo set_value('estadoCivil'); ?>"/>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="nomeDoPai" class="control-label">Nome do Pai</label>
                                        <div class="controls">
                                            <input id="nomeDoPai" type="text" name="nomeDoPai" value="<?php echo set_value('nomeDoPai'); ?>"/>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="nomeDaMae" class="control-label">Nome da Mãe</label>
                                        <div class="controls">
                                            <input id="nomeDaMae" type="text" name="nomeDaMae" value="<?php echo set_value('nomeDaMae'); ?>"/>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="alfabetizado" class="control-label">Escolaridade</label>
                                        <div class="controls">
                                        <select  name="alfabetizado" id="sexo" alfabetizado="">
                                            <option value="">--Selecione--</option>
                                            <option value="Sem escolaridade">Sem Escolaridade</option>
                                            <option value="Ensino Fundamental">Ensino Fundamental</option>
                                            <option value="Ensino Médio">Ensino Médio</option>
                                            <option value="Ensino Superior">Ensino Superior</option>
                                        </select>
                                        </div>
                                    </div>
                        </div>
                            <div style="float:left; margin-left: 10px;">
                                <div class="control-group">
                                        <label for="rg" class="control-label">RG</label>
                                        <div class="controls">
                                            <input id="rg" type="text" name="rg" value="<?php echo set_value('rg'); ?>"/>
                                        </div>
                                </div>
                                <div class="control-group">
                                        <label for="orgaoExp" class="control-label">Orgão expedidor</label>
                                        <div class="controls">
                                            <input id="orgaoExp" type="text" name="orgaoExp" value="<?php echo set_value('orgaoExp'); ?>"/>
                                        </div>
                                </div>
                                 <div class="control-group">
                                        <label for="nomeRf1" class="control-label">Nome Referência1</label>
                                        <div class="controls">
                                            <input id="nomeRf1" type="text" name="nomeRf1" value="<?php echo set_value('nomeRf1'); ?>"/>
                                        </div>
                                </div>
                                 <div class="control-group">
                                        <label for="nomeRf2" class="control-label">Nome Referência2</label>
                                        <div class="controls">
                                            <input id="nomeRf2" type="text" name="nomeRf2" value="<?php echo set_value('nomeRf2'); ?>"/>
                                        </div>
                                </div>
                                <div class="control-group">
                                        <label for="simulacaoBanco" class="control-label">Banco Simulação</label>
                                        <div class="controls">
                                            <input id="simulacaoBanco" type="text" name="simulacaoBanco" value="<?php echo set_value('simulacaoBanco'); ?>"/>
                                        </div>
                                </div>
                            </div>
                                
                        </div>
                        
                        
                        <div class="form-actions">
                            <div class="span12">
                                <div class="span6 offset5">
                                    <button type="submit" class="btn btn-success">Salvar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- dados bancarios -->
                    <div id="menu3" class="tab-pane fade">
                         <div class="control-group">
                            <label for="tipoDeConta" class="control-label">Tipo de Conta</label>
                            <div class="controls">
                                <select  name="tipoDeConta" id="tipoDeConta" value="">
                                    <option value="">--Selecione--</option>
                                    <option value="Conta corrente">Conta corrente</option>
                                    <option value="Conta poupança">Conta poupança</option>
                                    <option value="Conta salário">Conta salário</option>
                                    <option value="Conta digital">Conta digital</option>
                                    <option value="Conta universitária">Conta universitária</option>
                                    
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="banco" class="control-label">Banco</label>
                            <div class="controls">
                                <select  name="banco" id="banco" value="">
                                    <option value="">--Selecione--</option>
                                    <option value="Banco Itaú Unibanco">Banco Itaú Unibanco</option>
                                    <option value="Banco do Brasil">Banco do Brasil </option>
                                    <option value="Caixa Econômica Federal">Caixa Econômica Federal </option>
                                    <option value="Banco Bradesco">Banco Bradesco </option>
                                    <option value="Banco Santander Brasil">Banco Santander Brasil </option>
                                    <option value="Banco BTG Pactual">Banco BTG Pactual </option>
                                    <option value="Banco Safra">Banco Safra </option>
                                    <option value="Sicoob">Sicoob</option>
                                    <option value="Banco Votorantim">Banco Votorantim</option>
                                    <option value="Citibank Brasil">Citibank Brasil</option>
                                    <option value="Banrisul">Banrisul</option>
                                    <option value="Banco do Nordeste">Banco do Nordeste</option>
                                    
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="agencia" class="control-label">Agência</label>
                            <div class="controls">
                                <input id="agencia" type="text" name="agencia"
                                       value="<?php echo set_value('agencia'); ?>" onkeypress="return onlynumber();"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="conta" class="control-label">Conta</label>
                            <div class="controls">
                                <input id="conta" type="text" name="conta"
                                       value="<?php echo set_value('conta'); ?>" onkeypress="return onlynumber();"/>
                            </div>
                        </div>
                    </div>
                    <!-- dados da ocupacao -->
                    <div id="menu4" class="tab-pane fade">
                         <div class="control-group">
                            <label for="orgaoEmpregador" class="control-label">Orgão empregador</label>
                            <div class="controls">
                                <input id="orgaoEmpregador" type="text" name="orgaoEmpregador"
                                       value="<?php echo set_value('orgaoEmpregador'); ?>"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="regimeJuridico" class="control-label">Regime Jurídico</label>
                            <div class="controls">
                                <input id="regimeJuridico" type="text" name="regimeJuridico"
                                       value="<?php echo set_value('regimeJuridico'); ?>"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="situacaoEmpregador" class="control-label">Situação do empregatício</label>
                            <div class="controls">
                                <input id="situacaoEmpregador" type="text" name="situacaoEmpregador"
                                       value="<?php echo set_value('situacaoEmpregador'); ?>"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="vinculoEmpregaticio" class="control-label">vinculoEmpregaticio</label>
                            <div class="controls">
                                <input id="vinculoEmpregaticio" type="text" name="vinculoEmpregaticio"
                                       value="<?php echo set_value('vinculoEmpregaticio'); ?>"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="cargo" class="control-label">Cargo</label>
                            <div class="controls">
                                <input id="cargo" type="text" name="cargo"
                                       value="<?php echo set_value('cargo'); ?>"/>
                            </div>
                        </div>
                         <div class="control-group">
                            <label for="valorDaRenda" class="control-label">Valor da renda</label>
                            <div class="controls">
                                <input id="valorDaRenda" type="text" name="valorDaRenda"
                                       value="<?php echo set_value('valorDaRenda'); ?>"/>
                            </div>
                        </div>
                         <div class="control-group">
                            <label for="dataAdminissao" class="control-label">Data de admissão</label>
                            <div class="controls">
                                <input id="dataAdminissao" type="text" name="dataAdminissao"
                                       value="<?php echo set_value('dataAdminissao'); ?>"/>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Menu Endereços -->
                    
                    <div id="menu2" class="tab-pane fade">
                        <div class="control-group" class="control-label">
                            <label for="cep" class="control-label">CEP</label>
                            <div class="controls">
                                <input id="cep" type="text" name="cep" value="<?php echo set_value('cep'); ?>"/>
                            </div>
                        </div>
                        <div class="control-group" class="control-label">
                            <label for="rua" class="control-label">Rua</label>
                            <div class="controls">
                                <input id="rua" type="text" name="rua" value="<?php echo set_value('rua'); ?>"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="numero" class="control-label">Número</label>
                            <div class="controls">
                                <input id="numero" type="text" name="numero"
                                       value="<?php echo set_value('numero'); ?>"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="complemento" class="control-label">Complemento</label>
                            <div class="controls">
                                <input id="complemento" type="text" name="complemento"
                                       value="<?php echo set_value('complemento'); ?>"/>
                            </div>
                        </div>
                        <div class="control-group" class="control-label">
                            <label for="bairro" class="control-label">Bairro</label>
                            <div class="controls">
                                <input id="bairro" type="text" name="bairro"
                                       value="<?php echo set_value('bairro'); ?>"/>
                            </div>
                        </div>
                        <div class="control-group" class="control-label">
                            <label for="cidade" class="control-label">Cidade</label>
                            <div class="controls">
                                <input id="cidade" type="text" name="cidade"
                                       value="<?php echo set_value('cidade'); ?>"/>
                            </div>
                        </div>
                        <div class="control-group" class="control-label">
                            <label for="estado" class="control-label">Estado</label>
                            <div class="controls">
                                <select id="estado" name="estado">
                                    <option value="">Selecione...</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="span12">
                                <div class="span6 offset3">
                                    <button type="submit" class="btn btn-success">Salvar</button>
                                </div>
                            </div>
                        </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
<script src="<?php echo base_url() ?>assets/js/jquery.validate.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $.getJSON('<?php echo base_url() ?>assets/json/estados.json', function (data) {
            for (i in data.estados) {
                $('#estado').append(new Option(data.estados[i].nome, data.estados[i].sigla));
                var curState = '<?php echo set_value('estado'); ?>';
                if (curState) {
                    $("#estado option[value=" + curState + "]").prop("selected", true);
                }
            }
        });
        $("#nomeCliente").focus();
        $('#formCliente').validate({
            rules: {
                nomeCliente: {
                    required: true
                },
            },
            messages: {
                nomeCliente: {
                    required: 'Campo Requerido.'
                },
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
    });
    function onlynumber(evt) {
               var theEvent = evt || window.event;
               var key = theEvent.keyCode || theEvent.which;
               key = String.fromCharCode( key );
               //var regex = /^[0-9.,]+$/;
               var regex = /^[0-9.]+$/;
               if( !regex.test(key) ) {
                  theEvent.returnValue = false;
                  if(theEvent.preventDefault) theEvent.preventDefault();
               }
        }
</script>
