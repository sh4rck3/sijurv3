<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/jquery-ui/css/smoothness/jquery-ui-1.9.2.custom.css" />
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
                <h5>Ficha do Localizador</h5>
               
            </div>
            <div class="widget-content nopadding tab-content">
                <div class="span12" id="divProdutosServicos" style=" margin-left: 0">
                    <ul class="nav nav-tabs">
                        <li class="active" id="tabDetalhes"><a href="#tab1" data-toggle="tab">Detalhes do Localizador</a></li>
                       
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab1">
                            <div class="span12" id="divCadastrarOs">
                                <form action="<?php echo current_url(); ?>" method="post" id="formOs">
                                    <?php echo form_hidden('idLocalizador', $result->idLocalizador) ?>
                                    <div class="span12" style="padding: 1%; margin-left: 0">
                                        <h3>N° registro interno:
                                            <?php echo $result->idLocalizador; //var_dump($result); ?>
                                        </h3>
                                        <div class="span6" style="margin-left: 0">
                                            <label for="nomeLocalizador">Nome do Localizador</label>
                                            <input id="nomeLocalizador" class="span12" type="text" name="nomeLocalizador" value="<?php echo $result->nomeLocalizador ?>" />
                                        </div>
                                         <div class="span2">
                                            <label for="tecnico">Responsável pelo cadastro</label>
                                            <input id="tecnico" class="span12" type="text" name="tecnico" value="<?= $this->session->userdata('nome'); ?>" readonly />
                                            <input id="usuarios_id" class="span12" type="hidden" name="usuarios_id" value="<?= $this->session->userdata('id'); ?>" />
                                        </div>
                                         <div class="span2">
                                            <label for="dataInicial">Data de Registro</label>
                                            <input id="DT_REGISTRO" autocomplete="off" class="span12" type="text" name="DT_REGISTRO" value="<?php echo $result->DT_REGISTRO ?>" />
                                        </div>
                                         <div class="span2">
                                            <label for="cpf">CPF</label>
                                            <input id="cpf" autocomplete="off" class="span12" type="text" name="cpf" value="<?php echo $result->cpf ?>" />
                                        </div>
                                       
                                    </div>
                                     <div class="span12" style="padding: 1%; margin-left: 0">
                                        <div class="span2">
                                            <label for="status">Status</label>
                                            <select class="span12" name="status" id="status" >
                                                <option <?php if ($result->status == NULL) {echo 'selected';} ?> value="">-Selecione-</option>
                                                <option <?php if ($result->status == 'Ativo') {echo 'selected';} ?> value="Ativo">Ativo </option>
                                                <option <?php if ($result->status == 'Inativo') {echo 'selected';} ?> value="Inativo">Inativo </option>
                                                
                                            </select>
                                        </div>
                                        <div class="span2">
                                            <label for="fone">Telefone</label>
                                            <input id="fone"  class="span12" type="text" name="fone" value="<?php echo $result->fone ?>" />
                                        </div>
                                         <div class="span2">
                                            <label for="outroFone">Telefone 2</label>
                                            <input id="outroFone" autocomplete="off" class="span12" type="text" name="outroFone" value="<?php echo $result->outroFone ?>" />
                                        </div>
                                         <div class="span6">
                                            <label for="areasAtuacao">Atuação</label>
                                            <input id="areasAtuacao" autocomplete="off" class="span12" type="text" name="areasAtuacao" value="<?php echo $result->areasAtuacao ?>" />
                                        </div>
                                     </div>
                                    <div class="span12" style="padding: 1%; margin-left: 0">
                                        <div class="span2">
                                            <label for="uf">UF</label>
                                            <select class="span12" name="uf" id="uf" value="">
                                                <option <?php if ($result->uf == NULL) {echo 'selected';} ?> value="">Selecione</option>
                                               <option <?php if ($result->uf == NULL) {echo 'selected';} ?> value="AC">Acre</option>
                                                    <option <?php if ($result->uf == 'AL') {echo 'selected';} ?> value="AL">Alagoas</option>
                                                    <option <?php if ($result->uf == 'AP') {echo 'selected';} ?>value="AP">Amapá</option>
                                                    <option <?php if ($result->uf == 'AM') {echo 'selected';} ?> value="AM">Amazonas</option>
                                                    <option <?php if ($result->uf == 'BA') {echo 'selected';} ?> value="BA">Bahia</option>
                                                    <option <?php if ($result->uf == 'CE') {echo 'selected';} ?> value="CE">Ceará</option>
                                                    <option <?php if ($result->uf == 'DF') {echo 'selected';} ?> value="DF">Distrito Federal</option>
                                                    <option <?php if ($result->uf == 'ES') {echo 'selected';} ?> value="ES">Espírito Santo</option>
                                                    <option <?php if ($result->uf == 'GO') {echo 'selected';} ?> value="GO">Goiás</option>
                                                    <option <?php if ($result->uf == 'MA') {echo 'selected';} ?> value="MA">Maranhão</option>
                                                    <option <?php if ($result->uf == 'MT') {echo 'selected';} ?> value="MT">Mato Grosso</option>
                                                    <option <?php if ($result->uf == 'MS') {echo 'selected';} ?> value="MS">Mato Grosso do Sul</option>
                                                    <option <?php if ($result->uf == 'MG') {echo 'selected';} ?> value="MG">Minas Gerais</option>
                                                    <option <?php if ($result->uf == 'PA') {echo 'selected';} ?> value="PA">Pará</option>
                                                    <option <?php if ($result->uf == 'PB') {echo 'selected';} ?> value="PB">Paraíba</option>
                                                    <option <?php if ($result->uf == 'PR') {echo 'selected';} ?> value="PR">Paraná</option>
                                                    <option <?php if ($result->uf == 'PE') {echo 'selected';} ?> value="PE">Pernambuco</option>
                                                    <option <?php if ($result->uf == 'PI') {echo 'selected';} ?> value="PI">Piauí</option>
                                                    <option <?php if ($result->uf == 'RJ') {echo 'selected';} ?> value="RJ">Rio de Janeiro</option>
                                                    <option <?php if ($result->uf == 'RN') {echo 'selected';} ?> value="RN">Rio Grande do Norte</option>
                                                    <option <?php if ($result->uf == 'RS') {echo 'selected';} ?> value="RS">Rio Grande do Sul</option>
                                                    <option <?php if ($result->uf == 'RO') {echo 'selected';} ?> value="RO">Rondônia</option>
                                                    <option <?php if ($result->uf == 'RR') {echo 'selected';} ?> value="RR">Roraima</option>
                                                    <option <?php if ($result->uf == 'SC') {echo 'selected';} ?> value="SC">Santa Catarina</option>
                                                    <option <?php if ($result->uf == 'SP') {echo 'selected';} ?> value="SP">São Paulo</option>
                                                    <option <?php if ($result->uf == 'SE') {echo 'selected';} ?> value="SE">Sergipe</option>
                                                    <option <?php if ($result->uf == 'TO') {echo 'selected';} ?> value="TO">Tocantins</option>
                                                
                                            </select>
                                        </div>
                                        <div class="span6">
                                             <label for="obs">
                                            <h4>Observação</h4>
                                        </label>
                                         <textarea class="span6 editor" name="obs" id="obs" cols="30" rows="3" value=""><?php echo $result->obs ?></textarea>
                                        </div>
                                    </div>
                                    
                                   
                                    <div class="span12" style="padding: 1%; margin-left: 0">
                                        <div class="span6 offset3" style="text-align: center">
                                        
                                            <button class="btn btn-primary" id="btnContinuar"><i class="fas fa-sync-alt"></i> Atualizar
                                            </button>
                                           
                                            <a href="<?php echo base_url() ?>index.php/retomadas" class="btn"><i class="fas fa-backward"></i> Voltar</a>
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


