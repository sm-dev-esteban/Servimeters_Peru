<?php
require_once 'Base.controller.php';
class FormController extends BaseController
{
    public static function registerForm()
    {
        if (isset($_GET['entity'])) {
            $data = array_merge($_POST);
            $table = $_GET['entity'];
            $result = parent::insert($data, $table);
            echo $result;
            return $result;
        }
        session_start();
        $_SESSION['usuario'] = 'Pepito';
    }
}
