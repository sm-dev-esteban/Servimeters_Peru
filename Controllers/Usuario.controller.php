<?php
require_once 'Base.controller.php';
require_once FOLDERSIDE . 'Models/Email.model.php';

if (isset($_GET['path'])) {
    $path = $_GET['path'];
    require_once $path . 'config.php';
} else {
    require_once 'config.php';
}
require_once FOLDERSIDE . 'Models/Usuario.model.php';

class UsuarioController extends BaseController
{
    private static $result;

    /**
     * @return array
     */
    /**
     * @return [type]
     */
    public static function index()
    {
        parent::setModel(new UsuarioModel());
        return parent::getAll();
    }

    /**
     * @return string
     */
    static public function saveUser()
    {

        if (isset($_GET['action']) && strcmp($_GET['action'], 'insert') == 0) {
            parent::setModel(new UsuarioModel($_POST));
            parent::insert();

            // Código para enviar el correo electrónico utilizando la clase Email
            $email = new Email();
            $to =  $_POST['email'];
            $cc = 'duvan.sanabriam@gmail.com';
            $subject = 'Nuevo usuario registrado';

            // Crear el cuerpo del correo con las credenciales del cliente
            $username = $_POST['usuario'];
            $password = $_POST['password'];
            $body = "<html>
            <body>
                <div class='card'>
                    <div class='card-body'>
                        <h3 class='card-title'>¡Bienvenido al software de homologación de servimeters!</h3>
                        <p class='card-text'>Usuario: <strong>$username</strong></p>
                        <p class='card-text'>Contraseña: <strong>$password</strong></p>
                        <p class='card-text'><a href='http://peru-test.servimeters.net:86/'>Enlace de ingreso al sistema</a></p>
                    </div>
                </div>
            </html>";
            $result = $email->sendEmail($to, $cc, $subject, $body);

            if ($result['status']) {
                echo 'Correo electrónico enviado correctamente.';
            } else {
                echo 'Error en el envío del correo: ' . $result['error'];
            }
        }
    }
    
    /**
     * @return string
     */
    static public function updateUser()
    {
        if (isset($_GET['action']) && strcmp($_GET['action'], 'update') == 0) {
            self::$result = new stdClass();
            parent::setModel(new UsuarioModel($_POST));
            $result = parent::update();
            self::$result->Result = $result["status"];
            echo "<script>
                window.location.href = '" . SERVERSIDE . "Admin/accesos';
            </script>";
        }
    }

    static public function loadUser()
    {
        if (isset($_POST['id'])) {
            self::$result = new stdClass();
            parent::setModel(new UsuarioModel(array_merge($_POST)));
            self::$result->Result = parent::get();
            header('Content-Type: application/json');
            echo json_encode(self::$result);
        }
    }

    static public function getAuditores()
    {
        parent::setModel(new UsuarioModel());
        return parent::getCondition("rol = 'Auditor'", "id, usuario");
    }

    static public function getInfo($id, $field)
    {
        parent::setModel(new UsuarioModel());
        $result = parent::getCondition("id = {$id}", $field);
        return $result[0][$field];
    }
}

if (isset($_GET['method'])) {
    $method = $_GET['method'];
    UsuarioController::$method();
    exit();
}
