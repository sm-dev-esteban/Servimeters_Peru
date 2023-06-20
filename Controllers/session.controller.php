<?php
require_once 'Base.controller.php';

if (isset($_GET['path'])) {
    $path = $_GET['path'];
    require_once $path . 'config.php';
} else {
    require_once 'config.php';
}
require_once FOLDERSIDE . 'Models/Usuario.model.php';

class SessionController extends BaseController
{
    private static $result;

    public static function loguin()
    {

        if (isset($_POST['user']) && isset($_POST['password'])) {
            session_start();
            self::$result = new stdClass();
            parent::setModel(new UsuarioModel());
            // Obtener el usuario
            $user = parent::getCondition("usuario LIKE '%" . $_POST['user'] . "%'");
            if (sizeof($user) <= 0) {
                self::$result->Error = 'Las credenciales no son validas';
                header('Content-Type: application/json');
                echo json_encode(self::$result);
                exit();
            }

            // Validar contraseña
            $pass = $_POST['password'];
            if (strcmp($pass, $user[0]['password']) !== 0) {
                self::$result->Error = 'La contraseña no es valida';
                echo json_encode(self::$result);
                exit();
            }

            // Es habilitado para entrar?
            if (strcmp('on', $user[0]['habilitado']) !== 0) {
                self::$result->Error = 'No esta habilitado para ingresar';
                echo json_encode(self::$result);
                exit();
            }
            $userLog = $user[0];
            self::sessionIn($userLog);
            self::$result->Success = 'Ingreso con exito';
            echo json_encode(self::$result);
            exit();
        }
    }

    public static function sessionIn($object)
    {
        foreach ($object as $key => $val) {
            $_SESSION[$key] = $val;
        }
    }

    public static function sessionOff()
    {
        self::$result = new stdClass();
        session_start();
        session_destroy();
        echo json_encode(self::$result->Success = 'Hasta Pronto');
    }
}


if (isset($_GET['method'])) {
    $method = $_GET['method'];
    SessionController::$method();
    exit();
}
