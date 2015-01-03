<?php
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
if (isset($_SESSION["error"])) {
    echo "<div class='alert alert-danger'>" . $_SESSION['error'] . "</div>";
    unset($_SESSION["error"]);
}


$form = new Form("index.php?action=ajout-teamsDelegue", "post");
echo $form->openForm();

echo $form->select("idTeam", "Equipe:", $selectTeams, array_key_exists("idTeam", $_POST) ? $_POST["idTeam"] : null);
echo $form->select("idDelegue", "idDelegue:", $selectUsers, array_key_exists("idDelegue", $_POST) ? $_POST["idDelegue"] : null);
echo $form->select("mainDelegue", "MainDelegue",[0 => 'non', 1 => 'oui'], array_key_exists("mainDelegue", $_POST) ? $_POST["mainDelegue"] : null);
echo $form->number("YearTeam", "Année Team:", array_key_exists("YearTeam", $_POST) ? $_POST["YearTeam"] : null);


echo $form->submit();
echo $form->closeForm();
?>
</div>