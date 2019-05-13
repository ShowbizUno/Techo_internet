<h2>Inscription</h2>
<?php
if (isset($_POST['submit_login'])) {
    //pour pouvoir utiliser les données hors tabl $_GET ou $_POST
    extract($_POST, EXTR_OVERWRITE);
    $log = new ClientDB($cnx);
    //$admin et $password sont les noms des champs du formulaire
    $nomc = $log->getAdmin($admin, $password);
    var_dump($admin);
    if (is_null($admin)) {
        print "<br/>Données incorrectes";
    } else {
        $_SESSION['admin'] = 1;//= lorsque l'utilisateur est admin
        unset($_SESSION['page']);
        //header('Location: http://debian-edu.condorcet.be/~silvana.deluca@condorcet.be/demo1/admin/index.php');
        print "<meta http-equiv=\"refresh\": Content=\"0;URL=./admin/index.php?page=accueil.php\">";
    }
}
?>

<form action="<?php print $_SERVER['PHP_SELF']; ?>" method="post">
    Nom du client: 
    <input type="text" name="nomc" id="nomc" /><br/>
    Password : <input type="password" name="password" id="password"/>
    <br/>
    <input type="submit" name="submit_login" id="submit_login" value="S'inscrire"/>
</form>



