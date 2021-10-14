<?php
$create = false;
echo "<p>Les modifications apportées à la TVA " . htmlspecialchars($nomTVA) . " ont été enregistrées</p>";
require (File::build_path(array("view", "TVA", "list.php")));
?>