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
    <p class="h1 mt-5">Delete Log Entry?</p>
    <p class="h4">ID : <?=$getLog["dev_id"]?></p>
    <p class="h4">Log : <?=$getLog["dev_log"]?></p>
    <p class="h6">Date : <?=$getLog["dev_date"]?></p>
    <badge class="bg-danger">Delete</badge>
    <a href="./"><badge class="bg-warning">Cancel</badge></a>
    

    </div>
<?php
var_dump($getLog);
?>

</body>
</html>