<?php
    //boooordeeeeeel +++++
    foreach($tab_p as $type)
    {
        echo '<p>' . $type->getNomTypeRecette() . '</p>';
        echo '<div class="recette">
        <a href= "index.php?action=read&idTypeRecette=' . $type->getIdTypeRecette() . "</a>"
        . '</div>';
    }
?>

<?= Session::is_admin() ? '<br><a class="addP" href="index.php?action=create" class="ajout"> Ajouter un nouveau TypeRecette </a>' : "" ?>


