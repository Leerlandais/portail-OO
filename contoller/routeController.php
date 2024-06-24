<?php
// BIENTÔT, JE VAIS CHANGER CECI EN ORIENTÉ AUSSI - c'est à dire que j'imagine que le route controller serait aussi un Class mais je ne vois pas comment le faire (jusqu'à présent) 


$selectLogs = $devlogManager->selectAll();
$selectPort = $portalManager->selectAllPortals();

 // ADD NEW LOG
 if (isset($_GET["addNewLog"])) {
    $title = "Add Log";
    require "../view/addLog.view.php";
    die();
}

if (isset($_POST["addLogDate"],
          $_POST["addLogText"])
    ) {
        $date = htmlspecialchars(trim(strip_tags($_POST["addLogDate"])));
        $text = htmlspecialchars(trim(strip_tags($_POST["addLogText"])));

        $addNewLog = $devlogManager->addNewLog($db, $date, $text);
        if(is_string($addNewLog)) {
            echo $addNewLog;
        }else if(!$addNewLog) {
            echo "Something went wrong with insertion of new log entry";
    }else {
        header('Location: ./');
    }

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

