<?php

// session
session_start();

use model\OurPDO;
use model\Manager\DevlogManager;
use model\Mapping\DevlogMapping;

// Appel de la config
require_once "../config.php";



// our autoload
spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);
    require PROJECT_DIRECTORY.'/' .$class . '.php';
});


// connect database
$db = OurPDO::getInstance( DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME.";port=".DB_PORT.";charset=".DB_CHARSET,
DB_LOGIN,
DB_PWD);


 $devlogManager = new DevlogManager($db);

 if(empty($_GET)){
    // all comments
    $selectLogs = $devlogManager->selectAll();
    // view
    require "../view/showDevlogs.view.php";
    die();
 }

include ("../view/home.view.php");


$db = null;