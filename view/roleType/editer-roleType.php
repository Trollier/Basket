<?php
$ioc = IOC::getInstance();
$roleTypeController= $ioc["roleTypeController"];
$roleTypeId = $_GET["roleTypeId"];
$roleType = $roleTypeController->getById($roleTypeId);
if(isset($_SESSION["error"])){
    echo "<div class='alert alert-danger'>".$_SESSION['error']."</div>";  
    unset($_SESSION["error"]);
}
$form= new Form("index.php?action=edit-roleType","post");
echo $form->openForm();
echo $form->text("label","Label:",$roleType->getLabel());
echo $form->number("ordre","Ordre:",$roleType->getOrdre());
echo $form->hidden("roleTypeId",null,$roleType->getRoleTypeId() );
echo $form->submit("Modifier");
echo $form->closeForm();
?>

