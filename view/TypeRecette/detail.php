<?php

echo '<div class = "precision"><h2>' . ucfirst($i->getNomTypeRecette()) . "</h2>" .
 echo '<a href="index.php?action=delete&controller=TypeRecette&idIngredient=' . rawurlencode($i->getIdTypeRecette()) . '"> Supprimer le\'Type Recette </a>';

?>