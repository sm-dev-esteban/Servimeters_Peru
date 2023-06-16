<?php
interface BDInterface
{
    public function insert($object);
    public function delete($id);
    public function update($object);
    public function get($id);
    public function getAll();
    public function getObjectAsArray();
}
