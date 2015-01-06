<?php

class LoginController {

    private $loginManager;

    public function __construct(LoginManager $loginManager) {
        $this->loginManager = $loginManager;
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $mail = $_POST["email"];
            $password = $_POST["password"];
            $user = $this->loginManager->login($mail, $password);
            if (isset($user)) {
                $_SESSION["flash"] = "Vous êtes maintenant loggué en tant que " . $user->getName();
                return "/view/bienvenue.php";
            } else {
                return '/view/login/login.php';
            }
        }
        return '/view/login/login.php';
    }

    public function logout() {
        $this->loginManager->logout();
        $_SESSION["flash"] = "Vous êtes maintenant déconnecté";

        return "/view/bienvenue.php";
    }

}
