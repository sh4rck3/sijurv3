<html>
    <head>
        <title>Bradesco</title>
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
              <style>
                  .blink {
                        animation: blink 3s infinite;
                      }

                      @keyframes blink {
                        0% {
                          opacity: 1;
                        }
                        100% {
                          opacity: 0;
                          color: red;
                        }
                      }
                  .blinkTotal {
                        animation: blink 1s infinite;
                      }

                      @keyframes blink {
                        0% {
                          opacity: 1;
                        }
                        100% {
                          opacity: 0;
                          color: red;
                        }
                      }
              </style>

       <meta http-equiv="refresh" content="8;url=http://sijur.dunice.net/index.php/tv/campoGrandeS">    
    </head> 
  


            <body style="background-color: #363636;">
               
                    <div>
                        <div style="font-family: arial; color: white; font-size: 38px; margin-top: -49px;">
                            <marquee scrollamount="20"><h1>ACOMPANHAMENTO MENSAL DE PERFORMANCE</h1></marquee>
                        </div>
                        <div style="font-family: arial; color: white; font-size: 38px; width: 100%; text-align: center; margin-top: -95px;">
                            <h3>Regional CAMPO GRANDE NORTE</h3>
                        </div>
                        <div>
                         <div class="row" style="font-size: 37px;">
<!--                           comercial-->
                            <div class="col-lg-3 col-6" style="width: 460px; margin-left: 70px; float: left;">
                                <!-- small box -->
                                <div class="info-box">
                                    <span class="info-box-icon bg-info"><i class="far fa-address-book"></i></span>

                                  <div class="info-box-content">
                                    <span class="info-box-text">Comercial</span>
                                    <hr noshade=”noshade” width="100%" size="1px" style="margin-top: -10px; border-color: red;"/>
                                    <span >Varejo</span>
                                    <hr noshade=”noshade” width="100%" size="1px" style="margin-top: -10px; border-color: blue;"/>
                                    <div>
                                        <div style="float: left;">
                                            <span >LP</span>
                                        </div>
                                        <div style=" float: right; margin-top: 30px; text-align: right;">
                                            <span class="info-box-number <?php if($getCcampoGrandeNVarejoLp[0]['total'] == NULL) {echo 'blink';} ?>" style="margin-top:  -30px;"> R$ <?php echo number_format($getCcampoGrandeNVarejoLp[0]['total'], 2, ',', '.'); ?></span>
                                        </div>

                                    </div>
                                    <div>
                                        <div style="float: left;">
                                            <span >MO</span>
                                        </div>
                                        <div style=" float: right; margin-top: 30px; text-align: right;">
                                            <span class="info-box-number <?php if($getCcampoGrandeNVarejoMo[0]['total'] == NULL) {echo 'blink';} ?>" style="margin-top:  -30px;"> R$ <?php echo number_format($getCcampoGrandeNVarejoMo[0]['total'], 2, ',', '.'); ?></span>
                                        </div>

                                    </div>
                                    <div style="background-color: whitesmoke; border: 5px solid grey; border-radius: 10px;">
                                        <div style="float: left;">
                                            <span >Total</span>
                                        </div>
                                        <div style="float: right; margin-top: 30px; margin-left: 30px;">
                                            <span class="info-box-number <?php  if(($getCcampoGrandeNVarejoLp[0]['total'] && $getCcampoGrandeNVarejoMo[0]['total']) == NULL) {echo 'blinkTotal';} ?>" style="margin-top:  -30px;">R$ <?php echo number_format($getCcampoGrandeNVarejoLp[0]['total'] + $getCcampoGrandeNVarejoMo[0]['total'], 2, ',', '.'); ?></span>
                                        </div>

                                    </div>
                                          <span >Prime</span>
                                          
                                    <hr noshade=”noshade” width="100%" size="1px" style="margin-top: -10px; border-color: blue;"/>
                                    <div>
                                        <div style="float: left;">
                                            <span >LP</span>
                                        </div>
                                        <div style=" float: right; margin-top: 30px; text-align: right;">
                                            <span class="info-box-number <?php if($getCcampoGrandeNPrimeLp[0]['total'] == NULL){echo 'blink';}?>" style="margin-top:  -30px;">R$ <?php echo number_format($getCcampoGrandeNPrimeLp[0]['total'], 2, ',', '.'); ?></span>
                                        </div>

                                    </div>
                                    <div>
                                        <div style="float: left;">
                                            <span >MO</span>
                                        </div>
                                        <div style=" float: right; margin-top: 30px; text-align: right;">
                                            <span class="info-box-number <?php if($getCcampoGrandeNPrimeMo[0]['total'] == NULL){echo 'blink';}?>" style="margin-top:  -30px;">R$ <?php echo number_format($getCcampoGrandeNPrimeMo[0]['total'], 2, ',', '.'); ?></span>
                                        </div>

                                    </div>
                                    <div style="background-color: whitesmoke; border: 5px solid grey; border-radius: 10px;">
                                        <div style="float: left;">
                                            <span >Total</span>
                                        </div>
                                        <div style="float: right; margin-top: 30px; margin-left: 30px;">
                                            <span class="info-box-number <?php if(($getCcampoGrandeNPrimeLp[0]['total'] && $getCcampoGrandeNPrimeMo[0]['total']) == NULL){echo 'blinkTotal';}?>" style="margin-top:  -30px;">R$ <?php echo number_format($getCcampoGrandeNPrimeLp[0]['total'] + $getCcampoGrandeNPrimeMo[0]['total'], 2, ',', '.'); ?></span>
                                        </div>

                                    </div>

                                  </div>
                                  <!-- /.info-box-content -->
                                </div>
                            </div>
                              <!-- fim da div comercial -->
