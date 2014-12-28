<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of StaffsRoleTypeController
 *
 * @author Brahim
 */
class StaffsRoleTypeController {

    private $staffsRoleTypeManager;

    public function __construct($staffsRoleTypeManager) {
        $this->staffsRoleTypeManager = $staffsRoleTypeManager;
    }

    public function listAll() {
        return '/view/staffsroletypes/list-staff-roletype.php';
    }

    public function delete($id) {
        $this->check($id);

        $this->staffsRoleTypeManager->deleteStaffRoleType($id);
        if (!isset($_SESSION)) {
            session_destroy();
            session_start();
        }
        $_SESSION["flash"] = "StaffsRoleType  " . $id . " supprimé avec succès";
        return '/view/bienvenue.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $staffRoleType = new StaffsRoleTypes();
            $staffRoleType->setIdStaff($_POST['idStaff']);
            $staffRoleType->setIdRoleType($_POST['idRoleType']);
            try {
                $this->validate($staffRoleType);
            } catch (Exception $e) {
                $_SESSION["error"] = $e->getMessage();
                return '/view/staffsroletypes/ajout-staffroletype-form.php';
            }
            $this->staffsRoleTypeManager->create($staffRoleType);
            $_SESSION["flash"] = "StaffRolesType ajouté avec succès";
            return "/view/bienvenue.php";
        }
        return '/view/staffsroletypes/ajout-staffroletype-form.php';
    }

    public function check($var) {
        if (!isset($var)) {
            header("Location: index.php");
        }
        return $var;
    }

    public function edit() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $staffRoleType = new StaffsRoleTypes();
            $staffRoleType->setIdStaff($_POST['idStaff']);
            $staffRoleType->setIdRoleType($_POST['idRoleType']);
            $staffRoleType->setIdStaffRoleType($_POST['idStaffRoleType']);
            try {
                $this->validate($staffRoleType);
            } catch (Exception $e) {
                $_SESSION["error"] = $e->getMessage();
                $_GET["idStaffRoleype"] = $staffRoleType->getIdStaffRoleType();

                return "/view/staffsroletypes/editer-staffroletype.php";
            }



            $this->staffsRoleTypeManager->update($staffRoleType);


            $_SESSION["flash"] = "StaffRolesTypes édité avec succès";
            return "/view/bienvenue.php";
        }
        $id = $_GET["id"];
        $this->check($id);
        $_GET["idStaffRoleype"] = $id;

        if (!isset($id)) {
            return "/view/bienvenue.php";
        }

        return "/view/staffsroletypes/editer-staffroletype.php";
    }

    public function validate($staffRoleType) {
        if ($this->staffsRoleTypeManager->getByIdRoletypeAndIdStaff($staffRoleType->getIdRoleType(), $staffRoleType->getIdStaff(),$staffRoleType->getIdStaffRoleType())) {
            throw new ValidationException("Le staff roletype existe déjà!!");
        }
//        
    }

}
