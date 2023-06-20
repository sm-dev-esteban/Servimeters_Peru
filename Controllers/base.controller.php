<?php

if (isset($_GET['path'])) {
    $path = $_GET['path'];
    require_once $path . 'config.php';
} else {
    require_once 'config.php';
}
require_once FOLDERSIDE . 'Models/automaticForm.php';

class BaseController
{

    public static function insert($data, $table)
    {
        $form = new AutomaticForm($data, $table);
        $result = $form->execute();
        return $result;
    }

    public static function update($data, $table)
    {
        $form = new AutomaticForm($data, $table, 'UPDATE');
        $result = $form->execute();
        return $result;
    }

    public static function getAll($table)
    {
        $result = AutomaticForm::getDataSql($table);
        return $result;
    }

    public static function get($table, $condition)
    {
        $result = AutomaticForm::getDataSql($table, $condition);
        return $result;
    }
}
