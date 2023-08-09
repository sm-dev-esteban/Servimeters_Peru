<!-- Main Sidebar Container -->
<?php
$menu =  json_decode(ControladorTemplate::menu());
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= SERVERSIDE ?>Views/resources/index3.html" class="brand-link">
        <img src="<?= SERVERSIDE ?>Views/resources/dist/img/servimeters.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Homologación</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <?php if (isset($_SESSION['rol']) && strcmp($_SESSION['rol'], 'Admin') === 0) { ?>
                <div class="image">
                    <img src="<?= SERVERSIDE ?>Views/resources/dist/img/avatar4.png" class="img-circle elevation-2" alt="User Image">
                </div>
            <?php } ?>
            <div class="info">
                <a href="#" class="d-block"><?php echo $_SESSION['usuario'] ?></a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <!-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <?php
                foreach ($menu as $m) {
                ?>
                    <li class="nav-item" <?php if (!empty($m[3])) echo 'hidden'?>>
                        <a href="<?= SERVERSIDE, $m[0] ?>" class="nav-link">
                            <i class="nav-icon fas <?= $m[1] ?>"></i>
                            <p>
                                <?= $m[2] ?>
                                <!-- <span class="right badge badge-danger">New</span> -->
                            </p>
                        </a>
                    </li>
                <?php
                }
                ?>

                <li class="nav-item">
                    <a href="" class="nav-link" id="logout">
                        <i class="fas fa-arrow-left text-danger"></i>
                        &nbsp;&nbsp;&nbsp;
                        <p class="text-danger">
                            Cerrar Sesión
                        </p>
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a href="<?= SERVERSIDE ?>test/form" class="nav-link">
                        <i class="nav-icon fa fa-question"></i>
                        <p>Prueba de formulario</p>
                    </a>
                </li> -->
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>