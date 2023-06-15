<?php

use JetBrains\PhpStorm\Internal\returnTypeContract;

require_once FOLDERSIDE . "Models/DB.php";
require_once FOLDERSIDE . "Models/AF_Static.php";

/**
 * @author Esteban Serna Palacios 😉😜
 * @version 1.3.1
 */

class AutomaticForm extends AF_Static
{
    private $data;
    private $file;
    private $db;
    private $conn;
    private $config;
    private $table;
    private $action;
    private $update;
    private $alldata;
    private $idOper;

    /**
     * @param Array $alldata Recibe dos arreglos, el primero [ "data" ] para información en general y el otro es para archivos [ "file" ] -- si algo pararle como parámetro $_FILES.
     * @param String $table Nombre de la tabla si no existe puede ser creada.
     * @param String $action La accion recive uno de dos parametros "INSERT" o "UPDATE"
     * @param Mixed $update Campo únicamente sirve para hacer updates puede recibir un arreglo con el nombre de su llave primaria o también puede recibir solo el valor y el código se encarga de buscar la llave de esa tabla.
     */
    public function __construct(
        array $alldata = [
            "data" => [],
            "file" => []
        ],
        String $table,
        String $action = "INSERT",
        Mixed $update = [
            "@primary" => false
        ]
    ) {
        $this->table = $table;
        $this->action = strtoupper($action);

        if ($this->action == "UPDATE") {
            if (!is_array($update)) { // si no es un arreglo busco a la llave primaria de la tabla y que filtre por el valor que le estoy pasando
                $this->update = [self::getNamePrimary($this->table) => $update];
            } else { // si es un arreglo verguero el que me toco hacer :c

                $check = key(array_filter($update, function ($x) { // busco que el arreglo contenga la palabra @primary para hacerle el cambio de la llave primaria de esa tabla
                    return str_contains($x, "@primary");
                }, ARRAY_FILTER_USE_KEY));

                if (!is_null($check)) {
                    $this->update = [self::getNamePrimary($this->table) => $update[$check]];
                } else {
                    $this->update = $update;
                }
            }
        } else {
            $this->update = ["ident" => false];
        }

        $this->db = new DB();
        $this->conn = $this->db->connect();

        $this->alldata = $alldata;

        $this->data = (isset($this->alldata["data"]) && !empty(count($this->alldata["data"])) ? $this->alldata["data"] : false);
        $this->file = (isset($this->alldata["file"]) && !empty(count($this->alldata["file"])) ? $this->alldata["file"] : false);

        $this->idOper = 0;
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
     * @param bool $auto_craete Válida la existencia de los campos y las tablas y si no existen las crea.
     * @param bool $checkEmptyValues Válida que los campos no este vacío, si recibe un dato que este vacío lo omite tanto en la creación como en la ación a realizar.
     * @return array Devuelve un arreglo con el estado y el ID de la operación, ya sea insert o update.
     */
    public function execute(Bool $auto_craete = true, Bool $checkEmptyValues = false): array
    {

        if (empty($this->table | $this->action) || ($this->action == "INSERT" || $this->action == "UPDATE" ? false : true))
            return ["error" => "Error params"];

        if ($this->action == "UPDATE") {
            $id_u = key($this->update);
            $va_u = $this->update[$id_u];
        }

        if ($auto_craete == true) {
            if (!self::checkTableExists($this->table))
                $this->db->createTable($this->table);

            $checkAll = [];

            $checkAll = array_merge(
                $this->data <> false && isset($this->data) && is_array($this->data) ? $this->data : [],
                $this->file <> false && isset($this->file["name"]) && is_array($this->file["name"]) ? $this->file["name"] : []
            );

            foreach ($checkAll as $key => $value) {
                if ($checkEmptyValues && !is_array($value) ? !empty($value) : !empty($key))
                    $this->db->createColumn($this->table, $key);
            }
        }

        // variables que uso como plantilla
        // Nota: no cambiar por que me onojo >:(

        $insert = "(``) VALUES ('')";
        $update = "`` = ''";

        // data
        if ($this->data <> false && is_array($this->data) && !empty(count($this->data))) {
            foreach ($this->data as $key => $value) {
                if ($checkEmptyValues ? !empty($value) : !empty($key)) {
                    if (is_array($value))
                        $value = implode("|/|", array_filter($value, function ($x) {
                            return !empty($x);
                        })); // hago que cada registro quede separado con este valo |/|

                    if ($this->action == "INSERT")
                        $insert = str_replace("``", "`?=>{$key}`, ``", str_replace("''", "'?=>{$value}', ''", $insert));
                    else if ($this->action == "UPDATE")
                        $update = str_replace("`` = ''", "`?=>{$key}` = '?=>{$value}', `` = ''", $update);
                }
            }
        }
        // data

        // files
        if ($this->file <> false && is_array($this->file["name"]) && !empty(count($this->file["name"]))) {

            define("FOLDER_SIDE", FOLDERSIDE . "files/{$this->table}/");
            define("SERVER_SIDE", SERVERSIDE . "files/{$this->table}/");

            foreach ($this->file["name"] as $key => $value) {
                if ($checkEmptyValues ? !empty($value) : !empty($key)) {

                    if (!file_exists(FOLDER_SIDE))  // creamos la carpeta si no existe
                        mkdir(FOLDER_SIDE, 0777, true);

                    if (is_array($value)) {
                        foreach ($this->file["name"][$key] as $keyM => $valueM) {
                            if (!empty($this->file["tmp_name"][$key][$keyM])) {
                                $value[$keyM] = FOLDER_SIDE . date("YmdHis") . "_{$this->file["name"][$key][$keyM]}";
                                move_uploaded_file($this->file["tmp_name"][$key][$keyM], $value[$keyM]);
                                $value[$keyM] = str_replace(FOLDER_SIDE, SERVER_SIDE, $value[$keyM]);
                            }
                        }
                        $value = implode("|/|", $value);
                    } else {
                        if (!empty($this->file["tmp_name"][$key])) {
                            $value = FOLDER_SIDE . date("YmdHis") . "_{$value}"; // le cambiamos el nombre al archivo con toda la ruta donde se va a cargar 
                            move_uploaded_file($this->file["tmp_name"][$key], "{$value}"); // subimos el archivo
                            $value = str_replace(FOLDER_SIDE, SERVER_SIDE, $value);
                        }
                    }

                    if ($this->action == "INSERT")
                        $insert = str_replace("``", "`?=>{$key}`, ``", str_replace("''", "'?=>{$value}', ''", $insert));
                    else if ($this->action == "UPDATE")
                        $update = str_replace("`` = ''", "`?=>{$key}` = '?=>{$value}', `` = ''", $update);
                }
            }
        }
        // files

        $insert = str_replace("`", "", str_replace("?=>", "", str_replace(", ``", "", str_replace(", ''", "", $insert))));
        $update = str_replace("`", "", str_replace("?=>", "", str_replace(", `` = ''", "", $update)));

        $q = $this->action == "INSERT" ? "{$this->action} INTO {$this->table} {$insert}" : "{$this->action} {$this->table} SET {$update} WHERE {$id_u} = '{$va_u}'";

        $query = $this->db->executeQuery($q);
        $error = DB::getError($query);
        $checkQUery = $error === false ? true : false;
        $returnID = $this->action == "INSERT" ? $this->conn->lastInsertId() : $va_u;
        $this->idOper = $returnID;
        return ["status" => $checkQUery, "id" => $this->idOper, "query" => $q, "error" => $error];
    }
}