<!--                              veiculos-->
                            <div class="col-lg-3 col-6" style="width: 460px; margin-left: 70px; float: left;">
                                <!-- small box -->
                                <div class="info-box">
                                    <span class="info-box-icon bg-info"><i class="far fa-address-book"></i></span>

                                  <div class="info-box-content">
                                    <span class="info-box-text">Veículos</span>
                                    <hr noshade=”noshade” width="100%" size="1px" style="margin-top: -10px; border-color: red;"/>
                                    <span >Varejo</span>
                                    <hr noshade=”noshade” width="100%" size="1px" style="margin-top: -10px; border-color: blue;"/>
                                    <div>
                                        <div style="float: left;">
                                            <span >LP</span>
                                        </div>
                                        <div style=" float: right; margin-top: 30px; text-align: right;">
                                            <span class="info-box-number <?php if($getVcampoGrandeNVarejoLp[0]['total'] == NULL) {echo 'blink';} ?>" style="margin-top:  -30px;"> R$ <?php echo number_format($getVcampoGrandeNVarejoLp[0]['total'], 2, ',', '.'); ?></span>
                                        </div>

                                    </div>
                                    <div>
                                        <div style="float: left;">
                                            <span >MO</span>
                                        </div>
                                        <div style=" float: right; margin-top: 30px; text-align: right;">
                                            <span class="info-box-number <?php if($getVcampoGrandeNVarejoMo[0]['total'] == NULL) {echo 'blink';} ?>" style="margin-top:  -30px;"> R$ <?php echo number_format($getVcampoGrandeNVarejoMo[0]['total'], 2, ',', '.'); ?></span>
                                        </div>

                                    </div>
                                    <div style="background-color: whitesmoke; border: 5px solid grey; border-radius: 10px;">
                                        <div style="float: left;">
                                            <span >Total</span>
                                        </div>
                                        <div style="float: right; margin-top: 30px; margin-left: 30px;">
                                            <span class="info-box-number <?php  if(($getVcampoGrandeNVarejoLp[0]['total'] && $getVcampoGrandeNVarejoMo[0]['total']) == NULL) {echo 'blinkTotal';} ?>" style="margin-top:  -30px;">R$ <?php echo number_format($getVcampoGrandeNVarejoLp[0]['total'] + $getVcampoGrandeNVarejoMo[0]['total'], 2, ',', '.'); ?></span>
                                        </div>

                                    </div>
                                          <span >Prime</span>
                                          
                                    <hr noshade=”noshade” width="100%" size="1px" style="margin-top: -10px; border-color: blue;"/>
                                    <div>
                                        <div style="float: left;">
                                            <span >LP</span>
                                        </div>
                                        <div style=" float: right; margin-top: 30px; text-align: right;">
                                            <span class="info-box-number <?php if($getVcampoGrandeNPrimeLp[0]['total'] == NULL){echo 'blink';}?>" style="margin-top:  -30px;">R$ <?php echo number_format($getVcampoGrandeNPrimeLp[0]['total'], 2, ',', '.'); ?></span>
                                        </div>

                                    </div>
                                    <div>
                                        <div style="float: left;">
                                            <span >MO</span>
                                        </div>
                                        <div style=" float: right; margin-top: 30px; text-align: right;">
                                            <span class="info-box-number <?php if($getVcampoGrandeNPrimeMo[0]['total'] == NULL){echo 'blink';}?>" style="margin-top:  -30px;">R$ <?php echo number_format($getVcampoGrandeNPrimeMo[0]['total'], 2, ',', '.'); ?></span>
                                        </div>

                                    </div>
                                    <div style="background-color: whitesmoke; border: 5px solid grey; border-radius: 10px;">
                                        <div style="float: left;">
                                            <span >Total</span>
                                        </div>
                                        <div style="float: right; margin-top: 30px; margin-left: 30px;">
                                            <span class="info-box-number <?php if(($getVcampoGrandeNPrimeLp[0]['total'] && $getVcampoGrandeNPrimeMo[0]['total']) == NULL){echo 'blinkTotal';}?>" style="margin-top:  -30px;">R$ <?php echo number_format($getVcampoGrandeNPrimeLp[0]['total'] + $getVcampoGrandeNPrimeMo[0]['total'], 2, ',', '.'); ?></span>
                                        </div>

                                    </div>

                                  </div>
                                  <!-- /.info-box-content -->
                                </div>
                            </div>

