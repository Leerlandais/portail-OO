<?php
// BEAUCOUP DES CHOSES ICI VONT EST DEPLACER DANS DES AUTRES FICHIER

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

 require_once ("../contoller/routeController.php");


$db = null;



