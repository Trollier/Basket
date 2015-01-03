<?php

class TeamsDelegueController {
   
      private $teamsDelegueManager;

    public function __construct($teamsDelegueManager) {
        $this->teamsDelegueManager = $teamsDelegueManager;
    }

    public function addTeamsDelegue() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $teamsDelegue =new TeamsDelegue();
            $teamsDelegue->setIdDelegue($_POST['idDelegue']);
            $teamsDelegue->setIdTeam($_POST['idTeam']);
            $teamsDelegue->setMainDelegue($_POST['mainDelegue']);
            $teamsDelegue->setYearTeam($_POST['YearTeam']);
            $this->teamsDelegueManager->create($teamsDelegue);
            $_SESSION["flash"] = "Delegue de l'equipe    " . $teamsDelegue->getFirstname() . " ajouté avec succès";
            return "/view/bienvenue.php";
        }
        return '/view/teamsDelegue/ajout-teamsDelegue.php';
    }

    public function getById($id) {
        $user = $this->teamsDelegueManager->get($id);
        return $team;
    }

    public function listAll() {
        return $this->teamsDelegueManager->listAll();
    }

    public function listTeamsDelegue() {
        return '/view/teamsDelegue/list-teamsDelegue.php';
    }

    public function editTeamsDelegue() {
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $teamsDelegue =new TeamsDelegue();
            $teamsDelegue->setIdTeamDelegue($_POST['idTeamDelegue']);
            $teamsDelegue->setIdTeam($_POST['idTeam']);
            $teamsDelegue->setIdDelegue($_POST['idDelegue']);
            $teamsDelegue->setMainDelegue($_POST['mainDelegue']);
            $teamsDelegue->setYearTeam($_POST['YearTeam']);
           
            try {
                $this->validate($teamsDelegue);
            } catch (Exception $e) {
                $_SESSION["error"] = $e->getMessage();
                $_GET["idTeamDelegue"] = $teamsDelegue->getIdTeamDelegue();
 
                return "/view/teamsDelegue/editer-teamsDelegue.php";
            }
            $this->teamsDelegueManager->update($teamsDelegue);


            $_SESSION["flash"] = "Delegue de l'equipe " . $teamsDelegue->getIdTeamDelegue() . " édité avec succès";
            return "/view/bienvenue.php";
        }
        
      
        $id = $_GET["id"];
        $this->check($id);
        $_GET["idTeamDelegue"] = $id;

        if (!isset($id)) {
            return "/view/bienvenue.php";
        }

        return "/view/teamsDelegue/editer-teamsDelegue.php";
    }

    public function deleteTeamsDelegue($id) {
        $this->check($id);

        $this->teamsDelegueManager->deleteTeamsCoach($id);
        if (!isset($_SESSION)) {
            session_destroy();
            session_start();
        }
        $_SESSION["flash"] = "Delegue de l'equipe " . $id . " supprimé avec succès";
        return '/view/bienvenue.php';
    }


    public function check($var) {
        if (!isset($var)) {
            header("Location: index.php");
        }
        return $var;
    }

    public function validate($team) {
//        $team = new Teams();
//        if (strlen($team->getLabel()) < 2 || strlen($team->getLabel()) > 20) {
//            
//            throw new ValidationException("La taille du nom est incorrect");
//        }
//        if (strlen($team->getFirstname()) < 2 || strlen($team->getFirstname()) > 20) {
//            throw new ValidationException("La taille du prénom est incorrect");
//        }
//        if (!filter_var($team->getMail(), FILTER_VALIDATE_EMAIL)) {
//            throw new ValidationException("L'email est incorrect.");
//        }
//        if (!preg_match('/^[\pL\p{Mc} \'-]+$/u', $team->getName())) {
//            throw new ValidationException("Caractères incorrect dans le nom");
//        }
//        if (!preg_match('/^[\pL\p{Mc} \'-]+$/u', $team->getFirstname())) {
//            throw new ValidationException("Caractères incorrect dans le prénom");
//        }
//        if ($this->userManager->getByMail($team->getMail())) {
//            throw new ValidationException("L'email existe déjà!");
//        }
    }
}
