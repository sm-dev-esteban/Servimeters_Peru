<?php
require_once FOLDERSIDE . "Models/DB.php";

/**
 * @author Ricardo Enciso Bautista
 * @author Esteban Serna Palacios 😉😜
 */

class ControladorTemplate extends DB
{
    const PATH_VIEWS = "/peru/Views/pages/";
    const menu = array(
        "Admin" => "Admin/register.php|fa-plus|Ingresar Usuarios,Admin/accesos.php|fa-list|Lista de usuarios",
        "Auditor" => "Auditor/evaluacion.php|fa-marker|Evaluar homologacion",
        "Cliente" => "Cliente/form.php|fa-user|Homologacion de Cliente"
    );
    /**
     * @param String $router - mucho texto
     */
    static function router(String $router = "default")
    {
        $db = new DB();
        $con = $db->connect(true);

        echo DB::getError($db) . "\t\n";
        echo DB::getError($con) . "\t\n";

        $router = $router . (strpos($router, ".php") === false ? ".php" : "");
        $routerFile = $_SERVER['DOCUMENT_ROOT'] . SELF::PATH_VIEWS . $router;
        $router404 = str_replace($router, "Error/404.php", $routerFile);
        if (file_exists($routerFile)) {
            include($routerFile);
        } else {
            include($router404);
        }
    }

    static function menu()
    {
        if (strcmp($_SESSION['rol'], 'Admin') === 0) {
            $itemsMenu = explode(',', implode(',', self::menu));
        } else {
            $itemsMenu = explode(',', self::menu[$_SESSION['rol']]);
        }
        $resultMenu = array();
        foreach ($itemsMenu as $item) {
            $arrayItem = explode('|', $item);
            $resultMenu[] = $arrayItem;
        }
        return json_encode($resultMenu);
    }
}
