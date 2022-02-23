<script src="<?php echo base_url() ?>assets/js/jquery.mask.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/sweetalert2.all.min.js"></script>
<!-- removido para tirar os parenteses do telefone <script src="<?php echo base_url() ?>assets/js/funcoes.js"></script>-->
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
                <h5>Responder Chamado</h5>
                <div class="buttons">
                    <a title="Voltar" class="btn btn-mini btn-inverse" href="<?php echo site_url() ?>/chamados/gerenciarTI"><i
                                class="fas fa-arrow-left"></i> Voltar</a>
                </div>
            </div>
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">Informações do chamado</a></li>
                
               
            </ul>
            <form action="<?php echo current_url(); ?>" id="formCliente" method="post" class="form-horizontal">
                <div class="widget-content nopadding tab-content">
                    <?php if ($custom_error != '') { echo '<div class="alert alert-danger">' . $custom_error . '</div>';} ?>
                    <div id="home" class="tab-pane fade in active">
                      
                       <div> <!<!-- div do botao salvar inicio -->
                        <div style="float:left;">
                        <div class="control-group">
                            <label for="usuarioChamado" class="control-label">Nome:</label>
                            <div class="controls">
                                <input id="usuarioChamado" class="span12" type="text" name="usuarioChamado" value="<?php echo $result->usuarioChamado; ?>" readonly />
                                <input id="idClientes" class="span12" type="hidden" name="idClientes" value="<?php echo $result->idClientes; ?>"/>
                                
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label for="tipoChamado" class="control-label">Tipo</label>
                            <div class="controls">
                                <select class="span12" name="tipoChamado" id="tipoChamado" style="pointer-events: none">
                                                <option <?php if ($result->tipoChamado == NULL) { echo 'selected';  } ?>value="">--Selecione--</option>
                                                <option <?php if ($result->tipoChamado == 'Problema no pc') { echo 'selected';  } ?> value="Problema no pc">Problema no PC</option>
                                                <option <?php if ($result->tipoChamado == 'Problema no sistema') { echo 'selected';  } ?> value="Problema no sistema">Problema no sistema</option>
                                                <option <?php if ($result->tipoChamado == 'Nova funcionaliade no sistema') { echo 'selected';  } ?> value="Nova funcionaliade no sistema">Nova funcionaliade no sistema</option>
                                               
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="status" class="control-label">Status</label>
                            <div class="controls">
                                <select class="span12" name="status" id="status">
                                                <option <?php if ($result->status == NULL) { echo 'selected';  } ?>value="">--Selecione--</option>
                                                <option <?php if ($result->status == 'Novo') { echo 'selected';  } ?> value="Novo">Novo</option>
                                                <option <?php if ($result->status == 'Aberto') { echo 'selected';  } ?> value="Aberto">Aberto</option>
                                                <option <?php if ($result->status == 'Fechado') { echo 'selected';  } ?> value="Fechado">Fechado</option>
                                                <option <?php if ($result->status == 'Em desenvolvimento') { echo 'selected';  } ?> value="Em desenvolvimento">Em desenvolvimento</option>
                                               
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="telefone" class="control-label">Ramal</label>
                            <div class="controls">
                                
                                <input id="telefone" class="span12" type="text" name="telefone" value="<?php echo $result->telefone; ?>" readonly /><a href="javascript:newPopup()">Ligar</a>
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="ip" class="control-label">IP</label>
                            <div class="controls">
                                
                                <input id="ip" class="span12" type="text" name="ip" value="<?php echo $result->ipUsuarioChamado; ?>" readonly />
                            </div>
                        </div>
                        
                        
                       
                        </div>
                            <div style="float:left;">
                        <div class="control-group">
                            <label for="observacao" class="control-label">Descreva seu problema</label>
                            <div class="controls">
                                
                                <textarea class="span12 editor" name="observacao" id="observacao" cols="30" rows="5" readonly><?php echo $result->observacao; ?></textarea>
                            </div>
                        </div>
                            </div>
                           <div style="float:left;">
                        <div class="control-group">
                            <label for="tecnicoResponsavel" class="control-label">Tecnico responsável:</label>
                            <div class="controls">
                                <input id="tecnicoResponsavel" class="span12" type="text" name="tecnicoResponsavel" value="<?= $this->session->userdata('nome'); ?>" readonly />
                                
                            </div>
                        </div>
                        
                            
                                <div class="control-group">
                            <label for="respostaTecnica" class="control-label">Resposta</label>
                            <div class="controls">
                                
                                <textarea class="span12 editor" name="respostaTecnica" id="respostaTecnica" cols="30" rows="5"><?php echo $result->respostaTecnica; ?></textarea>
                            </div>
                        </div>
                            </div>
                            
                            
                        
                        </div><!<!-- div do botao salvar fim -->
                        <div class="span12" style="padding: 1%; margin-left: 0">
                            <div class="span6 offset3" style="text-align: center">

                                <button class="btn btn-primary" id="btnContinuar"><i class="fas fa-sync-alt"></i> Atualizar
                                </button>

                                <a href="<?php echo base_url() ?>index.php/chamados/gerenciarTI" class="btn"><i class="fas fa-backward"></i> Voltar</a>
                            </div>
                       </div>
                        <div class="span6">
                            <div class="span12 offset3" style="margin-left: -120px;">
                                    <div class="controls">
                                        <?php if(!empty($result->nomeArquivo)){ ?>
                                        <img src="<?php echo $result->baseUrl.$result->nomeArquivo ; ?>"  width="800" height="800"/>
                                        <?php }else{ ?>
                                        <h1>Não tem imagem a ser carregada</h1>
                                        <?php } ?>
                                    </div>
                            </div>
                       </div>
                    </div>
                </div>
                
            </form>
        
    </div>
</div>
</div>

<script language=javascript type="text/javascript">
function newPopup(){
varWindow = window.open (
        'https://172.16.0.248/call.php?exten=<?= $this->session->userdata('telefone'); ?>&number=<?php echo $result->telefone?>',
        'click to call',
        "width=350, height=255, top=100, left=110, scrollbars=no " )
}
</script>
