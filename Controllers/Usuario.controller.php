<?php
require_once 'Base.controller.php';
require_once 'Models/Usuario.model.php';

class UsuarioController extends BaseController
{

    static UsuarioModel $usuario;

    /**
     * @return array
     */
    public static function index()
    {
        parent::setModel(new UsuarioModel());
        return parent::getAll();
    }

    /**
     * @return string
     */
    static public function saveUser()
    {
        if (isset($_GET['action']) && $_GET['action'] === 'create') {
            if (isset($_POST)) {
                $usuario = new UsuarioModel($_POST);
                parent::setModel($usuario);
                echo parent::insert();
            } else {
                echo 'Los valores no son validos!';
            }
        }
    }
}
