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
            return $af->execute();
        } catch (Exception $e) {
            return $e;
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
    public function update($object, $primaryKey)
    {
        try {
            $af = new AutomaticForm($object, $this->table, 'UPDATE', $primaryKey);
            return $af->execute(true, true);
        } catch (Exception $e) {
            return $e;
        }
    }
    /**
     * @param string $id
     * 
     * @return [type]
     */
    public function get($id)
    {
        try {
            $result = AutomaticForm::getDataSql($this->table, "id = {$id}");
            return $result ?? false;
        } catch (Exception $e) {
            return $e;
        }
    }


    /**
     * @param null $object
     * 
     * @return [type]
     */
    public function getAll()
    {
        try {
            $result = AutomaticForm::getDataSql($this->table);
            return $result ?? false;
        } catch (Exception $e) {
            return $e;
        }
    }

    /**
     * @return [type]
     */
    public function getObjectAsArray()
    {
        return get_object_vars($this);
    }

    /**
     * @param mixed $condition
     * 
     * @return [type]
     */
    public function getCondition($condition, $return)
    {
        $result = AutomaticForm::getDataSql($this->table, $condition, $return);
        return $result ?? false;
    }
}
