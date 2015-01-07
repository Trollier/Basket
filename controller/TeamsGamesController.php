<?php

class TeamsGamesController {

    private $teamsGameManager;

    public function __construct($teamsGameManager) {
        $this->teamsGameManager = $teamsGameManager;
    }

    public function addTeamsGame() {
        $edit = 0;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $teamsGame = new TeamsGames();
            $teamsGame->setIdTeam($_POST['idTeam']);
            $teamsGame->setCurrentYear($_POST['currentYear']);
            $teamsGame->setGameDay($_POST['gameDay']);
            $teamsGame->setGameTime($_POST['gameTime']);
            try {
                $this->validate($teamsGame,$edit);
            } catch (Exception $e) {
                $_SESSION["error"] = $e->getMessage();

                return "/view/teamsGame/ajout-teamsGame.php";
            }
            $this->teamsGameManager->create($teamsGame);
            $_SESSION["flash"] = "Match    " . $teamsGame->getIdTeamGame() . " ajouté avec succès";
            return "/view/bienvenue.php";
        }
        return '/view/teamsGame/ajout-teamsGame.php';
    }

    public function getById($id) {
        $user = $this->teamsGameManager->get($id);
        return $team;
    }

    public function listAll() {
        return $this->teamsGameManager->listAll();
    }

    public function listTeamsGame() {
        return '/view/teamsGame/list-teamsGame.php';
    }

    public function editTeamsGame() {
        $edit = 1;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $teamsGame = new TeamsGames();
            $teamsGame->setIdTeamGame($_POST['idTeamGame']);
            $teamsGame->setIdTeam($_POST['idTeam']);
            $teamsGame->setCurrentYear($_POST['currentYear']);
            $teamsGame->setGameDay($_POST['gameDay']);
            $teamsGame->setGameTime($_POST['gameTime']);

            try {
                $this->validate($teamsGame,$edit);
            } catch (Exception $e) {
                $_SESSION["error"] = $e->getMessage();
                $_GET["idTeamGame"] = $teamsGame->getIdTeamGame();

                return "/view/teamsGame/editer-teamsGame.php";
            }
            $this->teamsGameManager->update($teamsGame);


            $_SESSION["flash"] = "Match " . $teamsGame->getIdTeamGame() . " édité avec succès";
            return "/view/bienvenue.php";
        }


        $id = $_GET["id"];
        $this->check($id);
        $_GET["idTeamGame"] = $id;

        if (!isset($id)) {
            return "/view/bienvenue.php";
        }

        return "/view/teamsGame/editer-teamsGame.php";
    }

    public function deleteTeamsGame($id) {
        $this->check($id);

        $this->teamsGameManager->deleteTeamsGame($id);
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

    public function validate(TeamsGames $teamsgame, $edit) {

        $now = new \DateTime();

        if ($teamsgame->getCurrentYear() > date_parse($now->format('Y-m-d H:i:s'))["year"]) {
            throw new ValidationException("Year Team incorrect ");
        }

        if ($edit == 0) {

            if ($this->teamsGameManager->validate($teamsgame->getIdTeam(), $teamsgame->getGameDay())) {
                throw new ValidationException("ce match existe déjà!!");
            }
        }
    }

}
