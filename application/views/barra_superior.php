    <div id="wrapper">

        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?= base_url(); ?>painel/">DWJ Locações</a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> <?= $user->usu_nome ?></a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Configurações</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?= base_url(); ?>home/logout"><i class="fa fa-sign-out fa-fw"></i> Sair</a>
                        </li>
                    </ul>
                </li>
            </ul>


            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">


                        <!--<li>
                            <a href="<?= base_url(); ?>painel/"><i class="fa fa-dashboard fa-fw"></i> Painel</a>
                        </li>-->
                        <li>
                            <a href="<?= base_url(); ?>painel/locacoes/"><i class="fa fa-dashboard fa-fw"></i> Locações</a>
                        </li>
                        <li>
                            <a href="<?= base_url(); ?>painel/clientes/"><i class="fa fa-dashboard fa-fw"></i> Clientes</a>
                        </li>
                        <li>
                            <a href="<?= base_url(); ?>painel/ferramentas/"><i class="fa fa-dashboard fa-fw"></i> Ferramentas</a>
                        </li>
                        



                
                    </ul>
                </div>
            </div>
        </nav>
        <div class="modal fade bs-example-modal-lg" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" id="conteudo-do-modal">

                </div>
            </div>
        </div>