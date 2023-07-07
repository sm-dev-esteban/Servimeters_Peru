<?php
require_once 'Base.model.php';
class EvaluacionModel extends BaseModel
{

    /**
     * @var [type]
     */
    private $id;

    /**
     * @var string
     */
    private $cumple;

    /**
     * @var string
     */
    private $proceso;

    function __construct($array = null)
    {
        parent::__construct('evaluacion');
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
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
