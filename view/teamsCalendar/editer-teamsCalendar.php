<?php
include_once("/view/login/security.php");

$ioc = IOC::getInstance();
$teamsCalendarManager = $ioc["teamsCalendarManager"];
$teams = $teamsCalendarManager->listAllTeams();
$typesMatchs = $teamsCalendarManager->listAllTypesMatch();

$selectTeams = array();
$selectTypesMatchs = array();

foreach ($typesMatchs as $selectTypesMatch) {
  
    $selectTypesMatchs[$selectTypesMatch->getIdTypeMatch()] = $selectTypesMatch->getTypeMatch();
}
foreach ($teams as $team) {
    $selectTeams[$team->getIdTeam()] = $team->getLabel();
}

$teamsCalendar = $teamsCalendarManager->get($_GET["id"]);

if (isset($_SESSION["error"])) {
    echo "<div class='alert alert-danger'>" . $_SESSION['error'] . "</div>";
    unset($_SESSION["error"]);
}

$form = new Form("index.php?action=edit-teamsCalendar", "post");
echo $form->openForm();
echo $form->select("idTeam", "idTeam:", $selectTeams, array_key_exists("idTeam", $_POST) ? $_POST["idTeam"] : $teamsCalendar->getIdTeam());
echo $form->select("TypeMatch", "TypeMatch:", $selectTypesMatchs, array_key_exists("idTypeMatch", $_POST) ? $_POST["idTypeMatch"] : $teamsCalendar->getTypeMatch());
echo $form->text("inTeam", "inTeam:", array_key_exists("inTeam", $_POST) ? $_POST["inTeam"] : $teamsCalendar->getInTeam());
echo $form->text("outTeam", "outTeam :", array_key_exists("outTeam", $_POST) ? $_POST["outTeam"] : $teamsCalendar->getOutTeam());
echo $form->number("scoreOut", "scoreOut :", array_key_exists("scoreOut", $_POST) ? $_POST["scoreOut"] : $teamsCalendar->getScoreOut());
echo $form->number("scoreIn", "scoreIn :", array_key_exists("scoreIn", $_POST) ? $_POST["scoreIn"] : $teamsCalendar->getScoreIn());
echo $form->time("timeMatch", "timeMatch :", array_key_exists("timeMatch", $_POST) ? $_POST["timeMatch"] : $teamsCalendar->getTimeMatch());
echo $form->number("yearTeam", "yearTeam :", array_key_exists("yearTeam", $_POST) ? $_POST["yearTeam"] : $teamsCalendar->getYearTeam());
echo $form->date("dateMatch", "dateMatch :", array_key_exists("dateMatch", $_POST) ? $_POST["dateMatch"] : $teamsCalendar->getDateMatch());
echo $form->number("matchNumber", "matchNumber:", array_key_exists("matchNumber", $_POST) ? $_POST["matchNumber"] : $teamsCalendar->getMatchNumber());
echo $form->hidden("idCalendar", null, $teamsCalendar->getIdCalendar());
echo $form->submit();
echo $form->closeForm();

