<?php

class TeamsController {

    private $teamsManager;

    public function __construct($teamsManager) {
        $this->teamsManager = $teamsManager;
    }

    public function addTeams() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $team = new Teams();
            $team->setAgeMax($_POST['ageMax']);
            $team->setAgeMin($_POST['ageMin']);
            $team->setGodFather($_POST['godFather']);
            $team->setLabel($_POST['label']);
            $team->setOrdre($_POST['ordre']);
            
            $this->teamsManager->create($team);
            $_SESSION["flash"] = "équipe" . $team->getLabel() . " ajouté avec succès";
            return "/view/bienvenue.php";
        }
        return '/view/teams/ajout-teams.php';
    }

    public function getById($id) {
        $user = $this->teamsManager->get($id);
        return $team;
    }

    public function listAll() {
        return $this->teamsManager->listAll();
    }

    public function listTeams() {
        return '/view/teams/list-teams.php';
    }

    public function editTeams() {
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
           
            $team =new Teams();
            $team->setIdTeam($_POST['idTeam']);
            $team->setAgeMax($_POST['ageMax']);
            $team->setAgeMin($_POST['ageMin']);
            $team->setGodFather($_POST['godFather']);
            $team->setLabel($_POST['label']);
            $team->setOrdre($_POST['ordre']);
            try {
                $this->validate($team);
            } catch (Exception $e) {
                $_SESSION["error"] = $e->getMessage();
                $_GET["idTeam"] = $team->getIdTeam();
 
                return "/view/teams/editer-teams.php";
            }
           
            $this->teamsManager->update($team);


            $_SESSION["flash"] = "équipe " . $team->getLabel() . " édité avec succès";
            return "/view/bienvenue.php";
        }
        
      
        $id = $_GET["id"];
        $this->check($id);
        $_GET["idTeam"] = $id;

        if (!isset($id)) {
            return "/view/bienvenue.php";
        }

        return "/view/teams/editer-teams.php";
    }

    public function deleteTeams($id) {
        $this->check($id);

        $this->teamsManager->deleteTeam($id);
        if (!isset($_SESSION)) {
            session_destroy();
            session_start();
        }
        $_SESSION["flash"] = "équipe " . $id . " supprimé avec succès";
        return '/view/bienvenue.php';
    }

    public function activateTeams($id) {
        $this->check($id);
      
        $team = $this->teamsManager->get($id);
       
        $team->setActive($_GET["isActived"]);
        $this->teamsManager->update($team);
        return '/view/teams/list-teams.php';
    }

    public function check($var) {
        if (!isset($var)) {
            header("Location: index.php");
        }
        return $var;
    }

    public function validate(Teams $team) {
        if (!is_int($team->getAgeMin()) || !is_int($team->getAgeMax())) {
            
            throw new ValidationException("AgeMin ou Agemax invalide!");
        }
          if ($team->getAgeMin() < 3 || $team->getAgeMax() > 99) {
            
            throw new ValidationException("AgeMin doit être supérieur à 3 et Agemax inférieur à 99!");
        }
    }

}

