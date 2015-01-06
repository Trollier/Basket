<?php

class Router {

    private $IOC;
    private $userController;
    private $playerController;
    private $staffController;
    private $roleTypeController;
    private $typesMatchController;
    private $daysOfWeekController;
    private $staffsRoleTypeController;
    private $roleController;
    private $teamsController;
    private $teamsRankingController;
    private $teamsCoachController;
    private $teamsDelegueController;
    private $teamsPlayerController;
    private $teamsGamesController;
    private $teamsTrainingController;
    private $teamsCalendarController;
    private $loginController;

    public function __construct() {
        $this->IOC = IOC::getInstance();
        $this->userController = $this->IOC["userController"];
        $this->playerController = $this->IOC["playerController"];
        $this->staffController = $this->IOC["staffController"];
        $this->roleTypeController = $this->IOC["roleTypeController"];
        $this->typesMatchController = $this->IOC["typesMatchController"];
        $this->daysOfWeekController = $this->IOC ["daysOfWeekController"];
        $this->staffsRoleTypeController = $this->IOC ["staffsRoleTypeController"];
        $this->roleController = $this->IOC ["roleController"];
        $this->teamsController = $this->IOC ["teamsController"];
        $this->teamsRankingController = $this->IOC["teamsRankingController"];
        $this->teamsCoachController = $this->IOC["teamsCoachController"];
        $this->teamsDelegueController = $this->IOC["teamsDelegueController"];
        $this->teamsPlayerController = $this->IOC["teamsPlayerController"];
        $this->teamsGamesController = $this->IOC["teamsGamesController"];
        $this->teamsTrainingController = $this->IOC["teamsTrainingController"];
        $this->teamsCalendarController = $this->IOC["teamsCalendarController"];
        $this->loginController = $this->IOC["loginController"];
    }

  

    public function includeTemplate($action) {
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
        }

        switch ($action) {
            case "login": return $this->loginController->login();
            case "logout": return $this->loginController->logout();
            case "ajout-user": return $this->userController->addUser();
            case 'list-user': return $this->userController->listUser();
            case 'edit-user': return $this->userController->editUser();
            case 'delete-user': return $this->userController->deleteUser($id);
            case 'activateUser': return $this->userController->activate($id);

            case "ajout-player": return $this->playerController->addPlayer();
            case"list-player": return $this->playerController->listPlayers();
            case "edit-player": return $this->playerController->editPlayer();
            case 'delete-player': return $this->playerController->deletePlayer($id);
            case 'activatePlayer': return $this->playerController->activatePlayer($id);

            case "ajout-staff": return $this->staffController->addStaff();
            case "list-staff": return $this->staffController->listStaff();
            case "edit-staff": return $this->staffController->editStaff();
            case 'delete-staff': return $this->staffController->deleteStaff($id);
            case 'activateStaff': return $this->staffController->activateStaff($id);

            case "ajout-roleType": return $this->roleTypeController->addRoleType();
            case "list-roleType": return $this->roleTypeController->listRoleType();
            case "edit-roleType": return $this->roleTypeController->editRoleType();
            case 'delete-roleType': return $this->roleTypeController->deleteRoleType($id);
            case 'activateRoleType': return $this->roleTypeController->activateRoleType($id);

            case "ajout-typeMatch": return $this->typesMatchController->addTypeMatch();
            case "list-typeMatch": return $this->typesMatchController->listTypeMatch();
            case "edit-typeMatch": return $this->typesMatchController->editTypeMatch();
            case 'delete-typeMatch': return $this->typesMatchController->deleteTypeMatch($id);

            case "ajout-daysOfWeek": return $this->daysOfWeekController->createDaysOfWeek();
            case "list-daysOfWeek": return $this->daysOfWeekController->listDaysOfWeek();
            case 'delete-daysOfWeek': return $this->daysOfWeekController->deleteDaysOfWeek($id);

            case "ajout-staff-roletype": return $this->staffsRoleTypeController->create();
            case "list-staff-roletype": return $this->staffsRoleTypeController->listAll();
            case "delete-staff-roletype": return $this->staffsRoleTypeController->delete($id);
            case "edit-staff-roletype": return $this->staffsRoleTypeController->edit();

            case "ajout-role": return $this->roleController->create();
            case "list-role": return $this->roleController->listAll();
            case "delete-role": return $this->roleController->delete($id);
            case "edit-role": return $this->roleController->edit();

            case "ajout-teams": return $this->teamsController->addTeams();
            case "list-teams": return $this->teamsController->listTeams();
            case "delete-teams": return $this->teamsController->deleteTeams($id);
            case "edit-teams": return $this->teamsController->editTeams();
            case 'activate-teams': return $this->teamsController->activateTeams($id);

            case "ajout-teamsRanking": return $this->teamsRankingController->addTeamsRanking();
            case "list-teamsRanking": return $this->teamsRankingController->listTeamsRanking();
            case "delete-teamsRanking": return $this->teamsRankingController->deleteTeamsRanking($id);
            case "edit-teamsRanking": return $this->teamsRankingController->editTeamsRanking();

            case "ajout-teamsCoach": return $this->teamsCoachController->addTeamsCoach();
            case "list-teamsCoach": return $this->teamsCoachController->listTeamsCoach();
            case "delete-teamsCoach": return $this->teamsCoachController->deleteTeamsCoach($id);
            case "edit-teamsCoach": return $this->teamsCoachController->editTeamsCoach();

            case "ajout-teamsDelegue": return $this->teamsDelegueController->addTeamsDelegue();
            case "list-teamsDelegue": return $this->teamsDelegueController->listTeamsDelegue();
            case "delete-teamsDelegue": return $this->teamsDelegueController->deleteTeamsDelegue($id);
            case "edit-teamsDelegue": return $this->teamsDelegueController->editTeamsDelegue();

            case "ajout-teamsPlayer": return $this->teamsPlayerController->addTeamsPlayer();
            case "list-teamsPlayer": return $this->teamsPlayerController->listTeamsPlayer();
            case "delete-teamsPlayer": return $this->teamsPlayerController->deleteTeamsPlayer($id);
            case "edit-teamsPlayer": return $this->teamsPlayerController->editTeamsPlayer();

            case "ajout-teamsGame": return $this->teamsGamesController->addTeamsGame();
            case "list-teamsGame": return $this->teamsGamesController->listTeamsGame();
            case "delete-teamsGame": return $this->teamsGamesController->deleteTeamsGame($id);
            case "edit-teamsGame": return $this->teamsGamesController->editTeamsGame();

            case "ajout-teamsTraining": return $this->teamsTrainingController->addTeamsTraining();
            case "list-teamsTraining": return $this->teamsTrainingController->listTeamsTraining();
            case "delete-teamsTraining": return $this->teamsTrainingController->deleteTeamsTraining($id);
            case "edit-teamsTraining": return $this->teamsTrainingController->editTeamsTraining();

            case "ajout-teamsCalendar": return $this->teamsCalendarController->addTeamsCalendar();
            case "list-teamsCalendar": return $this->teamsCalendarController->listTeamsCalendar();
            case "delete-teamsCalendar": return $this->teamsCalendarController->deleteTeamsCalendar($id);
            case "edit-teamsCalendar": return $this->teamsCalendarController->editTeamsCalendar();

            default: return '/view/bienvenue.php';
        }
    }

}
