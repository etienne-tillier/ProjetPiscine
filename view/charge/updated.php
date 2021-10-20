<?php
$create = false;
echo "<p>Les modifications apportées à la charge " . htmlspecialchars($nomCharge) . " ont été enregistrées</p>";
require (File::build_path(array("view", "Charge", "list.php")));
?>