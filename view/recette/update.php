<form method="get" action="index.php" controller="recette">
    <fieldset>
        <legend><?= ($create ? "Ajout d'une nouvelle recette" : "Mise à jour d'une recette") ?></legend>
        <p>
            <input type ="hidden" name ="action" value=<?php echo "\"$act\"" ?>/>
            <input type ="hidden" name ="controller" value="recette"/>
            <label for="nom_recette">Nom</label> :
            <input type="text" placeholder="Ex : rizoto" name="nomRecette" <?= ($create ? "required" : "required") ?> value="<?= htmlspecialchars($nomRecette) ?>" id="nom_recette"/>
        </p>
        <p>Type Recette</p>
        <select name="idTypeRecette" required>
            <option value="" disabled <?= ($create ? "selected" : "") ?>>Choisissez un type</option>
            <?php
                foreach($typeRecetteList as $type){
                    echo '<option value="' . $type->getIdTypeRecette() . '" ' . ($type->getIdTypeRecette() == $typeRecette ? "selected" : "") . '>' .  $type->getNomTypeRecette() . '</option>';
                }
            ?>
        </select>


        <p>Auteur</p>
        <select name="idAuteur" required>
            <option value="" disabled <?= ($create ? "selected" : "") ?>>Choisissez un auteur</option>
            <?php
                foreach($auteurList as $auteur){
                    echo '<option value="' . $auteur->getIdAuteur() . '" ' . ($auteur->getidAuteur() == $idAuteur ? "selected" : "") . '>' .  $auteur->getNomAuteur() . '</option>';
                }
            ?>
        </select>
        <p>
            <label for="nombre_Portion">Nombre de portion</label> :
            <input type="text" name="nombrePortion" value="<?= htmlspecialchars($nombrePortion) ?>" id="nombre_Portion" required/>
        </p>
        <p>
            <label for="prixMain_Oeuvre">Prix de main d'oeuvre</label> :
            <input type="text" name="prixMainOeuvre" value="<?= htmlspecialchars($prixMainOeuvre) ?>" id="prixMain_Oeuvre" required/>
        </p>
        <p>
            <label for="multiplicateur_id">Multiplicateur</label> :
            <input type="text" name="multiplicateur" value="<?= htmlspecialchars($multiplicateur) ?>" id="multiplicateur_id" required/>
        </p>

        <label for="descriptif_id">Description</label>
        <textarea id="descriptif_id" name="descriptif" rows="5" cols="33">
            <?= htmlspecialchars($descriptif) ?>
        </textarea>

        
        <label for="progression_id">Progression</label>
        <textarea id="progression_id" name="progression" rows="5" cols="33">
            <?= htmlspecialchars($progression) ?>
        </textarea>
        

        <?=($create ? "" : '<input type ="hidden" name ="idIngredient" value="' . rawurldecode($idIngredient) . '"/>') ?>
            <input type="submit" value="<?= $create ? "Ajouter" : "Mettre à jour" ?>" />
        </p>
</form>

