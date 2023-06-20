<?php

class DB_Config
{
    const DEFAULT_PARAMS = [
        "hostname" => "localhost",
        "username" => "root",
        "password" => "user",
        "database" => "servimetersPeru",
        "file" => FOLDERSIDE . "db/db.db" /* sqlite */
    ];

    const DEFAULT_GESTOR = "mysql";

    static function getError(Mixed $error, Bool $returnArray = false)
    {
        $c = (is_object($error) && method_exists($error, "getCode") ? $error->getCode() : false);
        $m = (is_object($error) && method_exists($error, "getMessage") ? $error->getMessage() : (is_array($error) && isset($error["error"]) ? $error["error"] : (is_string($error) ? $error : false)));

        return ($returnArray ? [
            "error" => $m,
            "code" => $c
        ]  :  $m);
    }
}
