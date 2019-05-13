<hgroup>
    <h3 class="aligner txtGras">Instruments de musique</h3>
    <h4 class="text-muted aligner">Pianos digitaux - Guitares électriques</h4>
</hgroup>


<?php

$artistes = new ArtistesDB($cnx);
$art = $artistes->getAllArtistes();
$nbr_art = count($art);
print $nbr_art;

$albart = new AlbumDB($cnx);

$liste = array();
$liste = null;

if (!isset($_GET['submit_choix_type'])) {
    $liste = $albart->getAllAlbum();
}
//avec filtre si on a fait un choix dans la liste déroulante: 
else {
    if (isset($_GET['choix_type']) && $_GET['choix_type'] != "") {
        $liste = $albart->getAlbumByArtiste($_GET['choix_type']);
    } else {
        $liste = $albart->getAllAlbum();
    }
}
?>


<div class="container">
    <form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get">
        <div class="row">  
            <div class="col-sm-1 hidden-sm txtGras text-right">Filtrer</div>               
            <div class="col-sm-11">
                <select name="choix_type" id="choix_type">
                    <option value="">Tous les albums</option>
                    <?php
                    for ($i = 0; $i < $nbr_art; $i++) {
                        ?>
                        <option value="<?php print $art[$i]->id_artiste; ?>">
                            <?php
                            print $art[$i]->nom_artiste;
                            ?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
                <input type="submit" name="submit_choix_type" id="submit_choix_type">
            </div>
        </div>
    </form>
</div>

<?php
if ($liste != null){
    $nbr = count($liste);
    ?>
    <div class="container ecartTop3pc">
        <?php
        for ($i = 0; $i < $nbr; $i++) {
            ?>
            <div class="row">
                <div class="col-sm-3 offset-1 text-center paddingTop bordureRight border-primary <?php if($i<$nbr-1){ echo 'bordureBottom';}?>">
                    <img src="admin/images/<?php print $liste[$i]['image']; ?>" alt="Photo"/><br/><br/>
                </div>
                <div class="col-sm-5 text-center border-primary paddingEcart <?php if($i<$nbr-1){ echo 'bordureBottom';}?>">
                    <?php
                    print "<br/>" . $liste[$i]['nom_album'] . "<br/><br/>";
                    print $liste[$i]['prix_album'] . " €<br/><br/>";
                    if ($liste[$i]['nombre_restant_album'] > 0) {
                        print "Il reste " . $liste[$i]['nombre_restant_album'] . " album";
                        if ($liste[$i]['nombre_restant_album'] > 1) {
                            print "s";
                        }
                        print " en stock<br/> ";
                    }
                    ?>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
    <?php
}//fin if $nbr >0
else {
    ?>
    <div class="container">
        <p>( contenu signifiant un problème ... )</p>
    </div>
    <?php
}
