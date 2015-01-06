<?php

$ioc = IOC::getInstance();
$loginManager = $ioc["loginManager"];
$router = new Router();

if (!$loginManager->isLoggedIn()) {
    include_once($router->includeTemplate("login"));
    die();
}else{
    //deja connecté
}
  
