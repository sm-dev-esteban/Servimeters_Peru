<?php

require_once 'Base.model.php';

class FormulatioModel extends BaseModel
{

    private $arrayData;
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
