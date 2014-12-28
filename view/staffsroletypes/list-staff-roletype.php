<?php
$ioc = IOC::getInstance();

$staffsRoleTypeManager = $ioc["staffsRoleTypeManager"];
$staffsRolesTypes = $staffsRoleTypeManager->listAllStaffsRoleTypes();
?>
<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <tr>
            <th>idStaffRoleType</th>
            <th>active</th>
            <th>stafflabel</th>
            <th>ordre</th>
            <th>ShowInMenu</th>            
            <th>idStaff</th>            
            <th>idRoleType</th>            
            <th>rolelabel</th>
            <th>Supprimer</th>
            <th>Editer</th>

        </tr>

        <?php
        foreach ($staffsRolesTypes as $staffsRolesType) {

            echo '<tr >';
            echo "<td>" . $staffsRolesType->getIdStaffRoleType() . "</td>";
            echo "<td>" . $staffsRolesType->getActive() . "</td>";
            echo "<td>" . $staffsRolesType->getStafflabel() . "</td>";
            echo "<td>" . $staffsRolesType->getOrdre() . "</td>";
            echo "<td>" . $staffsRolesType->getShowInMenu() . "</td>";
            echo "<td>" . $staffsRolesType->getIdStaff() . "</td>";
            echo "<td>" . $staffsRolesType->getIdRoleType() . "</td>";
            echo "<td>" . $staffsRolesType->getRolelabel() . "</td>";
            echo '<td><a href="index.php?id=' . $staffsRolesType->getIdStaffRoleType() . '&action=delete-staff-roletype" class="btn btn-danger btn-xs">Supprimer</a></td>';
            echo '<td><a href="index.php?id=' . $staffsRolesType->getIdStaffRoleType()  . '&action=edit-staff-roletype" class="btn btn-success btn-xs">Editer</a></td>';

            echo "</tr>";
        }
        ?>
    </table>
</div>



