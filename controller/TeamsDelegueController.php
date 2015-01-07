<?php

class TeamsDelegueController {

    private $teamsDelegueManager;

    public function __construct($teamsDelegueManager) {
        $this->teamsDelegueManager = $teamsDelegueManager;
    }

    public function addTeamsDelegue() {
        $edit=0;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $teamsDelegue = new TeamsDelegue();
            $teamsDelegue->setIdDelegue($_POST['idDelegue']);
            $teamsDelegue->setIdTeam($_POST['idTeam']);
            $teamsDelegue->setMainDelegue($_POST['mainDelegue']);
            $teamsDelegue->setYearTeam($_POST['YearTeam']);
            try {
                $this->validate($teamsDelegue,$edit);
            } catch (Exception $e) {
                $_SESSION["error"] = $e->getMessage();
                return "/view/teamsDelegue/ajout-teamsDelegue.php";
            }
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
        $edit=1;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $teamsDelegue = new TeamsDelegue();
            $teamsDelegue->setIdTeamDelegue($_POST['idTeamDelegue']);
            $teamsDelegue->setIdTeam($_POST['idTeam']);
            $teamsDelegue->setIdDelegue($_POST['idDelegue']);
            $teamsDelegue->setMainDelegue($_POST['mainDelegue']);
            $teamsDelegue->setYearTeam($_POST['YearTeam']);

            try {
                $this->validate($teamsDelegue,$edit);
            } catch (Exception $e) {
                $_SESSION["error"] = $e->getMessage();
                $_GET["id"] = $teamsDelegue->getIdTeamDelegue();

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

    public function validate(TeamsDelegue $teamsDelegue, $edit) {

        $now = new \DateTime();
        
        if ($teamsDelegue->getYearTeam() > date_parse($now->format('Y-m-d H:i:s'))["year"]) {
            throw new ValidationException("Year Team incorrect ");
        }
        
        if ($edit == 0) {
           
            if ($this->teamsDelegueManager->validate($teamsDelegue->getIdTeam(), $teamsDelegue->getIdDelegue())) {
                throw new ValidationException("Le delegue existe déjà!!");
            }
        }
    }

}
