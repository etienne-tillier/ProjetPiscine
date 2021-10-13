<?php
    echo '<div class = "precision"><h2>' . ucfirst($type->getNomTypeIngredient()) . "</h2>" .
    "<li class> Le type : " . htmlspecialchars($type->getNomTypeIngredient()) . "</li>" ;
        
    $idType = $type->getIdTypeIngredient();
    foreach ($IngredientListe as $ingredient)
     {
        if ($idType == $ingredient->getIdTypeIngredient())
        {
            $prix = $ingredient->getPrixUnitaire();
            $nom = $ingredient->getNomIngredient();
            $unite = $ingredient->getUnite();
            $allergene = $ingredient->getAllergene();
            $id = rawurlencode($ingredient->getIdIngredient());
           
            echo '<div id="list_ingredient"> </br> <a href= "index.php?action=read&idIngredient=' . $ingredient->getIdIngredient() . '">' . $nom . " : " . $prix . "€/ ". $unite . "</a></br>" . '</div>';
            }
        }
    
     
    echo '</br><a href="index.php?action=delete&controller=typeingredient&idTypeIngredient=' . rawurlencode($type->getIdTypeIngredient()) . '"> Supprimer le type d\'ingrédient </a></br>';
    echo '</br><a href="index.php?action=update&controller=typeingredient&idTypeIngredient=' . rawurlencode($type->getIdTypeIngredient()) . '"> Modifier le type d\'ingrédient </a>';
 ?>