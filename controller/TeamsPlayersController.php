<?php

class TeamsPlayersController {
   
      private $teamsPlayerManager;

    public function __construct($teamsPlayerManager) {
        $this->teamsPlayerManager = $teamsPlayerManager;
    }

    public function addTeamsPlayer() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $teamsPlayer =new TeamsPlayers();
            $teamsPlayer->setIdTeam($_POST['idTeam']);
            $teamsPlayer->setIdPlayer($_POST['idPlayer']);
            $teamsPlayer->setNumber($_POST['number']);
            $teamsPlayer->setPosition($_POST['position']);
            $teamsPlayer->setYearTeam($_POST['YearTeam']);
            
            $this->teamsPlayerManager->create($teamsPlayer);
            $_SESSION["flash"] = "Joueur de l'equipe    " . $teamsPlayer->getName() . " ajouté avec succès";
            return "/view/bienvenue.php";
        }
        return '/view/teamsPlayer/ajout-teamsPlayer.php';
    }

    public function getById($id) {
        $user = $this->teamsPlayerManager->get($id);
        return $team;
    }

    public function listAll() {
        return $this->teamsPlayerManager->listAll();
    }

    public function listTeamsPlayer() {
        return '/view/teamsPlayer/list-teamsPlayer.php';
    }

    public function editTeamsPlayer() {
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $teamsPlayer =new TeamsPlayers();
            $teamsPlayer->setIdTeamPlayer($_POST['idTeamPlayer']);
            $teamsPlayer->setIdTeam($_POST['idTeam']);
            $teamsPlayer->setIdPlayer($_POST['idPlayer']);
            $teamsPlayer->setNumber($_POST['number']);
            $teamsPlayer->setPosition($_POST['position']);
            $teamsPlayer->setYearTeam($_POST['YearTeam']);
           
            try {
                $this->validate($teamsPlayer);
            } catch (Exception $e) {
                $_SESSION["error"] = $e->getMessage();
                $_GET["idTeamPlayer"] = $teamsPlayer->getIdTeamPlayer();
 
                return "/view/teamsPlayer/editer-teamsPlayer.php";
            }
            $this->teamsPlayerManager->update($teamsPlayer);


            $_SESSION["flash"] = "Joueur de l'equipe " . $teamsPlayer->getIdTeamPlayer() . " édité avec succès";
            return "/view/bienvenue.php";
        }
        
      
        $id = $_GET["id"];
        $this->check($id);
        $_GET["idTeamPlayer"] = $id;

        if (!isset($id)) {
            return "/view/bienvenue.php";
        }

        return "/view/teamsPlayer/editer-teamsPlayer.php";
    }

    public function deleteTeamsPlayer($id) {
        $this->check($id);

        $this->teamsPlayerManager->deleteTeamsPlayer($id);
        if (!isset($_SESSION)) {
            session_destroy();
            session_start();
        }
        $_SESSION["flash"] = "Joueur de l'equipe " . $id . " supprimé avec succès";
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
