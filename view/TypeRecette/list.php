<?php
    foreach($tab_i as $type)
    {
        echo '<p>' . $type->getNomTypeRecette() . '</p>';
        echo '<div class="recette">
        <a href= "index.php?action=read&controller=typerecette&idTypeRecette=' . $type->getIdTypeRecette() . "</a>"
        . '</div>';
    }
?>