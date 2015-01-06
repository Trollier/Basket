<?php
spl_autoload_register();

require_once "include.php";


$ioc = IOC::getInstance();
$router = new Router();
            

if (isset($_GET["action"])) {
    $action = $_GET["action"];
    include_once($router->includeTemplate($action));
} else {
    include_once($router->includeTemplate('bienvenue'));
}
