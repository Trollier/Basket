<?php
include_once("/view/login/security.php");

$ioc = IOC::getInstance();
$teamsTrainingManager = $ioc["teamsTrainingManager"];
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

$teamsTraining = $teamsTrainingManager->get($_GET["id"]);

if (isset($_SESSION["error"])) {
    echo "<div class='alert alert-danger'>" . $_SESSION['error'] . "</div>";
    unset($_SESSION["error"]);
}
 
$form = new Form("index.php?action=edit-teamsTraining", "post");
echo $form->openForm();
echo $form->select("idTeam", "idTeam:", $selectTeams, array_key_exists("idTeam", $_POST) ? $_POST["idTeam"] : $teamsTraining->getIdTeam());
echo $form->select("DayOfWeek", "DayOfWeek:", $selectDaysOfWeek, array_key_exists("DayOfWeek", $_POST) ? $_POST["DayOfWeek"] : $teamsTraining->getDayOfWeek());
echo $form->number("currentYear", "currentYear:", array_key_exists("currentYear", $_POST) ? $_POST["currentYear"] : $teamsTraining->getCurrentYear());
echo $form->time("startTime", "startTime :", array_key_exists("startTime", $_POST) ? $_POST["startTime"] : $teamsTraining->getStartTime());
echo $form->time("EndTime", "EndTime :", array_key_exists("EndTime", $_POST) ? $_POST["EndTime"] : $teamsTraining->getEndTime());
echo $form->text("Room", "Room :", array_key_exists("Room", $_POST) ? $_POST["Room"] : $teamsTraining->getRoom());
echo $form->hidden("idTraining", null, $teamsTraining->getIdTraining());
echo $form->submit();
echo $form->closeForm();

