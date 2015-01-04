<?php

$ioc = IOC::getInstance();
$teamsGameManager = $ioc["teamsGamesManager"];
$teams = $teamsGameManager->listAllTeams();
$daysOfWeeks = $teamsGameManager->listAllDaysOfWeek();

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


$form = new Form("index.php?action=ajout-teamsGame", "post");
echo $form->openForm();
echo $form->select("idTeam", "idTeam:", $selectTeams, array_key_exists("idTeam", $_POST) ? $_POST["idTeam"] : null);
echo $form->select("gameDay", "gameDay:", $selectDaysOfWeek, array_key_exists("gameDay", $_POST) ? $_POST["gameDay"] : null);
echo $form->number("currentYear", "currentYear:", array_key_exists("currentYear", $_POST) ? $_POST["currentYear"] : null);
echo $form->time("gameTime", "gameTime :", array_key_exists("gameTime", $_POST) ? $_POST["gameTime"] : null);




echo $form->submit();
echo $form->closeForm();
?>
</div>