<?php

$ioc = IOC::getInstance();
$loginManager = $ioc["loginManager"];
$router = new Router();

if (!$loginManager->isLoggedIn()) {
    include_once($router->includeTemplate("bienvenue"));
    die();
}else{
    //deja connecté
}
  
