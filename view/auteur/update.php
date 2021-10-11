

<form method="get" action="index.php" controller="auteur">
    <fieldset>
        <legend><?= ($create ? "Ajout d'un nouvel auteur" : "Mise à jour d'un auteur") ?></legend>
        <p>
            <input type ="hidden" name ="action" value=<?php echo "\"$act\"" ?>/>
            <input type ="hidden" name ="controller" value="auteur"/>
            <label for="nom_auteur">Nom</label> :
            <input type="text" placeholder="Ex : Roche" name="nomAuteur" <?= ($create ? "required" : "readonly") ?> value="<?= htmlspecialchars($nomAuteur) ?>" id="nom_auteur"/>
        </p>

        <p>
            <input type ="hidden" name ="action" value=<?php echo "\"$act\"" ?>/>
            <label for="prenom_auteur">Prenom</label> :
            <input type="text" placeholder="Ex : Christophe" name="prenomAuteur" <?= ($create ? "required" : "readonly") ?> value="<?= htmlspecialchars($prenomAuteur) ?>" id="prenom_auteur"/>
        </p>

        
        <?=($create ? "" : '<input type ="hidden" name ="idAuteur" value="' . rawurldecode($idAuteur) . '"/>') ?>
            <input type="submit" value="<?= $create ? "Ajouter" : "Mettre à jour" ?>" />
        </p>
</form>
