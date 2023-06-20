<?php
require_once 'interfaces/BD.interface.php';
require_once 'DB.php';
require_once 'automaticForm.php';
class BaseModel implements BDInterface
{

    /**
     * @var DB
     */
    private $db;
    /**
     * @var string
     */
    private $query;
    /**
     * @var string
     */
    private $table;

    function __construct($table)
    {
        $this->db = new DB();
        $this->db->connect();
        $this->table = $table;
    }

    /**
     * @param mixed $object
     * 
     * @return boolean | object
     */
    public function insert($object)
    {
        try {
            $af = new AutomaticForm($object, $this->table);
            $af->execute();
        } catch (Exception $e) {
            echo $e;
        }
    }
    /**
     * @param string $id
     * 
     * @return [type]
     */
    public function delete($id)
    {
    }
    /**
     * @param mixed $object
     * 
     * @return [type]
     */
    public function update($object)
    {
    }
    /**
     * @param string $id
     * 
     * @return [type]
     */
    public function get($id)
    {
    }


    /**
     * @param null $object
     * 
     * @return [type]
     */
    public function getAll()
    {
        $this->query = "SELECT * FROM `" . $this->table . "`";
        $result = $this->db->executeQuery($this->query);
        return $result;
    }

    /**
     * @return [type]
     */
    public function getObjectAsArray()
    {
        return get_object_vars($this);
    }

    public function getCondition($condition)
    {
        $result = AutomaticForm::getDataSql($this->table, $condition);
        return $result;
    }
}
