<?php

class TeamsRankingController {

    private $teamsRankingManager;

    public function __construct($teamsRankingManager) {
        $this->teamsRankingManager = $teamsRankingManager;
    }

    public function addTeamsRanking() {
        $edit = 0;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $teamsRanking = new TeamsRanking();
            $teamsRanking->setDateRanking($_POST['dateRanking']);
            $teamsRanking->setDeuce($_POST['deuce']);
            $teamsRanking->setIdTeam($_POST['idTeam']);
            $teamsRanking->setLost($_POST['lost']);
            $teamsRanking->setMyYear($_POST['myYear']);
            $teamsRanking->setName($_POST['name']);
            $teamsRanking->setPlayed($_POST['played']);
            $teamsRanking->setWin($_POST['win']);
            try {
                $this->validate($teamsRanking, $edit);
            } catch (Exception $e) {
                $_SESSION["error"] = $e->getMessage();

                return "/view/teamsRanking/ajout-teamsRanking.php";
            }
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
        $edit = 1;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $teamsRanking = new TeamsRanking();
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
                $this->validate($teamsRanking, $edit);
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

    public function validate(TeamsRanking $teamRanking, $edit) {

        if (!is_int(intval(($teamRanking->getDeuce())))) {

            throw new ValidationException("Entrez un chiffre ou nombre entier MatchNumber");
        }
        if (!is_int(intval(($teamRanking->getLost())))) {

            throw new ValidationException("Entrez un chiffre ou nombre entier MatchNumber");
        }
        if (!is_int(intval(($teamRanking->getPlayed())))) {

            throw new ValidationException("Entrez un chiffre ou nombre entier MatchNumber");
        }
        if (!is_int(intval(($teamRanking->getWin())))) {

            throw new ValidationException("Entrez un chiffre ou nombre entier MatchNumber");
        }

        $now = new \DateTime();

        if ($teamRanking->getMyYear() > date_parse($now->format('Y-m-d H:i:s'))["year"]) {
            throw new ValidationException("année incorrect ");
        }

        if (!preg_match('/^[\pL\p{Mc} \'-]+$/u', $teamRanking->getName())) {
            throw new ValidationException("Caractères incorrect dans le nom");
        }

        if (strlen($teamRanking->getName()) < 2 || strlen($teamRanking->getName()) > 20) {
            throw new ValidationException("La taille du prénom est incorrect");
        }

        if ($edit == 0) {
            if ($this->teamsRankingManager->validate($teamRanking->getIdTeam())) {
                throw new ValidationException("Le calendrier existe déjà!!");
            }
        }
    }

}
