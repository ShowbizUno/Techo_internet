<hgroup>
    <h3 class="aligner txtGras">Gestion des instruments de musiques</h3>
    <h4 class="text-muted aligner">Pianos digitaux - Guitares électriques</h4>
</hgroup>
<?php
//2016-2017
//récupération des produits
$vue = new ProduitDB($cnx);
$liste = array();
$liste = null;

$liste = $vue->getProduit();
$nbr = count($liste);
?>

<div class="row">
    <div class="col-sm-12">
        <a href="./pages/printCatalogue.php" class="pull-right" target="_blank">Imprimer</a>
    </div>
</div>

<br/>

<h2 id="titre">Illustration d'un tableau dynamique</h2>

<div class="container table">
    <table class="table-responsive">
        <tr>
            <th class="ecart">Id</th>
            <th class="ecart">Genre</th>
            <th class="ecart">Type</th>
            <th class="ecart">Dénomination</th>
            <th class="ecart">Description</th>
            <th class="ecart">Prix</th>
            <th class="ecart">Stocks</th>
        </tr>
        <?php
        for ($i = 0; $i < $nbr; $i++) {
            ?>
            <tr>
                <td class="ecart"><?php print $liste[$i]->id_produit; ?></td>
                <td class="ecart"><?php print $liste[$i]->id_genre; ?></td>
                <td class="ecart"><?php print $liste[$i]->id_type; ?></td>
                <td><span contenteditable="true" name="nom_produit" class="ecart" id="<?php print $liste[$i]->id_produit ?>">
                        <?php print $liste[$i]->nom_produit; ?></span>
                </td>
                <td><span contenteditable="true" name="description" class="ecart" id="<?php print $liste[$i]->id_produit; ?>">
                        <?php print $liste[$i]->description; ?></span>
                </td>
                <td><span contenteditable="true" name="prix" class="ecart" id="<?php print $liste[$i]->id_produit ?>">
                        <?php print $liste[$i]->prix; ?></span>
                </td>
                <td><span contenteditable="true" name="stock" class="ecart" id="<?php print $liste[$i]->id_produit ?>">
                        <?php print $liste[$i]->stock; ?></span>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>  
</div>