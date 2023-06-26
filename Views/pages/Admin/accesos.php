<?php
include_once('Controllers/Usuario.controller.php');
$usuarios = UsuarioController::index();

?>
<section class="content">
    <div class="container-fluid">
        <div class="card mt-5">
            <div class="card-header">
                <h3 class="card-title">Listado de Usuarios</h3>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th style="width: 5%" class="text-center">
                                Id
                            </th>
                            <th style="width: 20%">
                                Correo
                            </th>
                            <th style="width: 20%">
                                Usuario
                            </th>
                            <th style="width: 10%" class="text-center">
                                Acceso
                            </th>
                            <th style="width: 30%" class="text-center">
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($usuarios as $usuario) { ?>
                            <tr>
                                <td class="text-center">
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
                                <td class="project-actions text-center">
                                    <a class="btn btn-primary btn-sm m-1" href="#">
                                        <i class="fas fa-folder">
                                        </i>
                                        Ver
                                    </a>
                                    <button class="btn btn-info btn-sm m-1" data-toggle="modal" data-target="#modal-xl" data-user="<?= $usuario['id'] ?>">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Editar
                                    </button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="modal-xl">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edicion de Usuario</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="?action=update">
                <div class="modal-body">
                    <?php include('form/formUser.php') ?>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script>
    $(document).ready(function() {
        $('#modal-xl').on('show.bs.modal', async function(e) {
            var button = $(e.relatedTarget);
            var id = button.data('user');
            var formData = new FormData();
            formData.append('id', id);
            try {
                const result = await requestController('Usuario', 'loadUser', formData);
                if (!result.Result) {
                    return false;
                }
                console.log(result.Result[0]);
                for (const key in result.Result[0]) {
                    var element = document.getElementsByName(key)[0];
                    if (element !== undefined) {
                        if (element.type === 'checkbox') {
                            console.log(key, element.type);
                            element.checked = false;
                        }
                        element.value = result.Result[0][key];
                        // switch (element.tagName) {
                        //     case 'INPUT':
                        //         element.value = result.Result[0][key];
                        //         break;
                        //     case 'SELECT':
                        //         console.log('SELECT -->', element.tagName)
                        //         break;
                        //     default:
                        //         console.log('No existe ', key);
                        //         break;
                        // }
                    }

                }
            } catch (error) {
                console.error(error);
            }
        })
    })
</script>