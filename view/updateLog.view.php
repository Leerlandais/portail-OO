<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("cdn/BS-JS.cdn.php"); ?>
    <link rel="stylesheet" href="styles/colours.css">
    <title><?=$title?></title>
</head>
<body>
    <form class="d-flex flex-column align-items-center justify-content-center" method="POST" action="" id="updateForm">
        <div class="row w-auto">
            <div class="col">
                <div class="form-group">
                    <input  type="text" 
                            class="form-control text-center d-none" 
                            name="updateLogID" 
                            id="updateLogID" 
                            aria-describedby="updateLogID" 
                            placeholder="<?=$getLog->getDevId()?>" 
                            value="<?=$getLog->getDevId()?>">
                </div>
                <div class="form-group">
                    <label for="updateLogDate">Date</label>
                    <input  type="text" 
                            class="form-control text-center" 
                            name="updateLogDate" 
                            id="updateLogDate" 
                            aria-describedby="updateLogDate" 
                            placeholder="<?=$getLog->getDevDate()?>"
                            value="<?=$getLog->getDevDate()?>">
                </div>
                
                <div class="form-group">
                    <label for="updateLogText">Log</label>
                    <input  type="text" 
                            class="form-control text-center" 
                            name="updateLogText" 
                            id="updateLogText" 
                            aria-describedby="updateLogText" 
                            placeholder="<?=$getLog->getDevLog()?>" 
                            value="<?=$getLog->getDevLog()?>">
                </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-dark rounded-pill mt-3" id="updateButton">Changer</button> 
                <badge class="btn btn-dark rounded-pill mt-3"><a href="./">Annuler</a></badge> 
            </div>
            <p class="h3 text-center text-warning" id="insertError"></p>
        </div>    
    </body>
    </html>