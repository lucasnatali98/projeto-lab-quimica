<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Navegação</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo base_url('admin') ?>"><?php echo $titulo ?></a>
        </div>
        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="<?php echo base_url('admin/home') ?>"><i class="fa fa-newspaper-o"></i> Home</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('admin/projetos') ?>"><i class="fa fa-book fa-fw"></i> Projetos</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('admin/producoes') ?>"><i class="fa fa-flask fa-fw"></i> Produções</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('admin/eventos') ?>"><i class="fa fa-building fa-fw"></i> Eventos</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('admin/upload_fotos') ?>"><i class="fa fa-upload fa-fw"></i> Upload de Fotos</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('admin/pessoal') ?>"><i class="fa fa-users fa-fw"></i> Pessoal</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('admin/contatos') ?>"><i class="fa fa-phone fa-fw"></i> Contatos</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('admin/usuarios/logout') ?>"><i class="fa fa-sign-out fa-fw"></i> Sair do Sistema</a>
                    </li>
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>
