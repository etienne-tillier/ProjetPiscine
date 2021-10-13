
<?php
//possible de faire mieux avec requete sql dans le modelIngredient
//en verifiant l'idTypeIngredient

foreach($tab_i as $t){
    echo '</br>';
    
    echo '<div class="ingredient">
    <a href= "index.php?action=read&controller=typeingredient&idTypeIngredient=' . $t->getIdTypeIngredient() . '"><strong>' . $t->getNomTypeIngredient() . "</strong></a>"
. '</div>';
}
?>
