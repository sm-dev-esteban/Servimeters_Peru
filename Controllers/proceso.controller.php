<?php
require_once 'Base.controller.php';

if (isset($_GET['path'])) {
        $path = $_GET['path'];
        require_once $path . 'config.php';
} else {
        require_once 'config.php';
}

require_once FOLDERSIDE . 'Models/proceso.model.php';

class ProcessController extends BaseController
{

        private static $result;

        /**
         * @return [type]
         */
        public static function insert()
        {
                self::$result = new stdClass();
                parent::setModel(new ProcesoModel(array_merge($_POST)));
                self::$result->Result = parent::insert();
                header('Content-Type: application/json');
                echo json_encode(self::$result);
        }
}

if (isset($_GET['method'])) {
        $method = $_GET['method'];
        ProcessController::$method();
        exit();
}
