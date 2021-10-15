<form method="post" action="index.php?action=<?= ($create ? "created" : "updated" )?>&controller=TVA">
    <fieldset>
        <legend><?= ($create ? "Ajout d'une nouvelle TVA" : "Mise à jour d'une TVA'") ?></legend>
        <p>
            <input type ="hidden" name ="action" value="created"/>
            <input type ="hidden" name ="controller" value="NomTVA"/>

           

            <label for="Nom TVA">Nom</label> :
            <input type="text" name="Nom TVA" <?= ($create ? "required" : "readonly") ?> value="<?= htmlspecialchars$nomTVA) ?>" id="NomTVA"/>
            <label for="Taux TVA">Nom</label> :
            <input type="text" name="Taux TVA" <?= ($create ? "required" : "readonly") ?> value="<?= htmlspecialchars$nomTVA) ?>" id="NomTVA"/>
        
        
        </p>
        
        
        
        <?=($create ? "" : '<input type ="hidden" name ="NomTVA" value="' . rawurldecode($idTypeRecette) . '"/>') ?>
            <input type="submit" value="<?= $create ? "Ajouter" : "Mettre à jour" ?>" />
        </p>
</form>
