<?php

/* ❗❗ FUNCION PELIGROSA REEMPLAZA CUALQUIER COSA EN TODOS LOS ARCHIUVOS DE LA CARPETA QUE SE LE PASE ❗❗ */
/* ❗❗ USAR CON MUCHA PRECAUCIÓN ❗❗ */
function replaceMaster($search, $replace, $folder = "./*", $config = [])
{
    $config = array_merge([
        "returnCount" => true,
        "dirs" => true
    ], $config);

    $change = [];
    $all_files = glob($folder);

    foreach ($all_files as $route) {
        if (strpos(getenv("SCRIPT_NAME"), basename($route)) === false) {
            if (is_dir($route)) {
                if ($config["dirs"] === true)
                    $change = array_merge($change, replaceMaster($search, $replace, "{$route}/*", $config));
            } else {
                $oldFile = file_get_contents($route);
                $newFile = $oldFile;

                if (strpos($newFile, $search) !== false && !empty($search)) {
                    $change[] = [
                        "folder" => dirname($route),
                        "file" => basename($route),
                        "replace" => [
                            $search => $replace
                        ]
                    ];
                    $newFile = str_replace($search, $replace, $newFile);
                    file_put_contents($route, $newFile);
                }
            }
        }
    }
    return $config["returnCount"] ? array_merge($change, [
        "count" => count($change) - 1
    ]) : $change;
}


echo "<pre>", json_encode(replaceMaster("", ""), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT), "</pre>";
