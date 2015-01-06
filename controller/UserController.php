<?php

class UserController {

    private $userManager;

    public function __construct($userManager) {
        $this->userManager = $userManager;
    }

    public function addUser() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $user = new User();

            $user->setName($_POST['name']);
            $user->setFirstname($_POST['firstname']);
            $user->setMail($_POST['mail']);
            $user->setPassword(md5($_POST['password']));
            try {
                $this->validate($user);
            } catch (Exception $e) {
                $_SESSION["error"] = $e->getMessage();
                return '/view/user/ajout-user-form.php';
            }


            $this->userManager->create($user);
            $_SESSION["flash"] = "Utilisateur " . $user->getName() . " ajouté avec succès";
            return "/view/bienvenue.php";
        }
        return '/view/user/ajout-user-form.php';
    }

    public function getById($id) {
        $user = $this->userManager->get($id);
        return $user;
    }

    public function listAll() {
        return $this->userManager->listAll();
    }

    public function listUser() {
        return '/view/user/list-user.php';
    }

    public function editUser() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = new User();

            $user->setName($_POST['name']);
            $user->setidUser($_POST['idUser']);
            $user->setFirstname($_POST['firstname']);
            $user->setMail($_POST['mail']);
            try {
                $this->validate($user);
            } catch (Exception $e) {
                $_SESSION["error"] = $e->getMessage();
                $_GET["idUser"] = $user->getidUser();

                return "/view/user/editer-user.php";
            }

            $this->userManager->update($user);


            $_SESSION["flash"] = "Utilisateur " . $user->getName() . " édité avec succès";
            return "/view/bienvenue.php";
        }
        $id = $_GET["id"];
        $this->check($id);
        $_GET["idUser"] = $id;

        if (!isset($id)) {
            return "/view/bienvenue.php";
        }

        return "/view/user/editer-user.php";
    }

    public function deleteUser($id) {
        $this->check($id);

        $this->userManager->deleteUser($id);
        if (!isset($_SESSION)) {
            session_destroy();
            session_start();
        }
        $_SESSION["flash"] = "Utilisateur " . $id . " supprimé avec succès";
        return '/view/bienvenue.php';
    }

    public function activate($id) {
        $this->check($id);

        $user = $this->userManager->get($id);
        $user->setActive($_GET["isActived"]);
        $this->userManager->update($user);
        return '/view/user/list-user.php';
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
