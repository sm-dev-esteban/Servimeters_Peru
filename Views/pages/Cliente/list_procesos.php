<?php
require_once('Controllers/proceso.controller.php');
require_once('Controllers/Usuario.controller.php');
$process = ProcessController::getProcessAsign();
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Mis Procesos de Homologación</h1>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <?php if (empty($process)) { ?>
                <div class="col-12">
                    <div class="callout callout-danger">
                        <h5>No hay datos para mostrar</h5>

                        <p>La pagina no tiene información para mostrarle.</p>
                    </div>
                </div>
            <?php } else { ?>
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Procesos asignados</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-striped projects table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Fecha de Creación</th>
                                        <th>Estado</th>
                                        <th>Auditor</th>
                                        <th>Iniciar Proceso</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($process as $p) { ?>
                                        <tr>
                                            <td><?= $p['id'] ?></td>
                                            <td><?= $p['fechaRegistro'] ?></td>
                                            <td><?= ESTADOS[$p['estado']] ?></td>
                                            <td><?php if ($p['auditor'] === 'null') { ?>
                                                    <span class="text-warning">Pendiente</span>
                                                <?php } else { ?>
                                                    <ul class="list-inline">
                                                        <?php $randAvatar = rand(1, 5) ?>
                                                        <li class="list-inline-item">
                                                            <img alt="Avatar" class="table-avatar" src="<?= SERVERSIDE ?>Views/resources/dist/img/avatar<?= $randAvatar ?>.png">
                                                            <a>&nbsp; <?= UsuarioController::getInfo($p['auditor'], 'usuario') ?></a>
                                                        </li>
                                                    </ul>

                                                <?php } ?>
                                            </td>
                                            <td><?php if ($p['estado'] === 'asignado') { ?>
                                                    <span class="btn btn-warning init-evaluation" data-process="<?= $p['id'] ?>" data-status="<?= $p['estado'] ?>"> <i class="fas fa-bolt">
                                                        </i> &nbsp; Iniciar Homologación</span>
                                                <?php } else if ($p['estado'] === 'revision' || $p['estado'] === 'evaluado') { ?>
                                                    <span class="btn btn-warning init-evaluation" data-process="<?= $p['id'] ?>" data-status="<?= $p['estado'] ?>"> <i class="fas fa-eye">
                                                        </i> &nbsp; Ver Proceso</span>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Fecha de Creación</th>
                                        <th>Estado</th>
                                        <th>Auditor</th>
                                        <th>Iniciar Proceso</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            <?php } ?>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->

<script>
    $(document).ready(function() {
        $("#example1").DataTable({
            "paging": false,
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        $('.init-evaluation').on('click', function() {

            var form = $('<form>', {
                method: 'POST',
                action: 'form'
            });

            var dataForm = ['process', 'status'];

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
        });
    });
</script>