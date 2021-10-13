<?php
$create = false;
echo "<p>Les modifications apportées au Type Recette " . htmlspecialchars($idTypeRecette) . " ont été enregistrées</p>";
require (File::build_path(array("view", "Type Recette", "list.php")));
?>