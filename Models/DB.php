<?php

require_once FOLDERSIDE . "Models/DB_Config.php";

class DB extends DB_Config
{
    protected $gestor, $params, $con;

    public function __construct(
        String $gestor = self::DEFAULT_GESTOR,
        array $params = []
    ) {
        $this->params = array_merge(self::DEFAULT_PARAMS, $params);
        $this->gestor = strtolower($gestor);
        $this->con = false;
    }

    /**
     * @param Mixed $name - Nombre del parámetro que quieran obtener por defecto los devuelve todos
     * @return Mixed Devuelve cualquier valor que este en el __construct
     */
    public function getParams(String|Bool $name = false): String|array
    {
        // return $name ? ($this->$name ?? false) : $this;
        if ($name) {
            $r = $this->$name ?? false;
        } else {
            foreach ($this as $key => $value) {
                $r[$key] = $value;
            }
        }
        return $r;
    }

    /**
     * @return Mixed Retorna la conexión a la base de datos o un arreglo con el error
     */
    public function connect($createDatabase = false)
    {
        /* No me INTeresa mucho que obtenga los dns de la conexion asi que mejor lo declaro en el metodo */
        $dns = [];

        $dns["mysql"] = "mysql:host={$this->params["hostname"]};dbname={$this->params["database"]}";
        $dns["sqlsrv"] = "sqlsrv:Server={$this->params["hostname"]};Database={$this->params["database"]}";
        $dns["sqlite"] = "sqlite:{$this->params["file"]}";

        if (!in_array($this->gestor, array_keys($dns))) {
            return self::getError("administrator not configured: {$this->gestor}", true);
        }

        try {
            $this->con = new PDO($dns[$this->gestor], $this->params["username"], $this->params["password"]);
        } catch (PDOException $th) {
            if ($createDatabase === true)
                return self::createDatabase() ? self::connect() : self::getError($th, true);
            return self::getError($th, true);
        }

        return $this->con;
    }

    public function createDatabase()
    {
        switch ($this->gestor) {
            case 'mysql':
            case 'sqlsrv':
                $dns = "{$this->gestor}:" . ($this->gestor == "mysql" ? "host" : "Server") . "={$this->params["hostname"]};";

                try {
                    $tempCon = new PDO($dns, $this->params["username"], $this->params["password"]);
                } catch (PDOException $th) {
                    return false;
                }

                $query = self::executeQuery("CREATE DATABASE IF NOT EXISTS {$this->params["database"]}", $tempCon);
                return (self::getError($query) === false ? true : false);
                break;
            default:
                return false;
                break;
        }
    }

    public function createTable(String $table, Mixed $con = false)
    {
        $arrayQuery = [
            "mysql" => "CREATE TABLE IF NOT EXISTS `{$table}` (
                id INT AUTO_INCREMENT PRIMARY KEY,
                fechaRegistro DATETIME DEFAULT CURRENT_TIMESTAMP
            )",
            "sqlsrv" => "IF NOT EXISTS (
                SELECT * FROM sys.tables t JOIN sys.schemas s ON (t.schema_id = s.schema_id) WHERE s.name = '{$table}'
            ) CREATE TABLE '{$table}' (
                id INT IDENTITY(1,1) PRIMARY KEY,
                fechaRegistro DATETIME DEFAULT CURRENT_TIMESTAMP
            );",
            "sqlite" => "CREATE TABLE `{$table}` (
                id INT AUTOINCREMENT PRIMARY KEY,
                fechaRegistro TEXT DEFAULT CURRENT_TIMESTAMP
            )"
        ];
        $query = $arrayQuery[$this->gestor] ?? "";
        $con = ($con === false ? $this->con : $con);
        return (is_array(self::executeQuery($query))) ? false : true;
    }

    /**
     * @param String $query recive una consulta de toda la vida, pero al ejecutarla con esta function retorna un error dado el caso para una validación mas facil
     */
    public function executeQuery(String $query, mixed $con = false)
    {
        $con = ($con === false ? $this->con : $con);
        try {
            if (!$con) {
                return self::getError("no connection to database", true);
            }
            return $con->query($query);
        } catch (PDOException $th) {
            return self::getError($th, true);
        }
    }
}
