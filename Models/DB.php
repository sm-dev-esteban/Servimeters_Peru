<?php

class DB
{
    protected $gestor, $params, $con;
    const DEFAULT_PARAMS = [
        "hostname" => "localhost",
        "username" => "root",
        "password" => "",
        "database" => "servimetersPeru",
        "file" => "db.db"
    ];

    public function __construct(
        String $gestor = "mysql",
        array $params = []
    ) {
        $this->params = array_merge(self::DEFAULT_PARAMS, $params);
        $this->gestor = $gestor;
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
        /* No me interesa mucho que obtenga los dns de la conexion asi que mejor lo declaro en el metodo */
        $dns = [];

        $dns["mysql"] = "mysql:host={$this->params["hostname"]};dbname={$this->params["database"]}";
        $dns["sqlsrv"] = "sqlsrv:Server={$this->params["hostname"]};Database={$this->params["database"]}";
        $dns["sqlite"] = "sqlite:{$this->params["file"]}";

        if (!in_array($this->gestor, array_keys($dns))) {
            return [
                "error" => "administrator not configured: {$this->gestor}"
            ];
        }

        try {
            $this->con = new PDO($dns[$this->gestor], $this->params["username"], $this->params["password"]);
        } catch (PDOException $th) {
            if ($createDatabase === true)
                self::createDatabase();
            return [
                "error" => $th->getMessage()
            ];
        }

        return $this->con;
    }

    public function createDatabase()
    {
        switch ($this->gestor) {
            case 'mysql':
                $dns = "{$this->gestor}:host={$this->params["hostname"]};";

                try {
                    $tempCon = new PDO($dns, $this->params["username"], $this->params["password"]);
                } catch (PDOException $th) {
                    return false;
                }
                $query = self::executeQuery("CREATE DATABASE IF NOT EXISTS {$this->params["database"]}", $tempCon);
                if (is_array($query) && isset($query["error"])) {
                    return false;
                } else {
                    return true;
                }
                break;
            case 'sqlsrv':
                $dns = "{$this->gestor}:Server={$this->params["hostname"]};";

                try {
                    $tempCon = new PDO($dns, $this->params["username"], $this->params["password"]);
                } catch (PDOException $th) {
                    return false;
                }
                $query = self::executeQuery("CREATE DATABASE IF NOT EXISTS {$this->params["database"]}", $tempCon);
                if (is_array($query) && isset($query["error"])) {
                    return false;
                } else {
                    return true;
                }
                break;
            default:
                break;
        }
    }

    /**
     * @param String $query recive una consulta de toda la vida, pero al ejecutarla con esta function retorna un error dado el caso para una validacion mas facil
     */
    public function executeQuery(String $query, mixed $con = false)
    {
        $con = ($con === false ? $this->con : $con);
        try {
            if (!$con) {
                return [
                    "error" => "no connection to database"
                ];
            }
            return $con->query($query);
        } catch (PDOException $th) {
            return [
                "error" => $th->getMessage()
            ];
        }
    }
}
