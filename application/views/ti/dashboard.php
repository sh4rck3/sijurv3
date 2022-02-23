<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/jquery-ui/css/smoothness/jquery-ui-1.9.2.custom.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/table-custom.css" />
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-ui/js/jquery-ui-1.9.2.custom.js"></script>
<script src="<?php echo base_url() ?>assets/js/sweetalert2.all.min.js"></script>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/adminlte/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/adminlte/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/adminlte/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/adminlte/plugins/summernote/summernote-bs4.min.css">

  
  
  <meta http-equiv="refresh" content="10;url=http://sijurv3.dunice.net/index.php/ti/dashboard">

<?php //echo $beep; ?>

<?php if($beep >= '1'){ 
       ?> 
          <?php //var_dump($proximoChamado);
          if (!$proximoChamado) {
                        echo 'Nenhum resultado';
                    }
                    
                    foreach ($proximoChamado as $r) {
                        $nomeDoProximo = $r->usuarioChamado;
                        $pedido = $r->observacao;
                    }

          //echo $nomeDoProximo;
          
          ?>
  <div style="color: white;">
      <marquee scrollamount="15"><h1>Próxima pessoa do chamado: <?php echo $nomeDoProximo; ?>. Pedido: <?php echo $pedido; ?></h1></marquee>
  </div>
  
    
        <div style="display: none;">
<!--<div >-->
                                            
            <audio id="beepChamado" autoplay controls>                                           

            <source src="<?php echo base_url() ?>assets/audio/censor-beep-01.mp3" type="audio/mp3">

            seu navegador nao suporta audio
           </audio>
        </div>
<?php }?>
<div>
    <div class="row">
      <div class="col-lg-3 col-6" style="width: 300px; margin-left: 20px; float: left;">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php print_r($result) ?></h3>

                <p>Total geral de chamados</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">Total de chamados no sistema <i class="fas fa-arrow-circle-right"></i></a>
            </div>
     </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6" style="width: 300px; margin-left: 20px; float: left;">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $beep; ?> - Beep</h3>

                <p>Se tive ta bipando</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">chamados para o Beep <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6" style="width: 300px; margin-left: 20px; float: left;">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php print_r($resultTotalDia) ?></h3>

                <p>Total de chamados de HOJE</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">chamados abertos hoje <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6" style="width: 300px; margin-left: 20px; float: left;">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <?php 
                $V = '0';
                if($V == '0'){ ?>
                <h3><?php echo $resultadoMes[0]['QT']; ?></h3>
                
                <p><?php echo $resultadoMes[0]['usuarioChamado']; ?></p>
                
                <?php }else{ ?>
                    Nenhum resultado
                <?php }?>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">Usuário com maior chamado no mês <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
