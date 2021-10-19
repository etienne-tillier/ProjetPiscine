<?php

echo '<div class = "precision"><h2>' . ucfirst($i->getNomTVA()) . "</h2>" . '<a href="index.php?action=delete&controller=TVA&idIngredient=' . rawurlencode($i->getNomTVA()) . '"> Supprimer la TVA </a>';

?>