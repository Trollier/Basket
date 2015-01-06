<?php

class TeamsCalendarController {
   
      private $teamsCalendarManager;

    public function __construct($teamsCalendarManager) {
        $this->teamsCalendarManager = $teamsCalendarManager;
    }

    public function addTeamsCalendar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $teamsCalendar =new TeamsCalendar();
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
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $teamsCalendar =new TeamsCalendar();
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
                $_GET["idTeamCalendar"] = $teamsCalendar->getIdTeamPlayer();
 
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
