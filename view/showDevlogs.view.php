<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php include("cdn/BS-JS.cdn.php"); ?>
        <link rel="stylesheet" href="styles/colours.css">
        <title>Development Logs</title>
    </head>
    <body>
        <p class="h1">Development Logs</p>
        
        <form action="" method="post">
            <label for="addLog">Log : </label>
            <textarea name="addLog" id="addLog" cols="30" rows="10"></textarea>
            <input type="submit" value="Add">
        </form>
        <div>
            <?php
            if (isset($tryThis) && $tryThis) {
                echo $test->getDevLog();
            }             
            if(is_null($selectLogs)) {
                ?>
        <h3>No Logs to Show</h3>
        <?php
            }else {
                ?>
    <div class="container">
        <div class="table-responsive"> 
            <table class="table table-bordered table-striped text-center" data-toggle="table" data-show-columns="true" data-search="true"data-pagination="true">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">Date</th>
                        <th class="text-center">Log</th>
                        <th class="text-center">Visible</th>
                        <th class="text-center">Update</th>
                        <th class="text-center">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                foreach ($selectLogs as $log) {
                    $action = $log->getDevVisible();
                    $action == 1 ? $action = "Hide" : $action = "Show";
                    ?>
                <tr>
                    <td><?=$log->getDevId()?></td>
                    <td><?=$log->getDevDate()?></td>
                    <td><?=$log->getDevLog()?></td>  
                    <td><a href="?logVis=<?=$action?>&logID=<?=$log->getDevId()?>"><?= $action ?></a></td>  
                    <td><a href="?logMaj&logID=<?=$log->getDevId()?>">Update</a></td>  
                    <td><a href="?logDel&logID=<?=$log->getDevId()?>">Delete</a></td>  
                </tr>
                <?php
          }                                     
          ?>
        </tbody>
    </table>
    
</div>
</div>

<?php
        }
        
        ?>
    </div>
    
    <?php
// var_dump($db, $selectLogs);
?>

</body>
</html>