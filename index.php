<?php
session_start();
include('./config.php');
if (isset($_SESSION['habilitado']) && strcmp('on', $_SESSION['habilitado']) === 0) {
    include('./Controllers/template.controller.php');
    include('./Controllers/session.controller.php');
    include('./Views/template.php');
} else {
    include('./Views/pages/loguin/loguin.php');
}
