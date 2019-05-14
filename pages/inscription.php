<hgroup>
    <h3 class="aligner txtGras">Inscription</h3>
    <h4 class="text-muted aligner">Client</h4>
</hgroup>

<?php

if (isset($_GET['commander'])) {
    extract($_GET, EXTR_OVERWRITE);

    if (empty($nom) || empty($prenom) || empty($telephone) || empty($email) ||empty($password1)||empty($password2)||empty($adresse) || empty($numero) || empty($codepostal) || empty($localite) || empty($pays)) {
        $erreur = "<span class='txtRouge txtGras'>Veuillez remplir tous les champs</span>";
    } else if($password1 != $password2) {
        $erreur = "<span class='txtRouge txtGras'>Les mots de passes sont différents</span>";
    }else{
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

?>
    <span class="txtGras">Veuillez entrer vos coordonnées :</span> <br/><br/>

    <div class="container">
        
        <?php
        if (isset($erreur))
            print $erreur;
        ?>
        
        <form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get" id="form_commande">
            
                <label for="nom">Nom</label>                
                    <input type="text" name="nom" id="nom"/>
            <br/>
                <label for="prenom">Prénom</label>
                    <input type="text" name="prenom" id="prenom" />
                    
             <br/>
                <label for="telephone">Téléphone</label>
                    <input type="text" name="telephone" id="telephone" placeholder="xxx/xx.xx.xx"/>
                                   
              <br/>
                <label for="email1">Email</label>                
                    <input type="email" id="email" name="email" placeholder="aaa@aaa.aa"/>
                    
              <br/>
                <label for="password">Mot de passe</label>
                    <input type="password" name="password1" id="password" />
                    
               <br/>
                <label for="password">Confirmez votre mot de passe</label>
                    <input type="password" name="password2" id="password2" />
             
             <br/>
                <label for="adresse">Nom de la rue</label>
                     <input type="text" name="adresse" id="adresse" />
                     
                <br/>
                <label for="numero">Numéro</label>                
                    <input type="text" name="numero" id="numero" />
                    
            <br/>
                <label for="codepostal">Code postal</label>                
                    <input type="text" name="codepostal" id="codepostal" />
                    
            <br/>
                <label for="localite">Localité</label>
                    <input type="text" name="localite" id="localite" />
            <br/>
                <label for="pays">Pays</label>
                    <input type="text" name="pays" id="pays" />
            
            
                    
                    <input type="submit" name="commander" id="commander" value="Finaliser ma commande" class="pull-right"/>&nbsp;           
                    <input type="reset" id="reset" value="Annuler" class="pull-left"/>
        </form>
    </div>
    <?php

?>
