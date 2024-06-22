<?php



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

    require "../view/showDevlogs.view.php";

