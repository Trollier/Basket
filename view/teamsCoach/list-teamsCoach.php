<?php
$ioc = IOC::getInstance();

$teamsCoachManager = $ioc["teamsCoachManager"];
$teamsCoachs = $teamsCoachManager->listAll();
$loginManager = $ioc["loginManager"];
?>
<?php if ($loginManager->isLoggedIn()): ?>
    <div class="container-fluid">
        <p class="pull-right">
            <a href="index.php?action=ajout-teamsCoach" class ="btn btn-warning btn-lg ">Ajout</a>
        </p>

    </div>
<?php endif; ?>

<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <tr>
            <th>idTeamCoach</th>
            <th>idTeam</th>
            <th>idCoach</th>
            <th>coachLicence</th>
            <th>mainCoach</th>
            <th>YearTeam</th>
            <th>label</th>
            <th>firstname</th>
            <th>name</th>
            <?php if ($loginManager->isLoggedIn()): ?>

                <th>Supprimer</th>
                <th>Editer</th>
            <?php endif; ?>

        </tr>



        <?php
        foreach ($teamsCoachs as $teamsCoach) {

            echo '<tr >';
            echo "<td>" . $teamsCoach->getIdTeamCoach() . "</td>";
            echo "<td>" . $teamsCoach->getIdTeam() . "</td>";
            echo "<td>" . $teamsCoach->getIdCoach() . "</td>";
            echo "<td>" . $teamsCoach->getCoachLicence() . "</td>";
            echo "<td>" . $teamsCoach->getMainCoach() . "</td>";
            echo "<td>" . $teamsCoach->getYearTeam() . "</td>";
            echo "<td>" . $teamsCoach->getLabel() . "</td>";
            echo "<td>" . $teamsCoach->getFirstname() . "</td>";
            echo "<td>" . $teamsCoach->getName() . "</td>";
            if ($loginManager->isLoggedIn()) {

                echo '<td><a href="index.php?id=' . $teamsCoach->getIdTeamCoach() . '&action=delete-teamsCoach" class="btn btn-danger btn-xs">Supprimer</a></td>';
                echo '<td><a href="index.php?id=' . $teamsCoach->getIdTeamCoach() . '&action=edit-teamsCoach" class="btn btn-success btn-xs">Editer</a></td>';
            }
            echo "</tr>";
        }
        ?>
    </table>
</div>


