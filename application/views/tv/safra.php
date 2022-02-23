<html>
    <head>
        <title>Safra performance</title>
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
              
              <link rel="stylesheet" href="<?php echo base_url() ?>assets/adminlte/bootstrap.css">
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
                        animation: blink 2s infinite;
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
                      
                      .blinkTotal2 {
                        animation: blink 2s infinite;
                      }

                      @keyframes blink {
                        0% {
                          opacity: 1;
                        }
                        100% {
                          opacity: 0;
                          color: #0000FF;
                        }
                      }
              </style>

<meta http-equiv="refresh" content="8;url=http://sijur.dunice.net/index.php/tv/safra">
    </head> 
  


            <body style="background-color: #363636;">
               
                    <div style="width: 95%;">
                      
                        
                        <div>
                         <div class="row" >
<!--                           comercial-->
                            <div class="col-lg-3 col-6" style="width: 90%; margin-left: 150px; float: left; margin-top: 10px;">
                                <!-- small box -->
                                <div class="info-box">
                                    <span class="info-box-icon bg-info"><i class="far fa-address-book"></i></span>

                                  <div class="info-box-content">
                                   <?php var_dump($safraImg[0]['url'].$safraImg[0]['anexo']);  //echo $safraImg[0]['id'].$safraImg[0]['url'].$safraImg[0]['anexo']; ?>
                                   
                                    <div style="" >
                                        <img src="<?php   echo $safraImg[0]['url'].$safraImg[0]['anexo']; ?>" alt="Logo" width=100% height=90% />
                                    </div>    
                                  
                                   

                                  </div>
                                  <!-- /.info-box-content -->
                                </div>
                            </div>
                              <!-- fim da div comercial -->
<!--                              veiculos-->
                            

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