<?php
require_once  'Controllers/proceso.controller.php';
require_once  'Controllers/Usuario.controller.php';

//Carga de datos
$process = ProcessController::getProcessAsign();
$users = UsuarioController::index();
?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0">Gestión de evaluación</h1>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <?php if (empty($process)) { ?>
            <div class="col-12">
                <div class="callout callout-danger">
                    <h5>No hay datos para mostrar</h5>

                    <p>La pagina no tiene información para mostrarle.</p>
                </div>
            </div>
        <?php } else { ?>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Gestión de evaluación</h3>
                </div>
                <div class="card-body p-0">
                    <table id="evaluacion" class="table table-striped projects">
                        <thead>
                            <tr>
                                <th style="width: 1%">
                                    #
                                </th>
                                <th style="width: 20%">
                                    Fecha de registro
                                </th>
                                <th style="width: 30%">
                                    Usuario
                                </th>
                                <th>
                                    Progreso de Formulario
                                </th>
                                <th style="width: 8%" class="text-center">
                                    Estado
                                </th>
                                <th style="width: 20%">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($process as $proces) { ?>
                                <?php $email = ''; ?>
                                <?php $nameUser = ''; ?>
                                <?php $estado = ''; ?>
                                <?php foreach ($users as $user) {
                                    if (strcmp($proces['usuario'], strval($user['id'])) === 0) {
                                        $email = $user['email'];
                                        $nameUser = $user['usuario'];
                                    }
                                } ?>

                                <tr>
                                    <td>
                                        <?= $proces['id'] ?>
                                    </td>
                                    <td>
                                        <a>
                                            <?= $proces['fechaRegistro'] ?>
                                        </a>
                                        <br />
                                        <small>
                                            <?= $email ?>
                                        </small>
                                    </td>
                                    <td>
                                        <ul class="list-inline">
                                            <?php $randAvatar = rand(1, 5) ?>
                                            <li class="list-inline-item">
                                                <img alt="Avatar" class="table-avatar" src="<?= SERVERSIDE ?>Views/resources/dist/img/avatar<?= $randAvatar ?>.png">
                                                <a><?= $nameUser ?></a>
                                            </li>
                                        </ul>
                                    </td>
                                    <?php $rand = ($proces['estado'] === 'asignado') ? 0 : 100; ?>
                                    <td class="project_progress">
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-green" role="progressbar" aria-valuenow="<?= $rand ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?= $rand ?>%">
                                            </div>
                                        </div>
                                        <small>
                                            <?= $rand ?>% Completado
                                        </small>
                                    </td>
                                    <td class="project-state">
                                        <?= ESTADOS[$proces['estado']] ?></span>
                                    </td>
                                    <td class="project-actions text-right">
                                        <!-- <a class="btn btn-primary btn-sm m-1" href="#">
                                            <i class="fas fa-folder">
                                            </i>
                                            X
                                        </a> -->
                                        <?php if ($proces['estado'] === 'revision') { ?>
                                            <a class="btn btn-info btn-sm m-1 loadForm" data-id="<?= $proces['id'] ?>" data-cliente="<?= $nameUser ?>" data-idcliente="<?= $proces['usuario'] ?>" href="#">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Evaluar
                                            </a>
                                        <?php } ?>
                                        <!-- <a class="btn btn-danger btn-sm m-1" href="#">
                                            <i class="fas fa-trash">
                                            </i>
                                            Y
                                        </a> -->
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php } ?>
    </div>
</section>

<script>
    $(document).ready(function() {
        $("#evaluacion").DataTable({
            "paging": false,
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#evaluacion_wrapper .col-md-6:eq(0)');

        $('.loadForm').on('click', function() {

            var dataForm = ['id', 'cliente', 'idcliente'];

            var form = $('<form>', {
                method: 'POST',
                action: 'detalle_form'
            });

            // Recorremos los valores a enviar
            dataForm.forEach((e) => {
                var value = $(this).data(e);

                $('<input>').attr({
                    type: 'hidden',
                    name: e,
                    value: value
                }).appendTo(form);
            });

            form.appendTo('body').submit();
        })
    })
</script>