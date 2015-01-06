<?php
$ioc = IOC::getInstance();

$roleManager = $ioc["roleManager"];
$roles = $roleManager->listAllRole();
$loginManager = $ioc["loginManager"];
?>
<?php if ($loginManager->isLoggedIn()): ?>

    <div class="container-fluid">
        <p class="pull-right">

            <a href="index.php?action=ajout-role" class ="btn btn-warning btn-lg ">Ajout</a>

        </p>

    </div>
<?php endif; ?>

<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <tr>

            <th>idUser</th>
            <th>name</th>
            <th>firstname</th>
            <th>roleTypeId</th>
            <th>label</th>  
            <th>idRole</th>
            <?php if ($loginManager->isLoggedIn()): ?>

                <th>Supprimer</th>
                <th>Editer</th>
            <?php endif; ?>

        </tr>

        <?php
        foreach ($roles as $role) {

            echo '<tr >';
            echo "<td>" . $role->getIdUser() . "</td>";
            echo "<td>" . $role->getName() . "</td>";
            echo "<td>" . $role->getFirstname() . "</td>";
            echo "<td>" . $role->getRoleTypeId() . "</td>";
            echo "<td>" . $role->getLabel() . "</td>";
            echo "<td>" . $role->getIdRole() . "</td>";
            if ($loginManager->isLoggedIn()) {


                echo '<td><a href="index.php?id=' . $role->getIdRole() . '&action=delete-role" class="btn btn-danger btn-xs">Supprimer</a></td>';
                echo '<td><a href="index.php?id=' . $role->getIdRole() . '&action=edit-role" class="btn btn-success btn-xs">Editer</a></td>';
            }
            echo "</tr>";
        }
        ?>
    </table>
</div>


