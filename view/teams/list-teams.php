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
        foreach ($teams as $teamsCoach) {
               
            echo '<tr >';
            echo "<td>" . $teamsCoach->getIdTeam() . "</td>";
            echo "<td>" . $teamsCoach->getLabel() . "</td>";
            echo "<td>" . $teamsCoach->getActive() . "</td>";
            echo "<td>" . $teamsCoach->getAgeMax() . "</td>";
            echo "<td>" . $teamsCoach->getAgeMin() . "</td>";
            echo "<td>" . $teamsCoach->getGodFather() . "</td>";
            echo "<td>" . $teamsCoach->getOrdre() . "</td>";
            echo "<td>" . $teamsCoach->getName() . "</td>";
            echo "<td>" . $teamsCoach->getFirstname() . "</td>";
            echo '<td><a href="index.php?id=' . $teamsCoach->getIdTeam() . '&action=delete-teams" class="btn btn-danger btn-xs">Supprimer</a></td>';
            echo '<td><a href="index.php?id=' . $teamsCoach->getIdTeam()  . '&action=edit-teams" class="btn btn-success btn-xs">Editer</a></td>';
             if ($teamsCoach->getActive() == 0) {
                echo '<td ><a href="index.php?id=' . $teamsCoach->getIdTeam() . '&action=activate-teams&isActived=1" class="btn btn-primary btn-xs">Desactiver</a></td>';
            } else {
                echo '<td><a href="index.php?id=' . $teamsCoach->getIdTeam() . '&action=activate-teams&isActived=0" class="btn btn-info btn-xs">Activer</a></td>';
            }
            echo "</tr>";
        }
        ?>
    </table>
</div>


