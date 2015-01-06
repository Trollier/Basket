<?php
$ioc = IOC::getInstance();
$staffController = $ioc["staffController"];
$staffs = $staffController->listAll();
$loginManager = $ioc["loginManager"];
?>
<?php if ($loginManager->isLoggedIn()): ?>

    <div class="container-fluid">
        <p class="pull-right">

            <a class ="btn btn-warning btn-lg " href="index.php?action=ajout-staff" >Ajout</a>

        </p>

    </div>
<?php endif; ?>

<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <tr>
            <th>IdStaff</th>
            <th>label</th>
            <th>ordre</th>
            <th>ShowInMenu</th>    
            <?php if ($loginManager->isLoggedIn()): ?>

                <th>Editer</th>
                <th>Supprimer</th>
                <th>Activer/Désactiver</th>
            <?php endif; ?>

        </tr>

        <?php
        foreach ($staffs as $staff) {

            echo '<tr >';
            echo "<td>" . $staff->getIdStaff() . "</td>";
            echo "<td>" . $staff->getLabel() . "</td>";
            echo "<td>" . $staff->getOrdre() . "</td>";
            echo "<td>" . $staff->getShowInMenu() . "</td>";
            if ($loginManager->isLoggedIn()) {

                echo '<td><a href="index.php?id=' . $staff->getIdStaff() . '&action=edit-staff" class="btn btn-success btn-xs">Editer</a></td>';
                echo '<td><a href="index.php?id=' . $staff->getIdStaff() . '&action=delete-staff" class="btn btn-danger btn-xs">Supprimer</a></td>';
                if ($staff->getActive() == 0) {
                    echo '<td ><a href="index.php?id=' . $staff->getIdStaff() . '&action=activateStaff&isActived=1" class="btn btn-primary btn-xs">Desactiver</a></td>';
                } else {
                    echo '<td><a href="index.php?id=' . $staff->getIdStaff() . '&action=activateStaff&isActived=0" class="btn btn-info btn-xs">Activer</a></td>';
                }
            }
            echo "</tr>";
        }
        ?>
    </table>
</div>



