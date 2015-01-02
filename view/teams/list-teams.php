<?php
$ioc = IOC::getInstance();

$teamsManager = $ioc["teamsManager"];
$teams = $teamsManager->listAll();

?>
<div class="container-fluid">
    <p class="pull-right">
                    <a href="index.php?action=ajout-teams" class ="btn btn-warning btn-lg ">Ajout</a>


    </p>

</div>
<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <tr>
            
            <th>IdTeam</th>
            <th>label</th> 
            <th>active</th>
            <th>ageMax</th>
            <th>ageMin</th>
            <th>GodFather</th>             
            <th>ordre</th>
             <th>name</th>
              <th>firstname</th>
           <th>Supprimer</th>
            <th>Editer</th>
            <th>activer</th>
        </tr>

        <?php
        foreach ($teams as $teamsRanking) {
               
            echo '<tr >';
            echo "<td>" . $teamsRanking->getIdTeam() . "</td>";
            echo "<td>" . $teamsRanking->getLabel() . "</td>";
            echo "<td>" . $teamsRanking->getActive() . "</td>";
            echo "<td>" . $teamsRanking->getAgeMax() . "</td>";
            echo "<td>" . $teamsRanking->getAgeMin() . "</td>";
            echo "<td>" . $teamsRanking->getGodFather() . "</td>";
            echo "<td>" . $teamsRanking->getOrdre() . "</td>";
            echo "<td>" . $teamsRanking->getName() . "</td>";
            echo "<td>" . $teamsRanking->getFirstname() . "</td>";
            echo '<td><a href="index.php?id=' . $teamsRanking->getIdTeam() . '&action=delete-teams" class="btn btn-danger btn-xs">Supprimer</a></td>';
            echo '<td><a href="index.php?id=' . $teamsRanking->getIdTeam()  . '&action=edit-teams" class="btn btn-success btn-xs">Editer</a></td>';
             if ($teamsRanking->getActive() == 0) {
                echo '<td ><a href="index.php?id=' . $teamsRanking->getIdTeam() . '&action=activate-teams&isActived=1" class="btn btn-primary btn-xs">Desactiver</a></td>';
            } else {
                echo '<td><a href="index.php?id=' . $teamsRanking->getIdTeam() . '&action=activate-teams&isActived=0" class="btn btn-info btn-xs">Activer</a></td>';
            }
            echo "</tr>";
        }
        ?>
    </table>
</div>


