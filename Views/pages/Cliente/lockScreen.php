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
            <img src="<?= SERVERSIDE ?>/Views/resources/dist/img/<?php echo $_SESSION['estado'] === 'evaluado' ? 'random_icons_26.svg' : 'random_icons_15.svg'; ?>" alt="User Image" style="width: 100px; height: 100px;">
        </div>
        <br>
        <!-- START LOCK SCREEN ITEM -->
        <div class="lockscreen-item">
            <!-- lockscreen image -->
            <div class="help-block text-center">
                <?php echo $_SESSION['estado'] === 'evaluado' ? 'Su prueba de homologacion ya fue evaluada. <br> Estaremos enviando el certificado de notas a su correo.' : 'Su prueba de Homologación ya fue presentada. Esta siendo evaluada por un auditor.'; ?>
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