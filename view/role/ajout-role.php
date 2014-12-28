<?php
$ioc = IOC::getInstance();
$roleManager = $ioc["roleManager"];
$users= $roleManager->listAllUser();
$roles= $roleManager->listAllRoleType();

$selectUsers= array();
$selectRoles= array();

foreach($users as $user){
    $selectUsers[$user->getIdUser()] = $user->getName(). " ". $user->getFirstName();
}
foreach($roles as $role){
    $selectRoles[$role->getRoleTypeId()] = $role->getLabel();
}
if (isset($_SESSION["error"])) {
    echo "<div class='alert alert-danger'>" . $_SESSION['error'] . "</div>";
    unset($_SESSION["error"]);
}


$form = new Form("index.php?action=ajout-role", "post");
echo $form->openForm();
echo $form->select("idUser", "User:", $selectUsers, array_key_exists("idUser", $_POST) ? $_POST["idUser"] : null);
echo $form->select("idRoleType", "Role:", $selectRoles, array_key_exists("idRoleType", $_POST) ? $_POST["idRoleType"] : null);
echo $form->submit();
echo $form->closeForm();
?>
</div>