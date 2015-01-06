<?php
$ioc = IOC::getInstance();

$teamsCalendarManager = $ioc["teamsCalendarManager"];
$teamsCalendars = $teamsCalendarManager->listAll();
$loginManager = $ioc["loginManager"];
?>
<?php if ($loginManager->isLoggedIn()): ?>

    <div class="container-fluid">
        <p class="pull-right">
            <a href="index.php?action=ajout-teamsCalendar" class ="btn btn-warning btn-lg ">Ajout</a>
        </p>

    </div>
<?php endif; ?>


<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <tr>


            <th>IdCalendar</th>
            <th>DateMatch</th>
            <th>IdTeam</th>
            <th>Label</th>
            <th>MatchNumber</th>
            <th>InTeam</th>
            <th>OutTeam</th>
            <th>ScoreIn</th>
            <th>ScoreOut</th>
            <th>YearTeam</th>
            <th>Modified</th>
            <th>TypeMatch</th>
            <?php if ($loginManager->isLoggedIn()): ?>

                <th>Supprimer</th>
                <th>Editer</th>
            <?php endif; ?>

        </tr>





        <?php
        foreach ($teamsCalendars as $teamsCalendar) {
            echo '<tr >';
            echo "<td>" . $teamsCalendar->getIdCalendar() . "</td>";
            echo "<td>" . $teamsCalendar->getDateMatch() . "</td>";
            echo "<td>" . $teamsCalendar->getIdTeam() . "</td>";
            echo "<td>" . $teamsCalendar->getLabel() . "</td>";
            echo "<td>" . $teamsCalendar->getMatchNumber() . "</td>";
            echo "<td>" . $teamsCalendar->getInTeam() . "</td>";
            echo "<td>" . $teamsCalendar->getOutTeam() . "</td>";
            echo "<td>" . $teamsCalendar->getScoreIn() . "</td>";
            echo "<td>" . $teamsCalendar->getScoreOut() . "</td>";
            echo "<td>" . $teamsCalendar->getYearTeam() . "</td>";
            echo "<td>" . $teamsCalendar->getModified() . "</td>";
            echo "<td>" . $teamsCalendar->getTypeMatch() . "</td>";
                        if ($loginManager->isLoggedIn()) {

            echo '<td><a href="index.php?id=' . $teamsCalendar->getIdCalendar() . '&action=delete-teamsCalendar" class="btn btn-danger btn-xs">Supprimer</a></td>';
            echo '<td><a href="index.php?id=' . $teamsCalendar->getIdCalendar() . '&action=edit-teamsCalendar" class="btn btn-success btn-xs">Editer</a></td>';
                        }
            echo "</tr>";
        }
        ?>
    </table>
</div>


