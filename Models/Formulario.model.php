<?php

require_once 'Base.model.php';

class FormulatioModel extends BaseModel
{

    /**
     * @var array
     */
    private $arrayData;
    /**
     * @var string
     */
    private $id;

    public function __construct($arrayData = null, $id = null, $table = '')
    {
        parent::__construct($table);
        if (!empty($arrayData)) {
            $this->arrayData = $arrayData;
        }
        if (!empty($id)) {
            $this->id = $id;
        }
    }

    /**
     * @return array
     */
    public function getObjectAsArray()
    {
        return $this->arrayData;
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
