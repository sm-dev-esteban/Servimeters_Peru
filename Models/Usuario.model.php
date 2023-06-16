<?php
require_once 'Base.model.php';
class UsuarioModel extends BaseModel
{

    /**
     * @var integer
     */
    private $id;
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $pass;
    /**
     * @var string
     */
    private $role;

    function __construct($array = null)
    {
        parent::__construct('usuarios');
        if ($array) {
            foreach ($array as $key => $val) {
                $this->$key = $val;
            }
            $this->encryptPass();
        }
    }

    /**
     * @return array
     */
    public function getObjectAsArray()
    {
        return get_object_vars($this);
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    private function encryptPass()
    {
        $this->pass = password_hash($this->pass, PASSWORD_BCRYPT, ['cost' => 12]);
    }
}
