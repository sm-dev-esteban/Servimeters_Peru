<?php

require_once "../Models/DB.php";

/**
 * @author Ricardo Enciso Bautista - Esteban serna palacios
 */

class ControladorTemplate extends DB
{
    const PATH_VIEWS = "/Peru/Views/pages/";
    /**
     * @param String $router - mucho texto
     */
    static function router(String $router = "default")
    {
        $db = new DB();
        $con = $db->connect();

        $router = $router . (strpos($router, ".php") === false ? ".php" : "");
        $routerFile = $_SERVER['DOCUMENT_ROOT'] . SELF::PATH_VIEWS . $router;
        $router404 = str_replace($router, "Error/404.php", $routerFile);
        if (file_exists($routerFile)) {
            include($routerFile);
        } else {
            include($router404);
        }
    }
}
