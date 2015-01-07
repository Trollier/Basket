<?php

class TeamsTrainingController {
   
      private $teamsTrainingManager;

    public function __construct($teamsTrainingManager) {
        $this->teamsTrainingManager = $teamsTrainingManager;
    }

    public function addTeamsTraining() {
        $edit=0;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $teamsTraining =new TeamsTraining();
            $teamsTraining->setIdTeam($_POST['idTeam']);
            $teamsTraining->setCurrentYear($_POST['currentYear']);
            $teamsTraining->setDayOfWeek($_POST['DayOfWeek']);
            $teamsTraining->setStartTime($_POST['startTime']);
            $teamsTraining->setEndTime($_POST['EndTime']);
            $teamsTraining->setRoom($_POST['Room']);
            try {
                $this->validate($teamsTraining,$edit);
            } catch (Exception $e) {
                $_SESSION["error"] = $e->getMessage();
               
 
                return "/view/teamsTraining/ajout-teamsTraining.php";
            }
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
        $edit=1;
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
                $this->validate($teamsTraining,$edit);
            } catch (Exception $e) {
                $_SESSION["error"] = $e->getMessage();
                $_GET["id"] = $teamsTraining->getIdTraining();
 
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

    public function validate(TeamsTraining $teamsTraining, $edit) {

        $now = new \DateTime();

        if ($teamsTraining->getCurrentYear() > date_parse($now->format('Y-m-d H:i:s'))["year"]) {
            throw new ValidationException("Year Team incorrect ");
        }

        if (strlen($teamsTraining->getRoom()) < 2 || strlen($teamsTraining->getRoom()) > 50) {
            throw new ValidationException("La taille dde position est incorect");
        }
        
        $start= strtotime($teamsTraining->getStartTime());
        $end= strtotime($teamsTraining->getEndTime());
        if($start > $end){
            throw new ValidationException("La date de début est supérieure à la date de fin!");
        }
        if ($edit == 0) {
            
            if ($this->teamsTrainingManager->validate($teamsTraining->getIdTeam(), $teamsTraining->getDayOfWeek())) {
                throw new ValidationException("cet entrainement existe déjà!!");
            }
        }
        
        
    }
}
