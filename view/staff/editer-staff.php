<?php

$ioc = IOC::getInstance();
$staffController = $ioc["staffController"];
$idStaff = $_GET["idStaff"];
$staff = $staffController->getById($idStaff);
if (isset($_SESSION["error"])) {
    echo "<div class='alert alert-danger'>" . $_SESSION['error'] . "</div>";
    unset($_SESSION["error"]);
}
$form = new Form("index.php?action=edit-staff", "post");
echo $form->openForm();
echo $form->text("label", "label:", $staff->getLabel());
echo $form->select("ordre", "ordre:", [0, 1], $staff->getOrdre());
echo $form->number("showInMenu", "showInMenu:", $staff->getShowInMenu());
echo $form->hidden("idStaff", null, $staff->getIdStaff());
echo $form->submit("Modifier");
echo $form->closeForm();
?>


