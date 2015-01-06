
<?php
include_once("/view/login/security.php");

if(isset($_SESSION["error"])){
    echo "<div class='alert alert-danger'>".$_SESSION['error']."</div>";  
    unset($_SESSION["error"]);
}
  

$form= new Form("index.php?action=ajout-player","post");
echo $form->openForm();
echo $form->text("name","Nom:",array_key_exists("name", $_POST)?$_POST["name"]:null);
echo $form->text("firstname","Prénom:",array_key_exists("firstname", $_POST)?$_POST["firstname"]:null);
echo $form->email("mail","Adresse:",array_key_exists("mail", $_POST)?$_POST["mail"]:null);
echo $form->date("date","Date de naissance: ",array_key_exists("date", $_POST)?$_POST["date"]:null);
echo $form->submit();
echo $form->closeForm();
?>
</div>
