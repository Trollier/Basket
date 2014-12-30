<?php
$ioc = IOC::getInstance();

$roleManager = $ioc["roleManager"];
$roles = $roleManager->listAllRole();
?>
<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <tr>
            
            <th>idUser</th>
            <th>name</th>
            <th>firstname</th>
            <th>roleTypeId</th>
            <th>label</th>  
            <th>idRole</th>
            <th>Supprimer</th>
            <th>Editer</th>

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
            echo '<td><a href="index.php?id=' . $role->getIdRole() . '&action=delete-role" class="btn btn-danger btn-xs">Supprimer</a></td>';
            echo '<td><a href="index.php?id=' . $role->getIdRole()  . '&action=edit-role" class="btn btn-success btn-xs">Editer</a></td>';

            echo "</tr>";
        }
        ?>
    </table>
</div>


