<?php

class TeamsCalendarController {

    private $teamsCalendarManager;

    public function __construct($teamsCalendarManager) {
        $this->teamsCalendarManager = $teamsCalendarManager;
    }

    public function addTeamsCalendar() {
        $edit=0;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $teamsCalendar = new TeamsCalendar();
            $teamsCalendar->setDateMatch($_POST['dateMatch']);
            $teamsCalendar->setIdTeam($_POST['idTeam']);
            $teamsCalendar->setInTeam($_POST['inTeam']);
            $teamsCalendar->setMatchNumber($_POST['matchNumber']);
            $teamsCalendar->setOutTeam($_POST['outTeam']);
            $teamsCalendar->setScoreOut($_POST['scoreOut']);
            $teamsCalendar->setScoreIn($_POST['scoreIn']);
            $teamsCalendar->setTimeMatch($_POST['timeMatch']);
            $teamsCalendar->setTypeMatch($_POST['TypeMatch']);
            $teamsCalendar->setYearTeam($_POST['yearTeam']);
            try {
                $this->validate($teamsCalendar);
            } catch (Exception $e) {
                $_SESSION["error"] = $e->getMessage();
                return '/view/teamsCalendar/ajout-teamsCalendar.php';
            }
            $this->teamsCalendarManager->create($teamsCalendar);
            $_SESSION["flash"] = "Date Match de l'equipe    " . $teamsCalendar->getIdCalendar() . " ajouté avec succès";
            return "/view/bienvenue.php";
        }
        return '/view/teamsCalendar/ajout-teamsCalendar.php';
    }

    public function getById($id) {
        $user = $this->teamsCalendarManager->get($id);
        return $team;
    }

    public function listAll() {
        return $this->teamsCalendarManager->listAll();
    }

    public function listTeamsCalendar() {
        return '/view/teamsCalendar/list-teamsCalendar.php';
    }

    public function editTeamsCalendar() {
        $edit=1;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $teamsCalendar = new TeamsCalendar();
            $teamsCalendar->setIdCalendar($_POST['idCalendar']);
            $teamsCalendar->setDateMatch($_POST['dateMatch']);
            $teamsCalendar->setIdTeam($_POST['idTeam']);
            $teamsCalendar->setInTeam($_POST['inTeam']);
            $teamsCalendar->setMatchNumber($_POST['matchNumber']);
            $teamsCalendar->setOutTeam($_POST['outTeam']);
            $teamsCalendar->setScoreOut($_POST['scoreOut']);
            $teamsCalendar->setScoreIn($_POST['scoreIn']);
            $teamsCalendar->setTimeMatch($_POST['timeMatch']);
            $teamsCalendar->setTypeMatch($_POST['TypeMatch']);
            $teamsCalendar->setYearTeam($_POST['yearTeam']);

            try {
                $this->validate($teamsCalendar);
            } catch (Exception $e) {
                $_SESSION["error"] = $e->getMessage();
                $_GET["id"] = $teamsCalendar->getIdCalendar();

                return "/view/teamsCalendar/editer-teamsCalendar.php";
            }
            $this->teamsCalendarManager->update($teamsCalendar);


            $_SESSION["flash"] = "Date Match de l'equipe " . $teamsCalendar->getIdCalendar() . " édité avec succès";
            return "/view/bienvenue.php";
        }


        $id = $_GET["id"];
        $this->check($id);
        $_GET["idTeamCalendar"] = $id;

        if (!isset($id)) {
            return "/view/bienvenue.php";
        }

        return "/view/teamsCalendar/editer-teamsCalendar.php";
    }

    public function deleteTeamsCalendar($id) {
        $this->check($id);

        $this->teamsCalendarManager->deleteTeamsCalendar($id);
        if (!isset($_SESSION)) {
            session_destroy();
            session_start();
        }
        $_SESSION["flash"] = "Date Match de l'equipe " . $id . " supprimé avec succès";
        return '/view/bienvenue.php';
    }

    public function check($var) {
        if (!isset($var)) {
            header("Location: index.php");
        }
        return $var;
    }

    public function validate(TeamsCalendar $teamCalendar ,$edit) {
        $today = new DateTime();
        $date = date_parse($teamCalendar->getDateMatch());

        $now = new \DateTime();
       
        if ($teamCalendar->getYearTeam() > date_parse($now->format('Y-m-d H:i:s'))["year"] ) {
            throw new ValidationException("Year Team incorrect ");
        }


        if (!is_int(intval(($teamCalendar->getMatchNumber())))) {

            throw new ValidationException("Entrez un chiffre ou nombre entier MatchNumber");
        }


        if (!preg_match('/^[\pL\p{Mc} \'-]+$/u', $teamCalendar->getInTeam())) {
            throw new ValidationException("entrez du texte inTeam ");
        }
        
        
        if (!preg_match('/^[\pL\p{Mc} \'-]+$/u', $teamCalendar->getOutTeam())) {
            throw new ValidationException("entrez du texte outTeam");
        }

        if($edit==0){
         if ($this->teamsCalendarManager->validate($teamCalendar->getIdTeam(), $teamCalendar->getTypeMatch())) {
            throw new ValidationException("Le calendrier existe déjà!!");
        }
        }
    }

}
