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
<div class="container d-flex flex-column align-items-center pt-5">
<p class="h1 mt-5">Add Log Entry?</p>
    <form class="d-flex flex-column align-items-center justify-content-center" method="POST" action="./">

            <div class="col">

                <div class="form-group">
                    <label for="addLogDate">Date</label>
                    <input  type="text" 
                            class="form-control text-center" 
                            name="addLogDate">
                </div>
                
                <div class="form-group">
                    <label for="addLogText">Log</label>
                    <input  type="text" 
                            class="form-control text-center" 
                            name="addLogText">
                </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-dark rounded-pill mt-3">Add</button> 
                <badge class="btn btn-dark rounded-pill mt-3"><a href="./">Cancel</a></badge> 
            </div>
        </div>  

    </form>
</div>
    </body>
    </html>