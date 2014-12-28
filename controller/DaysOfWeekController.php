<?php

class DaysOfWeekController {
    private $daysOfWeekManager;

    public function __construct($daysOfWeekManager) {
        $this->daysOfWeekManager = $daysOfWeekManager;
    }

    public function createDaysOfWeek() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $daysOfWeek = new DaysOfWeek();
            $daysOfWeek->setLabel($_POST["label"]);
                        
            $this->daysOfWeekManager->createDaysOfWeek($daysOfWeek);
            $_SESSION["flash"] = "jour  " . $daysOfWeek->getLabel() . " ajouté avec succès";
            return "/view/bienvenue.php";
        }
        return '/view/daysOfWeek/ajout-daysOfWeek-form.php';
    }

    public function getById($id){
        $daysOfWeek = $this->daysOfWeekManager->get($id);
        return $daysOfWeek;
    }
    public function listAll() {
        return $this->daysOfWeekManager->listAllDaysOfWeek();
    }

    public function listDaysOfWeek() {
        return '/view/daysOfWeek/list-daysOfWeek.php';
    }

    public function deleteDaysOfWeek($id) {
        $this->check($id);

        $this->daysOfWeekManager->deleteDaysOfWeek($id);
        if (!isset($_SESSION)) {
            session_destroy();
            session_start();
        }
        $_SESSION["flash"] = "jour " . $id . " supprimé avec succès";
        return '/view/bienvenue.php';
    }

    public function check($var) {
        if (!isset($var)) {
            header("Location: index.php");
        }
        return $var;
    }
    public function validate($user) {
        
        if (strlen($user->getName()) < 2 || strlen($user->getName()) > 20) {
            
            throw new ValidationException("La taille du nom est incorrect");
        }
        if (strlen($user->getFirstname()) < 2 || strlen($user->getFirstname()) > 20) {
            throw new ValidationException("La taille du prénom est incorrect");
        }
        if (!filter_var($user->getMail(), FILTER_VALIDATE_EMAIL)) {
            throw new ValidationException("L'email est incorrect.");
        }
        if (!preg_match('/^[\pL\p{Mc} \'-]+$/u', $user->getName())) {
            throw new ValidationException("Caractères incorrect dans le nom");
        }
        if (!preg_match('/^[\pL\p{Mc} \'-]+$/u', $user->getFirstname())) {
            throw new ValidationException("Caractères incorrect dans le prénom");
        }
        if ($this->userManager->getByMail($user->getMail())) {
            throw new ValidationException("L'email existe déjà!");
        }
    }
}
