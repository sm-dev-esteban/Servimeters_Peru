<?php
require_once 'Base.controller.php';

if (isset($_GET['path'])) {
    $path = $_GET['path'];
    require_once $path . 'config.php';
} else {
    require_once 'config.php';
}

require_once FOLDERSIDE . 'Models/Formulario.model.php';

class FormController extends BaseController
{
    private static $result;
    public static function registerForm()
    {
        if (isset($_GET['entity'])) {
            self::$result = new stdClass();
            $table = $_GET['entity'];
            $data = array_merge($_POST, $_FILES);
            parent::setModel(new FormulatioModel($data, null,  $table));
            self::$result->Result = parent::insert();
            header('Content-Type: application/json');
            echo json_encode(self::$result);
            exit();
        }
    }

    /**
     * @return [type]
     */
    public static function index()
    {
        parent::setModel(new FormulatioModel(null, null, 'condiciones_form'));
        return parent::getAll();
    }

    /**
     * @param mixed $id
     * @param mixed $table
     * 
     * @return [type]
     */
    public static function getForm($id, $table)
    {
        parent::setModel(new FormulatioModel(null, $id, $table));
        return parent::get();
    }

    public static function getFormProcess($id, $table)
    {
        parent::setModel(new FormulatioModel(null, null, $table));
        $result = parent::getCondition("proceso = {$id}");
        return $result[0];
    }

    /**
     * @return [type]
     */
    public static function loadDataForms()
    {
        if (isset($_POST['id'])) {
            $forms = array('condiciones_form', 'financial_form', 'financial_sell_form_1', 'financial_sell_form_2', 'financial_sell_form_3', 'policies_form', 'banks_form', 'management_form', 'contracting_service_form', 'service_provision_form', 'service_provision_product_form', 'quiality_form', 'responsability_form');
            $id = $_POST['id'];
            $data = array();
            foreach ($forms as $form) {
                $data[$form] = self::getFormProcess($id, $form);
            }
            return $data ?? false;
        } else {
            echo '<script>window.location.href= "' . SERVERSIDE . '"</script>';
        }
    }

    /**
     * @return [type]
     */
    public static function loadDocsForm()
    {
        if (isset($_POST['id'])) {
            $formsDocs = array('financial_documents_form', 'sgc_documents_form', 'responsability_documents_form');
            $id = $_POST['id'];
            $dataDocs = array();
            foreach ($formsDocs as $formDoc) {
                $dataDocs[$formDoc] = self::getFormProcess($id, $formDoc);
            }
            return $dataDocs ?? false;
        } else {
            echo '<script>window.location.href= "' . SERVERSIDE . '"</script>';
        }
    }
}

if (isset($_GET['method'])) {
    $method = $_GET['method'];
    FormController::$method();
    exit();
}
