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
                <h5>Editar Cliente</h5>
                <div class="buttons">
                    <a title="Voltar" class="btn btn-mini btn-inverse" href="<?php echo site_url() ?>/clientes"><i
                                class="fas fa-arrow-left"></i> Voltar</a>
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
                        <div><!-- divo do menu salvar -->
                       <div style="float:left;">
                                <div class="control-group">
                            <label for="documento" class="control-label">CPF/CNPJ</label>
                            <div class="controls">
                                <input id="documento" class="cpfcnpj" type="text" name="documento"
                                       value="<?php echo $result->documento; ?>"/>
                                <button id="buscar_info_cnpj" class="btn btn-xs" type="button">Buscar Informações
                                    (CNPJ)
                                </button>
                            </div>
                        </div>
                        <div class="control-group">
                            <?php echo form_hidden('idClientes', $result->idClientes) ?>
                            <label for="nomeCliente" class="control-label">Nome/Razão Social<span
                                        class="required">*</span></label>
                            <div class="controls">
                                <input id="nomeCliente" type="text" name="nomeCliente"
                                       value="<?php echo $result->nomeCliente; ?>"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="contato" class="control-label">Contato:</label>
                            <div class="controls">
                                <input class="nomeCliente" type="text" name="contato"
                                       value="<?php echo $result->contato; ?>"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="telefone" class="control-label">Telefone</label>
                            <div class="controls">
                                <input id="telefone" type="text" name="telefone"
                                       value="<?php echo $result->telefone; ?>"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="celular" class="control-label">Celular</label>
                            <div class="controls">
                                <input id="celular" type="text" name="celular" value="<?php echo $result->celular; ?>"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="email" class="control-label">Email</label>
                            <div class="controls">
                                <input id="email" type="text" name="email" value="<?php echo $result->email; ?>"/>
                            </div>
                        </div>
                        <div class="control-group">
                                            <label for="acionador" class="control-label">Status</label>
                                            <div class="controls">
                                            <select  name="acionador" id="acionador" value="">
                                                <option <?php if ($result->acionador == NULL) {  echo 'selected'; } ?> value="">--Selecione--</option>
                                                <option <?php if ($result->acionador == 'Acionado') {  echo 'selected'; } ?> value="Acionado">Acionado</option>
                                            </select>
                                            </div>
                        </div>
