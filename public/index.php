<?php

// session
session_start();

use model\OurPDO;
use model\Manager\DevlogManager;
use model\Mapping\DevlogMapping;

require_once "../config.php";

spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);
    require PROJECT_DIRECTORY.'/' .$class . '.php';
});



$db = OurPDO::getInstance( DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME.";port=".DB_PORT.";charset=".DB_CHARSET,
DB_LOGIN,
DB_PWD);


 $devlogManager = new DevlogManager($db);

 if(empty($_GET)){

    $selectLogs = $devlogManager->selectAll();

    if(isset($_POST["addLog"])) {
        $log = $_POST["addLog"];
        $test = new DevlogMapping($_POST);
        
        $tryThis = $test->setDevLog($log);


        }
    

    require "../view/showDevlogs.view.php";
    die();
 }

include ("../view/home.view.php");


$db = null;