</div>
  <div class="row">
      <div class="col-lg-3 col-6" style="width: 300px; margin-left: 20px; float: left;">
            <!-- small box -->
            <a <link rel="stylesheet" href="<?= site_url('chamados/gerenciarTIstatus') ?>">
            <div class="small-box bg-red">
              <div class="inner">
                  <h3><?php echo $tecnico[0]['CHAMADOS RESOLVIDOS']; ?> </h3>

                <p><?php echo $tecnico[0]['Técnico Responsável']; ?></p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <div class="small-box-footer">Porcentagem: <?php echo $tecnico[0]['PORCENTAGEM']; ?><i class="fas fa-arrow-circle-right"></i></div>
            </div>
            </a>
     </div>
     <div class="col-lg-3 col-6" style="width: 300px; margin-left: 20px; float: left;">
            <!-- small box -->
            <div class="small-box bg-olive">
              <div class="inner">
                  <h3><?php echo $tecnico[1]['CHAMADOS RESOLVIDOS']; ?> </h3>

                <p><?php echo $tecnico[1]['Técnico Responsável']; ?></p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <div class="small-box-footer">Porcentagem: <?php echo $tecnico[1]['PORCENTAGEM']; ?><i class="fas fa-arrow-circle-right"></i></div>
            </div>
     </div>
      <div class="col-lg-3 col-6" style="width: 300px; margin-left: 20px; float: left;">
            <!-- small box -->
            <div class="small-box bg-dark">
              <div class="inner">
                  <h3><?php echo $tecnico[2]['CHAMADOS RESOLVIDOS']; ?> </h3>

                <p><?php echo $tecnico[2]['Técnico Responsável']; ?></p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <div class="small-box-footer">Porcentagem: <?php echo $tecnico[2]['PORCENTAGEM']; ?><i class="fas fa-arrow-circle-right"></i></div>
            </div>
     </div>
      <div class="col-lg-3 col-6" style="width: 300px; margin-left: 20px; float: left;">
            <!-- small box -->
            <div class="small-box bg-pink">
              <div class="inner">
                  <h3><?php if(!empty($tecnico[3]['CHAMADOS RESOLVIDOS'])){echo $tecnico[3]['CHAMADOS RESOLVIDOS'];}else{echo '0';} ?> </h3>

                <p><?php if(!empty($tecnico[3]['Técnico Responsável'])){echo $tecnico[3]['Técnico Responsável'];}else{echo 'Abertos';} ?></p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
                <div class="small-box-footer">Porcentagem: <?php if(!empty($tecnico[3]['PORCENTAGEM'])){echo $tecnico[3]['PORCENTAGEM'];} ?><i class="fas fa-arrow-circle-right"></i></div>
            </div>
     </div>
  </div>
  
                                            
           


  <h3 style="color: white;">Sobre PC's</h3>
  <div id="parqueDM" style="margin-left: 20px;" class="container-fluid">
      <div class="row">
          <div style="width: 190px; float: left; margin-left: 20px;">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Computadores <br>em Uso</span>
                <span class="info-box-number">
                  
                 PC:  <?php echo $pcEmUso[0]['QT']; ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <div  style="width: 190px; float: left; margin-left: 20px;">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-thumbs-up"></i></span>

              <div class="info-box-content">
                  <span class="info-box-text">PCS's COM<br> SSD</span>
                <span class="info-box-number"><?php echo $pcSSD[0]['QT']; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div style="width: 190px; float: left; margin-left: 20px;">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-down"></i></span>

              <div class="info-box-content">
                  <span class="info-box-text">PC's Sem<br>SSD</span>
                <span class="info-box-number"><?php echo $pcSemSSD[0]['QT']; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <div  style="width: 190px; float: left; margin-left: 20px;">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">PC's em Estoque</span>
                <?php echo $pcGuardado[0]['QT']; ?>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <div style="width: 190px; float: left; margin-left: 20px;">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total de<br>PC's</span>
                <span class="info-box-number">
                  
                 PC:  <?php echo $pcEmUso[0]['QT']+$pcGuardado[0]['QT']; ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
         
        </div>
      
  </div>
  <h3 style="color: white;">Sobre Headset</h3><?php //var_dump($fone); ?>
  <div id="parqueDM" style="margin-left: 20px;" class="container-fluid">
      <div class="row">
          <?php  
          $totalFone = 0;
          if($fone != null){
                                    foreach ($fone as $c) {
                                        
                                         switch ($c->setor) {
                                            case 'Acordos Bradesco':
                                                $icon = 'fa-atom';
                                                break;
                                            
                                            default:
                                                $icon = 'fa-address-book';
                                                break;
                                        }
                                        
                                       
                                        
                                        ?>
          
          <div style="width: 190px; float: left; margin-left: 20px;">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas <?= $icon ?>"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Fones <br><?php if($c->setor == 'TI'){echo 'Guardado';}else{echo $c->setor;} ?></span>
                <span class="info-box-number">
                  
                 Quantidade:  <?= $c->QT?>
                 <?php $totalFone+= $c->QT; ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          
           <?php 
          
           
                                    }
          }
          echo '<br>';?>    
         <div  style="width: 190px; float: left; margin-left: 20px;">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total de Fones</span>
                <?php echo $totalFone; ?>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
        </div>
      
  </div>
  
  <h3 style="color: white;">Sobre Monitores</h3><?php //var_dump($fone); ?>
  <div id="parqueDM" style="margin-left: 20px;" class="container-fluid">
      <div class="row">
          <?php  
          $totalMonitor = 0;
          if($monitor != null){
                                    foreach ($monitor as $c) {
                                        
                                         switch ($c->status) {
                            case 'Acordos Bradesco':
                                $icon = 'fa-atom';
                                break;
                            
                            default:
                                $icon = 'fa-address-book';
                                break;
                        }
                                        
                                        ?>
          
          <div style="width: 190px; float: left; margin-left: 20px;">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas <?= $icon ?>"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Monitores<br><?= $c->status ?></span>
                <span class="info-box-number">
                  
                 Quantidade:  <?= $c->QT?>
                 <?php $totalMonitor+= $c->QT; ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          
           <?php 
          
           
                                    }
          }
           //echo '<br>';?>    
         <div  style="width: 190px; float: left; margin-left: 20px;">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total de Monitores</span>
                <?php echo $totalMonitor; ?>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
        </div>    
        
  </div>
 
<!--  <div id="getPcMarca">
      <?php //var_dump($pcMarca);
      if($pcMarca != null){
                                    foreach ($pcMarca as $c) {
                                      
                                        echo '<div style="float: left; margin-left: 20px; height: 100px; width: 150px; ">';
                                        
                                            echo '<table class="table table-bordered ">';
                                                echo '<tr>';
                                                    echo '<th style="font-size: 15px;">';
                                                    if($c->marca == NULL){echo 'sem marca';} else { echo $c->marca;} 
                                                    echo '</th>';
                                                                                                   
                                                echo '<tr>';
                                                 echo '<tr>';
                                                    echo '<td style="text-align: center; font-size: 18px;"><b>'.$c->QT.'</b></td>';
                                                                                                   
                                                echo '<tr>';

                                            echo '</table>';
                            
                                        echo '</div>';
                                    }            
                                    }else{
                                        echo 'Nenhuma registro em aberto'; 
                                        
                                    }
      ?>
      
  </div>-->
  
  







