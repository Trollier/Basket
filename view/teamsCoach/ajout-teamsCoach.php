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
if (isset($_SESSION["error"])) {
    echo "<div class='alert alert-danger'>" . $_SESSION['error'] . "</div>";
    unset($_SESSION["error"]);
}


$form = new Form("index.php?action=ajout-teamsCoach", "post");
echo $form->openForm();

echo $form->select("idTeam", "Equipe:", $selectTeams, array_key_exists("idTeam", $_POST) ? $_POST["idTeam"] : null);
echo $form->select("idCoach", "Coach:", $selectUsers, array_key_exists("idCoach", $_POST) ? $_POST["idCoach"] : null);
echo $form->text("coachLicence", "Licence coach:", array_key_exists("coachLicence", $_POST) ? $_POST["coachLicence"] : null);
echo $form->select("mainCoach", "Main Coach:", [0 => 'non', 1 => 'oui'], array_key_exists("mainCoach", $_POST) ? $_POST["mainCoach"] : null);

echo $form->number("YearTeam", "Année Team:", array_key_exists("YearTeam", $_POST) ? $_POST["YearTeam"] : null);


echo $form->submit();
echo $form->closeForm();
?>
</div>