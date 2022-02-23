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
               
            </ul>
            <form action="<?php echo current_url(); ?>" id="formCliente" method="post" class="form-horizontal">
                <div class="widget-content nopadding tab-content">
                    <?php if ($custom_error != '') {
    echo '<div class="alert alert-danger">' . $custom_error . '</div>';
} ?>
                    <div id="home" class="tab-pane fade in active">
                    <div style="float:left;">
                        <div class="control-group">
                            <label for="usuarioChamado" class="control-label">Nome:</label>
                            <div class="controls">
                                <input id="usuarioChamado" class="span12" type="text" name="usuarioChamado" value="<?php echo $result->usuarioChamado; ?>" readonly />
                                <input id="editar" class="span12" type="text" name="editar" value="1" readonly />
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="telefone" class="control-label">Ramal:</label>
                            <div class="controls">
                                <input id="telefone" class="span12" type="text" name="telefone" value="<?php echo $result->telefone; ?>" readonly />
                                
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
                            <label for="respostaTecnica" class="control-label">Descreva seu problema</label>
                            <div class="controls">
                                
                                <textarea class="span12 editor" name="respostaTecnica" id="respostaTecnica" cols="30" rows="5" readonly><?php echo $result->observacao; ?></textarea>
                            </div>
                        </div>
                    </div>        
                        <div class="span12" style="padding: 1%; margin-left: 0">
                            <div class="span6 offset3" style="text-align: center">

                                <button class="btn btn-primary" id="btnContinuar"><i class="fas fa-sync-alt"></i> Atualizar
                                </button>

                                <a href="<?php echo base_url() ?>index.php/chamados" class="btn"><i class="fas fa-backward"></i> Voltar</a>
                            </div>
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
