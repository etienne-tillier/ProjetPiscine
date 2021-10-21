<link rel="stylesheet" type="text/css" href="style/style_details_recette.css">
<script defer>
console.log(<?= $listeAllIng ?>)
var listeIng =(<?= $listeAllIng ?>)

const calculerPrixRecette = (recette) => {
    let somme = 0
    for (let ing of recette){
        if (ing.type == "ingredient"){
            somme += ing.prix * ing.quantite
        }
        if (ing.type == "recette"){
            somme += calculerPrixRecette(ing.ingredients)
        }
    }
    return somme
}

const genererListeAllergene = (recette) => {
    let listeAllergene = []
    for (let ing of recette){
        if (ing.type == "ingredient" && ing.allergene == 1){
            listeAllergene.push(ing)
        }
        if (ing.type == "recette"){
            listeAllergene.concat(genererListeAllergene(ing.ingredients))
        }
    }
    return listeAllergene
}

const afficherAllergene = (recette) => {
    listeAllergene = genererListeAllergene(recette)
    console.log(listeAllergene)
}

const afficherFicheTech = (list) => {
    for (let ing of list){
        if (ing.type == "ingredient"){
            let PTHT = ing.prix * ing.quantite;
            let augmentationTVA = ing.prix * ing.tva;
            let PTTTC = PTHT + augmentationTVA;
            $("#table").append("<tr class='ingredient'></tr>")
            $("#table tr:last").append("<td>" + ing.code + "</td>")
            $("#table tr:last").append("<td>" + ing.nature + "</td>")
            $("#table tr:last").append("<td>" + ing.unite + "</td>")

            $("#tablePrix").append("<tr class='ingredient'></tr>")
            $("#tablePrix tr:last").append("<td>" + ing.quantite + "</td>")
            $("#tablePrix tr:last").append("<td>" + ing.prix + "</td>")
            $("#tablePrix tr:last").append("<td>" + PTHT + "</td>")
            $("#tablePrix tr:last").append("<td>" + PTTTC + "</td>")
        }
        if (ing.type == "recette"){
            let prix = calculerPrixRecette(ing.ingredients)
            let PTHT = prix * ing.quantite;
            $("#table").append("<tr class='recette' style='font-weight: bold'></tr>")
            $("#table tr:last").append("<td>" + ing.code + "</td>")
            $("#table tr:last").append("<td>" + ing.nature + "</td>")
            $("#table tr:last").append("<td></td>")

            $("#tablePrix").append("<tr class='recette' style='font-weight: bold'></tr>")
            $("#tablePrix tr:last").append("<td>" + ing.quantite + "</td>")
            $("#tablePrix tr:last").append("<td>" + prix + "</td>")
            $("#tablePrix tr:last").append("<td>" + PTHT + "</td>")
            $("#tablePrix tr:last").append("<td></td>")
            afficherFicheTech(ing.ingredients);
        }
    }
}
window.onload = function () {
    afficherFicheTech(listeIng)
    afficherAllergene(listeIng)
}
</script>
<div id="detail">
    <div id="precision_contenu">
        <div id=fiche_tech>
                <div id=entete_fiche>
                    <div id="descriptif">
                        <p class="titre_partie_niv1">Descriptifs</p>
                        <?php echo htmlspecialchars($r->getDescriptif()); ?>
                    </div>
                    <div id="nom">
                        <?php echo htmlspecialchars(ucfirst($r->getNomRecette())) ?>
                    </div>
                </div>
                <div id="denomination">

                    <p class="titre_partie_niv1">Dénomination</br></p>

                    <div id="contenu_den">
                        <table id="table">

                            <tr>
                                <th>Code</th>
                                <th>Nature</th>
                                <th>Unité</th>
                            </tr>
                            
                            <tr>
                                <td><?php ?></td>
                                <td><?php ?></td>
                                <td><?php ?></td>
                            </tr>

                        </table>
                    </div>

                </div>
                <div id="valorisation">

                    <p class="titre_partie_niv1">Valorisation</p>
                    
                    <div id="contenu_val">
                        <table id="tablePrix">
                            <tr>
                                <th>Total</th>
                                <th>Prix U</th>
                                <th>PTHT</th>
                                <th>PTTTC</th>

                            </tr>

                            <tr>
                                <?php
                                ?>
                                <td><?php ?></td>
                                <td><?php ?></td>
                                <td><?php ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div id="calcul_couts">

            </div>
        </div>
    </div>

    <div id="precision_fonction">
        <ul>
            <li><?php echo '<a href="index.php?action=delete&controller=recette&idRecette=' . rawurlencode($r->getIdRecette()) . '"> Supprimer la recette </a>'; ?></li>
            <li><?php echo '<a href="index.php?action=update&controller=recette&idRecette=' . rawurlencode($r->getIdRecette()) . '"> Modifier la recette </a>'; ?></li>
            <li><a href="imprimer_recette.php">Imprimer</li>
</div>
<?php

//echo '<div class = "precision"><h2>' . htmlspecialchars(ucfirst($r->getNomRecette())) . '</h2>' .
 //'<li> Auteur : ' . htmlspecialchars($auteur->getPrenomAuteur()) . ' ' . htmlspecialchars($auteur->getNomAuteur()) .'</li>' .
 //'<li> nombre de portion : ' . htmlspecialchars($r->getNombrePortion())  . '</li>' .
 //'<li> Prix de main d\'oeuvre : ' . htmlspecialchars($r->getPrixMainOeuvre()) . ' Multiplicateur : ' . htmlspecialchars($r->getMultiplicateur())  . '</li></div>';

//echo '<div class="IngredientRecette"><h3>Ingredient</h3><ul>';
//foreach($tabIngredients as $ingredient) {
 //echo '<li class="RecetteListeIngredient">' . htmlspecialchars($ingredient[0]->getNomIngredient()) . ' ' . htmlspecialchars($ingredient[1]) . ' ' . htmlspecialchars($ingredient[0]->getUnite()) .'</li>';
//}
//echo '</ul></div>';

 //echo '<a href="index.php?action=delete&controller=recette&idRecette=' . rawurlencode($r->getIdRecette()) . '"> Supprimer la recette </a>';
 //echo '<a href="index.php?action=update&controller=recette&idRecette=' . rawurlencode($r->getIdRecette()) . '"> Modifier la recette </a>';?>

    
<?php
// if (Session::is_admin()) {
//     echo '<br><a href = "index.php?action=update&controller=pierre&idpierre=' . rawurlencode($p->getIdPierre()) . '"> Mettre à jour le produit </a>' .
//     '<br><a href = "index.php?action=delete&controller=pierre&idpierre=' . rawurlencode($p->getIdPierre()) . '"> Supprimer le produit </a></div>';
// }
?>