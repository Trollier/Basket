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
            
            try {
                $this->validate($daysOfWeek);
            } catch (Exception $e) {
                $_SESSION["error"] = $e->getMessage();
                return '/view/daysOfWeek/ajout-daysOfWeek-form.php';
            }
            
            $this->daysOfWeekManager->createDaysOfWeek($daysOfWeek);
            $_SESSION["flash"] = "jour  " . $daysOfWeek->getLabel() . " ajouté avec succès";
            return "/view/bienvenue.php";
        }
        return '/view/daysOfWeek/ajout-daysOfWeek-form.php';
    }

    public function getById($id) {
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

    public function validate(DaysOfWeek $day) {

        if (strlen($day->getLabel()) < 3 || strlen($day->getLabel()) > 9) {

            throw new ValidationException("La taille du jour est incorrect");
        }

        if (!preg_match('/^[\pL\p{Mc} \'-]+$/u', $day->getLabel())) {
            throw new ValidationException("Caractères incorrect dans le nom");
        }
        
        if ($this->daysOfWeekManager->getByMail($day)){
            throw new ValidationException("existe déja");
        }

    }

}
