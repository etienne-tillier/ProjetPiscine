<link rel="stylesheet" type="text/css" href="style/style_formulaire.css">

<form id="ajout_ingredient" method="post" action="index.php?action=<?= ($create ? "created" : "updated" )?>&controller=typeRecette">
    <fieldset class="bordure">
        <legend class="titre"><?= ($create ? "Ajout d'un nouveau type" : "Mise à jour d'un type") ?></legend>
        <p>
            <input type ="hidden" name ="action" value="created"/>
            <input type ="hidden" name ="controller" value="TypeRecette"/>

            <label class="sous_titre" for="nom_TypeRecette">Nom</label> :
            <input class="entrer_text" type="text" placeholder="Ex : dessert" name="nomTypeRecette" <?= ($create ? "required" : "required") ?> value="<?= htmlspecialchars($nomTypeRecette) ?>" id="nom_TypeRecette"/>
        </p> 
        
        <?=($create ? "" : '<input type ="hidden" name ="idTypeRecette" value="' . rawurldecode($idTypeRecette) . '"/>') ?>
            <input class="bouton_final" type="submit" value="<?= $create ? "Ajouter" : "Mettre à jour" ?>" />
        </p>
    </fieldset>
</form>
