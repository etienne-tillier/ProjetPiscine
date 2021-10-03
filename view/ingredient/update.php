


<form method="get" action="index.php" controller="ingredient">
    <fieldset>
        <legend><?= ($create ? "Ajout d'un nouvel ingrédient" : "Mise à jour d'un ingrédient") ?></legend>
        <p>
            <input type ="hidden" name ="action" value=<?php echo "\"$act\"" ?>/>
            <label for="nom_ingredient">Nom</label> :
            <input type="text" placeholder="Ex : courgette" name="nomIngredient" <?= ($create ? "required" : "readonly") ?> value="<?= htmlspecialchars($nomIngredient) ?>" id="nom_ingredient"/>
        </p>
        <p>Type Ingredient</p>
        <select name="idTypeIngredient" required>
            <option value="" disabled selected>Choisissez un type</option>
            <?php
                foreach($typeIngredientList as $type){
                    echo '<option value="' . $type->getIdTypeIngredient() . '" ' . ($type->getNomTypeIngredient() == $typeIngredient ? "selected" : "") . '>' .  $type->getNomTypeIngredient() . '</option>';
                }
            ?>
        </select>
        <p>Type TVA</p>
        <select name="nomTVA" required>
            <option value="" disabled selected>Choisissez une TVA</option>
            <?php
                foreach($typeTVAList as $type){
                    echo '<option value="' . $type->getNomTVA() . '" ' . ($type->getNomTVA() == $typeTVA ? "selected" : "") . '>' .  $type->getNomTVA() . '</option>';
                }
            ?>
        </select>
        <p>
            <label for="unite_ingredient">Unite</label> :
            <input type="text" name="unite" value="<?= htmlspecialchars($unite) ?>" id="unite_ingredient" required/>
        </p>
        <p>
            <label for="prix_ingredient">Prix unitaire</label> :
            <input type="text" value="<?= htmlspecialchars($prixUnitaire) ?>"  name="prixUnitaire" id="prix_ingredient" required/>
        </p>
        <p>Allergene</p>

        <div>
            <input type="radio" id="allergeneO" name="allergene" value="1"
                    >
            <label for="allergeneO">Oui</label>
        </div>

        <div>
            <input type="radio" id="allergeneN" name="allergene" value="0" checked>
            <label for="allergeneN">Non</label>
        </div>
            <input type="submit" value="<?= $create ? "Ajouter" : "Mettre à jour" ?>" />
        </p>
</form>

