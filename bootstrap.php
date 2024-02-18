<?php
define("_DIR_ROOT", __DIR__);
define("_DIR_ASSETS", "../../../../Public/");

// xử lí http root
if (isset($_SERVER["HTTPS"])) {
    if ($_SERVER["HTTPS"] == "on") {
        $web_root = "https://" . $_SERVER['HTTP_HOST'];
    }
} else {
    $web_root = "http://" . $_SERVER['HTTP_HOST'];
}
define('_WEB_ROOT', $web_root);

// tu dong load config
$config_dir = scandir("Configs");
if (!empty($config_dir)) {
    foreach ($config_dir as $file) {
        if ($file != '.' && $file != '..' && file_exists('Configs/' . $file)) {
            require_once 'Configs/' . $file;
        }
    }
}
// echo "<pre>";
// print_r($config_dir);
// echo "</pre>";

require_once("Core/Route.php");
require_once("Core/Session.php");
require_once("./App/App.php"); //load app
// kiem tra config va load database
if (!empty($config['database'])) {
    $db_config = array_filter($config['database']);

    if (!empty($db_config)) {
        require_once "Core/Connection.php";
        require_once "Core/QueryBuilder.php";
        require_once "Core/Database.php";
        require_once "Core/DB.php";
    }
}
// load core helper
require_once("Core/Helper.php");
// load all helper
$allHelper = scandir("App/Helpers");
if (!empty($allHelper)) {
    foreach ($allHelper as $file) {
        if ($file != '.' && $file != '..' && file_exists('App/Helpers/' . $file)) {
            require_once 'App/Helpers/' . $file;
        }
    }
}
// echo "<pre>";
// print_r($allHelper);
// echo "</pre>";
require_once("./Core/Model.php");
require_once("./Core/Controller.php"); //load base controller
require_once("Core/Request.php");
require_once("Core/Response.php");
