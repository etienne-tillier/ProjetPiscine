<?php

echo '<div class = "precision"><h2>' . htmlspecialchars(ucfirst($r->getNomRecette())) . '</h2>' .
 '<li> Auteur : ' . htmlspecialchars($auteur->getPrenomAuteur()) . ' ' . htmlspecialchars($auteur->getNomAuteur()) .'</li>' .
 '<li> nombre de portion : ' . htmlspecialchars($r->getNombrePortion())  . '</li>' .
 '<li> Prix de main d\'oeuvre : ' . htmlspecialchars($r->getPrixMainOeuvre()) . ' Multiplicateur : ' . htmlspecialchars($r->getMultiplicateur())  . '</li></div>';

echo '<div class="IngredientRecette"><h3>Ingredient</h3><ul>';
foreach($tabIngredients as $ingredient) {
 echo '<li class="RecetteListeIngredient">' . htmlspecialchars($ingredient[0]->getNomIngredient()) . ' ' . htmlspecialchars($ingredient[1]) . ' ' . htmlspecialchars($ingredient[0]->getUnite()) .'</li>';
}
echo '</ul></div>';

 echo '<a href="index.php?action=delete&controller=recette&idRecette=' . rawurlencode($r->getIdRecette()) . '"> Supprimer l\'ingrédient </a>';
 echo '<a href="index.php?action=update&controller=recette&idRecette=' . rawurlencode($r->getIdRecette()) . '"> Modifier l\'ingrédient </a>';?>

    
<?php
// if (Session::is_admin()) {
//     echo '<br><a href = "index.php?action=update&controller=pierre&idpierre=' . rawurlencode($p->getIdPierre()) . '"> Mettre à jour le produit </a>' .
//     '<br><a href = "index.php?action=delete&controller=pierre&idpierre=' . rawurlencode($p->getIdPierre()) . '"> Supprimer le produit </a></div>';
// }
?>