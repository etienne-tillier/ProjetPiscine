


<?php
$create = false;
echo "<p>Les modifications apportées au produit " . htmlspecialchars($idIngredient) . " ont été enregistrées</p>";
require (File::build_path(array("view", "ingredient", "list.php")));
?>
    


