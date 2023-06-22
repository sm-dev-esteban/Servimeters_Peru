<?php

require_once 'Base.model.php';

class FormulatioModel extends BaseModel
{

    private $arrayData;

    public function __construct($arrayData = null, $table)
    {
        parent::__construct($table);
        if (!empty($arrayData)) {
            $this->arrayData = $arrayData;
        }
    }

    /**
     * @return array
     */
    public function getObjectAsArray()
    {
        return $this->arrayData;
    }
}
