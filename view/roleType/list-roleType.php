<?php
$ioc = IOC::getInstance();
$roleTypeController = $ioc["roleTypeController"];
$roleTypes = $roleTypeController->listAll();
$loginManager = $ioc["loginManager"];
?>
<?php if ($loginManager->isLoggedIn()): ?>

    <div class="container-fluid">
        <p class="pull-right">
            <a class ="btn btn-warning btn-lg " href="index.php?action=ajout-roleType" >Ajout</a>


        </p>

    </div>
<?php endif; ?>

<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <tr>
            <th>IdRoleType</th>
            <th>label</th>
            <th>ordre</th>     
            <?php if ($loginManager->isLoggedIn()): ?>

                <th>Editer</th>
                <th>Supprimer</th>
                <th>Activer/Désactiver</th>
            <?php endif; ?>

        </tr>

        <?php
        foreach ($roleTypes as $roleType) {

            echo '<tr >';
            echo "<td>" . $roleType->getRoleTypeId() . "</td>";
            echo "<td>" . $roleType->getLabel() . "</td>";
            echo "<td>" . $roleType->getOrdre() . "</td>";
            if ($loginManager->isLoggedIn()) {

                echo '<td><a href="index.php?id=' . $roleType->getRoleTypeId() . '&action=edit-roleType" class="btn btn-success btn-xs">Editer</a></td>';
                echo '<td><a href="index.php?id=' . $roleType->getRoleTypeId() . '&action=delete-roleType" class="btn btn-danger btn-xs">Supprimer</a></td>';
                if ($roleType->getActive() == 0) {
                    echo '<td ><a href="index.php?id=' . $roleType->getRoleTypeId() . '&action=activateRoleType&isActived=1" class="btn btn-primary btn-xs">Desactiver</a></td>';
                } else {
                    echo '<td><a href="index.php?id=' . $roleType->getRoleTypeId() . '&action=activateRoleType&isActived=0" class="btn btn-info btn-xs">Activer</a></td>';
                }
            }
            echo "</tr>";
        }
        ?>
    </table>
</div>