<!--                        <div class="control-group">
                            <label class="control-label">Tipo de Cliente</label>
                            <div class="controls">
                                <label for="fornecedor" class="btn btn-default" style="margin-top: 5px;">Fornecedor
                                    <input type="checkbox" id="fornecedor" name="fornecedor" class="badgebox"
                                           value="1" <?= ($result->fornecedor == 1) ? 'checked' : '' ?>>
                                    <span class="badge">&check;</span>
                                </label>
                            </div>
                        </div>-->
                      
                    
                            </div>
                            <div style="float: left; margin-left: 10px;">
                                <div class="control-group">
                                    <label for="sexo" class="control-label">Sexo</label>
                                    <div class="controls">
                                        <select  name="sexo" id="sexo" value="">
                                            <option <?php if ($result->sexo == NULL) {  echo 'selected'; } ?> value="">--Selecione--</option>
                                            <option <?php if ($result->sexo == 'M') {  echo 'selected'; } ?> value="M">Masculino</option>
                                            <option <?php if ($result->sexo == 'F') {  echo 'selected'; } ?> value="F">Feminino</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label for="dataNascimento" class="control-label">Data de nascimento</label>
                                    <div class="controls">
                                        <input id="dataNascimento" type="date" name="dataNascimento" value="<?php echo $result->dataNascimento; ?>"/>
                                    </div>
                                </div>
                                    <div class="control-group">
                                        <label for="estadoCivil" class="control-label">Estado Civil</label>
                                        <div class="controls">
                                            <input id="estadoCivil" type="text" name="estadoCivil" value="<?php echo $result->estadoCivil; ?>"/>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="nomeDoPai" class="control-label">Nome do Pai</label>
                                        <div class="controls">
                                            <input id="nomeDoPai" type="text" name="nomeDoPai" value="<?php echo $result->nomeDoPai; ?>"/>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="nomeDaMae" class="control-label">Nome da Mãe</label>
                                        <div class="controls">
                                            <input id="nomeDaMae" type="text" name="nomeDaMae" value="<?php echo $result->nomeDaMae; ?>"/>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="alfabetizado" class="control-label">Escolaridade</label>
                                        <div class="controls">
                                        <select  name="alfabetizado" id="sexo" alfabetizado="">
                                            <option <?php if ($result->alfabetizado == NULL) {  echo 'selected'; } ?> value="">--Selecione--</option>
                                            <option <?php if ($result->alfabetizado == 'Sem escolaridade') {  echo 'selected'; } ?> value="Sem escolaridade">Sem Escolaridade</option>
                                            <option <?php if ($result->alfabetizado == 'Ensino Fundamental') {  echo 'selected'; } ?> value="Ensino Fundamental">Ensino Fundamental</option>
                                            <option <?php if ($result->alfabetizado == 'Ensino Médio') {  echo 'selected'; } ?> value="Ensino Médio">Ensino Médio</option>
                                            <option <?php if ($result->alfabetizado == 'Ensino Superior') {  echo 'selected'; } ?> value="Ensino Superior">Ensino Superior</option>
                                        </select>
                                        </div>
                                    </div>
                        
                            </div>
                            <div style="float:left; margin-left: 10px;">
                                <div class="control-group">
                                        <label for="rg" class="control-label">RG</label>
                                        <div class="controls">
                                            <input id="rg" type="text" name="rg" value="<?php echo $result->rg; ?>"/>
                                        </div>
                                </div>
                                <div class="control-group">
                                        <label for="orgaoExp" class="control-label">Orgão expedidor</label>
                                        <div class="controls">
                                            <input id="orgaoExp" type="text" name="orgaoExp" value="<?php echo $result->orgaoExp; ?>"/>
                                        </div>
                                </div>
                                 <div class="control-group">
                                        <label for="nomeRf1" class="control-label">Nome Referência1</label>
                                        <div class="controls">
                                            <input id="nomeRf1" type="text" name="nomeRf1" value="<?php echo $result->nomeRf1; ?>"/>
                                        </div>
                                </div>
                                 <div class="control-group">
                                        <label for="nomeRf2" class="control-label">Nome Referência2</label>
                                        <div class="controls">
                                            <input id="nomeRf2" type="text" name="nomeRf2" value="<?php echo $result->nomeRf2; ?>"/>
                                        </div>
                                </div>
                            </div>
                            
                        </div><!-- fim da div do botao salvar -->
                          <div class="form-actions">
                            <div class="span12">
                                <div class="span6 offset5">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-sync-alt"></i>
                                        Atualizar
                                    </button>
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
                                    <option <?php if ($result->tipoDeConta == NULL) {  echo 'selected'; } ?> value="">--Selecione--</option>
                                    <option <?php if ($result->tipoDeConta == 'Conta poupança') {  echo 'selected'; } ?> value="Conta poupança">Conta poupança</option>
                                    <option <?php if ($result->tipoDeConta == 'Conta salário') {  echo 'selected'; } ?> value="Conta salário">Conta salário</option>
                                    <option <?php if ($result->tipoDeConta == 'Conta digital') {  echo 'selected'; } ?> value="Conta digital">Conta digital</option>
                                    <option <?php if ($result->tipoDeConta == 'Conta universitária') {  echo 'selected'; } ?> value="Conta universitária">Conta universitária</option>
                                    
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="banco" class="control-label">Banco</label>
                            <div class="controls">
                                <select  name="banco" id="banco" value="">
                                    <option <?php if ($result->banco == NULL) {  echo 'selected'; } ?>  value="">--Selecione--</option>
                                    <option <?php if ($result->banco == 'Banco Itaú Unibanco') {  echo 'selected'; } ?>  value="Banco Itaú Unibanco">Banco Itaú Unibanco</option>
                                    <option <?php if ($result->banco == 'Banco do Brasil') {  echo 'selected'; } ?>  value="Banco do Brasil">Banco do Brasil </option>
                                    <option <?php if ($result->banco == 'Caixa Econômica Federal') {  echo 'selected'; } ?>  value="Caixa Econômica Federal">Caixa Econômica Federal </option>
                                    <option <?php if ($result->banco == 'Banco Bradesco') {  echo 'selected'; } ?>  value="Banco Bradesco">Banco Bradesco </option>
                                    <option <?php if ($result->banco == 'Banco Santander Brasil') {  echo 'selected'; } ?>  value="Banco Santander Brasil">Banco Santander Brasil </option>
                                    <option <?php if ($result->banco == 'Banco BTG Pactual') {  echo 'selected'; } ?>  value="Banco BTG Pactual">Banco BTG Pactual </option>
                                    <option <?php if ($result->banco == 'Banco Safra') {  echo 'selected'; } ?>  value="Banco Safra">Banco Safra </option>
                                    <option <?php if ($result->banco == 'Sicoob') {  echo 'selected'; } ?>  value="Sicoob">Sicoob</option>
                                    <option <?php if ($result->banco == 'Banco Votorantim') {  echo 'selected'; } ?>  value="Banco Votorantim">Banco Votorantim</option>
                                    <option <?php if ($result->banco == 'Citibank Brasil') {  echo 'selected'; } ?>  value="Citibank Brasil">Citibank Brasil</option>
                                    <option <?php if ($result->banco == 'Banrisul') {  echo 'selected'; } ?>  value="Banrisul">Banrisul</option>
                                    <option <?php if ($result->banco == 'Banco do Nordeste') {  echo 'selected'; } ?>  value="Banco do Nordeste">Banco do Nordeste</option>
                                    
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="agencia" class="control-label">Agência</label>
                            <div class="controls">
                                <input id="agencia" type="text" name="agencia"
                                       value="<?php echo $result->agencia; ?>" onkeypress="return onlynumber();"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="conta" class="control-label">Conta</label>
                            <div class="controls">
                                <input id="conta" type="text" name="conta"
                                       value="<?php echo $result->conta; ?>" onkeypress="return onlynumber();"/>
                            </div>
                        </div>
                    </div>
                    <!-- dados da ocupacao -->
                    <div id="menu4" class="tab-pane fade">
                         <div class="control-group">
                            <label for="orgaoEmpregador" class="control-label">Orgão empregador</label>
                            <div class="controls">
                                <input id="orgaoEmpregador" type="text" name="orgaoEmpregador"
                                       value="<?php echo $result->orgaoEmpregador; ?>"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="regimeJuridico" class="control-label">Regime Jurídico</label>
                            <div class="controls">
                                <input id="regimeJuridico" type="text" name="regimeJuridico"
                                      value="<?php echo $result->regimeJuridico; ?>"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="situacaoEmpregador" class="control-label">Situação do empregatício</label>
                            <div class="controls">
                                <input id="situacaoEmpregador" type="text" name="situacaoEmpregador"
                                      value="<?php echo $result->situacaoEmpregador; ?>"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="vinculoEmpregaticio" class="control-label">vinculoEmpregaticio</label>
                            <div class="controls">
                                <input id="vinculoEmpregaticio" type="text" name="vinculoEmpregaticio"
                                      value="<?php echo $result->vinculoEmpregaticio; ?>"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="cargo" class="control-label">Cargo</label>
                            <div class="controls">
                                <input id="cargo" type="text" name="cargo"
                                       value="<?php echo $result->cargo; ?>"/>
                            </div>
                        </div>
                         <div class="control-group">
                            <label for="valorDaRenda" class="control-label">Valor da renda</label>
                            <div class="controls">
                                <input id="valorDaRenda" type="text" name="valorDaRenda"
                                      value="<?php echo $result->valorDaRenda; ?>"/>
                            </div>
                        </div>
                         <div class="control-group">
                            <label for="dataAdminissao" class="control-label">Data de admissão</label>
                            <div class="controls">
                                <input id="dataAdminissao" type="text" name="dataAdminissao"
                                       value="<?php echo $result->dataAdminissao; ?>"/>
                            </div>
                        </div>
                    </div>
                    <!-- Menu Endereços -->
                    <div id="menu2" class="tab-pane fade">
                        <div class="control-group" class="control-label">
                            <label for="cep" class="control-label">CEP</label>
                            <div class="controls">
                                <input id="cep" type="text" name="cep" value="<?php echo $result->cep; ?>"/>
                            </div>
                        </div>
                        <div class="control-group" class="control-label">
                            <label for="rua" class="control-label">Rua</label>
                            <div class="controls">
                                <input id="rua" type="text" name="rua" value="<?php echo $result->rua; ?>"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="numero" class="control-label">Número</label>
                            <div class="controls">
                                <input id="numero" type="text" name="numero" value="<?php echo $result->numero; ?>"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="complemento" class="control-label">Complemento</label>
                            <div class="controls">
                                <input id="complemento" type="text" name="complemento"
                                       value="<?php echo $result->complemento; ?>"/>
                            </div>
                        </div>
                        <div class="control-group" class="control-label">
                            <label for="bairro" class="control-label">Bairro</label>
                            <div class="controls">
                                <input id="bairro" type="text" name="bairro" value="<?php echo $result->bairro; ?>"/>
                            </div>
                        </div>
                        <div class="control-group" class="control-label">
                            <label for="cidade" class="control-label">Cidade</label>
                            <div class="controls">
                                <input id="cidade" type="text" name="cidade" value="<?php echo $result->cidade; ?>"/>
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
                        
                    </div>
            </form>
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
                var curState = '<?php echo $result->estado; ?>';
                if (curState) {
                    $("#estado option[value=" + curState + "]").prop("selected", true);
                }
            }
        });
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
</script>
