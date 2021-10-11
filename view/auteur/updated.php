<?php
$create = false;
echo "<p>Les modifications apportées au auteur " . htmlspecialchars($idAuteur) . " ont été enregistrées</p>";
require (File::build_path(array("view", "auteur", "list.php")));
?>
