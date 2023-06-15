<?php

class DB_Config
{
    const DEFAULT_PARAMS = [
        "hostname" => "localhost",
        "username" => "root",
        "password" => "",
        "database" => "servimetersPeru",
        "file" => FOLDERSIDE . "db/db.db" /* sqlite */
    ];

    const DEFAULT_GESTOR = "mysql";

    static function getError(Mixed $error, Bool $returnArray = false)
    {
        $r = (is_object($error) && method_exists($error, "getMessage") ? $error->getMessage() : (is_array($error) && isset($error["error"]) ? $error["error"] : (is_string($error) ? $error : false)));
        return ($returnArray ? ["error" => $r]  :  $r);
    }
}
