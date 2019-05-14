<hgroup>
    <h3 class="aligner txtGras">Gestion des produits</h3>
</hgroup>
<?php
//2016-2017
//récupération des produits
$vue = new AlbumDB($cnx);
$liste = array();
$liste = null;

$liste = $vue->getAllAlbum();
$nbr = count($liste);
?>

<div class="container table">
    <table class="table-responsive">
        <tr>
            <th class="ecart">Id album</th>
            <th class="ecart">Id artiste</th>
            <th class="ecart">Nom</th>
            <th class="ecart">Prix</th>
            <th class="ecart">Stock</th>
            <th class="ecart">Année</th>
            <th class="ecart">Nom img</th>
        </tr>
        <?php
        for ($i = 0; $i < $nbr; $i++) {
            ?>
            <tr>
                <td class="ecart"><?php print $liste[$i]['id_album']; ?></td>
                <td class="ecart"><?php print $liste[$i]['id_artiste']; ?></td>
                <td><span contenteditable="true" name="nom_album" class="ecart" id="<?php print $liste[$i]['id_album'] ?>">
                        <?php print $liste[$i]['nom_album'] ?></span>
                </td>
                <td><span contenteditable="true" name="prix_album" class="ecart" id="<?php print $liste[$i]['id_album']; ?>">
                        <?php print $liste[$i]['prix_album']; ?></span>
                </td>
                <td><span contenteditable="true" name="nombre_restant_album" class="ecart" id="<?php print $liste[$i]['id_album']; ?>">
                        <?php print $liste[$i]['nombre_restant_album']; ?></span>
                </td>
                <td><span contenteditable="true" name="annee_album" class="ecart" id="<?php print $liste[$i]['id_album']; ?>">
                        <?php print $liste[$i]['annee_album']; ?></span>
                </td>
                <td><span contenteditable="true" name="image" class="ecart" id="<?php print $liste[$i]['id_album²']; ?>">
                        <?php print $liste[$i]['image']; ?></span>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>  
</div>