<div id="contenu">
    <p>
        <?php
             echo "<p>$pagetitle <br> Voila la liste !!</p>";
             echo $_GET["Recherche"];
            foreach($typeIngredientListe as $type){

                if(!empty($ListeIngredient)){
                    echo "<div id='type_ingredient'><p>" .  '<a href= "index.php?action=read&controller=typeingredient&idTypeIngredient=' . $type->getIdTypeIngredient() . '"><strong>' . $type->getNomTypeIngredient() . "</strong>". '</p></div>';

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
            }
        ?>
    </p>
</div>