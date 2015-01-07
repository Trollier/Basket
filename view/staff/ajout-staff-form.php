<?php
include_once("/view/login/security.php");

if (isset($_SESSION["error"])) {
    echo "<div class='alert alert-danger'>" . $_SESSION['error'] . "</div>";
    unset($_SESSION["error"]);
}


$form = new Form("index.php?action=ajout-staff", "post");
echo $form->openForm();
echo $form->text("label", "Label:", array_key_exists("label", $_POST) ? $_POST["label"] : null);
echo $form->number("ordre", "Ordre:",  array_key_exists("ordre", $_POST) ? $_POST["ordre"] : null);
echo $form->submit();
echo $form->closeForm();
?>
</div>