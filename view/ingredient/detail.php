<link rel="stylesheet" type="text/css" href="style/style_details_ingredient.css">

<div id="detail">
    <div  id = "precision_titre"><?php echo ucfirst($i->getNomIngredient())?></div>
    <div id="precision_contenu"><?php echo "<li class> Prix : " . htmlspecialchars($i->getPrixUnitaire()) . "€ / " . htmlspecialchars($i->getUnite()) . "</li>" . "<br>" . "<li class> Allergene : " . (($i->getAllergene() == 1 ? "Oui" : "Non") . "</li>");?></div>
    <div id="precision_fonction">
        <ul>
            <li><?php echo '<a href="index.php?action=delete&controller=ingredient&idIngredient=' . rawurlencode($i->getIdIngredient()) . '"> Supprimer l\'ingrédient </a>';?></li>
            <li><?php echo '<a href="index.php?action=update&controller=ingredient&idIngredient=' . rawurlencode($i->getIdIngredient()) . '"> Modifier l\'ingrédient </a>';?></li>
        </ul>
    </div>
</div>

<?php //= ModelPierre::estAchete($i->getIdPierre()) ? "" : "<p><a href=\"index.php?controller=pierre&action=ajouterPanier&idpierre=" . $i->getIdPierre() . "\">Ajouter au panier</a></p>"?>
    
<?php
// if (Session::is_admin()) {
//     echo '<br><a href = "index.php?action=update&controller=pierre&idpierre=' . rawurlencode($p->getIdPierre()) . '"> Mettre à jour le produit </a>' .
//     '<br><a href = "index.php?action=delete&controller=pierre&idpierre=' . rawurlencode($p->getIdPierre()) . '"> Supprimer le produit </a></div>';
// }
?>