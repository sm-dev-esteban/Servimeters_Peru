<!-- Loguin -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesion</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= SERVERSIDE ?>Views/resources/plugins/fontawesome-free/css/all.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?= SERVERSIDE ?>Views/resources/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= SERVERSIDE ?>Views/resources/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">

    <div class="card card-outline card-primary">
        <div class="card-header">
            <div class="login-logo p-3">
                <img src="<?= SERVERSIDE ?>/Views/resources/dist/img/sm_logo.webp" class="w-50"></img>
            </div>
        </div>
        <div class="login-box">
            <!-- /.login-logo -->
            <div class="card-body login-card-body">
                <h4 class="text-center text-lg">Homologación de proveedores</h4>
                <p class="login-box-msg">Ingrese a su cuenta</p>
                <!--Formulario Login-->
                <form method="post" id="formLoguin">
                    <!--Input Group usuario-->
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Usuario" name="user" required>
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <i class="fas fa-user"></i>
                            </span>
                        </div>
                    </div>

                    <!--Opción olvido de contraseña-->
                    <!-- Esto todavia no :() -->
                    <!-- <p class="mb-1 text-right">
                    <a href="forgot-password.html"><label class="fs-6">¿Ha olvidado la contraseña?</label></a>
                </p> -->

                    <!--Input Group contraseña-->
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Contraseña" name="password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <!--Input envió formulario-->
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" id="loguin" class="btn btn-primary btn-block">Inicio de Sesión &nbsp;&nbsp;&nbsp; <span class="fas fa-check"></span></button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</body>
<!-- Constantes -->
<script src="<?= SERVERSIDE ?>config.min.js"></script>
<!-- jQuery -->
<script src="<?= SERVERSIDE ?>Views/resources/plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap 4 -->
<script src="<?= SERVERSIDE ?>Views/resources/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- JQuery Validator -->
<script src="<?= SERVERSIDE ?>Views/resources/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?= SERVERSIDE ?>Views/resources/plugins/jquery-validation/additional-methods.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?= SERVERSIDE ?>Views/resources/plugins/sweetalert2/sweetalert2.min.js"></script>

<!-- AdminLTE App -->
<script src="<?= SERVERSIDE ?>Views/resources/dist/js/adminlte.min.js"></script>
<!-- Request -->
<script src="<?= SERVERSIDE ?>Views/assets/js/all.page.js"></script>
<script src="<?= SERVERSIDE ?>Views/assets/js/request.js"></script>
<script src="<?= SERVERSIDE ?>Views/assets/js/loguin.js"></script>

</html>