<?php
$ioc = IOC::getInstance();
$userController= $ioc["userController"];
$idUser = $_GET["idUser"];
$user = $userController->getById($idUser);
if(isset($_SESSION["error"])){
    echo "<div class='alert alert-danger'>".$_SESSION['error']."</div>";  
    unset($_SESSION["error"]);
}

$form= new Form("index.php?action=edit-user","post");
echo $form->openForm();
echo $form->text("name","Nom:",$user->getName());
echo $form->text("firstname","Prénom:",$user->getFirstname());
echo $form->email("mail","Adresse:",$user->getMail());
echo $form->hidden("idUser",null,$user->getIdUser() );
echo $form->submit("Modifier");
echo $form->closeForm();
?>


