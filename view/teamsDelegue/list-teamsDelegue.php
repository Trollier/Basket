<?php
$ioc = IOC::getInstance();

$teamsDelegueManager = $ioc["teamsDelegueManager"];
$teamsDelegues = $teamsDelegueManager->listAll();
?>
<div class="container-fluid">
    <p class="pull-right">
        <a href="index.php?action=ajout-teamsDelegue" class ="btn btn-warning btn-lg ">Ajout</a>
    </p>

</div>
<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <tr>
            <th>idTeamDelegue</th>
            <th>idTeam</th>
            <th>idDelegue</th>
            <th>mainDelegue</th>
            <th>yearTeam</th>
            <th>name</th>
            <th>label</th>
            <th>firstname</th>
            <th>Supprimer</th>
            <th>Editer</th>
        </tr>




        <?php
        foreach ($teamsDelegues as $teamsDelegue) {

            echo '<tr >';
            echo "<td>" . $teamsDelegue->getIdTeamDelegue() . "</td>";
            echo "<td>" . $teamsDelegue->getIdTeam() . "</td>";
            echo "<td>" . $teamsDelegue->getIdDelegue() . "</td>";
            echo "<td>" . $teamsDelegue->getMainDelegue() . "</td>";
            echo "<td>" . $teamsDelegue->getYearTeam() . "</td>";
            echo "<td>" . $teamsDelegue->getName() . "</td>";
            echo "<td>" . $teamsDelegue->getLabel() . "</td>";
            echo "<td>" . $teamsDelegue->getFirstname() . "</td>";
            echo '<td><a href="index.php?id=' . $teamsDelegue->getIdTeamDelegue() . '&action=delete-teamsDelegue" class="btn btn-danger btn-xs">Supprimer</a></td>';
            echo '<td><a href="index.php?id=' . $teamsDelegue->getIdTeamDelegue() . '&action=edit-teamsDelegue" class="btn btn-success btn-xs">Editer</a></td>';
            echo "</tr>";
        }
        ?>
    </table>
</div>

