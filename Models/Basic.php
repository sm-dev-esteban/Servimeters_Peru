<?php

/**
 * @author Esteban Serna Palacios 😉😜
 */

class Basic /* CRUD */
{
    static function Create(String $table, array $data, Mixed $con)
    {
        $k = [];
        $v = [];
        foreach ($data as $key => $value) {
            $k[] = $key;
            $v[] = "'$value'";
        }
        $k = implode(", ", $k);
        $v = implode(", ", $v);
        $query = "INSERT INTO {$table} ($k) values ($v)";
        return $query;
    }

    static function Read(String $table, String $where, Mixed $con)
    {
        $query = "SELECT * FROM {$table} where {$where}";
        return $query;
    }

    static function Update(String $table, array $data, String $where, Mixed $con)
    {
        $s = [];
        foreach ($data as $key => $value) {
            $s[] = "$key = '{$value}'";
        }
        $s = implode(", ", $s);
        $query = "UPDATE {$table} SET {$s} WHERE {$where}";
        return $query;
    }

    static function Delete(String $table, String $where, Mixed $con)
    {
        $query = "DELETE FROM {$table} WHERE {$where}";
        return $query;
    }
}
