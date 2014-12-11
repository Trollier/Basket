<?php

$ioc = IOC::getInstance();
$userController= $ioc["userController"];
$users = $userController->listAll();
?>
<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <tr>
            <th>Id</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Email</th>
            <th>Mot de passe</th>
            <th>Editer</th>
            <th>Supprimer</th>
            <th>Activer/Désactiver</th>
        </tr>

        <?php
        foreach ($users as $user) {

            echo '<tr >';
            echo "<td>" . $user->getIdUser() . "</td>";
            echo "<td>" . $user->getName() . "</td>";
            echo "<td>" . $user->getFirstname() . "</td>";
            echo "<td>" . $user->getMail() . "</td>";
            echo "<td>" . $user->getPassword() . "</td>";

            echo '<td><a href="index.php?id=' . $user->getIdUser() . '&action=edit-user" class="btn btn-success btn-xs">Editer</a></td>';
            echo '<td><a href="index.php?id=' . $user->getIdUser() . '&action=delete-user" class="btn btn-danger btn-xs">Supprimer</a></td>';
            if ($user->getActive() == 0) {
                echo '<td ><a href="index.php?id=' . $user->getIdUser() . '&action=activateUser&isActived=1" class="btn btn-primary btn-xs">Desactiver</a></td>';
            } else {
                echo '<td><a href="index.php?id=' . $user->getIdUser() . '&action=activateUser&isActived=0" class="btn btn-info btn-xs">Activer</a></td>';
            }
            echo "</tr>";
        }
        ?>
    </table>
</div>



