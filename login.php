<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Connexion</title>

        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/signin.css" rel="stylesheet">


        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>

        <div class="container">
            <?php if (isset($_SESSION["error"])): ?>
                <div class="alert alert-danger">
                    <?php unset($_SESSION["error"]); ?>
                    <p>Email ou mot de passe incorrect!</p>
                </div>
            <?php endif; ?>


            <form action ="login.php" method="post" class="form-signin">
                <h2 class="form-signin-heading">Connexion</h2>
                <label for="email" class="sr-only">Email</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Email address" required autofocus>
                <label for="password" class="sr-only">Mot de passe</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>

                <input class="btn btn-lg btn-primary btn-block"  type="submit"  value="Connexion" />
            </form>

        </div> <!-- /container -->


    </body>
</html>
<?php
include_once 'include.php';
$ioc = IOC::getInstance();
$loginManager = $ioc["loginManager"];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mail = $_POST["email"];
    $password = $_POST["password"];
    $user = $loginManager->login($mail, $password);
    if ($user !== false) {
        $_SESSION["flash"] = "Vous êtes maintenant loggué en tant que " . $user->getName();
        header("Location: index.php");
    } else {
        $_SESSION["error"] = "Email ou mot de passe incorrect!";
        header("Location:login.php");
    }
}
?>
