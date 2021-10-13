<form method="get" action="index.php" controller="TypeRecette">
    <fieldset>
        <legend><?= ($create ? "Ajout d'un nouveau type" : "Mise à jour d'un type") ?></legend>
        <p>
            <input type ="hidden" name ="action" value="created"/>
            <input type ="hidden" name ="controller" value="TypeRecette"/>

           

            <label for="nom_TypeRecette">Nom</label> :
            <input type="text" placeholder="Ex : dessert" name="nomTypeRecette" <?= ($create ? "required" : "readonly") ?> value="<?= htmlspecialchars($nomTypeRecette) ?>" id="nom_TypeRecette"/>
        </p>
        
        
        
        <?=($create ? "" : '<input type ="hidden" name ="idTypeRecette" value="' . rawurldecode($idTypeRecette) . '"/>') ?>
            <input type="submit" value="<?= $create ? "Ajouter" : "Mettre à jour" ?>" />
        </p>
</form>
