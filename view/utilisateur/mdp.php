
<?php

echo "Vous n'avez pas taper deux fois le même mot de passe <br/>";
$login = $_POST["login"];
$prenom = $_POST["Prenom"];
$mdp = $_POST["mdp"];
$mdpconfirm = $_POST["mdpconfirm"];
$email = $_POST["email"];
$nom = $_POST["Nom"];
require_once("update.php");
?>
    
