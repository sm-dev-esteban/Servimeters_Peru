<div class="hold-transition lockscreen">
    <!-- Automatic element centering -->
    <div class="lockscreen-wrapper">
        <div class="lockscreen-logo">
            <b>Apreciado usuario:</b>
        </div>
        <!-- User name -->
        <div class="lockscreen-name"> <?= ucfirst($_SESSION['usuario']);  ?></div>
        <br>

        <div class="text-center">
            <img src="<?= SERVERSIDE ?>/Views/resources/dist/img/random_icons_15.svg" alt="User Image" style="width: 100px; height: 100px;">
        </div>
        <br>
        <!-- START LOCK SCREEN ITEM -->
        <div class="lockscreen-item">
            <!-- lockscreen image -->
            <div class="help-block text-center">
                Su prueba de Homologación ya fue presentada.
            </div>
            <!-- /.lockscreen-item -->
        </div>

        <div class="text-center">
            <a href="<?= SERVERSIDE ?>">Trabajamos en la continuidad del proceso.</a>
        </div>
        <div class="lockscreen-footer text-center">
            Estaremos notificando avances.
        </div>
    </div>
    <!-- /.center -->
</div>