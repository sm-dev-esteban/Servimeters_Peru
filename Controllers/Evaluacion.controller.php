<?php
require_once 'Base.controller.php';

if (isset($_GET['path'])) {
    $path = $_GET['path'];
    require_once $path . 'config.php';
} else {
    require_once 'config.php';
}
require_once FOLDERSIDE . 'Models/Evaluacion.model.php';

class EvaluacionController extends BaseController
{
    private static $result;

    /**
     * @return [type]
     */
    public static function insert()
    {
        self::$result = new stdClass();
        parent::setModel(new EvaluacionModel($_POST));
        self::$result->Result = parent::insert();
        header('Content-Type: application/json');
        echo json_encode(self::$result);
    }
}

if (isset($_GET['method'])) {
    $method = $_GET['method'];
    EvaluacionController::$method();
    exit();
}
