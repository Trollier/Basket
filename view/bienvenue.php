<?php
if (!isset($_SESSION)) {
    session_start();
}
$ioc = IOC::getInstance();
$loginManager = $ioc["loginManager"];
if (isset($_SESSION['flash'])) {
    echo "<div class='alert alert-info'>" . $_SESSION['flash'] . "</div>";
    unset($_SESSION["flash"]);
} else {

    echo '<div class="alert alert-success">';
    echo '<p>Page D\'accueil</p> ';
    echo '</div>';
}
?>
<?php if ($loginManager->isLoggedIn()): ?>
<div class="well">
    <p>Bienvenue <?php echo $_COOKIE["user"]?></p>
    <a href="logout.php" class="btn btn-danger">Se déconnecter</a>
    
</div>

<?php endif; ?>

<?php if (!$loginManager->isLoggedIn()): ?>
<div class="well">
    <p>Bienvenue !</p>
    <a href="login.php" class="btn btn-danger">Se connecter</a>
    
</div>

<?php endif; ?>



