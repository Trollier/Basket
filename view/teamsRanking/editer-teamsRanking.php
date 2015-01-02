<?php
$ioc = IOC::getInstance();
$teamsCoachManager = $ioc["teamsRankingManager"];
$teams= $teamsCoachManager->listAllTeams();


$selectTeams= array();

foreach($teams as $team){ 
    $selectTeams[$team->getIdTeam()] = $team->getLabel();
}

$teamsCoach= $teamsCoachManager->get($_GET["id"]);

if (isset($_SESSION["error"])) {
    echo "<div class='alert alert-danger'>" . $_SESSION['error'] . "</div>";
    unset($_SESSION["error"]);
}

$form = new Form("index.php?action=edit-teamsRanking", "post");
echo $form->openForm();
echo $form->select("idTeam", "Equipe:", $selectTeams, $teamsCoach->getIdTeam());
echo $form->text("name", "nom Equipe:", $teamsCoach->getName());
echo $form->date("dateRanking","date classement:",$teamsCoach->getDateRanking());
echo $form->number("deuce","egalité:",$teamsCoach->getDeuce());
echo $form->number("lost","perdu:",$teamsCoach->getLost());
echo $form->number("played", "jouer:", $teamsCoach->getPlayed());
echo $form->number("win", "gagner:", $teamsCoach->getWin());
echo $form->number("myYear","Annee",$teamsCoach->getMyYear());
echo $form->hidden("idRanking",null,$teamsCoach->getIdRanking());



echo $form->submit();
echo $form->closeForm();
?>

