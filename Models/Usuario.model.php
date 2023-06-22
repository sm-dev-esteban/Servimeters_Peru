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
    private $email;
    /**
     * @var string
     */
    private $usuario;
    /**
     * @var string
     */
    private $password;
    /**
     * @var string
     */
    private $rol;
    /**
     * @var string
     */
    private $habilitado;
    /**
     * @var string
     */
    private $estado;

    function __construct($array = null)
    {
        parent::__construct('usuarios');
        if ($array) {
            foreach ($array as $key => $val) {
                $this->$key = $val;
            }
            if (isset($this->password)) {
                $this->encryptPass();
            }
        }
    }

    /**
     * @return array
     */
    public function getObjectAsArray()
    {
        $objectArray = array(
            "data" => get_object_vars($this)
        );
        return $objectArray;
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
        $this->password = password_hash($this->password, PASSWORD_BCRYPT, ['cost' => 12]);
    }

    /**
     * @param string $pass
     * @param string $hash
     * 
     * @return bool
     */
    public static function verifyPass($pass, $hash)
    {
        return password_verify($pass, $hash);
    }
}
