<?php

$ioc = IOC::getInstance();
$daysController= $ioc["daysOfWeekController"];
$days = $daysController->listAll();

?>
<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <tr>
            <th>IdTypeMatch</th>
            <th>TypeMatch</th>  
            <th>Supprimer</th>
        </tr>

        <?php
        foreach ($days as $day) {

            echo '<tr >';
            echo "<td>" . $day->getIdDay() . "</td>";
            echo "<td>" . $day->getLabel() . "</td>";
            echo '<td><a href="index.php?id=' . $day->getIdDay() . '&action=delete-daysOfWeek" class="btn btn-danger btn-xs">Supprimer</a></td>';
            echo "</tr>";
        }
        ?>
    </table>
</div>



