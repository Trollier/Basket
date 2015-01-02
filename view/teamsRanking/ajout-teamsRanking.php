<?php
$ioc = IOC::getInstance();
$teamsRankingManager = $ioc["teamsRankingManager"];
$teams= $teamsRankingManager->listAllTeams();


$selectTeams= array();

foreach($teams as $team){ 
    $selectTeams[$team->getIdTeam()] = $team->getLabel();
}

if (isset($_SESSION["error"])) {
    echo "<div class='alert alert-danger'>" . $_SESSION['error'] . "</div>";
    unset($_SESSION["error"]);
}


$form = new Form("index.php?action=ajout-teamsRanking", "post");
echo $form->openForm();

echo $form->select("idTeam", "Equipe:",$selectTeams, array_key_exists("idTeam", $_POST)?$_POST["idTeam"]:null);
echo $form->text("name", "nom Equipe:", array_key_exists("name", $_POST)?$_POST["name"]:null);
echo $form->date("dateRanking","date classement:",array_key_exists("dateRanking", $_POST)?$_POST["dateRanking"]:null);
echo $form->number("deuce","egalité:",array_key_exists("deuce", $_POST)?$_POST["deuce"]:null);
echo $form->number("lost","perdu:",array_key_exists("lost", $_POST)?$_POST["lost"]:null);
echo $form->number("played", "jouer:", array_key_exists("played", $_POST)?$_POST["played"]:null);
echo $form->number("win", "gagner:", array_key_exists("win", $_POST)?$_POST["win"]:null);
echo $form->number("myYear","Annee",array_key_exists("myYear", $_POST)?$_POST["myYear"]:null);

echo $form->submit();
echo $form->closeForm();
?>
</div>