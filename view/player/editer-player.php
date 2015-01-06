<?php
include_once("/view/login/security.php");

$ioc = IOC::getInstance();

$playerController= $ioc["playerController"];
$idplayer = $_GET["idPlayer"];
$player = $playerController->getById($idplayer);
if(isset($_SESSION["error"])){
    echo "<div class='alert alert-danger'>".$_SESSION['error']."</div>";  
    unset($_SESSION["error"]);
}
$form= new Form("index.php?action=edit-player","post");
echo $form->openForm();
echo $form->text("name","Nom:",$player->getName());
echo $form->text("firstname","Prénom:",$player->getFirstname());
echo $form->email("mail","Adresse:",$player->getEmail());
echo $form->date("date","Date de naissance :",$player->getBirthdate());
echo $form->hidden("idPlayer",null,$player->getIdPlayer() );
echo $form->submit("Modifier");
echo $form->closeForm();
?>




