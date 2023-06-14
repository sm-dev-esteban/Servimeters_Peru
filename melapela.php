<?php
function replaceMaster($folder, $search, $replace, $i = 0)
{
    $change = [];
    $all_files = glob($folder);

    foreach ($all_files as $recover) {
        $i += 1;
        if (is_dir($recover)) {
            $change = array_merge($change, replaceMaster("{$recover}/*", $search, $replace, $i));
        } else {
            $file = "";
            $newFile = "";

            $file = file_get_contents($recover);
            $newFile = $file;

            if (strpos($newFile, $search) !== false && !empty($search)) {
                $change[$i] = [
                    "folder" => dirname($recover),
                    "file" => basename($recover),
                    "replace" => [
                        $search => $replace
                    ]
                ];
                $newFile = str_replace($search, $replace, $newFile);
                file_put_contents($recover, $newFile);
            }
        }
    }
    return array_merge($change, [
        "count" => count($change) - 1
    ]);
}


echo "<pre>", json_encode(replaceMaster("./*", "<?= SERVERSIDE ?>Auditor", "<?= SERVERSIDE ?>Auditor"), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT), "</pre>";
