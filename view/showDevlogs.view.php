<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Development Logs</title>
</head>
<body>
    <h1>Development Logs</h1>
    <div>
        <?php
            if(is_null($selectLogs)) {
        ?>
        <h3>No Logs to Show</h3>
        <?php
            }else {
                foreach($selectLogs as $log){ 
        ?>
    <h4><?=$log->getDevId()?></h4>

        <?php
        }
    }
        ?>
    </div>
    
    <?php
// var_dump($db, $selectLogs);
    ?>
</body>
</html>