<!--[if lt IE 9]><script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>js/dist/excanvas.min.js"></script><![endif]-->

<script language="javascript" type="text/javascript" src="<?= base_url(); ?>assets/js/dist/jquery.jqplot.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/js/dist/plugins/jqplot.pieRenderer.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/js/dist/plugins/jqplot.donutRenderer.min.js"></script>
<script src='<?= base_url(); ?>assets/js/fullcalendar.min.js'></script>
<script src='<?= base_url(); ?>assets/js/fullcalendar/locales/pt-br.js'></script>

<link href='<?= base_url(); ?>assets/css/fullcalendar.min.css' rel='stylesheet' />
<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/js/dist/jquery.jqplot.min.css" />



<!--<div class="row-fluid" style="margin-top: 0">

    <div class="span12">

        <div class="widget-box">
            <div class="widget-title"><span class="icon"><i class="fas fa-signal"></i></span>
                <h5>Estatísticas do Sistema</h5>
            </div>
            <h1>Nenhuma informação ainda...</h1>
        </div>
    </div>
</div>-->
<?php //print_r($devedor1); ?>
<?php
if($this->session->userdata('estado') != 'cha'){
   require 'painelControladoria.php';
} else {
echo '<h1> Use o menu "Chamado" do lado esquerdo para abrir seu chamado' ;    
}

// fim da controladoria?>

<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vProduto') && $this->session->userdata('estado') != 'cha') { ?>
<div class="row-fluid" style="margin-top: 0">

    <div class="span12">

        <div class="widget-box">
            <div class="widget-title"><span class="icon"><i class="fas fa-signal"></i></span>
                <h5>Informações do DP</h5>
            </div>
            <div class="widget-content">
                <div class="row-fluid">
                    <div class="span12">
                        <ul class="site-stats">
                            <label>Remessas</label>
                            <li class="bg_lh"><a href="http://sijur.dunice.net/index.php/dp" style="color: white;"><i class="fas fa-users"></i> <strong>
                                    <?= $this->db->count_all('cdl'); ?></strong> <small>Total registros CDL</small></a></li>
                            <li class="bg_lh"><a href="http://sijur.dunice.net/index.php/dp/bradesco" style="color: white;"><i class="fas fa-users"></i> <strong>
                                    <?= $this->db->count_all('bradesco'); ?></strong> <small>Total registros BRADESCO</small></a></li>
                            
                            

                        </ul>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
            <?php
        } ?>
<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vCliente')) { ?>
            <?php if ($this->session->userdata('estado') == 'j3' || $this->session->userdata('permissao') == '1') { 
                require 'juridico3Painel.php';
            }//final do juridico3?>
 <?php if ($this->session->userdata('estado') == 'j1' || $this->session->userdata('permissao') == '1') { ?>

            <?php 
                        require 'jurudico1Painel.php';
                                    }//final do juridico1
            
        }//final da checagem de permissao ?>
<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vArquivo')) { ?>
<div class="row-fluid" style="margin-top: 0">

    <div class="span12">

        <div class="widget-box">
            <div class="widget-title"><span class="icon"><i class="fas fa-signal"></i></span>
                <h5>Informações notificações em andamento SAFRA</h5>
            </div>
            <div class="widget-content">
                <div class="row-fluid">
                    <div class="span12">
                        <ul class="site-stats">
                            <label>Andamentos SAFRA</label>
                            <li class="bg_lh"><a href="http://sijur.dunice.net/index.php/controladoria" style="color: white;"><i class="fas fa-users"></i> <strong>
                                    <?= $this->db->count_all('base_not_andamentos'); ?></strong> <small>Total de registro de notificações em andamento</small></a></li>
              
                            

                        </ul>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

    
<!--   personalizado -->
<div class="row-fluid" style="margin-top: 0">

    <div class="span12">
        
        <div class="widget-box">
            <div class="widget-title"><span class="icon"><i class="icon-signal"></i></span><h5>Registros por situação</h5></div>
            <div class="widget-content">
                <div class="row-fluid">
                    <div class="span12" >
                        <?php
                         //var_dump($total_contratosUF);
                        if($situacaoPainel != null){
                                    foreach ($situacaoPainel as $c) {
                                        //echo $c->REGISTROS;
                                        echo '<div style="float: left; margin-left: 20px; height: 100px; width: 150px; ">';
                                        
                                            echo '<table class="table table-bordered ">';
                                                echo '<tr>';
                                                    echo '<th style="font-size: 15px;">'.$c->SITUACAO.'</th>';
                                                                                                   
                                                echo '<tr>';
                                                 echo '<tr>';
                                                    echo '<td style="text-align: center; font-size: 18px;"><a href="'.base_url().'index.php/controladoria/ctdashboard?pesquisa='.$c->SITUACAO.'"><b>'.$c->QT.'</b></a></td>';
                                                                                                   
                                                echo '<tr>';

                                            echo '</table>';
                            
                                        echo '</div>';
                                    }            
                                    }else{
                                        echo 'Nenhuma registro em aberto'; 
                                        
                                    }
                        
                        ?>
                    </div>
            
                </div>
               
             
            </div>
            
        </div>
        
    </div>
</div>
<!--fim personalozado-->

            <?php
        } ?>

<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vVenda')) { ?>

    <?php //echo 'informações da TV';

                //require 'tv.php'; ?>
            <?php } ?>


        
<script src="<?php echo base_url() ?>assets/js/jquery.validate.js"></script>
<!-- Modal Estoque-->
<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('click', 'a', function(event) {
            var produto = $(this).attr('produto');
            var estoque = $(this).attr('estoque');
            $('.idProduto').val(produto);
            $('#estoqueAtual').val(estoque);
        });

        $('#formEstoque').validate({
            rules: {
                estoque: {
                    required: true,
                    number: true
                }
            },
            messages: {
                estoque: {
                    required: 'Campo Requerido.',
                    number: 'Informe um número válido.'
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

        
            eventClick: function(info) {
                var eventObj = info.event.extendedProps;
                $('#modalId').html(eventObj.id);
                $('#modalIdVisualizar').attr("href", "<?php echo base_url(); ?>index.php/os/visualizar/" + eventObj.id);
                if (eventObj.editar) {
                    $('#modalIdEditar').show();
                    $('#linkExcluir').show();
                    $('#modalIdEditar').attr("href", "<?php echo base_url(); ?>index.php/os/editar/" + eventObj.id);
                    $('#modalIdExcluir').val(eventObj.id);
                } else {
                    $('#modalIdEditar').hide();
                    $('#linkExcluir').hide();
                }
                $('#modalCliente').html(eventObj.cliente);
                $('#modalDataInicial').html(eventObj.dataInicial);
                $('#modalDataFinal').html(eventObj.dataFinal);
                $('#modalGarantia').html(eventObj.garantia);
                $('#modalStatus').html(eventObj.status);
                $('#modalDescription').html(eventObj.description);
                $('#modalDefeito').html(eventObj.defeito);
                $('#modalObservacoes').html(eventObj.observacoes);
                $('#modalTotal').html(eventObj.total);
                $('#modalValorFaturado').html(eventObj.valorFaturado);

                $('#eventUrl').attr('href', event.url);
                $('#calendarModal').modal();
            },
        });

        srcCalendar.render();

        $('#btn-calendar').on('click', function() {
            srcCalendar.refetchEvents();
        });
    });
</script>
