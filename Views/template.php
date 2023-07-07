<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Servimeters Peru</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= SERVERSIDE ?>Views/resources/plugins/fontawesome-free/css/all.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="<?= SERVERSIDE ?>Views/resources/plugins/daterangepicker/daterangepicker.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="<?= SERVERSIDE ?>Views/resources/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="<?= SERVERSIDE ?>Views/resources/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="<?= SERVERSIDE ?>Views/resources/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?= SERVERSIDE ?>Views/resources/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?= SERVERSIDE ?>Views/resources/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="<?= SERVERSIDE ?>Views/resources/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
    <!-- BS Stepper -->
    <link rel="stylesheet" href="<?= SERVERSIDE ?>Views/resources/plugins/bs-stepper/css/bs-stepper.min.css">
    <!-- dropzonejs -->
    <link rel="stylesheet" href="<?= SERVERSIDE ?>Views/resources/plugins/dropzone/min/dropzone.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?= SERVERSIDE ?>Views/resources/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= SERVERSIDE ?>Views/resources/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= SERVERSIDE ?>Views/resources/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= SERVERSIDE ?>Views/resources/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= SERVERSIDE ?>Views/resources/dist/css/adminlte.min.css">

    <!-- Estilo global -->
    <style>
        .error {
            color: tomato;
        }

        .mandatory::after {
            content: '*';
            color: tomato;
        }

        button {
            cursor: pointer;
        }

        input[type="checkbox"]:disabled:checked::after {
            /* Estilos para el checkbox deshabilitado y marcado */
            content: 'x';
            display: block;
            position: absolute;
            top: auto;
            left: auto;
            width: 15px;
            height: 15px;
            background-color: tomato;
            color: white;
            text-align: center;
            line-height: 12px;
        }
    </style>

    <!-- jQuery -->
    <script src="<?= SERVERSIDE ?>Views/resources/plugins/jquery/jquery.min.js"></script>

</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <?php include('modules/header.php'); ?>

        <?php include('modules/menu.php'); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <?php
            if (isset($_GET['page']))
                ControladorTemplate::router($_GET['page']);
            else
                ControladorTemplate::router();
            ?>
        </div>
        <!-- /.content-wrapper -->

        <?php include('modules/footer.php'); ?>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery UI 1.11.4 -->
    <script src="<?= SERVERSIDE ?>Views/resources/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);

        // QUITAR ESTO
        $(document).ready(function() {
            $('input').removeAttr('required');
        });
    </script>
    <!-- Constantes -->
    <script src="<?= SERVERSIDE ?>config.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= SERVERSIDE ?>Views/resources/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- jquery-validation -->
    <script src="<?= SERVERSIDE ?>Views/resources/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="<?= SERVERSIDE ?>Views/resources/plugins/jquery-validation/additional-methods.min.js"></script>
    <!-- Select2 -->
    <script src="<?= SERVERSIDE ?>Views/resources/plugins/select2/js/select2.full.min.js"></script>
    <!-- Bootstrap4 Duallistbox -->
    <script src="<?= SERVERSIDE ?>Views/resources/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
    <!-- InputMask -->
    <script src="<?= SERVERSIDE ?>Views/resources/plugins/moment/moment.min.js"></script>
    <script src="<?= SERVERSIDE ?>Views/resources/plugins/inputmask/jquery.inputmask.min.js"></script>
    <!-- date-range-picker -->
    <script src="<?= SERVERSIDE ?>Views/resources/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap color picker -->
    <script src="<?= SERVERSIDE ?>Views/resources/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?= SERVERSIDE ?>Views/resources/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Bootstrap Switch -->
    <script src="<?= SERVERSIDE ?>Views/resources/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
    <!-- BS-Stepper -->
    <script src="<?= SERVERSIDE ?>Views/resources/plugins/bs-stepper/js/bs-stepper.min.js"></script>
    <!-- dropzonejs -->
    <script src="<?= SERVERSIDE ?>Views/resources/plugins/dropzone/min/dropzone.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="<?= SERVERSIDE ?>Views/resources/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- bs-custom-file-input -->
    <script src="<?= SERVERSIDE ?>Views/resources/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="<?= SERVERSIDE ?>Views/resources/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= SERVERSIDE ?>Views/resources/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= SERVERSIDE ?>Views/resources/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= SERVERSIDE ?>Views/resources/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?= SERVERSIDE ?>Views/resources/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= SERVERSIDE ?>Views/resources/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?= SERVERSIDE ?>Views/resources/plugins/jszip/jszip.min.js"></script>
    <script src="<?= SERVERSIDE ?>Views/resources/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="<?= SERVERSIDE ?>Views/resources/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="<?= SERVERSIDE ?>Views/resources/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="<?= SERVERSIDE ?>Views/resources/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="<?= SERVERSIDE ?>Views/resources/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= SERVERSIDE ?>Views/resources/dist/js/adminlte.min.js"></script>
    <!-- All page -->
    <script src="<?= SERVERSIDE ?>Views\assets\js\all.page.js"></script>
    <!-- AdminLTE for demo purposes -->
    <!-- <script src="<?= SERVERSIDE ?>Views/resources/dist/js/demo.js"></script> -->
    <!-- prueba -->
    <script src="<?= SERVERSIDE ?>Views/assets/js/request.js"></script>
    <!-- Loguin/Logout -->
    <script src="<?= SERVERSIDE ?>Views\assets\js\loguin.js"></script>
    <script>
        $("input[data-bootstrap-switch]").each(function() {
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        })

        $(function() {
            bsCustomFileInput.init();
        });
    </script>
    <!-- <script src="<?= SERVERSIDE ?>/Views/resources/dist/js/demo.js"></script> -->
    <!--Master.js-->
    <script src="<?= SERVERSIDE ?>/Views/resources/dist/js/master/master.js"></script>
    <!--Envio de información del formulario cliente-->
    <!-- <script src="<?= SERVERSIDE ?>Views/assets/js/customerForm.js"></script> -->
    <!-- Validacion de formularios -->
    <script src="<?= SERVERSIDE ?>Views/assets/js/validateForms.js"></script>

</body>

</html>