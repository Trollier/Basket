<?php

class TeamsCoachController {

    private $teamsCoachManager;

    public function __construct($teamsCoachManager) {
        $this->teamsCoachManager = $teamsCoachManager;
    }

    public function addTeamsCoach() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $teamsCoach = new TeamsCoach();
            $teamsCoach->setIdTeam($_POST['idTeam']);
            $teamsCoach->setIdCoach($_POST['idCoach']);
            $teamsCoach->setCoachLicence($_POST['coachLicence']);
            $teamsCoach->setMainCoach($_POST['mainCoach']);
            $teamsCoach->setYearTeam($_POST['YearTeam']);
            $edit =0;
            try {
                $this->validate($teamsCoach);
            } catch (Exception $e) {
                $_SESSION["error"] = $e->getMessage();
                return "/view/teamsCoach/ajout-teamsCoach.php";
            }

            $this->teamsCoachManager->create($teamsCoach);
            $_SESSION["flash"] = "coach de l'equipe    " . $teamsCoach->getLabel() . " ajouté avec succès";
            return "/view/bienvenue.php";
        }
        return '/view/teamsCoach/ajout-teamsCoach.php';
    }

    public function getById($id) {
        $user = $this->teamsCoachManager->get($id);
        return $team;
    }

    public function listAll() {
        return $this->teamsCoachManager->listAll();
    }

    public function listTeamsCoach() {
        return '/view/teamsCoach/list-teamsCoach.php';
    }

    public function editTeamsCoach() {
          $edit =1;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $teamsCoach = new TeamsCoach();
            $teamsCoach->setIdTeam($_POST['idTeam']);
            $teamsCoach->setIdCoach($_POST['idCoach']);
            $teamsCoach->setCoachLicence($_POST['coachLicence']);
            $teamsCoach->setMainCoach($_POST['mainCoach']);
            $teamsCoach->setYearTeam($_POST['YearTeam']);
            $teamsCoach->setIdTeamCoach($_POST['idTeamCoach']);



            try {
                $this->validate($teamsCoach,$edit);
            } catch (Exception $e) {
                $_SESSION["error"] = $e->getMessage();
                $_GET["id"] = $teamsCoach->getIdTeamCoach();

                return "/view/teamsCoach/editer-teamsCoach.php";
            }
            $this->teamsCoachManager->update($teamsCoach);


            $_SESSION["flash"] = "Coach de l'equipe " . $teamsCoach->getIdTeamCoach() . " édité avec succès";
            return "/view/bienvenue.php";
        }


        $id = $_GET["id"];
        $this->check($id);
        $_GET["idTeamCoach"] = $id;

        if (!isset($id)) {
            return "/view/bienvenue.php";
        }

        return "/view/teamsCoach/editer-teamsCoach.php";
    }

    public function deleteTeamsCoach($id) {
        $this->check($id);

        $this->teamsCoachManager->deleteTeamsCoach($id);
        if (!isset($_SESSION)) {
            session_destroy();
            session_start();
        }
        $_SESSION["flash"] = "Coach de l'equipe " . $id . " supprimé avec succès";
        return '/view/bienvenue.php';
    }

    public function check($var) {
        if (!isset($var)) {
            header("Location: index.php");
        }
        return $var;
    }

    public function validate(TeamsCoach $teamcoach,$edit) {

        $now = new \DateTime();

        if ($teamcoach->getYearTeam() > date_parse($now->format('Y-m-d H:i:s'))["year"]) {
            throw new ValidationException("Year Team incorrect ");
        }     
        if($edit=0){
        if ($this->teamsCoachManager->validate($teamcoach->getIdTeam(), $teamcoach->getIdCoach())) {
            throw new ValidationException("Le  team-coach existe déjà!!");
        }
        }
    }

}
