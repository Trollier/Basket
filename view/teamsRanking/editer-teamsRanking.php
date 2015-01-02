<?php
$ioc = IOC::getInstance();
$teamsRankingManager = $ioc["teamsRankingManager"];
$teams= $teamsRankingManager->listAllTeams();


$selectTeams= array();

foreach($teams as $team){ 
    $selectTeams[$team->getIdTeam()] = $team->getLabel();
}

$teamsRanking= $teamsRankingManager->get($_GET["id"]);

if (isset($_SESSION["error"])) {
    echo "<div class='alert alert-danger'>" . $_SESSION['error'] . "</div>";
    unset($_SESSION["error"]);
}

$form = new Form("index.php?action=edit-teamsRanking", "post");
echo $form->openForm();
echo $form->select("idTeam", "Equipe:", $selectTeams, $teamsRanking->getIdTeam());
echo $form->text("name", "nom Equipe:", $teamsRanking->getName());
echo $form->date("dateRanking","date classement:",$teamsRanking->getDateRanking());
echo $form->number("deuce","egalité:",$teamsRanking->getDeuce());
echo $form->number("lost","perdu:",$teamsRanking->getLost());
echo $form->number("played", "jouer:", $teamsRanking->getPlayed());
echo $form->number("win", "gagner:", $teamsRanking->getWin());
echo $form->number("myYear","Annee",$teamsRanking->getMyYear());
echo $form->hidden("idRanking",null,$teamsRanking->getIdRanking());



echo $form->submit();
echo $form->closeForm();
?>

