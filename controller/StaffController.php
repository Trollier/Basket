<?php

class StaffController {

    private $staffManager;

    public function __construct($staffManager) {
        $this->staffManager = $staffManager;
    }

    public function addStaff() {
        $edit=0;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $staff = new Staff();

            $staff->setLabel($_POST['label']);
            $staff->setOrdre($_POST['ordre']);
            try {
                $this->validate($staff,$edit);
            } catch (Exception $e) {
                $_SESSION["error"] = $e->getMessage();
                return '/view/staff/ajout-staff-form.php';
            }
            $this->staffManager->createStaff($staff);
            $_SESSION["flash"] = "Staff" . $staff->getLabel() . " ajouté avec succès";
            return "/view/bienvenue.php";
        }
        return '/view/staff/ajout-staff-form.php';
    }

    public function getById($id) {
        $staff = $this->staffManager->getStaff($id);
        return $staff;
    }

    public function listAll() {
        return $this->staffManager->listStaff();
    }

    public function listStaff() {
        return '/view/staff/list-staff.php';
    }

    public function editStaff() {
        $edit=1;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $staff = new Staff();

            $staff->setLabel($_POST['label']);
            $staff->setIdStaff($_POST['idStaff']);
            $staff->setOrdre($_POST['ordre']);
            $staff->setShowInMenu($_POST['showInMenu']);
             try {
                $this->validate($staff,$edit);
            } catch (Exception $e) {
                $_SESSION["error"] = $e->getMessage();
                 $_GET["idStaff"] = $staff->getIdStaff();
                return '/view/staff/editer-staff.php';
            }

            $this->staffManager->updateStaff($staff);
            $_SESSION["flash"] = "Staff " . $staff->getLabel() . " édité avec succès";
            return "/view/bienvenue.php";
        }
        $id = $_GET["id"];
        $this->check($id);
        $_GET["idStaff"] = $id;

        if (!isset($id)) {
            return "/view/bienvenue.php";
        }

        return "/view/staff/editer-staff.php";
    }

    public function deleteStaff($id) {
        $this->check($id);

        $this->staffManager->deleteStaff($id);
        if (!isset($_SESSION)) {
            session_destroy();
            session_start();
        }
        $_SESSION["flash"] = "Staff " . $id . " supprimé avec succès";
        return '/view/bienvenue.php';
    }

    public function activateStaff($id) {
        $this->check($id);

        $staff = $this->staffManager->getStaff($id);

        $staff->setActive($_GET["isActived"]);

        $this->staffManager->updateStaff($staff);
        return '/view/staff/list-staff.php';
    }

    public function check($var) {
        if (!isset($var)) {
            header("Location: index.php");
        }
        return $var;
    }

    public function validate(Staff $staff,$edit) {

        if (strlen($staff->getLabel()) < 2 || strlen($staff->getLabel()) > 50) {

            throw new ValidationException("La taille du label est incorrect");
        }

        if (!preg_match('/^[\pL\p{Mc} \'-]+$/u', $staff->getLabel())) {
            throw new ValidationException("Caractères incorrect dans le label");
        }

        if (!is_numeric($staff->getOrdre())) {
            throw new ValidationException("entrez un nombre");
        }

        if($edit==0){
        if ($this->staffManager->validate($staff)) {
            throw new ValidationException("Le label existe déjà!");
        }
        }
    }

}
