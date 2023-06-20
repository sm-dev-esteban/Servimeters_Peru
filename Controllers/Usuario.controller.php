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
        if (isset($_GET['action']) && strcmp($_GET['action'], 'insert') == 0) {
            parent::setModel(new UsuarioModel($_POST));
            parent::insert();
        }
    }
}
