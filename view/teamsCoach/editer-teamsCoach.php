<?php
include_once("/view/login/security.php");

$ioc = IOC::getInstance();
$teamsCoachManager = $ioc["teamsCoachManager"];
$teams = $teamsCoachManager->listAllTeams();
$users = $teamsCoachManager->listAllUsers();


$selectTeams = array();
$selectUsers = array();

foreach ($users as $user) {
    $selectUsers[$user->getIdUser()] = $user->getName() . " " . $user->getFirstname();
}
foreach ($teams as $team) {
    $selectTeams[$team->getIdTeam()] = $team->getLabel();
}

$teamsCoach = $teamsCoachManager->get($_GET["id"]);

if (isset($_SESSION["error"])) {
    echo "<div class='alert alert-danger'>" . $_SESSION['error'] . "</div>";
    unset($_SESSION["error"]);
}

$form = new Form("index.php?action=edit-teamsCoach", "post");
echo $form->openForm();

echo $form->select("idTeam", "Equipe:", $selectTeams, array_key_exists("idTeam", $_POST) ? $_POST["idTeam"] : $teamsCoach->getIdTeam());
echo $form->select("idCoach", "Coach:", $selectUsers, array_key_exists("idCoach", $_POST) ? $_POST["idCoach"] : $teamsCoach->getIdCoach());
echo $form->text("coachLicence", "Licence coach:", array_key_exists("coachLicence", $_POST) ? $_POST["coachLicence"] : $teamsCoach->getCoachLicence());
echo $form->select("mainCoach", "Main Coach:", [0 => 'non', 1 => 'oui'], array_key_exists("mainCoach", $_POST) ? $_POST["mainCoach"] : $teamsCoach->getMainCoach());

echo $form->number("YearTeam", "Année Team:", array_key_exists("YearTeam", $_POST) ? $_POST["YearTeam"] : $teamsCoach->getYearTeam());
echo $form->hidden("idTeamCoach", null, $teamsCoach->getIdTeamCoach());

echo $form->submit();
echo $form->closeForm();

