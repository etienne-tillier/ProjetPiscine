<?php

echo '<div class = "precision"><h2>' . ucfirst($i->getNomIngredient()) . "</h2>" .
 "<li class> prix : " . htmlspecialchars($i->getPrixUnitaire()) . "/" . htmlspecialchars($i->getUnite()) . "</li>" .
 "<li class> Allergene ? : " . (($i->getAllergene() == 1 ? "Oui" : "Non") . "</li>");
 echo '<a href="index.php?action=delete&controller=ingredient&idIngredient=' . rawurlencode($i->getIdIngredient()) . '"> Supprimer l\'ingrédient </a>'?>

<?//= ModelPierre::estAchete($i->getIdPierre()) ? "" : "<p><a href=\"index.php?controller=pierre&action=ajouterPanier&idpierre=" . $i->getIdPierre() . "\">Ajouter au panier</a></p>"?>
    
<?php
// if (Session::is_admin()) {
//     echo '<br><a href = "index.php?action=update&controller=pierre&idpierre=' . rawurlencode($p->getIdPierre()) . '"> Mettre à jour le produit </a>' .
//     '<br><a href = "index.php?action=delete&controller=pierre&idpierre=' . rawurlencode($p->getIdPierre()) . '"> Supprimer le produit </a></div>';
// }
?>