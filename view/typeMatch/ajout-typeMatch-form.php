
<?php
if(isset($_SESSION["error"])){
    echo "<div class='alert alert-danger'>".$_SESSION['error']."</div>";  
    unset($_SESSION["error"]);
}
  

$form= new Form("index.php?action=ajout-typeMatch","post");
echo $form->openForm();
echo $form->text("idTypeMatch","idTypeMatch:",array_key_exists("idTypeMatch", $_POST)?$_POST["idTypeMatch"]:null);
echo $form->text("typeMatch","TypeMatch:",array_key_exists("typeMatch", $_POST)?$_POST["typeMatch"]:null);
echo $form->submit();
echo $form->closeForm();
?>
</div>