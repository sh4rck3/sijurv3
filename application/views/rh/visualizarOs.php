<link href="<?= base_url('assets/css/custom.css'); ?>" rel="stylesheet">
<div class="row-fluid" style="margin-top: 0">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="fas fa-diagnoses"></i>
                </span>
                <h5>Detalhes do funcionário</h5>
                
            </div>
            <div class="widget-content" id="printOs">
                <div class="invoice-content">
                    <div class="invoice-head" style="margin-bottom: 0">

                        <table class="table table-condensed">
                            <tbody>
                            <?php if ($emitente == null) { ?>

                                <tr>
                                    <td colspan="3" class="alert">Você precisa configurar os dados do emitente. >>><a
                                                href="<?php echo base_url(); ?>index.php/mapos/emitente">Configurar</a>
                                        <<<
                                    </td>
                                </tr> <?php } else { ?>
                                <tr>
                                    <td style="width: 25%"><img src=" <?php echo $emitente[0]->url_logo; ?> "
                                                                style="max-height: 100px"></td>
                                    <td><span style="font-size: 20px; "> <?php echo $emitente[0]->nome; ?></span> </br>
                                        <span><?php echo $emitente[0]->cnpj; ?> </br> <?php echo $emitente[0]->rua . ', ' . $emitente[0]->numero . ' - ' . $emitente[0]->bairro . ' - ' . $emitente[0]->cidade . ' - ' . $emitente[0]->uf; ?> </span> </br>
                                        <span> E-mail: <?php echo $emitente[0]->email . ' - Fone: ' . $emitente[0]->telefone; ?></span>
                                    </td>
                                    <td style="width: 18%; text-align: center"><b>ID Funcionário:</b>
                                        <span><?php echo $result->idDp ?></span></br> </br>
                                        <span>Emissão: <?php echo date('d/m/Y') ?></span></td>
                                </tr>

                            <?php } ?>
                            </tbody>
                        </table>

                        <table class="table table-condensend">
                            <tbody>
                            <tr>
                                <td style="width: 50%; padding-left: 0">
                                    <ul>
                                        <li>
                                                <span>
                                                    <h5><b>Funcionário</b></h5>
                                                    <span><?php echo $result->nomeFuncionario ?></span><br/>
                                                    <span><?php echo $result->rua ?>, <?php echo $result->numero ?>, <?php echo $result->bairro ?></span>,
                                                    <span><?php echo $result->cidade ?> - <?php echo $result->estado ?></span><br>
                                                    <span>E-mail: <?php echo $result->email ?></span><br>
                                                   
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
                            <?php if ($result->dataInicial != null) { ?>
                                <tr>
                                    <td>
                                        <b>STATUS do funcionário: </b>
                                        <?php echo $result->status ?>
                                    </td>

                                    <td>
                                        <b>DATA Adminissão: </b>
                                        <?php echo date('d/m/Y', strtotime($result->dataInicial)); ?>
                                    </td>

                                    <td>
                                        <b>DATA Desligamento: </b>
                                        <?php echo $result->dataFinal ? date('d/m/Y', strtotime($result->dataFinal)) : ''; ?>
                                    </td>

                                   

                                   
                                   
                                </tr>
                            <?php } ?>

                            <?php if ($result->descricaoProduto != null) { ?>
                                <tr>
                                    <td colspan="6">
                                        <b>DESCRIÇÃO: </b>
                                        <?php echo htmlspecialchars_decode($result->descricaoProduto) ?>
                                    </td>
                                </tr>
                            <?php } ?>

                            <?php if ($result->defeito != null) { ?>
                                <tr>
                                    <td colspan="6">
                                        <b>DEFEITO APRESENTADO: </b>
                                        <?php echo htmlspecialchars_decode($result->defeito) ?>
                                    </td>
                                </tr>
                            <?php } ?>

                            <?php if ($result->observacoes != null) { ?>
                                <tr>
                                    <td colspan="6">
                                        <b>OBSERVAÇÕES: </b>
                                        <?php echo htmlspecialchars_decode($result->observacoes) ?>
                                    </td>
                                </tr>
                            <?php } ?>

                            <?php if ($result->laudoTecnico != null) { ?>
                                <tr>
                                    <td colspan="5">
                                        <b>LAUDO TÉCNICO: </b>
                                        <?php echo htmlspecialchars_decode($result->laudoTecnico) ?>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Resp. Anotação</th>
                                <th>Anotação</th>
                                <th>Data/Hora</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($anotacoes as $a) {
                                echo '<tr>';
                                echo '<td>' . $a->responsavelAnotacao . '</td>';
                                echo '<td>' . $a->anotacao . '</td>';
                                echo '<td>' . date('d/m/Y H:i:s', strtotime($a->data_hora)) . '</td>';
                                echo '</tr>';
                            }
                            if (!$anotacoes) {
                                echo '<tr><td colspan="2">Nenhuma anotação cadastrada</td></tr>';
                            }
                            ?>
                            </tbody>
                        </table>
                        

                        

                        <?php if ($anexos != null) { ?>
                            <table class="table table-bordered table-condensed">
                                <thead>
                                <tr>
                                    <th>Anexo</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($anexos as $a) {
                                    if ($a->thumb == null) {
                                        $thumb = base_url() . 'assets/img/icon-file.png';
                                        $link = base_url() . 'assets/img/icon-file.png';
                                    } else {
                                        $thumb = $a->url . '/thumbs/' . $a->thumb;
                                        $link = $a->url . '/' . $a->anexo;
                                    }
                                    echo '<tr>';
                                    echo '<td><a style="min-height: 150px;" href="#modal-anexo" imagem="' . $a->idAnexos . '" link="' . $link . '" role="button" class="btn anexo span12" data-toggle="modal"><img src="' . $thumb . '" alt=""></a></td>';
                                    echo '</tr>';
                                } ?>
                                </tbody>
                            </table>
                        <?php } ?>

                     
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<script type="text/javascript">
    $(document).ready(function () {
        $(document).on('click', '.anexo', function (event) {
            event.preventDefault();
            var link = $(this).attr('link');
            var id = $(this).attr('imagem');
            var url = '<?php echo base_url(); ?>index.php/os/excluirAnexo/';
            $("#div-visualizar-anexo").html('<img src="' + link + '" alt="">');
            $("#excluir-anexo").attr('link', url + id);

            $("#download").attr('href', "<?php echo base_url(); ?>index.php/os/downloadanexo/" + id);

        });

        $(document).on('click', '#excluir-anexo', function (event) {
            event.preventDefault();

            var link = $(this).attr('link');
            var idOS = "<?php echo $result->idDp; ?>"

            $('#modal-anexo').modal('hide');
            $("#divAnexos").html("<div class='progress progress-info progress-striped active'><div class='bar' style='width: 100%'></div></div>");

            $.ajax({
                type: "POST",
                url: link,
                dataType: 'json',
                data: "idOs=" + idOS,
                success: function (data) {
                    if (data.result == true) {
                        $("#divAnexos").load("<?php echo current_url(); ?> #divAnexos");
                    } else {
                        Swal.fire({
                            type: "error",
                            title: "Atenção",
                            text: data.mensagem
                        });
                    }
                }
            });
        });
    });
</script>
