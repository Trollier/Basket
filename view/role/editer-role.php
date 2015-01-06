<?php
include_once("/view/login/security.php");

$ioc = IOC::getInstance();
$roleManager = $ioc["roleManager"];
$users= $roleManager->listAllUser();
$roleTypes= $roleManager->listAllRoleType();

$selectUsers= array();
$selectRoleTypes= array();
foreach($users as $user){ 
    $selectUsers[$user->getIdUser()] = $user->getName(). "  ".$user->getFirstname();
}
foreach($roleTypes as $roleType){
    $selectRoleTypes[$roleType->getRoleTypeId()] = $roleType->getLabel();
}

$role= $roleManager->get($_GET["idRole"]);

if (isset($_SESSION["error"])) {
    echo "<div class='alert alert-danger'>" . $_SESSION['error'] . "</div>";
    unset($_SESSION["error"]);
}
$form = new Form("index.php?action=edit-role", "post");
echo $form->openForm();
echo $form->select("idUser", "User:", $selectUsers,$role->getIdUser() );
echo $form->select("idRoleType", "Role:", $selectRoleTypes, $role->getRoleTypeId());
echo $form->hidden("idRole", null, $role->getIdRole());

echo $form->submit();
echo $form->closeForm();


?>


