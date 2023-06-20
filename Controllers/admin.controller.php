<?php

require_once 'Base.controller.php';

class AdminController extends BaseController
{

    public static function createRecord()
    {
        if (isset($_GET['entity'])) {
            $data = array_merge($_POST);
            $table = $_GET['entity'];
            $result = parent::insert($data, $table);
            return $result;
        }
    }

    public static function updateRecord()
    {
        if (isset($_GET['entity'])) {
            $data = array_merge($_POST);
            $table = $_GET['entity'];
            $result = parent::update($data, $table);
            echo $result;
            return $result;
        }
    }

    public static function getRecords()
    {
        $records = parent::getAll();
        return $records;
    }
}
