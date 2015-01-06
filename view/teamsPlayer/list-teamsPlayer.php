<?php
$ioc = IOC::getInstance();

$teamsPlayerManager = $ioc["teamsPlayerManager"];
$teamsPlayers = $teamsPlayerManager->listAll();
$loginManager = $ioc["loginManager"];
?>
<?php if ($loginManager->isLoggedIn()): ?>

    <div class="container-fluid">
        <p class="pull-right">
            <a href="index.php?action=ajout-teamsPlayer" class ="btn btn-warning btn-lg ">Ajout</a>
        </p>

    </div>
<?php endif; ?>

<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <tr>
            <th>idTeamPlayer</th>
            <th>idTeam</th>
            <th>idPlayer</th>
            <th>number</th>
            <th>position</th>
            <th>yearTeam</th>
            <th>name</th>
            <th>firstname</th>
            <th>label</th>
            <?php if ($loginManager->isLoggedIn()): ?>
                <th>Supprimer</th>
                <th>Editer</th>
            <?php endif; ?>

        </tr>





        <?php
        foreach ($teamsPlayers as $teamsPlayer) {
            echo '<tr >';
            echo "<td>" . $teamsPlayer->getIdTeamPlayer() . "</td>";
            echo "<td>" . $teamsPlayer->getIdTeam() . "</td>";
            echo "<td>" . $teamsPlayer->getIdPlayer() . "</td>";
            echo "<td>" . $teamsPlayer->getNumber() . "</td>";
            echo "<td>" . $teamsPlayer->getPosition() . "</td>";
            echo "<td>" . $teamsPlayer->getYearTeam() . "</td>";
            echo "<td>" . $teamsPlayer->getName() . "</td>";
            echo "<td>" . $teamsPlayer->getFirstname() . "</td>";
            echo "<td>" . $teamsPlayer->getLabel() . "</td>";
            if ($loginManager->isLoggedIn()) {
                echo '<td><a href="index.php?id=' . $teamsPlayer->getIdTeamPlayer() . '&action=delete-teamsPlayer" class="btn btn-danger btn-xs">Supprimer</a></td>';
                echo '<td><a href="index.php?id=' . $teamsPlayer->getIdTeamPlayer() . '&action=edit-teamsPlayer" class="btn btn-success btn-xs">Editer</a></td>';
            }
            echo "</tr>";
        }
        ?>
    </table>
</div>


