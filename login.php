<?php
include_once 'include.php';
$ioc = IOC::getInstance();
$loginManager = $ioc["loginManager"];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mail = $_POST["email"];
    $password = $_POST["password"];
    $user = $loginManager->login($mail, $password);
    if (isset($user)) {
        $_SESSION["flash"] = "Vous êtes maintenant loggué en tant que " . $user->getName();
    } 
    header("Location: index.php");
}

$form = new Form("login.php", "post");
echo $form->openForm();
echo $form->email("email", "Email:", null);
echo $form->password("password", "Password:", null);
echo $form->submit();
echo $form->closeForm();



