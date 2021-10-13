
<form method="get" action="index.php" controller="typeingredient">
    <fieldset>
        <legend><?= ($create ? "Ajout d'un nouvel type ingrédient" : "Mise à jour d'un type ingrédient") ?></legend>
        <p>
            <input type ="hidden" name ="controller" value="ingredient" />
            <label for="nom_type_ingredient">Nom du type </label> :
            <input type="text" placeholder="Ex : Fruits" name="nomTypeIngredient" <?= ($create ? "required" : "readonly") ?> value="<?= htmlspecialchars($nomTypeIngredient) ?>" id="nom_type_ingredient"/>
        </p>

        <?=($create ? "" : '<input type ="hidden" name ="idTypeIngredient" value="' . rawurldecode($idTypeIngredient) . '"/>') ?>
            <input type="submit" value="<?= $create ? "Ajouter" : "Mettre à jour" ?>" />
        </p>
</form>

