<?php

    echo '<div class = "precision"><h2>' . ucfirst($i->getnomAuteur()) . "</h2>" .
    "<li class> NomAuteur : " . htmlspecialchars($i->getnomAuteur()) . "/" . "</li>" .
    "<li class> PrenomAuteur : " . htmlspecialchars($i->getprenomAuteur()) . "/" . "</li>";
    echo '<a href="index.php?action=delete&controller=auteur&idAuteur=' . rawurlencode($i->getIdAuteur()) . '"> Supprimer l\'auteur</a>';
    echo '<a href="index.php?action=update&controller=auteur&idAuteur=' . rawurlencode($i->getIdAuteur()) . '"> Modifier l\'auteur </a>';
?>
