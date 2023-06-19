<?php
require_once 'config.php';
require_once 'Models/automaticForm.php';

class BaseController
{

    public static function insert($data, $table)
    {
        $form = new AutomaticForm($data, $table, 'INSERT');
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
}
