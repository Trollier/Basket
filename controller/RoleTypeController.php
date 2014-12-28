<?php


class RoleTypeController {

    private $roleTypeManager;

    public function __construct($roleTypeManager) {
        $this->roleTypeManager = $roleTypeManager;
    }

    public function addRoleType() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $roleType = new RoleType();

            $roleType->setLabel($_POST['label']);
            $roleType->setOrdre($_POST['ordre']);
                        
            $this->roleTypeManager->createRoleType($roleType);
            $_SESSION["flash"] = "roleType  " . $roleType->getLabel() . " ajouté avec succès";
            return "/view/bienvenue.php";
        }
        return '/view/roleType/ajout-roleType-form.php';
    }

    public function getById($id){
        $roleType = $this->roleTypeManager->get($id);
        return $roleType;
    }
    public function listAll() {
        return $this->roleTypeManager->listAllRoleTypes();
    }

    public function listRoleType() {
        return '/view/roleType/list-roleType.php';
    }

    public function editRoleType() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $roleType = new RoleType();

            $roleType->setLabel($_POST['label']);
            $roleType->setOrdre($_POST['ordre']);      
            $roleType->setRoleTypeId($_POST['roleTypeId']); 

            $this->roleTypeManager->updateRoleType ($roleType);


            $_SESSION["flash"] = "RoleType " . $roleType->getLabel() . " édité avec succès";
            return "/view/bienvenue.php";
        }
        $id = $_GET["id"];
        $this->check($id);
        $_GET["roleTypeId"] = $id;
        
        if (!isset($id)) {
            return "/view/bienvenue.php";
        }

        return "/view/roleType/editer-roleType.php";
    }

    public function deleteRoleType($id) {
        $this->check($id);

        $this->roleTypeManager->deleteRoleType($id);
        if (!isset($_SESSION)) {
            session_destroy();
            session_start();
        }
        $_SESSION["flash"] = "RoleType " . $id . " supprimé avec succès";
        return '/view/bienvenue.php';
    }

    public function activateRoleType($id) {
        $this->check($id);
        
        $roleType = $this->roleTypeManager->get($id);
        
        $roleType->setActive($_GET["isActived"]);
        $this->roleTypeManager->updateRoleType($roleType);
        return '/view/roleType/list-roleType.php';
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

