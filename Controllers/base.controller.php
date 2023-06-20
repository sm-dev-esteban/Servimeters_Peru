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

    private static $model;

    public static function setModel($model)
    {
        self::$model = $model;
    }

    /**
     * @param mixed $action
     * 
     * @return mixed
     */
    public static function execute($action)
    {
        self::$model->$action(self::getObjectModel());
    }

    /**
     * @return array
     */

    private static function getObjectModel()
    {
        return self::$model->getObjectAsArray();
    }

    /**
     * @return string
     */
    public static function getId()
    {
        return self::$model->getId();
    }


    /**
     * @return mixed
     */
    public static function insert()
    {
        return self::$model->insert(self::getObjectModel());
    }

    /**
     * @return bool
     */
    public static function delete()
    {
        self::$model->delete(self::$model->getId());
    }

    /**
     * @return bool
     */
    public static function update()
    {
        self::$model->update(self::getObjectModel());
    }

    /**
     * @return object
     */
    public static function get()
    {
        self::$model->get(self::$model->getId());
    }

    /**
     * @return array
     */
    public static function getAll()
    {
        return self::$model->getAll();
    }

    public static function getCondition($table, $condition)
    {
        $result = AutomaticForm::getDataSql($table, $condition);
        return $result;
    }
}
