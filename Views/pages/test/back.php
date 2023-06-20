<?php
include "../../../config.php";
include "../../../Models/automaticForm.php";
/* archivo para prueba */
$table = $_GET["table"] ?? false;
if ($table !== false) {
    $data = array_merge($_POST, $_FILES);
    $af = new AutomaticForm($data, $table);
    echo json_encode($af->execute(true, true), JSON_UNESCAPED_UNICODE);
    exit();
}
