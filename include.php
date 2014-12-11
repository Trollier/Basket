<?php
spl_autoload_register();
//form
require_once '/form/Form.php';
require_once '/form/ValidationException.php';
//config
require_once "/config/connectionSingleton.php";
require_once "/config/IOC.php";
require_once "/config/Router.php";
//domain
require_once "/domain/User.php";
require_once '/domain/Player.php';
require_once '/domain/Staff.php';
require_once '/domain/RoleType.php';
require_once '/domain/TypesMatchs.php';
//model
require_once "/model/UserManager.php";
require_once '/model/PlayerManager.php';
require_once '/model/StaffManager.php';
require_once '/model/RoleTypeManager.php';
require_once '/model/TypesMatchManager.php';
//controller
require_once "/controller/UserController.php";
require_once '/controller/PlayerController.php';
require_once '/controller/StaffController.php';
require_once '/controller/RoleTypeController.php';
require_once '/controller/TypesMatchController.php';

