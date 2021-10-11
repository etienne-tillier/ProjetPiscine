
<?php
//possible de faire mieux avec requete sql dans le modelIngredient
//en verifiant l'idTypeIngredient
foreach($tab_a as $type){

    echo '<div class="typeIngredient">'
            . '<p>'  .  $type->getnomAuteur() 
            . '<p>'  .  $type->getprenomAuteur() .
            '</p></div>' ;
    

    echo '<div class="ingredient">
    <a href= "index.php?action=read&idAuteur=' . $type->getIdAuteur() . '"><strong>' . $type->getnomAuteur() . $type -> getprenomAuteur() . "</strong></a>"
. '</div>';
}
?>
