<?php
$ioc = IOC::getInstance();
$daysController = $ioc["daysOfWeekController"];
$days = $daysController->listAll();
$loginManager = $ioc["loginManager"];
?>
<?php if ($loginManager->isLoggedIn()): ?>

    <div class="container-fluid">
        <p class="pull-right">

            <a href="index.php?action=ajout-daysOfWeek" class ="btn btn-warning btn-lg ">Ajout</a>

        </p>

    </div>
<?php endif; ?>

<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <tr>
            <th>IdTypeMatch</th>
            <th>TypeMatch</th>  
<?php if ($loginManager->isLoggedIn()): ?>

                <th>Supprimer</th>
<?php endif; ?>

        </tr>

<?php
foreach ($days as $day) {

    echo '<tr >';
    echo "<td>" . $day->getIdDay() . "</td>";
    echo "<td>" . $day->getLabel() . "</td>";
    if ($loginManager->isLoggedIn()) {

        echo '<td><a href="index.php?id=' . $day->getIdDay() . '&action=delete-daysOfWeek" class="btn btn-danger btn-xs">Supprimer</a></td>';
    }
    echo "</tr>";
}
?>
    </table>
</div>



