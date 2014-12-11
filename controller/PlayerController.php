<?php

class PlayerController {

    private $playerManager;

    public function __construct($playerManager) {
        $this->playerManager = $playerManager;
    }

    public function addPlayer() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $player = new Player();

            $player->setName($_POST['name']);
            $player->setFirstname($_POST['firstname']);
            $player->setBirthdate($_POST['date']);
            $player->setEmail($_POST['mail']);
          
          

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
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $player = new Player();

            $player->setName($_POST['name']);
            $player->setIdPlayer($_POST['idPlayer']);
            $player->setFirstname($_POST['firstname']);
            $player->setBirthdate($_POST['date']);
            $player->setEmail($_POST['mail']);


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

    

}
