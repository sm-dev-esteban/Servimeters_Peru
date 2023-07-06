    <?php
    require_once('Controllers/proceso.controller.php');
    require_once('Controllers/Usuario.controller.php');
    $process = ProcessController::index();
    $auditores = UsuarioController::getAuditores();
    ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Gestión de Procesos</h1>
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
                                <h3 class="card-title">Procesos creados</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Fecha de Creación</th>
                                            <th>Usuario</th>
                                            <th>Estado</th>
                                            <th>Auditor</th>
                                            <th>Cancelar/Asignar Proceso</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($process as $p) { ?>
                                            <tr>
                                                <td><?= $p['id'] ?></td>
                                                <td><?= $p['fechaRegistro'] ?></td>
                                                <td><?= UsuarioController::getInfo($p['usuario'], "usuario") ?></td>
                                                <td><?= ESTADOS[$p['estado']] ?></td>
                                                <td>
                                                    <select size="1" id="row-1-office" name="row-1-office" class="custom-select form-control-border select" data-id="<?= $p['id'] ?>" <?php if ($p['estado'] === 'evaluado') {
                                                                                                                                                                                            echo 'disabled';
                                                                                                                                                                                        } ?>>
                                                        <option value="null">
                                                            -- Seleccione una opción --
                                                        </option>
                                                        <?php foreach ($auditores as $a) { ?>(
                                                        <option value="<?= $a['id'] ?>" <?php if ($p['auditor'] === strval($a['id'])) {
                                                                                            echo 'selected="selected"';
                                                                                        } ?>>
                                                            <?= $a['usuario'] ?>
                                                        </option>
                                                    <?php } ?>
                                                    </select>
                                                </td>
                                                <td>
                                                    <?php if ($p['estado'] === 'cancelado') { ?>
                                                        <span class="btn btn-success update-status" data-id="<?= $p['id'] ?>" data-estado="asignado"><i class="fas fa-handshake">
                                                            </i> &nbsp; Asignar Proceso</span>
                                                    <?php } else if ($p['estado'] === 'asignado') { ?>
                                                        <span class="btn btn-danger update-status" data-id="<?= $p['id'] ?>" data-estado="cancelado"><i class="fas fa-handshake-slash">
                                                            </i> &nbsp; Cancelar Proceso</span>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Fecha de Creación</th>
                                            <th>Usuario</th>
                                            <th>Estado</th>
                                            <th>Auditor</th>
                                            <th>Cancelar/Asignar Proceso</th>
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

    <script src="<?= SERVERSIDE ?>Views/assets/js/process.js"></script>