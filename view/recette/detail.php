<link rel="stylesheet" type="text/css" href="style/style_details_recette.css">
    <div id='detail'> 
        <?php include("imprimer_Fiche_tech.php"); ?>
        <style> 
            #impression_ft
            {
                display : none;
            }
        </style>
    </div> 
    <div id="precision_fonction">
        <ul>
            <!--onclick pour la confirmation; Return Confirm("test");Fonction Confirm qui va afficher la popup de confirmation -->
            <li><?php echo '<a href="index.php?action=delete&controller=recette&idRecette=' . rawurlencode($r->getIdRecette()) . '" onclick="return confirm(\'Voulez vous supprimer cette recette?\')"> Supprimer la recette </a>';?></li>
            <li><?php echo '<a href="index.php?action=update&controller=recette&idRecette=' . rawurlencode($r->getIdRecette()) . '"> Modifier la recette </a>'; ?></li>
            <li><?php echo '<a href="index.php?action=choiximpression&controller=recette&idRecette=' . rawurlencode($r->getIdRecette()) . '"> Imprimez</a>'; ?></li>
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