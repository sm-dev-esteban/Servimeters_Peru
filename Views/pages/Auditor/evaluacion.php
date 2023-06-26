<?php
require_once  'Controllers/proceso.controller.php';
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
                                Project Name
                            </th>
                            <th style="width: 30%">
                                Team Members
                            </th>
                            <th>
                                Project Progress
                            </th>
                            <th style="width: 8%" class="text-center">
                                Status
                            </th>
                            <th style="width: 20%">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for ($i = 0; $i <= rand(5, 10); $i++) : ?>
                            <tr>
                                <td>
                                    #
                                </td>
                                <td>
                                    <a>
                                        AdminLTE v3
                                    </a>
                                    <br />
                                    <small>
                                        Created 01.01.2019
                                    </small>
                                </td>
                                <td>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <img alt="Avatar" class="table-avatar" src="<?= SERVERSIDE ?>Views/resources/dist/img/avatar.png">
                                        </li>
                                        <li class="list-inline-item">
                                            <img alt="Avatar" class="table-avatar" src="<?= SERVERSIDE ?>Views/resources/dist/img/avatar2.png">
                                        </li>
                                        <li class="list-inline-item">
                                            <img alt="Avatar" class="table-avatar" src="<?= SERVERSIDE ?>Views/resources/dist/img/avatar3.png">
                                        </li>
                                        <li class="list-inline-item">
                                            <img alt="Avatar" class="table-avatar" src="<?= SERVERSIDE ?>Views/resources/dist/img/avatar4.png">
                                        </li>
                                    </ul>
                                </td>
                                <?php $rand = rand(0, 100) ?>
                                <td class="project_progress">
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="<?= $rand ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?= $rand ?>%">
                                        </div>
                                    </div>
                                    <small>
                                        <?= $rand ?>% Complete
                                    </small>
                                </td>
                                <td class="project-state">
                                    <span class="badge badge-success">Success</span>
                                </td>
                                <td class="project-actions text-right">
                                    <a class="btn btn-primary btn-sm m-1" href="?action=insert">
                                        <i class="fas fa-folder">
                                        </i>
                                        Proceso
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
                        <?php endfor ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php ProcessController::sendRegisterProcess(); ?>
    </div>
</section>