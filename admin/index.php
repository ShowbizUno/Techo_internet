
<?php
session_start();
//Index admin
?>
<!DOCTYPE html>
<?php
require 'lib/php/admin_liste_include.php';
$cnx = Connexion::getInstance($dsn, $user, $pass);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">


        <link rel="stylesheet" type="text/css" href="lib/css/style.css"/>
        <link rel="stylesheet" type="text/css" href="lib/css/custom.css"/>
        <title></title>
    </head>
    <body>
        <header>
            <div class="container">
                <?php
                if (file_exists("./lib/php/a_menu.php")) {
                    require './lib/php/a_menu.php';
                }
                ?>
              
            </div>
        </header>
        <section id="main">
            <div class="container">
                <?php
                if (!isset($_SESSION['page'])) {//Première ouverture du site
                    $_SESSION['page'] = "accueil.php";
                }
                if (isset($_GET['page'])) {
                    //On a cliqué sur un lien de menu
                    $_SESSION['page'] = $_GET['page'];
                }
                $path = "./pages/" . $_SESSION['page'];
                if (file_exists($path)) {
                    include ($path);
                } else {
                    include("pages/page404.php"); //A remplacer par une belle image Error 404
                }
                ?>
            </div>
        </section>
        <footer>
            <div class="page-footer font-small">
                
                <?php
                if (file_exists("./pages/footer.php")) {
                    require './pages/footer.php';
                }
                ?>
            </div>
        </footer>
    </body>
</html>

