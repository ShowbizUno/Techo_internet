<hgroup>
    <h3 class="aligner txtGras">Instruments de musiques</h3>
    <h4 class="text-muted aligner">Commande</h4>
</hgroup>

<?php

if (isset($_GET['commander'])) {
    extract($_GET, EXTR_OVERWRITE);

    if (empty($email1) || empty($email2) || empty($nom) || empty($prenom) || empty($telephone) || empty($adresse) || empty($numero) || empty($codepostal) || empty($localite)) {
        $erreur = "<span class='txtRouge txtGras'>Veuillez remplir tous les champs</span>";
    } else {
           $cl = new ClientDB($cnx);
           $retour = $cl->addClient($_GET);
           if($retour==1){
               echo "<br> insertion effectuée!";
           }
           else if ($retour==2){
               echo "<br> Cette personne est déjà encodée!!";
           }
           //var_dump($_GET);
    }
}

$ok = 0;


if (!isset($_GET['id_produit'])) {
    print "<p><br/><span class='txtGras'>Pour commander, choisissez <a href='index.php?page=instruments_digitaux.php'>ici</a> votre article</span></p>";
} else {
    
    $vue = new Vue_produit_genre_typeDB($cnx);
    $liste = array();
    $liste = null;
    $liste = $vue->getProduitByID($_GET['id_produit']);
    
    print "<br/>Afficher ici le rappel du produit commandé<br/><br/>";
    ?>
    <div class="row">
        <div class="col-xs-2 col-sm-2">
            <img src="./admin/images/<?php echo $liste[0]['image']?>" alt="Votre commande"/>
        </div>
        <div class="col-xs-10 col-sm-10">
            <br/><h4><span class="txtGras">Votre commande : </h4>
                <br><span class="tabulation_descri">Nom de votre produit: <?php echo $liste[0]['nom_produit']?></span></dd>
                <br><span class="tabulation_descri">Marque de votre produit: <?php echo $liste[0]['description']?></span>
            </span><br/>
                
        </div>
    </div>
    <br/>
    <span class="txtGras">Veuillez entrer vos coordonnées :</span> <br/><br/>

    <div class="container">
        
        <?php
        if (isset($erreur))
            print $erreur;
        ?>
        
        <form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get" id="form_commande">
            <br/>
                <label for="email1">Email</label>                
                    <input type="email" id="email1" name="email1" placeholder="aaa@aaa.aa"/>
            <br/>
               <label for="email2">Confirmez votre email</label>
                    <input type="email" id="email2" name="email2" placeholder="aaa@aaa.aa"/>
            <br/>
                <label for="nom">Nom</label>                
                    <input type="text" name="nom" id="nom" />
            <br/>
                <label for="prenom">Prénom</label>
                    <input type="text" name="prenom" id="prenom" />
                               
              <br/>
                <label for="password">Mot de passe</label>
                    <input type="password" name="password" id="password" />
                    
              <br/>
              
                <label for="telephone">Téléphone</label>
                    <input type="text" name="telephone" id="telephone" placeholder="xxx/xx.xx.xx"/>
             <br/>
                <label for="adresse">Adresse</label>
                     <input type="text" name="adresse" id="adresse" />
                <br/>
                <label for="numero">Numéro</label>                
                    <input type="text" name="numero" id="numero" />
                <br/>
                <label for="codepostal">Code postal</label>                
                    <input type="text" name="codepostal" id="codepostal" />
               <br/>
                <label for="localite">Localité</label>
                <br/>
                    <input type="text" name="localite" id="localite" />
            <br/>
                    <input type="hidden" name="id_produit" value="<?php print $_GET['id_produit']; ?>"/>
                    <input type="submit" name="commander" id="commander" value="Finaliser ma commande" class="pull-right"/>&nbsp;           
                    <input type="reset" id="reset" value="Annuler" class="pull-left"/>
        </form>
    </div>
    <?php
}
?>
