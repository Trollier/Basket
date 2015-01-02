<?php
$ioc = IOC::getInstance();
$teamsManager = $ioc["teamsManager"];
$players= $teamsManager->listAllPlayer();


$selectPlayers= array();

foreach($players as $player){   
    $selectPlayers[$player->getIdPlayer()] = $player->getFirstname(). "  ". $player->getName();
}

$teamsCoach= $teamsManager->get($_GET["idTeam"]);

if (isset($_SESSION["error"])) {
    echo "<div class='alert alert-danger'>" . $_SESSION['error'] . "</div>";
    unset($_SESSION["error"]);
}

$form = new Form("index.php?action=edit-teams", "post");
echo $form->openForm();
echo $form->select("godFather", "GodFather:", $selectPlayers, $teamsCoach->getGodFather());
echo $form->number("ageMax","Age Max:",$teamsCoach->getAgeMax());
echo $form->number("ageMin","Age Min:",$teamsCoach->getAgeMin());
echo $form->text("label","Label:",$teamsCoach->getLabel());
echo $form->text("ordre","Ordre:",$teamsCoach->getOrdre());
echo $form->hidden("idTeam", null, $teamsCoach->getIdTeam());

echo $form->submit();
echo $form->closeForm();
?>

