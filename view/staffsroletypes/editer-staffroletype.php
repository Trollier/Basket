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

$staffRoleType= $staffsRoleTypeManager->get($_GET["idStaffRoleype"]);
if (isset($_SESSION["error"])) {
    echo "<div class='alert alert-danger'>" . $_SESSION['error'] . "</div>";
    unset($_SESSION["error"]);
}
$form = new Form("index.php?action=edit-staff-roletype", "post");
echo $form->openForm();
echo $form->select("idStaff", "Staff:", $selectStaffs, $staffRoleType->getIdStaff());
echo $form->select("idRoleType", "Role:", $selectRoles, $staffRoleType->getIdRoleType());
echo $form->hidden("idStaffRoleType", null, $staffRoleType->getIdStaffRoleType());

echo $form->submit();
echo $form->closeForm();


?>


