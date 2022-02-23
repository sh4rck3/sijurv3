<!DOCTYPE html>
<html>

<head>
    <title>Retomadas</title>
    <meta charset="UTF-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/fullcalendar.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/blue.css" class="skin-color" />
</head>

<body style="background-color: transparent">
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <?= $topo ?>
                    <div class="widget-title">
                        <h4 style="text-align: center; font-size: 1.1em; padding: 5px;">
                            <?= ucfirst($title) ?>
                        </h4>
                    </div>
                    <div class="widget-content nopadding tab-content">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th width="600" align="center" style="font-size: 15px">Nome</th>
                                    <th width="100" align="center" style="font-size: 15px">UF</th>
                                    <th width="130" align="center" style="font-size: 15px">CPF</th>
                                    <th width="130" align="center" style="font-size: 15px">Fone</th>
                                    <th width="145" align="center" style="font-size: 15px">Fone2</th>
                                    <th width="145" align="center" style="font-size: 15px">Atuação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($produtos as $p) {
                                        echo '<tr>';
                                        echo '<td>' . $p->nomeLocalizador . '</td>';
                                        echo '<td align="center">' . $p->uf . '</td>';
                                        echo '<td align="center">R$: ' . $p->cpf . '</td>';
                                        echo '<td align="center">R$: ' . $p->fone . '</td>';
                                        echo '<td align="center">' . $p->outroFone . '</td>';
                                        echo '<td align="center">' . $p->areasAtuacao . '</td>';
                                        echo '</tr>';
                                    }
                                ?>
                                <tr>
                                    <td colspan="6">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td colspan="4"></td>
                                    <td align="center"><b>Itens em Estoque</b></td>
                                    <td align="center"><b>Valor do Estoque</b></td>
                                </tr>
                                <tr style="background-color: gainsboro;">
                                    <td colspan="4"></td>
                                    <td align="center"><?= array_sum(array_column($produtos, 'estoque')) ?></td>
                                    <td align="center">R$: <?= number_format(array_sum(array_column($produtos, 'valorEstoque')), 2, ',', '.'); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <h5 style="text-align: right; font-size: 0.8em; padding: 5px;">
                    Data do Relatório: <?php echo date('d/m/Y'); ?>
                </h5>
            </div>
        </div>
    </div>
</body>

</html>
