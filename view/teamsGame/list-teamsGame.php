<?php
$ioc = IOC::getInstance();

$teamsTrainingManager = $ioc["teamsGamesManager"];
$teamsGames = $teamsTrainingManager->listAll();
$loginManager = $ioc["loginManager"];
?>
<?php if ($loginManager->isLoggedIn()): ?>

    <div class="container-fluid">
        <p class="pull-right">
            <a href="index.php?action=ajout-teamsGame" class ="btn btn-warning btn-lg ">Ajout</a>
        </p>

    </div>
<?php endif; ?>

<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <tr>

            <th>idTeamGame</th>
            <th>idTeam</th>
            <th>currentYear</th>
            <th>gameDay</th>
            <th>gameTime</th>
            <th>label</th>
            <th>label Team</th>
            <?php if ($loginManager->isLoggedIn()): ?>

                <th>Supprimer</th>
                <th>Editer</th>
            <?php endif; ?>

        </tr>

        <?php
        foreach ($teamsGames as $teamsGame) {

            echo '<tr >';
            echo "<td>" . $teamsGame->getIdTeamGame() . "</td>";
            echo "<td>" . $teamsGame->getIdTeam() . "</td>";
            echo "<td>" . $teamsGame->getCurrentYear() . "</td>";
            echo "<td>" . $teamsGame->getGameDay() . "</td>";
            echo "<td>" . $teamsGame->getGameTime() . "</td>";
            echo "<td>" . $teamsGame->getLabelDay() . "</td>";
            echo "<td>" . $teamsGame->getLabel() . "</td>";
            if ($loginManager->isLoggedIn()) {

                echo '<td><a href="index.php?id=' . $teamsGame->getIdTeamGame() . '&action=delete-teamsGame" class="btn btn-danger btn-xs">Supprimer</a></td>';
                echo '<td><a href="index.php?id=' . $teamsGame->getIdTeamGame() . '&action=edit-teamsGame" class="btn btn-success btn-xs">Editer</a></td>';
            }
            echo "</tr>";
        }
        ?>
    </table>
</div>


