<?php

class TeamsRankingController {
   
      private $teamsRankingManager;

    public function __construct($teamsRankingManager) {
        $this->teamsRankingManager = $teamsRankingManager;
    }

    public function addTeamsRanking() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $teamsRanking =new TeamsRanking();
            $teamsRanking->setDateRanking($_POST['dateRanking']);
            $teamsRanking->setDeuce($_POST['deuce']);
            $teamsRanking->setIdTeam($_POST['idTeam']);
            $teamsRanking->setLost($_POST['lost']);
            $teamsRanking->setMyYear($_POST['myYear']);
            $teamsRanking->setName($_POST['name']);
            $teamsRanking->setPlayed($_POST['played']);
            $teamsRanking->setWin($_POST['win']);
            
            $this->teamsRankingManager->create($teamsRanking);
            $_SESSION["flash"] = "classement de l'equipe    " . $teamsRanking->getName() . " ajouté avec succès";
            return "/view/bienvenue.php";
        }
        return '/view/teamsRanking/ajout-teamsRanking.php';
    }

    public function getById($id) {
        $user = $this->teamsRankingManager->get($id);
        return $team;
    }

    public function listAll() {
        return $this->teamsRankingManager->listAll();
    }

    public function listTeamsRanking() {
        return '/view/teamsRanking/list-teamsRanking.php';
    }

    public function editTeamsRanking() {
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
           
            $teamsRanking =new TeamsRanking();
            $teamsRanking->setDateRanking($_POST['dateRanking']);
            $teamsRanking->setDeuce($_POST['deuce']);
            $teamsRanking->setIdRanking($_POST['idRanking']);
            $teamsRanking->setIdTeam($_POST['idTeam']);
            $teamsRanking->setLost($_POST['lost']);
            $teamsRanking->setMyYear($_POST['myYear']);
            $teamsRanking->setName($_POST['name']);
            $teamsRanking->setPlayed($_POST['played']);
            $teamsRanking->setWin($_POST['win']);

            try {
                $this->validate($teamsRanking);
            } catch (Exception $e) {
                $_SESSION["error"] = $e->getMessage();
                $_GET["idTeamsRanking"] = $teamsRanking->getIdRanking();
 
                return "/view/teamsRanking/editer-teamsRanking.php";
            }
            $this->teamsRankingManager->update($teamsRanking);


            $_SESSION["flash"] = "classement de l'equipe " . $teamsRanking->getName() . " édité avec succès";
            return "/view/bienvenue.php";
        }
        
      
        $id = $_GET["id"];
        $this->check($id);
        $_GET["idTeamsRanking"] = $id;

        if (!isset($id)) {
            return "/view/bienvenue.php";
        }

        return "/view/teamsRanking/editer-teamsRanking.php";
    }

    public function deleteTeamsRanking($id) {
        $this->check($id);

        $this->teamsRankingManager->deleteTeamsRanking($id);
        if (!isset($_SESSION)) {
            session_destroy();
            session_start();
        }
        $_SESSION["flash"] = "classement de l'equipe " . $id . " supprimé avec succès";
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
