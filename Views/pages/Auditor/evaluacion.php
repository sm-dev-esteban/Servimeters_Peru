<?php
require_once  'Controllers/formulario.controller.php';
require_once  'Controllers/Usuario.controller.php';

//Carga de datos
$forms = FormController::index();
$users = UsuarioController::index();
?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0">Gestion de evaluación</h1>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Gestion de evaluación</h3>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
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
                        <?php foreach ($forms as $form) { ?>
                            <?php $email = ''; ?>
                            <?php $nameUser = ''; ?>
                            <?php $estado = ''; ?>
                            <?php foreach ($users as $user) {
                                if (strcmp($form['usuario'], strval($user['id'])) === 0) {
                                    $email = $user['email'];
                                    $nameUser = $user['usuario'];
                                    $estado = $user['estado'];
                                }
                            } ?>

                            <tr>
                                <td>
                                    <?= $form['id'] ?>
                                </td>
                                <td>
                                    <a>
                                        <?= $form['fechaRegistro'] ?>
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
                                <?php $rand = ($estado === 'homologacion') ? 0 : 100; ?>
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
                                    <?= $form['habilitado'] ? '<span class="badge badge-success">Habilitado' : '<span class="badge badge-danger">No habilitado' ?></span>
                                </td>
                                <td class="project-actions text-right">
                                    <a class="btn btn-primary btn-sm m-1" href="?action=insert">
                                        <i class="fas fa-folder">
                                        </i>
                                        Proceso
                                    </a>
                                    <a class="btn btn-info btn-sm m-1 loadForm" data-id="<?= $form['id'] ?>" data-terminos="<?= $form['terminos'] ?>" data-cliente="<?= $nameUser ?>" data-idcliente="<?= $form['usuario'] ?>" href="#">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Evaluar
                                    </a>
                                    <a class="btn btn-danger btn-sm m-1" href="#">
                                        <i class="fas fa-trash">
                                        </i>
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
        $('.loadForm').on('click', function() {

            var dataForm = ['id', 'terminos', 'cliente', 'idcliente'];

            var form = $('<form>', {
                method: 'POST',
                action: 'detalle_form'
            });

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