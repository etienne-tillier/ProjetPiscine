<?php

echo '<div class = "precision"><h2>' . ucfirst($i->getnomCharge()) . "</h2>" .
 echo '<a href="index.php?action=delete&controller=Charge&idRecette=' . rawurlencode($i->getnomCharge()) . '"> Supprimer la charge </a>';

?>