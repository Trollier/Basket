<?php
spl_autoload_register();

require_once "include.php";


$ioc = IOC::getInstance();
$router = new Router();
            

if (isset($_GET["action"])) {
    $action = $_GET["action"];
    require_once ($router->includeTemplate($action));
} else {
    require_once($router->includeTemplate('bienvenue'));
}
