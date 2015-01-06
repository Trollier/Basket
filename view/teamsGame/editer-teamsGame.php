<?php
include_once("/view/login/security.php");

$ioc = IOC::getInstance();
$teamsTrainingManager = $ioc["teamsGamesManager"];
$teams = $teamsTrainingManager->listAllTeams();
$daysOfWeeks = $teamsTrainingManager->listAllDaysOfWeek();

$selectTeams = array();
$selectDaysOfWeek = array();

foreach ($daysOfWeeks as $daysOfWeek) {
    $selectDaysOfWeek[$daysOfWeek->getIdDay()] = $daysOfWeek->getLabel();
}
foreach ($teams as $team) {
    $selectTeams[$team->getIdTeam()] = $team->getLabel();
}

$teamsGame = $teamsTrainingManager->get($_GET["id"]);

if (isset($_SESSION["error"])) {
    echo "<div class='alert alert-danger'>" . $_SESSION['error'] . "</div>";
    unset($_SESSION["error"]);
}

$form = new Form("index.php?action=edit-teamsGame", "post");
echo $form->openForm();
echo $form->select("idTeam", "idTeam:", $selectTeams, array_key_exists("idTeam", $_POST) ? $_POST["idTeam"] : $teamsGame->getIdTeam());
echo $form->select("gameDay", "gameDay:", $selectDaysOfWeek, array_key_exists("gameDay", $_POST) ? $_POST["gameDay"] : $teamsGame->getGameDay());
echo $form->number("currentYear", "currentYear:", array_key_exists("currentYear", $_POST) ? $_POST["currentYear"] : $teamsGame->getCurrentYear());
echo $form->time("gameTime", "gameTime :", array_key_exists("gameTime", $_POST) ? $_POST["gameTime"] : $teamsGame->getGameTime());
echo $form->hidden("idTeamGame", null, $teamsGame->getIdTeamGame());

echo $form->submit();
echo $form->closeForm();

