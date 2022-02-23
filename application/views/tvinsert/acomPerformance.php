

<?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'aVenda')) { ?>
    <a href="<?php echo base_url(); ?>index.php/vendas/adicionarPerf" class="btn btn-success"><i class="fas fa-plus"></i> Adicionar informações</a>
<?php } ?>

<div class="widget-box">
    <div class="widget-title">
        <span class="icon">
            <i class="fas fa-cash-register"></i>
        </span>
        <h5>Acompanhamento de performance mensal</h5>
    </div>
    <div class="widget-content nopadding tab-content">
        <table id="tabela1" class="table table-bordered ">
            <thead>
                <tr style="background-color: #2D335B">
                    <th>#</th>
                    <th>Data da informação</th>
                    <th>Agência</th>
                    <th>Conta</th>
                    <th>Regiona</th>
                    <th>Valor do Acordo</th>
                    <th>Tipo de contrato</th>
                    <th>Segmento</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php

                    if (!$results) {
                        echo '<tr>
                                <td colspan="5">Nenhuma informação Cadastrada</td>
                            </tr>';
                    }
                    foreach ($results as $r) {
                        switch ($r->LpMo) {
                            case 'MO':
                                $LpMo = 'Mora';
                                break;
                             case 'LP':
                                $LpMo = 'Lucro Perdido';
                                break;
                            default:
                                $LpMo = '#E0E4CC';
                                break;
                        }
                       
                        echo '<tr>';
                        echo '<td>' . $r->idPerf . '</td>';
                        echo '<td>' . date(('d/m/Y'), strtotime($r->dataInsercao)) . '</td>';
                        echo '<td>' . $r->agencia . '</td>';
                        echo '<td>' . $r->conta . '</td>';
                        echo '<td>' . $r->regional . '</td>';
                        echo '<td> R$' . number_format($r->valorAcordo, 2, ',', '.') . '</td>'; 
                        echo '<td>' . $LpMo . '</td>';
                        echo '<td>' . $r->segmento . '</td>';
                            
                             //echo '<td> R$ ' . number_format($r->valor, 2, ',', '.') . '</td>'
                            
                       // echo '<td><a href="' . base_url() . 'index.php/clientes/visualizar/' . $r->idClientes . '">' . $r->nomeCliente . '</a></td>';
                       // echo '<td>' . $faturado . '</td>';
                        echo '<td>';
//                        if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vVenda')) {
//                            echo '<a style="margin-right: 1%" href="' . base_url() . 'index.php/vendas/visualizar/' . $r->idPerf . '" class="btn tip-top" title="Ver mais detalhes"><i class="fas fa-eye"></i></a>';
//                            }
//                        if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eVenda')) {
//                            echo '<a style="margin-right: 1%" href="' . base_url() . 'index.php/vendas/editarPerf/' . $r->idPerf . '" class="btn btn-info tip-top" title="Editar venda"><i class="fas fa-edit"></i></a>';
//                        }
                        if ($this->permission->checkPermission($this->session->userdata('permissao'), 'dVenda')) {
                            echo '<a href="#modal-excluir" role="button" data-toggle="modal" venda="' . $r->idPerf . '" class="btn btn-danger tip-top" title="Excluir registro"><i class="fas fa-trash-alt"></i></a>';
                        }
                        echo '</td>';
                        echo '</tr>';
                    } ?>
            </tbody>
        </table>
    </div>
</div>
<?php  echo $this->pagination->create_links(); ?>

<!-- Modal -->
<div id="modal-excluir" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form action="<?php echo base_url() ?>index.php/vendas/excluirPerf" method="post">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h5 id="myModalLabel">Excluir registro performance</h5>
        </div>
        <div class="modal-body">
            <input type="hidden" id="idVenda" name="id" value="" />
            <h5 style="text-align: center">Deseja realmente excluir esta infomrção?</h5>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
            <button class="btn btn-danger">Excluir</button>
        </div>
    </form>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('click', 'a', function(event) {
            var venda = $(this).attr('venda');
            $('#idVenda').val(venda);
        });
    });
</script>
