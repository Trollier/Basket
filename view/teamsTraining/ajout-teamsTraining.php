<?php

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

if (isset($_SESSION["error"])) {
    echo "<div class='alert alert-danger'>" . $_SESSION['error'] . "</div>";
    unset($_SESSION["error"]);
}


$form = new Form("index.php?action=ajout-teamsTraining", "post");
echo $form->openForm();
echo $form->select("idTeam", "idTeam:", $selectTeams, array_key_exists("idTeam", $_POST) ? $_POST["idTeam"] : null);
echo $form->select("DayOfWeek", "DayOfWeek:", $selectDaysOfWeek, array_key_exists("DayOfWeek", $_POST) ? $_POST["DayOfWeek"] :null);
echo $form->number("currentYear", "currentYear:", array_key_exists("currentYear", $_POST) ? $_POST["currentYear"] : null);
echo $form->time("startTime", "startTime :", array_key_exists("startTime", $_POST) ? $_POST["startTime"] : null);
echo $form->time("EndTime", "EndTime :", array_key_exists("EndTime", $_POST) ? $_POST["EndTime"] : null);
echo $form->text("Room", "Room :", array_key_exists("Room", $_POST) ? $_POST["Room"] : null);
echo $form->submit();
echo $form->closeForm();
?>
</div>