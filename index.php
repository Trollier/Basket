<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
require_once("include.php");
?>
<html>
    <head>
        <meta charset="utf-8" />
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">

        <title>site</title>
    </head>
    <body>
        <div class="row-fluid">
            <div class="container-fluid">
                <div class="jumbotron">
                    <h1>site</h1>

                </div>
            </div>

        </div>

        <div class="row-fluid">

            <div class="col-sm-2 col-xs-2 col left-menu">

                <!-- Utilisateurs -->
                <div class="list-group">
                    <a href="index.php" class="list-group-item active">
                        Utilisateurs
                    </a>
                    <a href="index.php?action=ajout-user" class="list-group-item">Ajout</a>
                    <a href="index.php?action=list-user" class="list-group-item">Liste des utilisateurs</a> 
                </div>
                <!-- Players -->

                <div class="list-group">
                    <a href="index.php" class="list-group-item active">
                        Player
                    </a>
                    <a href="index.php?action=ajout-player" class="list-group-item">Ajout</a>
                    <a href="index.php?action=list-player" class="list-group-item">Liste des players</a> 


                </div>

                <div class="list-group">
                    <a href="index.php" class="list-group-item active">
                        Staff
                    </a>
                    <a href="index.php?action=ajout-staff" class="list-group-item">Ajout</a>
                    <a href="index.php?action=list-staff" class="list-group-item">Liste des staff</a> 


                </div>

                <div class="list-group">
                    <a href="index.php" class="list-group-item active">
                        RoleType
                    </a>
                    <a href="index.php?action=ajout-roleType" class="list-group-item">Ajout</a>
                    <a href="index.php?action=list-roleType" class="list-group-item">Liste des roleTypes</a> 
                </div>

                <div class="list-group">
                    <a href="index.php" class="list-group-item active">
                        StaffsRoleType
                    </a>
                    <a href="index.php?action=list-staff-roletype" class="list-group-item">Liste des StaffsroleTypes</a> 
                    <a href="index.php?action=ajout-staff-roletype" class="list-group-item">Ajout</a> 
                </div>

                <div class="list-group">
                    <a href="index.php" class="list-group-item active">
                        TypeMatch
                    </a>
                    <a href="index.php?action=ajout-typeMatch" class="list-group-item">Ajout</a>
                    <a href="index.php?action=list-typeMatch" class="list-group-item">Liste des types de matchs</a> 
                </div>


                <div class="list-group">
                    <a href="index.php" class="list-group-item active">
                        days of Week
                    </a>
                    <a href="index.php?action=ajout-daysOfWeek" class="list-group-item">Ajout</a>
                    <a href="index.php?action=list-daysOfWeek" class="list-group-item">Liste jours</a> 
                </div>

            </div>
            <div class="col-sm-10 col-xs-10 content">
                <div class="row-fluid">
                    <?php
                    $router = new Router();
                    if (isset($_GET["action"])) {
                        $action = $_GET["action"];

                        include_once($router->includeTemplate($action));
                    } else {
                        include_once($router->includeTemplate('bienvenue'));
                    }
                    ?>
                </div>
            </div>

        </div>




    </body>
</html>