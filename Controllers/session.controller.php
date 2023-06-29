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

    /**
     * @return [type]
     */
    public static function loguin()
    {

        if (isset($_POST['user']) && isset($_POST['password'])) {

            self::$result = new stdClass();
            if (empty($_POST['user']) || empty($_POST['password'])) {
                self::$result->Error = 'Las credenciales no son validas';
                header('Content-Type: application/json');
                echo json_encode(self::$result);
                exit();
            }

            session_start();
            parent::setModel(new UsuarioModel());
            // Obtener el usuario
            $user = parent::getCondition("usuario LIKE '%" . $_POST['user'] . "%'");
            if (empty($user)) {
                self::$result->Error = 'Las credenciales no son validas';
                header('Content-Type: application/json');
                echo json_encode(self::$result);
                exit();
            }

            // Validar contraseña
            $pass = $_POST['password'];
            if (!UsuarioModel::verifyPass($pass, $user[0]['password'])) {
                self::$result->Error = 'Las credenciales no son validas';
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
            $userLog['password'] = '';
            $user[0]['password'] = $pass;
            self::$result->User = json_encode($userLog);
            self::sessionIn($user[0]);
            self::$result->Success = 'Ingreso con exito';
            echo json_encode(self::$result);
            exit();
        }
    }

    /**
     * @param mixed $object
     * 
     * @return [type]
     */
    public static function sessionIn($object)
    {
        foreach ($object as $key => $val) {
            $_SESSION[$key] = $val;
        }
    }

    /**
     * @return [type]
     */
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
