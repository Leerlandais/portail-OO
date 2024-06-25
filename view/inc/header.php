<div class="headerDiv" id="myHeader">
    <div class="navLinks">
        <?php
   //     var_dump($db);
    if (isset($_GET["p"])) {
        switch($_GET["p"]) {
            case 'home':
                ?>

            <a href="?p=logs"><h4>Logs</h4></a>
            <a href="?p=port"><h4>Portals</h4></a>
                <?php
                break;
                case 'logs':
                    ?>
                <a href="?p=home"><h4>Home</h4></a>
                <a href="?p=port"><h4>Portals</h4></a>
                <?php
                break;
                case 'port':
                    ?>
                <a href="?p=home"><h4>Home</h4></a>
                <a href="?p=logs"><h4>Logs</h4></a>
                <?php
                break;
                default:
                header("Location: ?p=home");
                exit();
            }
    }else {
        ?>
        <a href="?p=logs"><h4>Logs</h4></a>
        <a href="?p=port"><h4>Portals</h4></a>
<?php
}
    ?>
    </div>
</div>