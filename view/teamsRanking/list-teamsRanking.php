<?php
$ioc = IOC::getInstance();

$teamsCoachManager = $ioc["teamsRankingManager"];
$teamsRankings = $teamsCoachManager->listAll();

?>
<div class="container-fluid">
    <p class="pull-right">
                    <a href="index.php?action=ajout-teamsRanking" class ="btn btn-warning btn-lg ">Ajout</a>
    </p>

</div>
<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <tr>
            <th>points</th>
            <th>name</th>
            <th>idRanking</th>
            <th>idTeam</th>
            <th>myYear</th>            
            <th>played</th>
            <th>win</th>
            <th>lost</th>
            <th>deuce</th>            
            <th>dateRanking</th>
            <th>Supprimer</th>
            <th>Editer</th>
        </tr>



        <?php
        foreach ($teamsRankings as $teamsCoach) {
             
            echo '<tr >';
            echo "<td>" . $teamsCoach->getPoints() . "</td>";
            echo "<td>" . $teamsCoach->getName() . "</td>";
            echo "<td>" . $teamsCoach->getIdRanking() . "</td>";
            echo "<td>" . $teamsCoach->getIdTeam() . "</td>";
            echo "<td>" . $teamsCoach->getMyYear() . "</td>";            
            echo "<td>" . $teamsCoach->getPlayed() . "</td>";
            echo "<td>" . $teamsCoach->getWin() . "</td>";
            echo "<td>" . $teamsCoach->getLost() . "</td>";
            echo "<td>" . $teamsCoach->getDeuce() . "</td>";            
            echo "<td>" . $teamsCoach->getDateRanking() . "</td>";            
            echo '<td><a href="index.php?id=' . $teamsCoach->getIdRanking() . '&action=delete-teamsRanking" class="btn btn-danger btn-xs">Supprimer</a></td>';
            echo '<td><a href="index.php?id=' . $teamsCoach->getIdRanking()  . '&action=edit-teamsRanking" class="btn btn-success btn-xs">Editer</a></td>';
            echo "</tr>";
        }
        ?>
    </table>
</div>


