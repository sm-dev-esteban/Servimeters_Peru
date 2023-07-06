<?php
define("FOLDERSIDE", str_replace("\\", "/", __DIR__) . "/");
define("SERVERSIDE", str_replace(getenv("DOCUMENT_ROOT"), getenv("REQUEST_SCHEME") . "://" . getenv("HTTP_HOST"), FOLDERSIDE));
define("ESTADOS", array("asignado" => "<h5><span class='badge badge-pill bg-primary'>Asignado</span></h5>", "cancelado" => "<h5><span class='badge badge-pill bg-danger'>Cancelado</span></h5>", "revision" => "<h5><span class='badge badge-pill bg-dark'>Revisión</span></h5>", "evaluado" => "<h5><span class='badge badge-pill bg-info'>Evaluado</span></h5>", "calificado" => "<h5><span class='badge badge-pill bg-success'>Calificado</span></h5>"));

$data = [
    "FOLDERSIDE" => FOLDERSIDE,
    "SERVERSIDE" => SERVERSIDE,
    "ESTADOS" => ESTADOS
];

/* json */
$json = fopen(FOLDERSIDE . "config.json", "w");
fwrite($json, json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
fclose($json);
/* json */

/* min.js */
$js = fopen(FOLDERSIDE . "config.min.js", "w");
$write = [];
foreach ($data as $key => $value) {
    // $write[] = "const {$key} = " . (is_array($value) ? json_encode($value, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) : "`{$value}`") . ";";
    $write[] = "{$key} = " . (is_array($value) ? json_encode($value, JSON_UNESCAPED_UNICODE) : "`{$value}`");
}
// $write = implode("\n", $write);
$write = "const " . implode(", ", $write) . ";";
fwrite($js, $write);
fclose($js);
/* min.js */