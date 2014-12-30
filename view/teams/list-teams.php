<?php
$ioc = IOC::getInstance();

$teamsManager = $ioc["teamsManager"];
$teams = $teamsManager->listAll();

?>
<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <tr>
            
            <th>IdTeam</th>
            <th>label</th> 
            <th>active</th>
            <th>ageMax</th>
            <th>GodFather</th>             
            <th>ordre</th>
             <th>name</th>
              <th>firstname</th>
           <th>Supprimer</th>
            <th>Editer</th>
            <th>activer</th>
        </tr>

        <?php
        foreach ($teams as $team) {
               
            echo '<tr >';
            echo "<td>" . $team->getIdTeam() . "</td>";
            echo "<td>" . $team->getLabel() . "</td>";
            echo "<td>" . $team->getActive() . "</td>";
            echo "<td>" . $team->getAgeMax() . "</td>";
            echo "<td>" . $team->getGodFather() . "</td>";
            echo "<td>" . $team->getOrdre() . "</td>";
            echo "<td>" . $team->getName() . "</td>";
            echo "<td>" . $team->getFirstname() . "</td>";
            echo '<td><a href="index.php?id=' . $team->getIdTeam() . '&action=delete-teams" class="btn btn-danger btn-xs">Supprimer</a></td>';
            echo '<td><a href="index.php?id=' . $team->getIdTeam()  . '&action=edit-teams" class="btn btn-success btn-xs">Editer</a></td>';
             if ($team->getActive() == 0) {
                echo '<td ><a href="index.php?id=' . $team->getIdTeam() . '&action=activate-teams&isActived=1" class="btn btn-primary btn-xs">Desactiver</a></td>';
            } else {
                echo '<td><a href="index.php?id=' . $team->getIdTeam() . '&action=activate-teams&isActived=0" class="btn btn-info btn-xs">Activer</a></td>';
            }
            echo "</tr>";
        }
        ?>
    </table>
</div>


