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


if (isset($_GET["addNewLog"])) {
    require "../view/addLog.view.php";
    die();
}


// CHANGE VISIBILITE D'UN DEVLOG
    if (isset($_GET["logVis"],
    $_GET["logID"]
    ) &&
    ctype_digit($_GET["logID"])
    ){
   if ($_GET["logVis"] != "Hide" && 
       $_GET["logVis"] != "Show")  
   throw new Exception("That is not a valid input");
           
   $act = $_GET["logVis"];
   $id  = $_GET["logID"];
   $changeVis = $devlogManager->changeVisibilityofLog($db, $act, $id);
   if ($changeVis) header("Location: ./");

}


// PREPARE LOG POUR SUPPRESSION
    if (isset($_GET["logDel"],
              $_GET["logID"]
             ) &&
             ctype_digit($_GET["logID"])
        ) {
            $id = $_GET["logID"];
            $getLog = $devlogManager->getOneLog($db, $id);
            if (!is_object($getLog)) {
                echo "Something went wrong getting the log";
            }else {
                $title = "Delete Log";
                require "../view/deleteLog.view.php";
                die();
            }
        }

// SUPPRESSION DU LOG
    if (isset($_POST["deleteLog"])
        && ctype_digit($_POST["deleteLog"])
    ) {
        $id = $_POST["deleteLog"];

        $deleteLog = $devlogManager->deleteLogByID($db, $id);
        if ($deleteLog != true) {
            echo "SOMETHING WENT WRONG WITH DELETION";
        }else {
            header("Location: ./");
        }

    }

// PREPARE LOG POUR MISE À JOUR
    if (isset($_GET["logMaj"],
              $_GET["logID"]
              ) &&
              ctype_digit($_GET["logID"])
        ) {
            $id = $_GET["logID"];
            $getLog = $devlogManager->getOneLog($db, $id);
      
            if (!is_object($getLog)) {
                echo "Something went wrong getting the log";
            }else {
                $title = "Update Log";
                require "../view/updateLog.view.php";
                die();
            }
        }

// MISE À JOUR D'UN LOG
    if (isset($_POST["updateLogID"],
              $_POST["updateLogDate"],
              $_POST["updateLogText"]
              ) &&
            ctype_digit($_POST["updateLogID"])
        ) {
            $id   = intval($_POST["updateLogID"]);
            $date = htmlspecialchars(strip_tags(trim($_POST["updateLogDate"])));
            $text = htmlspecialchars(strip_tags(trim($_POST["updateLogText"])));

            $updateLog = $devlogManager->updateOneLog($db, $id, $date, $text);
            if (is_string($updateLog)){
                echo $updateLog;
            }else if (!$updateLog) {
                 echo "Something went wrong with the update";
            }else {
                header("Location: ./");
                die();
            }
            
        }
        
$title = "Development Logs";
require "../view/showDevlogs.view.php";

$db = null;



