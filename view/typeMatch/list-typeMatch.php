<?php
$ioc = IOC::getInstance();
$typesMatchController = $ioc["typesMatchController"];
$typeMatches = $typesMatchController->listAll();
$loginManager = $ioc["loginManager"];
?>
<?php if ($loginManager->isLoggedIn()): ?>

    <div class="container-fluid">
        <p class="pull-right">

            <a href="index.php?action=ajout-typeMatch" class ="btn btn-warning btn-lg ">Ajout</a>

        </p>

    </div>
<?php endif; ?>

<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <tr>
            <th>IdTypeMatch</th>
            <th>TypeMatch</th>  
            <?php if ($loginManager->isLoggedIn()): ?>

                <th>Editer</th>
                <th>Supprimer</th>
            <?php endif; ?>

        </tr>

        <?php
        foreach ($typeMatches as $typeMatch) {

            echo '<tr >';
            echo "<td>" . $typeMatch->getIdTypeMatch() . "</td>";
            echo "<td>" . $typeMatch->getTypeMatch() . "</td>";
            if ($loginManager->isLoggedIn()) {

                echo '<td><a href="index.php?id=' . $typeMatch->getIdTypeMatch() . '&action=edit-typeMatch" class="btn btn-success btn-xs">Editer</a></td>';
                echo '<td><a href="index.php?id=' . $typeMatch->getIdTypeMatch() . '&action=delete-typeMatch" class="btn btn-danger btn-xs">Supprimer</a></td>';
            }
            echo "</tr>";
        }
        ?>
    </table>
</div>



