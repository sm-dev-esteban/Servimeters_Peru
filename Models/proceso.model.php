<?php

require_once 'Base.model.php';

class ProcesoModel extends BaseModel
{

    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $usuario;

    /**
     * @var string
     */
    private $estado;

    /**
     * @var string
     */
    private $auditor;

    function __construct($array = null)
    {
        parent::__construct('proceso');
        if ($array) {
            foreach ($array as $key => $val) {
                $this->$key = $val;
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
     * @return [type]
     */
    public function getId()
    {
        return $this->id;
    }

    /*function addProcessColumn($processNumber, $idClient, $status= 'homologado') {
                $arrayProcess = array(
                    'numero_proceso' => $processNumber,
                    'id_cliente' => $idClient,
                    'estado' => $status
                );
        
                return $arrayProcess;
            }*/
}
