<?php

// require_once FOLDERSIDE . "/Models/DB.php";

/**
 * @author Ricardo Enciso Bautista
 * @author Esteban Serna Palacios 😉😜
 */

class ControladorTemplate
{

    const menu = array(
        "Admin" => "Admin/register.php|fa-plus|Ingresar Usuarios,Admin/accesos.php|fa-list|Lista de usuarios,Admin/procesos.php|fa-clipboard|Lista de procesos",
        "Auditor" => "Auditor/evaluacion.php|fa-marker|Evaluar homologacion",
        "Cliente" => "Cliente/list_procesos.php|fa-user|Homologacion(es) de Cliente"
    );

    const PATH_VIEWS = FOLDERSIDE . "Views/pages/";

    /**
     * @param String $router - mucho texto
     */
    static function router(String $router = "default")
    {
        // $db = new DB();
        // $con = $db->connect(); --Lo deshabilite, Perdon :(
        $router = $router . (strpos($router, ".php") === false ? ".php" : "");
        $routerFile = SELF::PATH_VIEWS . $router;
        $router404 = str_replace($router, "Error/404.php", $routerFile);
        if (file_exists($routerFile)) {
            include($routerFile);
        } else {
            include($router404);
        }
    }

    /**
     * @return [type]
     */
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
