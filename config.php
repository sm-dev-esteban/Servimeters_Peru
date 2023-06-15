<?php
define("FOLDERSIDE", str_replace("\\", "/", __DIR__) . "/");
define("SERVERSIDE", str_replace(getenv("DOCUMENT_ROOT"), getenv("REQUEST_SCHEME") . "://" . getenv("HTTP_HOST"), FOLDERSIDE));

$data = [
    "FOLDERSIDE" => FOLDERSIDE,
    "SERVERSIDE" => SERVERSIDE
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