<hgroup>
    <h3 class="aligner txtGras">Profil client</h3>
</hgroup>

<?php

$client = new ClientDB($cnx);
$clactu = $client->getClientById($_SESSION['id']);


if (isset($_GET['modifier'])) {
    extract($_GET, EXTR_OVERWRITE);

    if (empty($nom) || empty($prenom) || empty($telephone) || empty($email) ||empty($password1)||empty($password2)||empty($adresse) || empty($numero) || empty($codepostal) || empty($localite) || empty($pays)) {
        $erreur = "<span class='txtRouge txtGras'>Veuillez remplir tous les champs</span>";
    } else if($password1 != $password2) {
        $erreur = "<span class='txtRouge txtGras'>Les mots de passes sont différents</span>";
    }else{
           $cl = new ClientDB($cnx);
           $retour = $cl->updateClient($_GET,$_SESSION['id']);
           if($retour==1){
               echo "<br> modification effectuée!";
                print "<meta http-equiv=\"refresh\": Content=\"0;URL=index.php?page=mon_profil.php\">";
           }
           else if ($retour==2){
               echo "<br> Non modifié";
           }
           //var_dump($_GET);
    }
}

$ok = 0;

?>


    <div class="container">
        
        <?php
        if (isset($erreur))
            print $erreur;
        ?>
        
        <form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get" id="form_commande">
            
                <label for="nom">Nom</label>                
                    <input type="text" name="nom" id="nom" value="<?php echo $clactu[0]->nom_client?>"/>
            <br/>
                <label for="prenom">Prénom</label>
                    <input type="text" name="prenom" id="prenom" value="<?php echo $clactu[0]->prenom_client?>"/>
                    
             <br/>
                <label for="telephone">Téléphone</label>
                    <input type="text" name="telephone" id="telephone" placeholder="xxx/xx.xx.xx" value="<?php echo $clactu[0]->telephone_client?>"/>
                                   
              <br/>
                <label for="email1">Email</label>                
                    <input type="email" id="email" name="email" placeholder="aaa@aaa.aa" value="<?php echo $clactu[0]->mail_client?>"/>
                    
              <br/>
                <label for="password">Mot de passe</label>
                    <input type="password" name="password1" id="password" value="<?php echo $clactu[0]->mdp_client?>"/>
                    
               <br/>
                <label for="password">Confirmez votre mot de passe</label>
                    <input type="password" name="password2" id="password2" value="<?php echo $clactu[0]->mdp_client?>"/>
             
             <br/>
                <label for="adresse">Nom de la rue</label>
                     <input type="text" name="adresse" id="adresse" value="<?php echo $clactu[0]->rue_client?>"/>
                     
                <br/>
                <label for="numero">Numéro</label>                
                    <input type="text" name="numero" id="numero" value="<?php echo $clactu[0]->numero_rue_client?>"/>
                    
            <br/>
                <label for="codepostal">Code postal</label>                
                    <input type="text" name="codepostal" id="codepostal" value="<?php echo $clactu[0]->code_postal_client?>"/>
                    
            <br/>
                <label for="localite">Localité</label>
                    <input type="text" name="localite" id="localite" value="<?php echo $clactu[0]->localite_client?>"/>
            <br/>
                <label for="pays">Pays</label>
                    <input type="text" name="pays" id="pays" value="<?php echo $clactu[0]->pays_client?>"/>
            
            
                    
                    <input type="submit" name="modifier" id="modifier" value="Modifier mon profil" class="pull-right"/>&nbsp;           
                    <input type="reset" id="reset" value="Annuler" class="pull-left"/>
        </form>
    </div>
    <?php

?>