<!--                                fim da div veiculos-->
<!--                    imoveis-->
                            <div class="col-lg-3 col-6" style="width: 460px; margin-left: 70px; float: left;">
                                <!-- small box -->
                                <div class="info-box">
                                    <span class="info-box-icon bg-info"><i class="far fa-address-book"></i></span>

                                  <div class="info-box-content">
                                    <span class="info-box-text">Imóveis</span>
                                    <hr noshade=”noshade” width="100%" size="1px" style="margin-top: -10px; border-color: red;"/>
                                    <span >Varejo</span>
                                    <hr noshade=”noshade” width="100%" size="1px" style="margin-top: -10px; border-color: blue;"/>
                                    <div>
                                        <div style="float: left;">
                                            <span >LP</span>
                                        </div>
                                        <div style=" float: right; margin-top: 30px; text-align: right;">
                                            <span class="info-box-number <?php if($getIcampoGrandeNVarejoLp[0]['total'] == NULL) {echo 'blink';} ?>" style="margin-top:  -30px;"> R$ <?php echo number_format($getIcampoGrandeNVarejoLp[0]['total'], 2, ',', '.'); ?></span>
                                        </div>

                                    </div>
                                    <div>
                                        <div style="float: left;">
                                            <span >MO</span>
                                        </div>
                                        <div style=" float: right; margin-top: 30px; text-align: right;">
                                            <span class="info-box-number <?php if($getIcampoGrandeNVarejoMo[0]['total'] == NULL) {echo 'blink';} ?>" style="margin-top:  -30px;"> R$ <?php echo number_format($getIcampoGrandeNVarejoMo[0]['total'], 2, ',', '.'); ?></span>
                                        </div>

                                    </div>
                                    <div style="background-color: whitesmoke; border: 5px solid grey; border-radius: 10px;">
                                        <div style="float: left;">
                                            <span >Total</span>
                                        </div>
                                        <div style="float: right; margin-top: 30px; margin-left: 30px;">
                                            <span class="info-box-number <?php  if(($getIcampoGrandeNVarejoLp[0]['total'] && $getIcampoGrandeNVarejoMo[0]['total']) == NULL) {echo 'blinkTotal';} ?>" style="margin-top:  -30px;">R$ <?php echo number_format($getIcampoGrandeNVarejoLp[0]['total'] + $getIcampoGrandeNVarejoMo[0]['total'], 2, ',', '.'); ?></span>
                                        </div>

                                    </div>
                                          <span >Prime</span>
                                          
                                    <hr noshade=”noshade” width="100%" size="1px" style="margin-top: -10px; border-color: blue;"/>
                                    <div>
                                        <div style="float: left;">
                                            <span >LP</span>
                                        </div>
                                        <div style=" float: right; margin-top: 30px; text-align: right;">
                                            <span class="info-box-number <?php if($getIcampoGrandeNPrimeLp[0]['total'] == NULL){echo 'blink';}?>" style="margin-top:  -30px;">R$ <?php echo number_format($getIcampoGrandeNPrimeLp[0]['total'], 2, ',', '.'); ?></span>
                                        </div>

                                    </div>
                                    <div>
                                        <div style="float: left;">
                                            <span >MO</span>
                                        </div>
                                        <div style=" float: right; margin-top: 30px; text-align: right;">
                                            <span class="info-box-number <?php if($getIcampoGrandeNPrimeMo[0]['total'] == NULL){echo 'blink';}?>" style="margin-top:  -30px;">R$ <?php echo number_format($getIcampoGrandeNPrimeMo[0]['total'], 2, ',', '.'); ?></span>
                                        </div>

                                    </div>
                                    <div style="background-color: whitesmoke; border: 5px solid grey; border-radius: 10px;">
                                        <div style="float: left;">
                                            <span >Total</span>
                                        </div>
                                        <div style="float: right; margin-top: 30px; margin-left: 30px;">
                                            <span class="info-box-number <?php if(($getIcampoGrandeNPrimeLp[0]['total'] && $getIcampoGrandeNPrimeMo[0]['total']) == NULL){echo 'blinkTotal';}?>" style="margin-top:  -30px;">R$ <?php echo number_format($getIcampoGrandeNPrimeLp[0]['total'] + $getIcampoGrandeNPrimeMo[0]['total'], 2, ',', '.'); ?></span>
                                        </div>

                                    </div>

                                  </div>
                                  <!-- /.info-box-content -->
                                </div>
                            </div>
<!--                                    fim da div imoveis-->
                        </div>
                            

                            <!-- ./row fim -->
                        </div>
                    </div>
            </body>

</html>
<script src="<?php echo base_url() ?>assets/adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url() ?>assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>assets/adminlte/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() ?>assets/adminlte/dist/js/demo.js"></script>