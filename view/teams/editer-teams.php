<?php
$ioc = IOC::getInstance();
$teamsManager = $ioc["teamsManager"];
$players= $teamsManager->listAllPlayer();


$selectPlayers= array();

foreach($players as $player){   
    $selectPlayers[$player->getIdPlayer()] = $player->getFirstname(). "  ". $player->getName();
}

$team= $teamsManager->get($_GET["idTeam"]);

if (isset($_SESSION["error"])) {
    echo "<div class='alert alert-danger'>" . $_SESSION['error'] . "</div>";
    unset($_SESSION["error"]);
}

$form = new Form("index.php?action=edit-teams", "post");
echo $form->openForm();
echo $form->select("godFather", "GodFather:", $selectPlayers, $team->getGodFather());
echo $form->number("ageMax","Age Max:",$team->getAgeMax());
echo $form->number("ageMin","Age Min:",$team->getAgeMin());
echo $form->text("label","Label:",$team->getLabel());
echo $form->text("ordre","Ordre:",$team->getOrdre());
echo $form->hidden("idTeam", null, $team->getIdTeam());

echo $form->submit();
echo $form->closeForm();
?>

