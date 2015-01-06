<?php
include_once("/view/login/security.php");

$ioc = IOC::getInstance();
$staffsRoleTypeManager = $ioc["staffsRoleTypeManager"];
$staffs= $staffsRoleTypeManager->listAllStaff();
$roles= $staffsRoleTypeManager->listAllRoleType();

$selectStaffs= array();
$selectRoles= array();

foreach($staffs as $staff){
    $selectStaffs[$staff->getIdStaff()] = $staff->getLabel();
}
foreach($roles as $role){
    $selectRoles[$role->getRoleTypeId()] = $role->getLabel();
}
if (isset($_SESSION["error"])) {
    echo "<div class='alert alert-danger'>" . $_SESSION['error'] . "</div>";
    unset($_SESSION["error"]);
}


$form = new Form("index.php?action=ajout-staff-roletype", "post");
echo $form->openForm();
echo $form->select("idStaff", "Staff:", $selectStaffs, array_key_exists("idStaff", $_POST) ? $_POST["idStaff"] : null);
echo $form->select("idRoleType", "Role:", $selectRoles, array_key_exists("idRoleType", $_POST) ? $_POST["idRoleType"] : null);
echo $form->submit();
echo $form->closeForm();
?>
</div>