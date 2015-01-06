<?php
spl_autoload_register();
//form
require_once '/form/Form.php';
require_once '/form/ValidationException.php';
//config
require_once "/config/connectionSingleton.php";
require_once "/config/Router.php";

require_once "/config/IOC.php";
//domain
require_once "/domain/User.php";
require_once '/domain/Player.php';
require_once '/domain/Staff.php';
require_once '/domain/RoleType.php';
require_once '/domain/TypesMatchs.php';
require_once '/domain/DaysOfWeek.php';
require_once '/domain/StaffsRoleTypes.php';
require_once '/domain/Role.php';
require_once '/domain/Teams.php';
require_once '/domain/TeamsRanking.php';
require_once '/domain/TeamsCoach.php';
require_once '/domain/TeamsDelegue.php';
require_once '/domain/TeamsPlayers.php';
require_once '/domain/TeamsGames.php';
require_once '/domain/TeamsTraining.php';
require_once '/domain/TeamsCalendar.php';
//model
require_once "/model/UserManager.php";
require_once '/model/PlayerManager.php';
require_once '/model/StaffManager.php';
require_once '/model/RoleTypeManager.php';
require_once '/model/TypesMatchManager.php';
require_once '/model/DaysOfWeekManager.php';
require_once '/model/StaffsRoleTypesManager.php';
require_once '/model/RoleManager.php';
require_once '/model/TeamsManager.php';
require_once '/model/TeamsRankingManager.php';
require_once '/model/TeamsCoachManager.php';
require_once '/model/TeamsDelegueManager.php';
require_once '/model/TeamsPlayersManager.php';
require_once '/model/TeamsGamesManager.php';
require_once '/model/TeamsTrainingsManager.php';
require_once '/model/TeamsCalendarManager.php';
require_once '/model/LoginManager.php';
//controller
require_once "/controller/UserController.php";
require_once '/controller/PlayerController.php';
require_once '/controller/StaffController.php';
require_once '/controller/RoleTypeController.php';
require_once '/controller/TypesMatchController.php';
require_once '/controller/DaysOfWeekController.php';
require_once '/controller/StaffsRoleTypeController.php';
require_once '/controller/RoleController.php';
require_once '/controller/TeamsController.php';
require_once '/controller/TeamsRankingController.php';
require_once '/controller/TeamsCoachController.php';
require_once '/controller/TeamsDelegueController.php';
require_once '/controller/TeamsPlayersController.php';
require_once '/controller/TeamsGamesController.php';
require_once '/controller/TeamsTrainingController.php';
require_once '/controller/TeamsCalendarController.php';


