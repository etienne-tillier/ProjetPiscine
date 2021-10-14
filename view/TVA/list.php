<?php
    foreach($tab_i as $type)
    {
        echo '<p>' . $type->getNomTVA() . '</p>';
        echo '<div class="ingredient">
        <a href= "index.php?action=read&NomTVA=' . $type->getNomTVA() . "</a>"
        . '</div>';
    }
?>

<?= Session::is_admin() ? '<br><a class="addP" href="index.php?action=create" class="ajout"> Ajouter une nouvelle TVA </a>' : "" ?>