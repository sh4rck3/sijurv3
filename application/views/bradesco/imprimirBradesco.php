<?php $totalServico = 0;
$totalProdutos = 0; ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Registro_<?php echo $result->idBradesco ?>_<?php echo $result->CLIENTE ?></title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/matrix-style.css" />
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="<?= base_url('assets/css/custom.css'); ?>" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
    <style>
        .table {
            margin-bottom: 5px;
        }
    </style>
</head>

<body>

    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">

                <div class="invoice-content">
                    <div class="invoice-head" style="margin-bottom: 0">

                        <table class="table table-condensed">
                            <tbody>
                                <?php if ($emitente == null) { ?>

                                    <tr>
                                        <td colspan="3" class="alert">Você precisa configurar os dados do emitente. >>><a href="<?php echo base_url(); ?>index.php/mapos/emitente">Configurar</a>
                                            <<<</td> </tr> <?php } else { ?> <td style="width: 25%"><img src=" <?php echo $emitente[0]->url_logo; ?> ">
                                        </td>
                                        <td> <span style="font-size: 17px;">
                                                <?php echo $emitente[0]->nome; ?></span> </br>
                                            <span style="font-size: 12px; ">
                                                <span class="icon">
                                                    <i class="fas fa-fingerprint" style="margin:5px 1px"></i>
                                                    <?php echo $emitente[0]->cnpj; ?> </br>
                                                    <span class="icon">
                                                        <i class="fas fa-map-marker-alt" style="margin:4px 3px"></i>
                                                        <?php echo $emitente[0]->rua . ', nº:' . $emitente[0]->numero . ', ' . $emitente[0]->bairro . ' - ' . $emitente[0]->cidade . ' - ' . $emitente[0]->uf; ?>
                                                    </span> </br> <span>
                                                        <span class="icon">
                                                            <i class="fas fa-comments" style="margin:5px 1px"></i>
                                                            E-mail:<?php echo $emitente[0]->email . ' - Fone: ' . $emitente[0]->telefone; ?> </br>
                                                            <span class="icon">
                                                                <i class="fas fa-user-check"></i>
                                                                Responsável: <?php echo $result->RESPONSAVEL ?>
                                        <td style="width: 18%; text-align: center"><b>N° do Registro:</b> <span><?php echo $result->idBradesco ?></span></br> </br> <span>Emissão: <?php echo date('d/m/Y') ?></span></td>
                                        </span>
                                        </td>
                                    </tr>

                                <?php } ?>
                            </tbody>
                        </table>
                        <table class="table table-condensend">
                            <tbody>
                                <tr>
                                    <td style="width: 85%; padding-left: 0">
                                        <ul>
                                            <li>
                                                <span>
                                                    <h5><b>GCPJ:   </b><b><?php echo $result->GCPJ ?></b></h5>
                                                    <span><b>Cliente: </b><?php echo $result->CLIENTE ?></span><br />
                                                    <span><b>Agência: </b><?php echo $result->AGENCIA ?></span><br />
                                                    <span><b>Conta: </b><?php echo $result->CONTA ?></span><br />
                                                    <span><b>Carteira: </b><?php echo $result->CARTEIRA ?></span><br />
                                                    <span><b>Contrato: </b><?php echo $result->CONTRATO ?></span><br />
                                                    
                                                 
                                            </li>
                                        </ul>
                                    </td>

                                   
                                </tr>
                            </tbody>
                        </table>

                    </div>

                    <div style="margin-top: 0; padding-top: 0">
                        
                        
                        


                        <table class="table table-condensed">
                            <tbody>

                                <?php if ($result->DataEntrada != null) { ?>
                                    <tr>
                                        <td>
                                            <b>STATUS: </b>
                                            <?php echo $result->STATUS ?>
                                        </td>

                                        <td>
                                            <b>DATA ENTRADA: </b>
                                            <?php echo date('d/m/Y', strtotime($result->DataEntrada)); ?>
                                        </td>
                                        <td>
                                            <b>Observação: </b>
                                            <?php echo $result->OBS ?>
                                        </td>

                                       
                                    </tr>
                                    <tr>
                                        <td>
                                            <b>Situação: </b>
                                            <?php echo $result->SITUAC ?>
                                        </td>

                                        <td>
                                            <b>Iniciais: </b>
                                            <?php echo $result->situacao_iniciais; ?>
                                        </td>
                                        

                                       
                                    </tr>
                                    <tr>
                                        <td>
                                            <b>Data do ajuizamento: </b>
                                            <?php echo $result->DT_AJUIZ ?>
                                        </td>
                                        <td>
                                            <b>Observação(Historico): </b>
                                            <?php echo $result->OBSERVACAO ?>
                                        </td>

                                      

                                       
                                    </tr>
                                <?php } ?>

                              
                            </tbody>
                        </table>

                        

                      

                        <table class="table table-bordered table-condensed">
                            <tbody>
                                <tr>
                                    <td>Data
                                        <hr>
                                    </td>
                                    <td>Assinatura do Cliente
                                        <hr>
                                    </td>
                                    <td>Assinatura do Técnico Responsável
                                        <hr>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/matrix.js"></script>

    <script>
        window.print();
    </script>

</body>

</html>
