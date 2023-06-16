<?php define('_URL', 'index.php?page=') ?>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= SERVERSIDE ?>/Views/resources/index3.html" class="brand-link">
        <img src="<?= SERVERSIDE ?>/Views/resources/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= SERVERSIDE ?>/Views/resources/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Administrador
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= SERVERSIDE ?>/Admin/acceso" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Acceso de usuarios</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= SERVERSIDE ?>/Admin/usuarios" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Listado de usuarios</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= SERVERSIDE ?>/Views/resources/index3.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Liberacion de evaluaciones</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="<?= SERVERSIDE ?>/Cliente/form" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Homologacion de Cliente
                            <!-- <span class="right badge badge-danger">New</span> -->
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= SERVERSIDE ?>/Auditor/evaluacion" class="nav-link">
                        <i class="nav-icon fas fa-marker"></i>
                        <p>
                            Evaluar homologacion
                            <!-- <span class="right badge badge-danger">New</span> -->
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>