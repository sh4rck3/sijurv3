<div class="span12" style="margin-left: 0">
    <form method="get" action="<?php echo base_url(); ?>index.php/chamados/gerenciar2">
        
            <div class="span3">
                <a href="<?php echo base_url(); ?>index.php/chamados/adicionar" class="btn btn-success"><i class="fas fa-plus"></i> Adicionar chamado </a>
            </div>
       

        <div class="span3">
            <input type="text" name="pesquisa" id="pesquisa" placeholder="Nome do cliente a pesquisar" class="span12" value="">
        </div>
        

        <div class="span1">
            <button class="span12 btn"><i class="fas fa-search"></i></button>
        </div>
    </form>
</div>

<div class="widget-box">
    <div class="widget-title">
        <span class="icon">
            <i class="fas fa-user"></i>
        </span>
        <h5>Chamados</h5><?php print_r( $this->session->userdata('nome')); ?>
    </div>

    <div class="widget-content nopadding tab-content">
        <table id="tabela1" class="table table-bordered ">
            <thead>
            <tr>
                <th>Nº chamado</th>
                <th>Nome</th>
                <th>IP</th>
                <th>Data e Hora</th>
                <th>Tipo de chamado</th>
                <th>Status</th>
                <th>Pedido</th>
                <th>Resposta</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            <?php

            if (!$results) {
                echo '<tr>
                                <td colspan="5">Nenhum chamado Cadastrado</td>
                                </tr>';
            }
            foreach ($results as $r) {
                
                 switch ($r->status) {
                            case 'Novo':
                                $cor = '#008000';
                                break;
                            case 'Fechado':
                                $cor = '#FF0000';
                                break;
                             case 'Em desenvolvimento':
                                $cor = '#00008B';
                                break;
                            default:
                                $cor = '#00cd00';
                              
                                break;
                        }
                echo '<tr>';
                echo '<td>' . $r->idClientes . '</td>';
                echo '<td>' .$r->usuarioChamado. '</td>';
                echo '<td>' .$r->ipUsuarioChamado. '</td>';
                echo '<td>' .$r->dataChamado. '</td>';
                echo '<td>' . $r->tipoChamado . '</td>';
                echo '<td><span class="badge" style="background-color: ' . $cor . '; border-color: ' . $cor . '">' . $r->status . '</span> </td>';
                //echo '<td>' . $r->status . '</td>';
                echo '<td>' . $r->observacao . '</td>';
                echo '<td> <b>Técnico:</b>' . $r->tecnicoResponsavel . '<br><b>Resposta:</b>' . $r->respostaTecnica . '</td>';
              
                echo '<td>';
                if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vCliente')) {
                    //echo '<a href="' . base_url() . 'index.php/clientes/visualizar/' . $r->idClientes . '" style="margin-right: 1%" class="btn tip-top" title="Ver mais detalhes"><i class="fas fa-eye"></i></a>';
                   
                }
                if ($this->permission->checkPermission($this->session->userdata('permissao'), 'cBackup')) {
                    if( $r->status == 'Novo'){
                    echo '<a href="' . base_url() . 'index.php/chamados/abrir/' . $r->idClientes . '" style="margin-right: 1%" class="btn btn-info tip-top" title="Responder Chamado"><i class="fas fa-edit"></i></a>';
                    } else {
                        if( $r->status == 'Fechado'){
                            $disable = 'pointer-events: none';
                    echo '<a href="' . base_url() . 'index.php/chamados/responder/' . $r->idClientes . '" style="margin-right: 1%; '.$disable.'" class="btn btn-info tip-top" title="Responder Chamado" ><i class="fas fa-edit"></i></a>';    
                        } else {
                    echo '<a href="' . base_url() . 'index.php/chamados/responder/' . $r->idClientes . '" style="margin-right: 1%" class="btn btn-info tip-top" title="Responder Chamado"><i class="fas fa-edit"></i></a>';        
                        }
                    }
                   // echo '<a href="' . base_url() . 'index.php/cobranca/adicionarEsteira?nomeEsteira=' . $r->nomeCliente . '&idEsteira=' . $r->idClientes . '" role="button" style="margin-right: 1%" class="btn btn-success tip-top" title="Concluido"><i class="fas fa-plus"></i></a>';
                }
                if ($this->permission->checkPermission($this->session->userdata('permissao'), 'cBackup')) {
                    if( $r->status == 'Fechado'){
                        $disable2 = 'pointer-events: none';
                    echo '<a href="#modal-excluir" role="button" data-toggle="modal" cliente="' . $r->idClientes . '" style="margin-right: 1%; '.$disable2.'" class="btn btn-danger tip-top" title="Excluir Chamado"><i class="fas fa-trash-alt"></i></a>';
                    }else{
                        echo '<a href="#modal-excluir" role="button" data-toggle="modal" cliente="' . $r->idClientes . '" style="margin-right: 1%" class="btn btn-danger tip-top" title="Excluir Chamado"><i class="fas fa-trash-alt"></i></a>';
                    }

                }
                
                echo '</td>';
                echo '</tr>';
            } ?>

            </tbody>
        </table>
    </div>
</div>



<!-- Modal -->
<div id="modal-excluir" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form action="<?php echo base_url() ?>index.php/chamados/excluir" method="post">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h5 id="myModalLabel">Excluir Cliente</h5>
        </div>
        <div class="modal-body">
            <input type="hidden" id="idCliente" name="id" value="" />
            <h5 style="text-align: center">Deseja realmente excluir este chamado??</h5>
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
            var cliente = $(this).attr('cliente');
            $('#idCliente').val(cliente);
        });
    });
</script>
