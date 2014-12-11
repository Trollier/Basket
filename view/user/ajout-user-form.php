<div class='form'>
<?php
if(isset($_SESSION["error"])){
    echo "<div class='alert alert-danger'>".$_SESSION['error']."</div>";  
    unset($_SESSION["error"]);
}
  

$form= new Form("index.php?action=ajout-user","post");
echo $form->openForm();
echo $form->text("name","Nom:",array_key_exists("name", $_POST)?$_POST["name"]:null);
echo $form->text("firstname","Prénom:",array_key_exists("firstname", $_POST)?$_POST["firstname"]:null);
echo $form->email("mail","Adresse:",array_key_exists("mail", $_POST)?$_POST["mail"]:null);
echo $form->password("password","Mot de passe:", array_key_exists("password", $_POST)?$_POST["password"]:null);
echo $form->submit();
echo $form->closeForm();
?>
</div>
