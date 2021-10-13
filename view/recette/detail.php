<link rel="stylesheet" type="text/css" href="style/style_details_recette.css">

<div id="detail">
    <div id="precision_titre"><?php echo htmlspecialchars(ucfirst($r->getNomRecette())) ?></div>
    <div id="precision_contenu">
        <?php 
            echo '<li> Auteur : ' . htmlspecialchars($auteur->getPrenomAuteur()) . ' ' . htmlspecialchars($auteur->getNomAuteur()) .'</li>' . 
            '<li> Nombre de portion : ' . htmlspecialchars($r->getNombrePortion())  . '</li>' . 
            '<li> Prix de main d\'oeuvre : ' . htmlspecialchars($r->getPrixMainOeuvre()) . '</li>' . 
            '<li> Multiplicateur : ' . htmlspecialchars($r->getMultiplicateur())  . '</li>' .
            '<li> Descriptif : ' . htmlspecialchars($r->getDescriptif())  . '</li>' .
        '<li> Progression : ' . htmlspecialchars($r->getProgression())  . '</li>';
        ?>
    </div>
    <div id="titre_precision_ingredient">
        <p>Ingrédients</p>
    </div>
    <div id="precision_ingredient">
        <?php 
        foreach($tabIngredients as $ingredient) {
            echo '<li>' . htmlspecialchars($ingredient[0]->getNomIngredient()) . ' ' . htmlspecialchars($ingredient[1]) . ' ' . htmlspecialchars($ingredient[0]->getUnite()) .'</li>';
        }
        ;
        ?>
    </div>

    <div id="precision_fonction">
        <ul>
            <li><?php echo '<a href="index.php?action=delete&controller=recette&idRecette=' . rawurlencode($r->getIdRecette()) . '"> Supprimer la recette </a>'; ?></li>
            <li><?php echo '<a href="index.php?action=update&controller=recette&idRecette=' . rawurlencode($r->getIdRecette()) . '"> Modifier la recette </a>'; ?></li>
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