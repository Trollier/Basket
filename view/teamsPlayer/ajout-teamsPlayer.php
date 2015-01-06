<?php
include_once("/view/login/security.php");

$ioc = IOC::getInstance();
$teamsPlayerManager = $ioc["teamsPlayerManager"];
$teams = $teamsPlayerManager->listAllTeams();
$players = $teamsPlayerManager->listAllPlayers();


$selectTeams = array();
$selectPlayers = array();

foreach ($players as $player) {
    $selectPlayers[$player->getIdPlayer()] = $player->getName() . " " . $player->getFirstname();
}
foreach ($teams as $team) {
    $selectTeams[$team->getIdTeam()] = $team->getLabel();
}
if (isset($_SESSION["error"])) {
    echo "<div class='alert alert-danger'>" . $_SESSION['error'] . "</div>";
    unset($_SESSION["error"]);
}


$form = new Form("index.php?action=ajout-teamsPlayer", "post");
echo $form->openForm();

echo $form->select("idTeam", "Equipe:", $selectTeams, array_key_exists("idTeam", $_POST) ? $_POST["idTeam"] : null);
echo $form->select("idPlayer", "idPlayer:", $selectPlayers, array_key_exists("idPlayer", $_POST) ? $_POST["idPlayer"] : null);
echo $form->number("number", "number:", array_key_exists("number", $_POST) ? $_POST["number"] : null);
echo $form->text("position", "position:", array_key_exists("position", $_POST) ? $_POST["position"] : null);
echo $form->number("YearTeam", "Année Team:", array_key_exists("YearTeam", $_POST) ? $_POST["YearTeam"] : null);




echo $form->submit();
echo $form->closeForm();
?>
</div>