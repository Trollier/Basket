<?php
$ioc = IOC::getInstance();
$typeMatchController= $ioc["typesMatchController"];
$idTypeMatch = $_GET["idTypeMatch"];
$typeMatch = $typeMatchController->getById($idTypeMatch);

if(isset($_SESSION["error"])){
    echo "<div class='alert alert-danger'>".$_SESSION['error']."</div>";  
    unset($_SESSION["error"]);
}
$form= new Form("index.php?action=edit-typeMatch","post");
echo $form->openForm();
echo $form->text("idTypeMatch","id:",$typeMatch->getIdTypeMatch());
echo $form->text("typeMatch","type:",$typeMatch->getTypeMatch());
echo $form->submit("Modifier");
echo $form->closeForm();
?>

