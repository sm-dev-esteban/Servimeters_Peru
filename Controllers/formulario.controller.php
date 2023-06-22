<?php
require_once 'Base.controller.php';

if (isset($_GET['path'])) {
    $path = $_GET['path'];
    require_once $path . 'config.php';
} else {
    require_once 'config.php';
}

require_once FOLDERSIDE . 'Models/Formulario.model.php';

class FormController extends BaseController
{
    private static $result;
    public static function registerForm()
    {
        if (isset($_GET['entity'])) {
            self::$result = new stdClass();
            $table = $_GET['entity'];
            $data = array_merge($_POST, $_FILES);
            parent::setModel(new FormulatioModel($data, $table));
            self::$result->Result = parent::insert();
            header('Content-Type: application/json');
            echo json_encode(self::$result);
            exit();
        }
    }
}

if (isset($_GET['method'])) {
    $method = $_GET['method'];
    FormController::$method();
    exit();
}
