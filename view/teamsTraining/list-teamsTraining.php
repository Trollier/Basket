<?php
$ioc = IOC::getInstance();

$teamsTrainingManager = $ioc["teamsTrainingManager"];
$teamsTrainings = $teamsTrainingManager->listAll();
$loginManager = $ioc["loginManager"];
?>
<?php if ($loginManager->isLoggedIn()): ?>

    <div class="container-fluid">
        <p class="pull-right">
            <a href="index.php?action=ajout-teamsTraining" class ="btn btn-warning btn-lg ">Ajout</a>
        </p>

    </div>
<?php endif; ?>

<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <tr>


            <th>idTraining</th>
            <th>idTeam</th>
            <th>currentYear</th>
            <th>dayOfWeek</th>
            <th>startTime</th>
            <th>endTime</th>
            <th>room</th>
            <th>label Team</th>
            <th>labelDay</th>
            <?php if ($loginManager->isLoggedIn()): ?>

                <th>Supprimer</th>
                <th>Editer</th>
            <?php endif; ?>

        </tr>





        <?php
        foreach ($teamsTrainings as $teamsTraining) {
            echo '<tr >';
            echo "<td>" . $teamsTraining->getIdTraining() . "</td>";
            echo "<td>" . $teamsTraining->getIdTeam() . "</td>";
            echo "<td>" . $teamsTraining->getCurrentYear() . "</td>";
            echo "<td>" . $teamsTraining->getDayOfWeek() . "</td>";
            echo "<td>" . $teamsTraining->getStartTime() . "</td>";
            echo "<td>" . $teamsTraining->getEndTime() . "</td>";
            echo "<td>" . $teamsTraining->getRoom() . "</td>";
            echo "<td>" . $teamsTraining->getLabel() . "</td>";
            echo "<td>" . $teamsTraining->getLabelDay() . "</td>";
            if ($loginManager->isLoggedIn()) {
                echo '<td><a href="index.php?id=' . $teamsTraining->getIdTraining() . '&action=delete-teamsTraining" class="btn btn-danger btn-xs">Supprimer</a></td>';
                echo '<td><a href="index.php?id=' . $teamsTraining->getIdTraining() . '&action=edit-teamsTraining" class="btn btn-success btn-xs">Editer</a></td>';
            }
            echo "</tr>";
        }
        ?>
    </table>
</div>


