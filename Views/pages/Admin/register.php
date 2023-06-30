<?php
require_once 'Controllers/Usuario.controller.php';
?>

<div class="container-fluid">
  <div class="row mt-5">
    <div class="col-md-12">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Registro de Usuarios</h3>
        </div>
        <form action="?action=insert" method="post">
          <div class="card-body">

            <?php include_once('form/formUser.php'); ?>

            <!--Botón envio-->
          </div>
          <div class="card-footer">
            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Asegurese de que las contraseñas coincidan.">
              <button type="submit" data-type="create" class="btn btn-primary sendUser">Enviar</button>
            </span>
          </div>
        </form>
      </div>
    </div>
    <?php UsuarioController::saveUser(); ?>
  </div>
</div>
</div>

<script src="<?= SERVERSIDE ?>Views/assets/js/registerUser.js"></script>