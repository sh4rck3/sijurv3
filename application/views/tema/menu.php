<!--sidebar-menu-->
<nav id="sidebar">
    <div id="newlog">
        <div class="icon2">
            <img src="<?php echo base_url() ?>assets/img/logo-two.png">
        </div>
        <div class="title1">
            <h1>SIJUR</h1>
        </div>
    </div>
    <a href="#" class="visible-phone">
        <div class="mode">
            <div class="moon-menu">
                <i class='bx bx-menu iconX open-2'></i>
                <i class='bx bx-x iconX close-2'></i>
            </div>
        </div>
    </a>
    <!-- Start Pesquisar-->
    <li class="search-box">
        <form style="display: flex" action="<?= site_url('mapos/pesquisar') ?>">
            <button style="background: transparent;border: transparent" type="submit" class="tip-bottom" title="Pesquisar">
                <i class='bx bx-search iconX'></i></button>
            <input type="search" name="termo" placeholder="Pesquise aqui...">
        </form>
    </li>
    <!-- End Pesquisar-->

    <div class="menu-bar">
        <div class="menu">

            <ul class="menu-links" style="position: relative;">
                <li class="<?php if (isset($menuPainel)) {
                                echo 'active';
                            }; ?>">
                    <a href="<?= base_url() ?>"><i class='bx bx-home-alt iconX'></i>
                        <span class="title nav-title">Início</span></a>
                </li>
                
                <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vChamados')) { ?>
                    <li class="<?php if (isset($menuTi)) {
                                    echo 'active';
                                }; ?>">
                        <a href="<?= site_url('chamados') ?>"><i class='bx bx-package iconX'></i>
                            <span class="title">Chamados</span></a>
                    </li>
                <?php } ?>

                <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vCliente')) { ?>
                    <li class="<?php if (isset($menuClientes)) {
                                    echo 'active';
                                }; ?>">
                        <a href="<?= site_url('clientes') ?>"><i class='bx bx-group iconX'></i>
                            <span class="title">Cliente / Fornecedor</span></a>
                    </li>
                <?php } ?>
                <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vBradesco')) { ?>
                    <li class="<?php if (isset($menuBradesco)) {
                                    echo 'active';
                                }; ?>">
                        <a href="<?= site_url('bradesco') ?>"><i class='bx bx-package iconX'></i>
                            <span class="title">Bradesco Planilha</span></a>
                    </li>
                <?php } ?>
                <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vDp')) { ?>
                <li class="<?php if (isset($menuDp)) {
                                    echo 'active';
                                }; ?> dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" class="tip-bottom"><i class='bx bx-printer iconX'></i><span class="title">Remessas</span></a>
                    <ul class="dropdown-menu">
                      <li class=""><a  href="<?= site_url('dp'); ?>"><span class="text">Remessa CDL</span></a></li>
                      <li class=""><a  href="<?= site_url('dp/bradesco'); ?>"><span class="text">Remessa Bradesco</span></a></li>
                      <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vRh')) { ?>
                      <hr>
                        <li class=""><a href="<?= site_url('rh'); ?>"><i class='bx bx-log-out-circle'></i> <span class="text">Recursos Humanos</span></a></li>
                      <?php } ?>
                    </ul>
                  </li>
               <?php } ?>
               <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vTv')) { ?>
                <li class="<?php if (isset($menuTvinsert)) {
                                    echo 'active';
                                }; ?> dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" class="tip-bottom"><i class='bx bx-downvote iconX'></i><span class="title">Controle TV's</span></a>
                    <ul class="dropdown-menu">
                      <li class=""><a  href="<?= site_url('tvinsert'); ?>"><span class="text">Informação TV</span></a></li>
                      <li class=""><a  href="<?= site_url('tvinsert/imagemSafra'); ?>"><span class="text">IMG Safra</span></a></li>
                      
                    </ul>
                  </li>
               <?php } ?>
               <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vRetomadas')) { ?>
                    <li class="<?php if (isset($menuRetomadas)) {
                                    echo 'active';
                                }; ?>">
                        <a href="<?= site_url('retomadas') ?>"><i class='bx bx-envelope iconX'></i>
                            <span class="title">Retomadas</span></a>
                    </li>
                <?php } ?>
                <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vProduto')) { ?>
                    <li class="<?php if (isset($menuProdutos)) {
                                    echo 'active';
                                }; ?>">
                        <a href="<?= site_url('produtos') ?>"><i class='bx bx-package iconX'></i>
                            <span class="title">Produtos</span></a>
                    </li>
                <?php } ?>

                <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vServico')) { ?>
                    <li class="<?php if (isset($menuServicos)) {
                                    echo 'active';
                                }; ?>">
                        <a href="<?= site_url('servicos') ?>"><i class='bx bx-stopwatch iconX'></i>
                            <span class="title">Serviços</span></a>
                    </li>
                <?php } ?>

                <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vOs')) { ?>
                    <li class="<?php if (isset($menuOs)) {
                                    echo 'active';
                                }; ?>">
                        <a href="<?= site_url('os') ?>"><i class='bx bx-spreadsheet iconX'></i>
                            <span class="title">Agendamento</span></a>
                    </li>
                <?php } ?>

                <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vGarantia')) { ?>
                    <li class="<?php if (isset($menuGarantia)) {
                                    echo 'active';
                                }; ?>">
                        <a href="<?= site_url('garantias') ?>"><i class='bx bx-receipt iconX'></i>
                            <span class="title">Termos de Garantias</span></a>
                    </li>
                <?php } ?>

                <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vVenda')) { ?>
                    <li class="<?php if (isset($menuVendas)) {
                                    echo 'active';
                                }; ?>">
                        <a href="<?= site_url('vendas') ?>"><i class='bx bx-cart-alt iconX'></i></span>
                            <span class="title">Vendas</span></a>
                    </li>
                <?php } ?>

                <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vArquivo')) { ?>
                    <li class="<?php if (isset($menuArquivos)) {
                                    echo 'active';
                                }; ?>">
                        <a href="<?= site_url('arquivos') ?>"><i class='bx bx-box iconX'></i>
                            <span class="title">Arquivos</span></a>
                    </li>
                <?php } ?>

                <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vLancamento')) { ?>
                    <li class="<?php if (isset($menuLancamentos)) {
                                    echo 'active';
                                }; ?>">
                        <a href="<?= site_url('financeiro/lancamentos') ?>"><i class="bx bx-bar-chart-square iconX"></i>
                            <span class="title">Lançamentos</span></a>
                    </li>
                <?php } ?>
                <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'vCobranca')) { ?>
                <li class="<?php if (isset($menuCobrancas)) {
                                echo 'active';
                            }; ?>">
                    <a href="<?= site_url('cobrancas/cobrancas') ?>"><i class='bx bx-credit-card-front iconX'></i>
                        <span class="title">Cobranças</span></a>
                </li>
                <?php } ?>
            </ul>
        </div>

        <div class="botton-content">
            <li class="">
                <a href="<?= site_url('login/sair'); ?>">
                    <i class='bx bx-log-out-circle iconX'></i>
                    <span class="title">Sair</span></a>
            </li>
        </div>
    </div>
</nav>
<!--End sidebar-menu-->
