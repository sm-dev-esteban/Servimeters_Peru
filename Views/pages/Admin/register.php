  <?php
  require_once 'Controllers/Usuario.controller.php';
  ?>

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Registro de Usuarios</h3>
          </div>
          <form action="?action=insert" method="post">
            <div class="card-body">

              <!--Campo correo-->
              <div class="form-group">
                <label for="exampleInputEmail1">Correo</label>
                <input type="email" class="form-control" name="email" inputmode="email" autocomplete="email" placeholder="" value="" required />
              </div>

              <!--Campo usuario-->
              <div class="form-group">
                <label for="exampleInputPassword1">Usuario</label>
                <input type="text" class="form-control" name="usuario" inputmode="text" autocomplete="username" placeholder="" value="" required />
              </div>

              <!--Campo contraseña-->
              <div class="form-group">
                <label for="exampleInputPassword1">Contraseña</label>
                <input type="password" class="form-control" name="password" inputmode="text" autocomplete="new-password" placeholder="" required />
              </div>

              <!--Confirmar contraseña-->
              <div class="form-group">
                <label for="exampleInputPassword1">Confirmar Contraseña</label>
                <input type="password" class="form-control" inputmode="text" autocomplete="new-password" placeholder="" required />
              </div>

              <!--Rol-->
              <div class="form-group">
                <label>Rol</label>
                <select class="form-control select2" name="rol" style="width: 100%;">
                  <option selected="selected">Admin</option>
                  <option>Auditor</option>
                  <option>Cliente</option>
                </select>
              </div>

              <!-- switch -->
              <div class="form-group">
                <label>Habilitar acceso</label>
                <input type="checkbox" name="habilitado" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
              </div>

              <!-- Estado inicial -->
              <div class="form-group">
                <input type="text" class="form-control" name="estado" inputmode="text" value="homologacion" hidden />
              </div>

              <!--Botón envio-->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Enviar</button>
              </div>
            </div>
        </div>
      </div>
      </form>
      <?php UsuarioController::saveUser(); ?>
    </div>
  </div>
  </div>