

<div class="span12" style="margin-left: 0">
    <form method="get" action="<?php echo base_url(); ?>index.php/usuarios/pesquisar">
        <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'aOs')) { ?>
            <div class="span3">
                <a href="<?php echo base_url() ?>index.php/usuarios/adicionar" class="btn btn-success"><i class="fas fa-user-plus"></i> Adicionar Usuário</a>
            </div>
        <?php
        } ?>

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
        <h5>Usuários</h5>

    </div>
    <div class="widget-content nopadding tab-content">
        <table id="tabela1" class="table table-bordered ">
            <thead>
                <tr style="backgroud-color: #2D335B">
                    <th>#</th>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Telefone</th>
                    <th>Nível</th>
                    <th>Validade</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if (!$results) {
                        echo '<tr>
                                <td colspan="5">Nenhum Usuário Cadastrado</td>
                            </tr>';
                    }
                    foreach ($results as $r) {
                        echo '<tr>';
                        echo '<td>' . $r->idUsuarios . '</td>';
                        echo '<td>' . $r->nome . '</td>';
                        echo '<td>' . $r->cpf . '</td>';
                        echo '<td>' . $r->telefone . '</td>';
                        echo '<td>' . $r->permissao . '</td>';
                        echo '<td>' . $r->dataExpiracao . '</td>';
                        echo '<td>
                                <a href="' . base_url() . 'index.php/usuarios/editar/' . $r->idUsuarios . '" class="btn btn-info tip-top" title="Editar Usuário"><i class="fas fa-edit"></i></a>
                                </td>';
                        echo '</tr>';
                    } ?>
            </tbody>
        </table>
    </div>
</div>

<?php //echo $this->pagination->create_links(); ?>
