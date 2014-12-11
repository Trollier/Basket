<?php

$ioc = IOC::getInstance();
$typesMatchController= $ioc["typesMatchController"];
$typeMatches = $typesMatchController->listAll();

?>
<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <tr>
            <th>IdTypeMatch</th>
            <th>TypeMatch</th>          
            <th>Editer</th>
            <th>Supprimer</th>
        </tr>

        <?php
        foreach ($typeMatches as $typeMatch) {

            echo '<tr >';
            echo "<td>" . $typeMatch->getIdTypeMatch() . "</td>";
            echo "<td>" . $typeMatch->getTypeMatch() . "</td>";
            echo '<td><a href="index.php?id=' . $typeMatch->getIdTypeMatch() . '&action=edit-typeMatch" class="btn btn-success btn-xs">Editer</a></td>';
            echo '<td><a href="index.php?id=' . $typeMatch->getIdTypeMatch() . '&action=delete-typeMatch" class="btn btn-danger btn-xs">Supprimer</a></td>';
            echo "</tr>";
        }
        ?>
    </table>
</div>



