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

    $selectLogs = $devlogManager->selectAll();
    if(isset($_POST["addLog"])) {
        $log = $_POST["addLog"];
        $test = new DevlogMapping($_POST); 
        $tryThis = $test->setDevLog($log);

        }


 
 if (isset($_GET["logVis"],
                 $_GET["logID"]
                 ) &&
            ctype_digit($_GET["logID"])
        ){
            if ($_GET["logVis"] != "Hide" && 
                $_GET["logVis"] != "Show") {
                    var_dump($_GET["logVis"],$_GET["logID"]);   
                    throw new Exception("That is not a valid input");
                    
                }
            $act = $_GET["logVis"];
            $id  = $_GET["logID"];
            $changeVis = $devlogManager->changeVisibilityofLog($db, $act, $id);
            if ($changeVis) header("Location: ./");
        }

        require "../view/showDevlogs.view.php";



$db = null;



