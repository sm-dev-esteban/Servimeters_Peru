<?php

class DB
{
    protected $gestor, $params, $con;
    const DEFAULT_PARAMS = [
        "hostname" => "localhost",
        "username" => "root",
        "password" => "",
        "database" => "homologacion_peru",
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
    public function connect()
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
            return [
                "error" => $th->getMessage()
            ];
        }

        return $this->con;
    }


    /**
     * @param String $query
     * 
     * @return array
     */
    public function executeQuery(String $query)
    {
        try {
            $arrayResults = array();
            if (!$this->con) {
                return [
                    "error" => "no connection to database"
                ];
            }
            $result = $this->con->query($query);
            while ($usuario = $result->fetch(PDO::FETCH_ASSOC)) {
                $arrayResults[] = $usuario;
            }
            return $arrayResults;
        } catch (PDOException $th) {
            return [
                "error" => $th->getMessage()
            ];
        }
    }

    /**
     * @param String $query
     * @param object $object
     * 
     * @return boolean | object
     */
    public function executePrepareQuery(String $query, $object)
    {
        try {
            if (!$this->con) {
                return [
                    "error" => "no connection to database"
                ];
            }
            $result = $this->con->prepare($query);
            $index = 1;
            foreach ($object as $key => $value) {
                $result->bindValue($index, $value);
                $index++;
            }
            return $result->execute();
        } catch (PDOException $th) {
            return [
                "error" => $th->getMessage()
            ];
        }
    }
}
