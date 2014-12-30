<?php


class RoleController {
   
    
    private  $roleManager;

    public function __construct($roleManager) {
        $this->roleManager = $roleManager;
    }

    public function listAll() {
        return '/view/role/list-role.php';
    }

    public function delete($id) {
        $this->check($id);

        $this->roleManager->deleteRole($id);
        if (!isset($_SESSION)) {
            session_destroy();
            session_start();
        }
        $_SESSION["flash"] = "role " . $id . " supprimé avec succès";
        return '/view/bienvenue.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $role = new Role();
            $role->setIdUser($_POST['idUser']);
            $role->setRoleTypeId($_POST['idRoleType']);
            try {
                $this->validate($role);
            } catch (Exception $e) {
                $_SESSION["error"] = $e->getMessage();
                return '/view/role/ajout-role.php';
            }
            $this->roleManager->create($role);
            $_SESSION["flash"] = "role ajouté avec succès";
            return "/view/bienvenue.php";
        }
        return '/view/role/ajout-role.php';
    }

    public function check($var) {
        if (!isset($var)) {
            header("Location: index.php");
        }
        return $var;
    }

    public function edit() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $role = new Role();
            $role->setIdUser($_POST['idUser']);
            $role->setRoleTypeId($_POST['idRoleType']);
            $role->setIdRole($_POST['idRole']);
            try {
                $this->validate($role);
                
            } catch (Exception $e) {
                $_SESSION["error"] = $e->getMessage();
                $_GET["idRole"] = $role->getIdRole();

                return "/view/role/editer-role.php";
            }



            $this->roleManager->update($role);


            $_SESSION["flash"] = "Role édité avec succès";
            return "/view/bienvenue.php";
        }
        $id = $_GET["id"];
        $this->check($id);
        $_GET["idRole"] = $id;

        if (!isset($id)) {
            return "/view/bienvenue.php";
        }

        return "/view/role/editer-role.php";
    }

    public function validate($role) {
       
        if ($this->roleManager->getByIdRoletypeAndIdUser($role->getRoleTypeId(), $role->getIdUser())) {
            throw new ValidationException("Le role existe déjà!!");
       }
       
    }
}
