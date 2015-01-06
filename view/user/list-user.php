<?php
$ioc = IOC::getInstance();
$userController = $ioc["userController"];
$users = $userController->listAll();
$loginManager = $ioc["loginManager"];
?>

<div class="container-fluid">
    <p class="pull-right">

        <a class ="btn btn-warning btn-lg " href="index.php?action=ajout-user" >S'inscrire</a>

    </p>


</div>
<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <tr>
            <th>Id</th>
            <th>Nom</th>
            <th>Prenom</th>
            <?php if ($loginManager->isLoggedIn()): ?>

                <th>Email</th>

                <th>Editer</th>
                <th>Supprimer</th>
                <th>Activer/Désactiver</th>
            <?php endif; ?>

        </tr>

        <?php
        foreach ($users as $user) {

            echo '<tr >';
            echo "<td>" . $user->getIdUser() . "</td>";
            echo "<td>" . $user->getName() . "</td>";
            echo "<td>" . $user->getFirstname() . "</td>";
            if ($loginManager->isLoggedIn()) {

                echo "<td>" . $user->getMail() . "</td>";

                echo '<td><a href="index.php?id=' . $user->getIdUser() . '&action=edit-user" class="btn btn-success btn-xs">Editer</a></td>';
                echo '<td><a href="index.php?id=' . $user->getIdUser() . '&action=delete-user" class="btn btn-danger btn-xs">Supprimer</a></td>';


                if ($user->getActive() == 0) {
                    echo '<td ><a href="index.php?id=' . $user->getIdUser() . '&action=activateUser&isActived=1" class="btn btn-primary btn-xs">Desactiver</a></td>';
                } else {
                    echo '<td><a href="index.php?id=' . $user->getIdUser() . '&action=activateUser&isActived=0" class="btn btn-info btn-xs">Activer</a></td>';
                }
            }
            echo "</tr>";
        }
        ?>
    </table>
</div>



