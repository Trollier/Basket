<?php

$ioc = IOC::getInstance();
$playerController= $ioc["playerController"];
$players = $playerController->listAll();
?>
<div class="container-fluid">
    <p class="pull-right">
        
                    <a class ="btn btn-warning btn-lg "  href="index.php?action=ajout-player" >Ajout</a>

    </p>

</div>
<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <tr>
            <th>Id</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Email</th>
            <th>date Naissance</th>
            <th>Editer</th>
            <th>Supprimer</th>
            <th>Activer/Désactiver</th>
        </tr>

        <?php
        foreach ($players as $player) {

            echo '<tr >';
            echo "<td>" . $player->getIdPlayer() . "</td>";
            echo "<td>" . $player->getName() . "</td>";
            echo "<td>" . $player->getFirstname() . "</td>";
            echo "<td>" . $player->getEmail() . "</td>";
            echo "<td>" . $player->getBirthdate() . "</td>";

            echo '<td><a href="index.php?id=' . $player->getIdPlayer() . '&action=edit-player" class="btn btn-success btn-xs">Editer</a></td>';
            echo '<td><a href="index.php?id=' . $player->getIdPlayer() . '&action=delete-player" class="btn btn-danger btn-xs">Supprimer</a></td>';
            if ($player->getActive() == 0) {
                echo '<td ><a href="index.php?id=' . $player->getIdPlayer() . '&action=activatePlayer&isActived=1" class="btn btn-primary btn-xs">Desactiver</a></td>';
            } else {
                echo '<td><a href="index.php?id=' . $player->getIdPlayer() . '&action=activatePlayer&isActived=0" class="btn btn-info btn-xs">Activer</a></td>';
            }
            echo "</tr>";
        }
        ?>
    </table>
</div>



