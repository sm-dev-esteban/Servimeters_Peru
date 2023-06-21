<?php

require_once 'Base.controller.php';

class CustomerController extends BaseController
{

        public static function createCustomer()
        {

                if (isset($_GET['entity'])) {

                        $data = array_merge($_POST);
                        $table = $_GET['entity'];
                        $result = parent::insert($data, $table);
                        return $result;
                }
        }
}
