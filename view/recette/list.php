
<?php
//possible de faire mieux avec requete sql dans le modelIngredient
//en verifiant l'idTypeIngredient
foreach($tabTypeRecette as $type){


    $idType = $type->getIdTypeRecette();
    echo '<div class="typeIngredient">
            <p>' . $type->getNomTypeRecette() . '</p></div>';
    foreach ($tab_r as $recette) {
        if ($idType == $recette->getIdTypeRecette()){
            $nombrePortion = $recette->getNombrePortion();
            $nom = $recette->getNomRecette();
            $id = rawurlencode($recette->getIdRecette());
        // if(in_array($ingredient, ModelIngredient::selectAll())){

        //echo '<div class = "produit">' . '<a href= "index.php?action=read&idpierre=' . rawurlencode($p->getIdPierre()) .'"><img src="' . $link . '"alt="id1" height=150px width=150px/><br><strong>' . $p->getNom() . " : " . $p->getPrix() . 'euros</strong></a></div>';

                echo '<div class="recette">
                    <a href= "index.php?action=read&controller=recette&idRecette=' . $id . '"><strong>' . $nom . " : " . $nombrePortion . "pers </strong></a>"
                . '
                </div>';
            
        //}
        }
    }
}
?>






<?= Session::is_admin() ? '<br><a class="addP" href="index.php?action=create" class="ajout"> Ajouter un nouveau produit </a>' : "" ?>




