<?php

class TeamsPlayersController {

    private $teamsPlayerManager;

    public function __construct($teamsPlayerManager) {
        $this->teamsPlayerManager = $teamsPlayerManager;
    }

    public function addTeamsPlayer() {
        $edit = 0;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $teamsPlayer = new TeamsPlayers();
            $teamsPlayer->setIdTeam($_POST['idTeam']);
            $teamsPlayer->setIdPlayer($_POST['idPlayer']);
            $teamsPlayer->setNumber($_POST['number']);
            $teamsPlayer->setPosition($_POST['position']);
            $teamsPlayer->setYearTeam($_POST['YearTeam']);
            try {
                $this->validate($teamsPlayer, $edit);
            } catch (Exception $e) {
                $_SESSION["error"] = $e->getMessage();

                return "/view/teamsPlayer/ajout-teamsPlayer.php";
            }
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
        $edit = 1;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $teamsPlayer = new TeamsPlayers();
            $teamsPlayer->setIdTeamPlayer($_POST['idTeamPlayer']);
            $teamsPlayer->setIdTeam($_POST['idTeam']);
            $teamsPlayer->setIdPlayer($_POST['idPlayer']);
            $teamsPlayer->setNumber($_POST['number']);
            $teamsPlayer->setPosition($_POST['position']);
            $teamsPlayer->setYearTeam($_POST['YearTeam']);

            try {
                $this->validate($teamsPlayer, $edit);
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

    public function validate(TeamsPlayers $teamsplayer, $edit) {

        $now = new \DateTime();

        if ($teamsplayer->getYearTeam() > date_parse($now->format('Y-m-d H:i:s'))["year"]) {
            throw new ValidationException("Year Team incorrect ");
        }
        if (!is_int(intval(($teamsplayer->getNumber())))) {
            throw new ValidationException("Entrez un nombre ");
        }
        if (strlen($teamsplayer->getPosition()) < 2 || strlen($teamsplayer->getPosition()) > 50) {
            throw new ValidationException("La taille dde position est incorect");
        }
        if (!preg_match('/^[\pL\p{Mc} \'-]+$/u', $teamsplayer->getPosition())) {
            throw new ValidationException("Caractères incorrect dans position");
        }
       
        if ($edit == 0) {
            
            if ($this->teamsPlayerManager->validate($teamsplayer->getIdTeam(), $teamsplayer->getIdPlayer())) {
                throw new ValidationException("ce joueur existe déjà!!");
            }
        }
    }

}
