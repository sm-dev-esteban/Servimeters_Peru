<?php
require_once 'Controllers/admin.controller.php';
$usuarios = AdminController::getAll('usuarios');

?>
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Listado de Usuarios</h3>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th style="width: 3%">
                                Id
                            </th>
                            <th style="width: 20%">
                                Correo
                            </th>
                            <th style="width: 20%">
                                Usuario
                            </th>
                            <th style="width: 10%" class="text-center">
                                Habilitado
                            </th>
                            <th style="width: 30%" class="text-center">
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($usuarios as $usuario) { ?>
                            <tr>
                                <td>
                                    <?= $usuario['id'] ?>
                                </td>
                                <td>
                                    <a>
                                        <?= $usuario['email'] ?>
                                    </a>
                                    <br />
                                    <small>
                                        <?= $usuario['fechaRegistro'] ?>
                                    </small>
                                </td>
                                <td>
                                    <?= $usuario['usuario'] ?>
                                </td>
                                <td class="project-state">
                                    <?php if ($usuario['habilitado'] === 'on') { ?>
                                        <span class="badge badge-success">Habilitado</span>
                                    <?php } else { ?>
                                        <span class="badge badge-danger">No Habilitado</span>
                                    <?php } ?>
                                </td>
                                <td class="project-actions text-right">
                                    <a class="btn btn-primary btn-sm m-1" href="#">
                                        <i class="fas fa-folder">
                                        </i>
                                        View
                                    </a>
                                    <a class="btn btn-info btn-sm m-1" href="#">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
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