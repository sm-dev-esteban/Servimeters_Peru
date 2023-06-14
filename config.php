<?php
define("FOLDERSIDE", str_replace("\\", "/", __DIR__) . "/");
define("SERVERSIDE", str_replace(getenv("DOCUMENT_ROOT"), getenv("REQUEST_SCHEME") . "://" . getenv("HTTP_HOST"), FOLDERSIDE));
