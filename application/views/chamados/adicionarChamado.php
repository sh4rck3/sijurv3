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
                <h5>Cadastro de novo chamado</h5>
                <div class="buttons">
                    <a title="Voltar" class="btn btn-mini btn-inverse" href="<?php echo site_url() ?>/chamados"><i
                                class="fas fa-arrow-left"></i> Voltar</a>
                </div>
            </div>
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">Informações Pessoais</a></li>
               
            </ul>
            <form action="<?php echo current_url(); ?>" id="formCliente" method="post" enctype="multipart/form-data" class="form-horizontal">
                <div class="widget-content nopadding tab-content">
                    <?php if ($custom_error != '') { echo '<div class="alert alert-danger">' . $custom_error . '</div>';} ?>
                    <div id="home" class="tab-pane fade in active">
                        <div> <!<!-- div do botao salvar inicio -->
                        <div style="float:left;">
                        <div class="control-group">
                            <label for="usuarioChamado" class="control-label">Nome:</label>
                            <div class="controls">
                                <input id="usuarioChamado" class="span12" type="text" name="usuarioChamado" value="<?= $this->session->userdata('nome'); ?>" readonly />
                                <input id="ipUsuarioChamado" class="span12" type="hidden" name="ipUsuarioChamado" value="<?= $_SERVER["REMOTE_ADDR"]; ?>" />
                                <input id="telefone" class="span12" type="hidden" name="telefone" value="<?= $this->session->userdata('telefone'); ?>" />
                               
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label for="tipoChamado" class="control-label">Tipo</label>
                            <div class="controls">
                                <select class="span12" name="tipoChamado" id="tipoChamado">
                                                <option value="">--Selecione--</option>
                                                <option value="Problema no pc">Problema no PC</option>
                                                <option value="Problema no sistema">Problema no sistema</option>
                                                <option value="Nova funcionalidade no sistema">Nova funcionalidade no sistema</option>
                                                <option value="Exyon">Exyon</option>
                                                <option value="GCPJ">GCPJ</option>
                                                <option value="PJE">PJE</option>
                                                <option value="Impressora">Impressora</option>
                                                <option value="Mudança de lugar">Mudança de lugar</option>
                                                <option value="Site Juridico">Site Jurídico</option>
                                                <option value="Assinador">Assinador</option>
                                                <option value="Token">Token</option>
                                                <option value="Liberar site">Libera Site</option>
                                                <option value="Solicitação">Solicitação</option>
                                                <option value="WhatsAPP">Whats Corporativo</option>
                                </select>
                            </div>
                        </div>
                        
                        
                       
                        </div>
                            <div style="float:left;">
                                <div class="control-group">
                                    <label for="observacao" class="control-label">Descreva seu problema</label>
                                    <div class="controls">

                                        <textarea class="span12 editor" name="observacao" id="observacao" cols="30" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div style="float:left;">
                                <div class="control-group">
                                    <label for="observacao" class="control-label">Insira a imagem</label>
                                    <div class="controls">

                                         <input type="file" name="pic" class="form-control">
                                    </div>
                                </div>
                            </div>
                            
                        
                        </div><!<!-- div do botao salvar fim -->
                        <div class="form-actions">
                            <div class="span12">
                                <div class="span6 offset5">
                                    <button type="submit" class="btn btn-success">Salvar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    
                    
                </div>         
            </form>
        </div>
    </div>
</div>
<?php
if(isset($_FILES['pic'])){
                $ext = strtolower(substr($_FILES['pic']['name'],-4)); //Pegando extensão do arquivo
                echo $ext;
                
}
?>

<script src="<?php echo base_url() ?>assets/js/jquery.validate.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#formArquivo').validate({
            rules: {
               
                pic: {
                    required: true
                }
            },
            messages: {
               
                pic: {
                    required: 'Campo Requerido.'
                }
            },

            errorClass: "help-inline",
            errorElement: "span",
            highlight: function(element, errorClass, validClass) {
                $(element).parents('.control-group').addClass('error');
                $(element).parents('.control-group').removeClass('success');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).parents('.control-group').removeClass('error');
                $(element).parents('.control-group').addClass('success');
            }
        });
       
    });
</script>
