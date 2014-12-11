<?php

class Router {

    private $IOC;
    private $userController;
    private $playerController;
    private $staffController;
    private $roleTypeController;
    private $typesMatchController;
    public function __construct() {
        $this->IOC = IOC::getInstance();
        $this->userController = $this->IOC["userController"];
        $this->playerController = $this->IOC["playerController"]; 
        $this->staffController = $this->IOC["staffController"];
        $this->roleTypeController = $this->IOC["roleTypeController"];
        $this->typesMatchController = $this->IOC["typesMatchController"];
    }

    public function includeTemplate($action) {
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
        }

        switch ($action) {
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
            case 'delete-typeMatch': return $this->typesMatchController->editTypeMatch($id);
                
            default: return '/view/bienvenue.php';
        }
    }

}
