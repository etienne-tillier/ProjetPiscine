<link rel="stylesheet" type="text/css" href="style/style_details_type_ingr.css">

<div>
        <div id="precision_titre"><?php echo ucfirst($type->getNomTypeIngredient());?></div>
        <div id="precision_contenu"><?php 

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
                
                    echo '<div id="list_ingredient"> </br> <a href= "index.php?action=read&idIngredient=' . $ingredient->getIdIngredient() . '">' . $nom . " : " . $prix . "€ / ". $unite . "</a></br>" . '</div>';
                }
            }
            ?>
        <div id="precision_fonction">
            <ul>
                <li><?php echo '</br><a href="index.php?action=delete&controller=typeingredient&idTypeIngredient=' . rawurlencode($type->getIdTypeIngredient()) . '"> Supprimer le type</a></br>';?></li>
                <li><?php echo '</br><a href="index.php?action=update&controller=typeingredient&idTypeIngredient=' . rawurlencode($type->getIdTypeIngredient()) . '"> Modifier le type</a>'; ?></li>
            </ul>
        </div>
</div>
