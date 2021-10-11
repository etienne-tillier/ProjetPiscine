<?php
$create = false;
echo "<p>Les modifications apportées au type produit " . htmlspecialchars($idTypeIngredient) . " ont été enregistrées</p>";
require (File::build_path(array("view", "typeingredient", "list.php")));
?>
    


