<div id="contenu">
    <p>
        <?php
             echo "<p>$pagetitle <br> Voila la liste d'ingredient Trouvé</p>";
            foreach($typeIngredientListe as $type){

                $idType = $type->getIdTypeIngredient();
                foreach ($ListeIngredient as $ingredient) {
                    if ($idType == $ingredient->getIdTypeIngredient()){
                        $prix = $ingredient->getPrixUnitaire();
                        $nom = $ingredient->getNomIngredient();
                        $unite = $ingredient->getUnite();
                        $allergene = $ingredient->getAllergene();
                        $id = rawurlencode($ingredient->getIdIngredient());
                        
                        echo '<div id="list_ingredient"><a href= "index.php?action=read&idIngredient=' . $ingredient->getIdIngredient() . '">' . $nom . " : " . $prix . "€/ ". $unite . "</a>" . '</div>';
                    }
                }
            }
        ?>
    </p>
</div>