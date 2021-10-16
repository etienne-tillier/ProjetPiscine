<link rel="stylesheet" type="text/css" href="style/style_formulaire.css">

<form id="ajout_ingredient" method="post" action="index.php?action=<?= ($create ? "created" : "updated" )?>&controller=typeIngredient">
    <fieldset class="bordure">
        <legend class="titre"><?= ($create ? "Ajout d'un nouvel type ingrédient" : "Mise à jour d'un type ingrédient") ?></legend>
        <p>
            <input type ="hidden" name ="controller" value="typeingredient"/>
            <input type ="hidden" name ="action" value=<?php echo "\"$act\"" ?>/>

            <label class="sous_titre" for="nom_type_ingredient">Nom du type </label> :
            <input class="entrer_text" type="text" placeholder="Ex : Fruits" name="nomTypeIngredient" <?= ($create ? "required" : "required") ?> value="<?= ($create ? htmlspecialchars($nomTypeIngredient) : "") ?>" id="nom_type_ingredient"/>
        </p>

        <?=($create ? "" : '<input type ="hidden" name ="idTypeIngredient" value="' . rawurldecode($idTypeIngredient) . '"/>') ?>
            <input class="bouton_final" type="submit" value="<?= $create ? "Ajouter" : "Mettre à jour" ?>" />
        </p>
    </fieldset>
</form>

