<?php

require_once FOLDERSIDE . "Models/Basic.php";

class AF_Static extends Basic
{
    /**
     * @param String $table nombre de la tabla
     * @return Bool
     */
    static function checkTableExists(String $table): Bool
    {
        $db = new DB();
        $db->connect();

        $q = "SELECT * from $table";
        $query = $db->executeQuery($q);
        $error = DB::getError($query);

        return $error === false ? true : false;
    }

    /**
     * @param String $table nombre de la tabla
     * @return Bool|String Solo retorna el nombre de la llave primaria de una tabla, algo innecesario pero útil.
     */
    static function getNamePrimary(String $table): Bool|String
    {
        $db = new DB();
        $db->connect();
        $gestor = $db->getParams("gestor");

        if (!self::checkTableExists($table))
            return false;


        $arrayQuery = [
            "mysql" => "SHOW columns from `{$table}` where `Key` = 'PRI'",
            "sqlsrv" => "SELECT * FROM sys.columns WHERE OBJECT_ID = OBJECT_ID('{$table}') and is_identity = 1",
            "sqlite" => ""
        ];

        $return = [
            "mysql" => "Field",
            "sqlsrv" => "name",
            "sqlite" => ""
        ];

        $q = $arrayQuery[$gestor] ?? "";
        $r = $return[$gestor] ?? "";

        $query = $db->executeQuery($q);
        $error = DB::getError($query);

        if ($error !== false)
            return false;


        $data = $query->fetch(PDO::FETCH_ASSOC);
        return $data[$r] ?? false;
    }

    /**
     * @param String $filter campo a filtrar
     * @param String $column columna a filtrar
     * @param String $return columna que va a devolver
     * @param String $table nombre de la tabla
     * @param Array  $config variable especial para cambiar algunos parametros 
     * @return Bool|String|Int devuelve el valor enviado en $return si esta vacia o no se ejecuta la consulta devuelve false
     */
    static function getValueSql($filter, $column, $return, $table, $config = []): Bool|String|Int
    {

        $db = new DB();
        $db->connect();
        $gestor = $db->getParams("gestor");
        $primaryKey = self::getNamePrimary($table);

        if (!self::checkTableExists($table))
            return false;


        $defaultConfig = [
            "like" => false,
            "notResult" => false
        ];

        $c = array_merge($defaultConfig, is_array($config) ? $config : []);

        $arrayQuery = [
            "mysql" => "SELECT * FROM `{$table}`
            WHERE `{$column}` " . ($c["like"] == true ? "like '%{$filter}%'" : "= {$filter}") . " limit 1",
            "sqlsrv" => "SELECT {$return} FROM {$table}
            WHERE {$column} " . ($c["like"] == true ? "like '%{$filter}%' " : "= '{$filter}' ") . "
            ORDER BY {$primaryKey}
            OFFSET 0 ROWS FETCH NEXT 1 ROWS ONLY",
            "sqlite" => ""
        ];

        $q = $arrayQuery[$gestor] ?? "";

        if (strpos($q, "@primary") !== false)
            $q = str_replace("@primary", $primaryKey, $q);


        $query = $db->executeQuery($q);
        $error = DB::getError($query);

        if ($error !== false)
            return $c["notResult"];


        $data = $query->fetch(PDO::FETCH_ASSOC);
        return $data[$return] ?? $c["notResult"];
    }

    /**
     * @param String $table nombre de la tabla
     * @param String $where condición
     * @param String $return valores a devolver por defecto todos
     */
    static function getDataSql(String $table, String $where = "1 = 1", String $return = "*"): array|Bool
    {
        $db = new DB();
        $db->connect();
        $primaryKey = self::getNamePrimary($table);

        if (!self::checkTableExists($table))
            return false;

        $q = "SELECT {$return} FROM {$table} WHERE {$where}";

        if (strpos($q, "@primary") !== false)
            $q = str_replace("@primary", $primaryKey, $q);


        $query = $db->executeQuery($q);
        $error = DB::getError($query);

        if ($error !== false)
            return false;

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @param String|Int $value valor con el que va a filtrar
     * @param String $column campo con el que va a filtrar
     * @param String|Int|Array $primaryKey valor de la llave primaria ejemplo: id = $primaryKey para el array enviar una arreglo con campo y valor a filtrar ejemplo (["id_micosita" => 1] - id_micosita = 1) cada campo es separado por un AND
     * @param String $table nombre de la tabla
     * @return Bool retorna un arreglo con el status y el error en el caso de que suceda
     */
    static function updateValueSql($filter, String $column, $primaryKey, String $table): Bool
    {
        $db = new DB();
        $db->connect();
        $primaryKey = self::getNamePrimary($table);

        if (!self::checkTableExists($table))
            return false;

        if (is_array($primaryKey)) {
            foreach ($primaryKey as $key => $val) {
                $x[] = "$key = '{$val}'";
            }
        }

        $where = is_array($primaryKey)
            ? implode(" AND ", $x)
            : self::getNamePrimary($table) . " = '{$primaryKey}'";

        $q = "UPDATE {$table} set {$column} = '{$filter}' where $where";

        if (strpos($q, "@primary") !== false)
            $q = str_replace("@primary", $primaryKey, $q);

        $query = $db->executeQuery($q);
        $error = DB::getError($query);

        return $error === false ? true : false;
    }

    /**
     * @param String $classname nombre de la clase
     * @param Bool $is_static boolean para obtener valores todos metodos (true - solo los static, false - public)
     * @return Array retorna un arreglo con los nombres de cada metodo de la clase que selecionaron
     */
    static function getClassMethods(String $classname = "AutomaticForm", Bool $is_static = true): array
    {
        $reflection = new ReflectionClass($classname);

        if ($is_static)
            return json_decode(json_encode($reflection->getMethods(ReflectionMethod::IS_STATIC), JSON_UNESCAPED_UNICODE), true);
        else
            return json_decode(json_encode($reflection->getMethods(ReflectionMethod::IS_PUBLIC), JSON_UNESCAPED_UNICODE), true);
    }

    /**
     * @return Mixed uft8_encode tambien es valido con arreglos
     */
    static function utf8(mixed $utf8): mixed
    {
        return !is_array($utf8) ? self::iso8859_1_to_utf8($utf8) : array_map("self::utf8", $utf8);
    }

    /**
     * https://php.watch/versions/8.2/utf8_encode-utf8_decode-deprecated#:~:text=Replacements%20for%20utf8_decode,intl%20extension%2C%20or%20iconv%20extension.
     */
    static function iso8859_1_to_utf8(string $s): string
    {
        $s .= $s;
        $len = \strlen($s);

        for ($i = $len >> 1, $j = 0; $i < $len; ++$i, ++$j) {
            switch (true) {
                case $s[$i] < "\x80":
                    $s[$j] = $s[$i];
                    break;
                case $s[$i] < "\xC0":
                    $s[$j] = "\xC2";
                    $s[++$j] = $s[$i];
                    break;
                default:
                    $s[$j] = "\xC3";
                    $s[++$j] = \chr(\ord($s[$i]) - 64);
                    break;
            }
        }

        return substr($s, 0, $j);
    }
}
