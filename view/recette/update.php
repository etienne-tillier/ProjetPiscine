<link rel="stylesheet" type="text/css" href="style/style_formulaire.css">

<form id="ajout_ingredient" method="get" action="index.php" controller="recette">
    <fieldset class="bordure">
        <legend class="titre"><?= ($create ? "Ajout d'une nouvelle recette" : "Mise à jour d'une recette") ?></legend>
        <div class="contenu_form">    
            <p>
                <input type ="hidden" name ="action" value=<?php echo "\"$act\"" ?>/>
                <input type ="hidden" name ="controller" value="recette"/>
                <label class="sous_titre" for="nom_recette">Nom</label> :
                <input class="entrer_text" type="text" placeholder="Ex : rizoto" name="nomRecette" <?= ($create ? "required" : "required") ?> value="<?= htmlspecialchars($nomRecette) ?>" id="nom_recette"/>
            </p>
            <p class="sous_titre">Type Recette
            <select class="liste_der" name="idTypeRecette" required>
                <option value="" disabled <?= ($create ? "selected" : "") ?>>Choisissez un type</option>
                <?php
                    foreach($typeRecetteList as $type){
                        echo '<option value="' . $type->getIdTypeRecette() . '" ' . ($type->getIdTypeRecette() == $typeRecette ? "selected" : "") . '>' .  $type->getNomTypeRecette() . '</option>';
                    }
                ?>
            </select>
            </p>
            <?= "<p ><a class='add_type' href=\"index.php?controller=TypeRecette&action=create\">Créer Type recette</a>"?>



            <p class="sous_titre">Auteur
            <select class="liste_der" name="idAuteur" required>
                <option value="" disabled <?= ($create ? "selected" : "") ?>>Choisissez un auteur</option>
                <?php
                    foreach($auteurList as $auteur){
                        echo '<option value="' . $auteur->getIdAuteur() . '" ' . ($auteur->getidAuteur() == $idAuteur ? "selected" : "") . '>' .  $auteur->getNomAuteur() . '</option>';
                    }
                ?>
            </select>
            </p>
            <p>
                <label class="sous_titre" for="nombre_Portion">Nombre de portion</label> :
                <input class="entrer_text" type="text" name="nombrePortion" value="<?= htmlspecialchars($nombrePortion) ?>" id="nombre_Portion" required/>
            </p>
            <p>
                <label class="sous_titre" for="prixMain_Oeuvre">Prix de main d'oeuvre</label> :
                <input class="entrer_text" type="text" name="prixMainOeuvre" value="<?= htmlspecialchars($prixMainOeuvre) ?>" id="prixMain_Oeuvre" required/>
            </p>
            <p>
                <label class="sous_titre" for="multiplicateur_id">Multiplicateur</label> :
                <input class="entrer_text" type="text" name="multiplicateur" value="<?= htmlspecialchars($multiplicateur) ?>" id="multiplicateur_id" required/>
            </p>

            <label class="sous_titre" for="descriptif_id">Description</label>
            <textarea class="entrer_text" id="descriptif_id" name="descriptif" rows="5" cols="33">
                <?= htmlspecialchars($descriptif) ?>
            </textarea>

            
            <label class="sous_titre" for="progression_id">Progression</label>
            <textarea class="entrer_text" id="progression_id" name="progression" rows="5" cols="33">
                <?= htmlspecialchars($progression) ?>
            </textarea>
            

            <?=($create ? "" : '<input type ="hidden" name ="idIngredient" value="' . rawurldecode($idIngredient) . '"/>') ?>
                <input class="bouton_final" type="submit" value="<?= $create ? "Ajouter" : "Mettre à jour" ?>" />
            </p>
        </div>
    </fielset>
</form>

