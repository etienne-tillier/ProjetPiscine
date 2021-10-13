<link rel="stylesheet" type="text/css" href="style/style_formulaire.css">

<form id="ajout_ingredient" method="get" action="index.php" controller="ingredient">
    <fieldset class="bordure">
        <legend class="titre"><?= ($create ? "Ajout d'un nouvel ingrédient" : "Mise à jour d'un ingrédient") ?></legend>
        <div class="contenu_form">
            <p>
                <input type ="hidden" name ="action" value=<?php echo "\"$act\"" ?>/>
                <label class="sous_titre" for="nom_ingredient">Nom</label> :
                <input class="entrer_text" type="text" placeholder="Ex : courgette" name="nomIngredient" <?= ($create ? "required" : "required") ?> value="<?= htmlspecialchars($nomIngredient) ?>" id="nom_ingredient"/>
            </p>
            <p class="sous_titre">Type Ingredient
            <select class="liste_der" name="idTypeIngredient" required>
                <option value="" disabled <?= ($create ? "selected" : "") ?>>Choisissez un Type</option>
                <?php
                    foreach($typeIngredientList as $type){
                        echo '<option value="' . $type->getIdTypeIngredient() . '" ' . ($type->getIdTypeIngredient() == $typeIngredient ? "selected" : "") . '>' .  $type->getNomTypeIngredient() . '</option>';
                    }
                ?>
            </select>
            </p>
            <?= "<p ><a class='add_type' href=\"index.php?controller=typeingredient&action=create\">Créer Type Ingredient</a>"?>
 
                <p class="sous_titre">Type TVA
                <select class="liste_der" name="nomTVA" required>
                    <option value="" disabled <?= ($create ? "selected" : "") ?>>Choisissez une TVA</option>
                    <?php
                        foreach($typeTVAList as $type){
                            echo '<option value="' . $type->getNomTVA() . '" ' . ($type->getNomTVA() == $nomTVA ? "selected" : "") . '>' .  $type->getNomTVA() . '</option>';
                        }
                    ?>
                
                </select>
                </p>

            <p>
                <label class="sous_titre" for="unite_ingredient">Unité</label> :
                <input class="entrer_text" type="text" name="unite" value="<?= htmlspecialchars($unite) ?>" id="unite_ingredient" required/>
            </p>
            <p>
                <label class="sous_titre" for="prix_ingredient">Prix unitaire</label> :
                <input class="entrer_text" type="text" value="<?= htmlspecialchars($prixUnitaire) ?>"  name="prixUnitaire" id="prix_ingredient" required/>
            </p>
            <p class="sous_titre">Allergène</p>

            <div>
                <input class="qcm_rond" type="radio" id="allergeneO" name="allergene" value="1">
                <label for="allergeneO">Oui</label>
            </div>

            <div>
                <input class="qcm_rond" type="radio" id="allergeneN" name="allergene" value="0" checked>
                <label for="allergeneN">Non</label>
            </div>
            </p>
        <?=($create ? "" : '<input type ="hidden" name ="idIngredient" value="' . rawurldecode($idIngredient) . '"/>') ?>
            <input class="bouton_final" type="submit" value="<?= $create ? "Ajouter" : "Mettre à jour" ?>" />
        </p>
        </div>
    </fieldset>
</form>

