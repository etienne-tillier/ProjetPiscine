<?php
    echo '<div class = "precision"><h2>' . ucfirst($type->getNomTypeIngredient()) . "</h2>" .
    "<li class> Le type : " . htmlspecialchars($type->getNomTypeIngredient()) . "</li>" ;
    echo '<a href="index.php?action=delete&controller=typeingredient&idTypeIngredient=' . rawurlencode($type->getIdTypeIngredient()) . '"> Supprimer le type d\'ingrédient </a></br>';
    echo '<a href="index.php?action=update&controller=typeingredient&idTypeIngredient=' . rawurlencode($type->getIdTypeIngredient()) . '"> Modifier le type d\'ingrédient </a>';
 ?>