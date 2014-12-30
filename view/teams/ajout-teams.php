<?php
$ioc = IOC::getInstance();
$teamsManager = $ioc["teamsManager"];
$players= $teamsManager->listAllPlayer();

$selectPlayers= array();

foreach($players as $player){   
    $selectPlayers[$player->getIdPlayer()] = $player->getFirstname(). "  ". $player->getName();
}

if (isset($_SESSION["error"])) {
    echo "<div class='alert alert-danger'>" . $_SESSION['error'] . "</div>";
    unset($_SESSION["error"]);
}


$form = new Form("index.php?action=ajout-teams", "post");
echo $form->openForm();
echo $form->select("godFather", "GodFather:", $selectPlayers, array_key_exists("godFather", $_POST) ? $_POST["godFather"] : null);
echo $form->text("label","Label:",array_key_exists("label", $_POST)?$_POST["label"]:null);
echo $form->number("ageMax","Age Max:",array_key_exists("ageMax", $_POST)?$_POST["ageMax"]:null);
echo $form->number("ageMin","Age Min:",array_key_exists("ageMin", $_POST)?$_POST["ageMin"]:null);
echo $form->text("ordre","Ordre:",array_key_exists("ordre", $_POST)?$_POST["ordre"]:null);

echo $form->submit();
echo $form->closeForm();
?>
</div>