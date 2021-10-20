<?php
    foreach($tab_i as $type)
    {
        echo '<p>' . $type->getnomCharge() . '</p>';
        echo '<div class="recette">
        <a href= "index.php?action=read&nomCharge=' . $type->getnomCharge() . "</a>"
        . '</div>';
    }
?>

<?= Session::is_admin() ? '<br><a class="addP" href="index.php?action=create" class="ajout"> Ajouter une nouvelle charge </a>' : "" ?>