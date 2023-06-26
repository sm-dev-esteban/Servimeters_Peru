<?php
require_once 'Base.controller.php';

require_once FOLDERSIDE . 'Models/proceso.model.php';

class ProcessController extends BaseController{

   public static function sendRegisterProcess(){

        if (isset($_GET['action']) && strcmp($_GET['action'], 'insert') == 0) {
                parent:: setModel(new ProcesoModel());
                parent:: insert();
        }
   }
}




