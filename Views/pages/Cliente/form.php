<?php

include_once('Controllers/Usuario.controller.php');

?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Formulario Test</h1>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-md-center">

            <div class="col-md-10">
                <!-- Horizontal Form -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Formulario de clientes</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form class="form-horizontal" action="?action=create" method="POST">
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="inputUser3" class="col-sm-2 col-form-label">Usuario</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputUser3" placeholder="Username" name="name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="pass">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputRol3" class="col-sm-2 col-form-label">Rol</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputRol3" placeholder="Admin" name="role">
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info">Sign in</button>
                            <button type="submit" class="btn btn-default float-right">Cancel</button>
                        </div>
                        <!-- /.card-footer -->
                    </form>
                    <?php UsuarioController::saveUser(); ?>
                </div>
                <?php if (!isset($result['error']) && isset($result)) { ?>
                    <div class="col-sm-4 col-md-2">
                        <h4 class="text-center bg-olive">Guardado con exito</h4>

                        <div class="color-palette-set">
                            <div class="bg-olive disabled color-palette"><span>El registro se ha guardado: <?php echo json_encode($result); ?></span></div>
                        </div>
                    </div>
                    <!-- /.card -->
                <?php } elseif (isset($result['error'])) { ?>
                    <div class="col-sm-4 col-md-2">
                        <h4 class="text-center">Error!</h4>

                        <div class="color-palette-set">
                            <div class="bg-danger disabled color-palette"><span>No se guardo el registro: <?php echo $error; ?></span></div>
                        </div>
                    </div>
                <?php } ?>
            </div>

        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>