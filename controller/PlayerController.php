<?php

class PlayerController {

    private $playerManager;

    public function __construct($playerManager) {
        $this->playerManager = $playerManager;
    }

    public function addPlayer() {
        $edit=0;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $player = new Player();

            $player->setName($_POST['name']);
            $player->setFirstname($_POST['firstname']);
            $player->setBirthdate($_POST['date']);
            $player->setEmail($_POST['mail']);
            try {
                $this->validate($player,$edit);
            } catch (Exception $e) {
                $_SESSION["error"] = $e->getMessage();
                return '/view/player/ajout-player-form.php';
            }


            $this->playerManager->createPlayer($player);
            $_SESSION["flash"] = "Joueur" . $player->getName() . " ajouté avec succès";
            return "/view/bienvenue.php";
        }
        return '/view/player/ajout-player-form.php';
    }

    public function getById($id) {
        $user = $this->playerManager->get($id);
        return $user;
    }

    public function listAll() {
        return $this->playerManager->listAllPlayers();
    }

    public function listPlayers() {
        return '/view/player/list-player.php';
    }

    public function editPlayer() {
        $edit=1;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $player = new Player();

            $player->setName($_POST['name']);
            $player->setIdPlayer($_POST['idPlayer']);
            $player->setFirstname($_POST['firstname']);
            $player->setBirthdate($_POST['date']);
            $player->setEmail($_POST['mail']);
            try {
                $this->validate($player,$edit);
            } catch (Exception $e) {
                $_SESSION["error"] = $e->getMessage();
                $_GET["idPlayer"] = $player->getIdPlayer();
                return "/view/player/editer-player.php";
            }

            $this->playerManager->updatePlayer($player);


            $_SESSION["flash"] = "Joueur " . $player->getName() . " édité avec succès";
            return "/view/bienvenue.php";
        }
        $id = $_GET["id"];
        $this->check($id);
        $_GET["idPlayer"] = $id;

        if (!isset($id)) {
            return "/view/bienvenue.php";
        }

        return "/view/player/editer-player.php";
    }

    public function deletePlayer($id) {
        $this->check($id);

        $this->playerManager->deletePlayer($id);
        if (!isset($_SESSION)) {
            session_destroy();
            session_start();
        }
        $_SESSION["flash"] = "Joueur " . $id . " supprimé avec succès";
        return '/view/bienvenue.php';
    }

    public function activatePlayer($id) {
        $this->check($id);

        $player = $this->playerManager->get($id);
        $player->setActive($_GET["isActived"]);
        $this->playerManager->updatePlayer($player);
        return '/view/player/list-player.php';
    }

    public function check($var) {
        if (!isset($var)) {
            header("Location: index.php");
        }
        return $var;
    }

    public function validate(Player $player,$edit) {
        $date = date_parse($player->getBirthdate());
        $now = new \DateTime();
        if (!($date["error_count"] == 0 && checkdate($date["month"], $date["day"], $date["year"]))) {
            throw new ValidationException("Date de naissance invalide!");
        }
        if ($date["year"] < 1900 || $date["year"] > date_parse($now->format('Y-m-d H:i:s'))["year"]-3) {
            throw new ValidationException("Date de naissance incorrect! Année min: 1900, année max: "
            . (date_parse($now->format('Y-m-d H:i:s'))["year"]-3));
        }

        if (!filter_var($player->getEmail(), FILTER_VALIDATE_EMAIL)) {
            throw new ValidationException("L'email est incorrect.");
        }

        if (strlen($player->getName()) < 2 || strlen($player->getName()) > 20) {

            throw new ValidationException("La taille du nom est incorrect");
        }
        if (strlen($player->getFirstname()) < 2 || strlen($player->getFirstname()) > 20) {
            throw new ValidationException("La taille du prénom est incorrect");
        }
        if (!filter_var($player->getEmail(), FILTER_VALIDATE_EMAIL)) {
            throw new ValidationException("L'email est incorrect.");
        }
        if (!preg_match('/^[\pL\p{Mc} \'-]+$/u', $player->getName())) {
            throw new ValidationException("Caractères incorrect dans le nom");
        }
        if (!preg_match('/^[\pL\p{Mc} \'-]+$/u', $player->getFirstname())) {
            throw new ValidationException("Caractères incorrect dans le prénom");
        }
        
        if($edit==0){
        if ($this->playerManager->getByMail($player)) {
            throw new ValidationException("Le joueur existe déjà!");
        }
        }
    }

}
