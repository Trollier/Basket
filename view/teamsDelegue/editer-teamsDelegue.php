<?php
include_once("/view/login/security.php");

$ioc = IOC::getInstance();
$teamsDelegueManager = $ioc["teamsDelegueManager"];
$teams = $teamsDelegueManager->listAllTeams();
$users = $teamsDelegueManager->listAllUsers();


$selectTeams = array();
$selectUsers = array();

foreach ($users as $user) {
    $selectUsers[$user->getIdUser()] = $user->getName() . " " . $user->getFirstname();
}
foreach ($teams as $team) {
    $selectTeams[$team->getIdTeam()] = $team->getLabel();
}

$teamsDelegue = $teamsDelegueManager->get($_GET["id"]);
if (isset($_SESSION["error"])) {
    echo "<div class='alert alert-danger'>" . $_SESSION['error'] . "</div>";
    unset($_SESSION["error"]);
}

$form = new Form("index.php?action=edit-teamsDelegue", "post");
echo $form->openForm();
echo $form->select("idTeam", "Equipe:", $selectTeams, array_key_exists("idTeam", $_POST) ? $_POST["idTeam"] : $teamsDelegue->getIdTeam());
echo $form->select("idDelegue", "Delegue:", $selectUsers, array_key_exists("idDelegue", $_POST) ? $_POST["idDelegue"] : $teamsDelegue->getIdDelegue());
echo $form->select("mainDelegue", "Main Delegue:",[0 => 'non', 1 => 'oui'], array_key_exists("mainDelegue", $_POST) ? $_POST["mainDelegue"] : $teamsDelegue->getMainDelegue());
echo $form->number("YearTeam", "Année Team:", array_key_exists("YearTeam", $_POST) ? $_POST["YearTeam"] : $teamsDelegue->getYearTeam());
echo $form->hidden("idTeamDelegue", null, $teamsDelegue->getIdTeamDelegue());

echo $form->submit();
echo $form->closeForm();

