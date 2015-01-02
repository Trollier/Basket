
<?php
session_start();
?>
<html>
    <head>
        <meta charset="utf-8" />
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="css/core.css" />
        <link rel="stylesheet" href="css/nprogress.css" />
        <title>site</title>
    </head>
    <body>
        <div class="container-fluid">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="index.php">Projet PHP</a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li >                                       
                                <a  class ="menu-ajax" href="index.php?action=list-user" >Utilisateur</a> 
                            </li>
                            <li>
                                <a class ="menu-ajax" href="index.php?action=list-player" >Player</a>
                            </li>
                            <li>
                                <a class ="menu-ajax" href="index.php?action=list-staff" >Staff</a>
                            </li>
                            <li>
                                <a class ="menu-ajax" class ="menu-ajax" href="index.php?action=list-roleType" >RoleType</a>
                            </li>
                            <li>
                                <a class ="menu-ajax" href="index.php?action=list-staff-roletype" >StaffsroleType</a>
                            </li>
                            <li>
                                <a class ="menu-ajax" href="index.php?action=list-typeMatch" >MatchType</a>
                            </li>
                            <li>
                                <a class ="menu-ajax" href="index.php?action=list-daysOfWeek" >Jour</a>
                            </li>
                            <li>
                                <a class ="menu-ajax" href="index.php?action=list-role">Role</a>
                            </li>
                            <li>
                                <a class ="menu-ajax" href="index.php?action=list-teams">Team</a>
                            </li>
                            <li>
                                <a class ="menu-ajax" href="index.php?action=list-teamsRanking">Classement</a>
                            </li>

                        </ul>

                    </div><!--/.nav-collapse -->
                </div><!--/.container-fluid -->
            </nav>
            <div class="row-fluid">
                <div class="container-fluid">
                    <div class="jumbotron">
                        <h1>Projet PHP - Brahim Boukobba<small>&nbsp;(fortement aidé par Nordine Bittich)</small></h1>

                    </div>
                </div>

            </div>

            <div class="row-fluid">


                <div class="container-fluid ">

                    <div class="content-hidden">
                       <?php include_once("ajax_router.php");?>
                    </div>

                </div>

            </div>

        </div>



        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
        <script type="text/javascript" src="js/nprogress.js"></script>
        <script>
            $(document).ready(function () {
                NProgress.configure({ease: 'ease', speed: 500, showSpinner: false });

                $.urlParam = function (name, url) {
                    var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(url);
                    if (results === null) {
                        return null;
                    }
                    else {
                        return results[1] || 0;
                    }
                };

                var ajaxMenuRequest = function (data) {
                    $(".content-hidden").hide();
                    NProgress.start();

                    $.ajax({
                        url: "<?php echo "ajax_router.php"; ?>",
                        data: data,
                        type: "get",
                        dataType: "html",
                        success: function (view) {
                            $(".content-hidden").text("").html(view).fadeIn();
                            NProgress.done();
                        }
                    });
                };
                $(".menu-ajax").click(function (e) {
                    e.preventDefault();
                    var data = {action: $.urlParam("action", $(this).attr('href'))};
                    ajaxMenuRequest(data);

                });


            });

        </script>
    </body>
</html>