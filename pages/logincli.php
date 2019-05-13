<h2>Login client</h2>
<?php
if (isset($_POST['submit_login'])) {
    //pour pouvoir utiliser les données hors tabl $_GET ou $_POST
    extract($_POST, EXTR_OVERWRITE);
    $log = new ClientDB($cnx);
    
    $client = $log->getClient($pseudo, $password);
    var_dump($client);
    if (is_null($client)) {
        print "<br/>Données incorrectes";
    } else {
        $_SESSION['client'] = 1;//= lorsque l'utilisateur est client
        print "<meta http-equiv=\"refresh\": Content=\"0;URL=index.php?page=accueil.php\">";
    }
}
?>

<form action="<?php print $_SERVER['PHP_SELF']; ?>" method="post">
    Login : 
    <input type="text" name="pseudo" id="pseudo" /><br/>
    Password : <input type="password" name="password" id="password"/>
    <br/>
    <input type="submit" name="submit_login" id="submit_login" value="Se connecter"/>
</form>



