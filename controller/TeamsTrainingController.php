<?php

class TeamsTrainingController {
   
      private $teamsTrainingManager;

    public function __construct($teamsTrainingManager) {
        $this->teamsTrainingManager = $teamsTrainingManager;
    }

    public function addTeamsTraining() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $teamsTraining =new TeamsTraining();
            $teamsTraining->setIdTeam($_POST['idTeam']);
            $teamsTraining->setCurrentYear($_POST['currentYear']);
            $teamsTraining->setDayOfWeek($_POST['DayOfWeek']);
            $teamsTraining->setStartTime($_POST['startTime']);
            $teamsTraining->setEndTime($_POST['EndTime']);
            $teamsTraining->setRoom($_POST['Room']);
            var_dump($teamsTraining);
            $this->teamsTrainingManager->create($teamsTraining);
            $_SESSION["flash"] = "Match    " . $teamsTraining->getIdTraining() . " ajouté avec succès";
            return "/view/bienvenue.php";
        }
        return '/view/teamsTraining/ajout-teamsTraining.php';
    }

    public function getById($id) {
        $user = $this->teamsTrainingManager->get($id);
        return $team;
    }

    public function listAll() {
        return $this->teamsTrainingManager->listAll();
    }

    public function listTeamsTraining() {
        return '/view/teamsTraining/list-teamsTraining.php';
    }

    public function editTeamsTraining() {
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $teamsTraining = new TeamsTraining();
            
            $teamsTraining->setIdTraining($_POST['idTraining']);
            $teamsTraining->setIdTeam($_POST['idTeam']);
            $teamsTraining->setCurrentYear($_POST['currentYear']);
            $teamsTraining->setDayOfWeek($_POST['DayOfWeek']);
            $teamsTraining->getStartTime($_POST['startTime']);
            $teamsTraining->setEndTime($_POST['EndTime']);
            $teamsTraining->setRoom($_POST['Room']);
           
            try {
                $this->validate($teamsTraining);
            } catch (Exception $e) {
                $_SESSION["error"] = $e->getMessage();
                $_GET["idTraining"] = $teamsTraining->getIdTeamGame();
 
                return "/view/teamsTraining/editer-teamsTraining.php";
            }
            $this->teamsTrainingManager->update($teamsTraining);


            $_SESSION["flash"] = "Match " . $teamsTraining->getIdTraining() . " édité avec succès";
            return "/view/bienvenue.php";
        }
        
      
        $id = $_GET["id"];
        $this->check($id);
        $_GET["idTraining"] = $id;

        if (!isset($id)) {
            return "/view/bienvenue.php";
        }

        return "/view/teamsTraining/editer-teamsTraining.php";
    }

    public function deleteTeamsTraining($id) {
        $this->check($id);

        $this->teamsTrainingManager->deleteTeamsTraining($id);
        if (!isset($_SESSION)) {
            session_destroy();
            session_start();
        }
        $_SESSION["flash"] = "Match " . $id . " supprimé avec succès";
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
