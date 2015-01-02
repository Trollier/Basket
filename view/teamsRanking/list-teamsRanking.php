<?php
$ioc = IOC::getInstance();

$teamsRankingManager = $ioc["teamsRankingManager"];
$teamsRankings = $teamsRankingManager->listAll();

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
        foreach ($teamsRankings as $teamsRanking) {
             
            echo '<tr >';
            echo "<td>" . $teamsRanking->getPoints() . "</td>";
            echo "<td>" . $teamsRanking->getName() . "</td>";
            echo "<td>" . $teamsRanking->getIdRanking() . "</td>";
            echo "<td>" . $teamsRanking->getIdTeam() . "</td>";
            echo "<td>" . $teamsRanking->getMyYear() . "</td>";            
            echo "<td>" . $teamsRanking->getPlayed() . "</td>";
            echo "<td>" . $teamsRanking->getWin() . "</td>";
            echo "<td>" . $teamsRanking->getLost() . "</td>";
            echo "<td>" . $teamsRanking->getDeuce() . "</td>";            
            echo "<td>" . $teamsRanking->getDateRanking() . "</td>";            
            echo '<td><a href="index.php?id=' . $teamsRanking->getIdRanking() . '&action=delete-teamsRanking" class="btn btn-danger btn-xs">Supprimer</a></td>';
            echo '<td><a href="index.php?id=' . $teamsRanking->getIdRanking()  . '&action=edit-teamsRanking" class="btn btn-success btn-xs">Editer</a></td>';
            echo "</tr>";
        }
        ?>
    </table>
</div>


