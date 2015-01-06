<?php

class LoginManager {

    private $userManager;

    public function __construct(UserManager $userManager) {
        $this->userManager = $userManager;
    }

    public function login($mail, $password) {

        $user = $this->userManager->getByMail($mail);
        if ($user->getPassword() === substr(md5($password), 0, 20)) {
            setcookie("user", $user->getName(), time() + 60 * 60 * 24 * 30);
            return $user;
        } else {
            return false;
        }
    }

    public function isLoggedIn() {
        return isset($_COOKIE["user"]);
    }

    public function logout() {
        unset($_COOKIE["user"]);
        header("Location: index.php");
        die();
    }

    public function getUser() {
        if ($this->isLoggedIn()) {
            return $_COOKIE["user"];
        }
        return false;
    }

}
