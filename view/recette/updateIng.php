<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css" integrity="sha512-yVvxUQV0QESBt1SyZbNJMAwyKvFTLMyXSyBHDO4BG5t7k/Lw34tyqlSDlKIrIENIzCl+RVUNjmCPG+V/GMesRw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js" integrity="sha512-rMGGF4wg1R73ehtnxXBt5mbUfN9JUJwbk21KMlnLZDJh7BkPmeovBuddZCENJddHYYMkCh9hPFnPmS9sspki8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" defer>
    var i = 0;

    function genererSelectUpdate() {
            <?php foreach ($tabIngredientDansRecette as $ingredientDansRecette){?>
            $("#listeIngredient").append("<div id='" + i + "'></div>");
            $("#listeIngredient div:last").append("<li><select class='choix' name='ingredients[]' placeholder='Choisissez ingrédient'></select></li>");
            <?php foreach ($listeIngredient as $ingredient){?>
                    $("#listeIngredient div:last select:last").append($('<option>', {
                        value: "<?php echo $ingredient->getIdIngredient()?>",
                        text: "<?php echo $ingredient->getNomIngredient()?>"
                        <?= ($ingredientDansRecette->getIdIngredient() == $ingredient->getIdIngredient() ? ',selected : true' : '') ?>
                    }));
                <?php };?>
            $("#listeIngredient div:last").append("<li><input type='text' value='<?= $ingredientDansRecette->getQuantiteIngredient() ?>'name='quantitesIngredients[]' placeholder='Quantité ingredient'></input></li>");
            $("#listeIngredient div:last").append("<li><div onclick='$(this).parent().parent().remove()'>Supprimer</div></li>");
            i++;
            <?php };?>
            $(".choix").chosen();
    }

    function ajouterIngredient(){
        $("#listeIngredient").append("<div id='" + i + "'></div>");
        $("#listeIngredient div:last").append("<li><select class='choix' name='ingredients[]' placeholder='Choisissez ingrédient'></select></li>");
        <?php foreach ($listeIngredient as $ingredient){?>
            $("#listeIngredient div:last select:last").append($('<option>', {
                value: "<?php echo $ingredient->getIdIngredient()?>",
                text: "<?php echo $ingredient->getNomIngredient()?>"
            }));
        <?php }; ?>
        $("#listeIngredient div:last").append("<li><input type='text' name='quantitesIngredients[]' placeholder='Quantité ingredient'></input></li>");
        $("#listeIngredient div:last").append("<li><div onclick='$(this).parent().parent().remove()'>Supprimer</div></li>");
        i++;
        $(".choix").chosen();
    }
    function ajouterRecette(){
        $("#listeIngredient").append("<div id='" + i + "'></div>");
        $("#listeIngredient div:last").append("<li><select class='choix' name='recettes[]' placeholder='Choisissez la recette'></select></li>");
        <?php foreach ($listeRecette as $recette){?>
        $("#listeIngredient div:last select:last").append($('<option>', {
            value: "<?php echo $recette->getIdRecette()?>",
            text: "<?php echo $recette->getNomRecette()?>"
        }));
        <?php }; ?>
        $("#listeIngredient div:last").append("<li><input type='text' name='quantitesRecettes[]' placeholder='Quantité recette'></input></li>");
        $("#listeIngredient div:last").append("<li><div onclick='$(this).parent().parent().remove()'>Supprimer</div></li>");
        i++;
        $(".choix").chosen();
    }

    window.onload = function () {
        genererSelectUpdate();
    }

</script>
<form id="ajout_ingredient" method="post" action="index.php?action=<?= ($create ? "created" : "updated" )?>&controller=recette">
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
                        echo '<option value="' . $type->getIdTypeRecette() . '" ' . ($type->getIdTypeRecette() == $idTypeRecette ? "selected" : "") . '>' .  $type->getNomTypeRecette() . '</option>';
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
            <p>Liste des ingrédients</p>
            <p id="ajouterIngredient" onclick="ajouterIngredient()"> ajouter ingrédient </p>
            <p id="ajouterRecette" onclick="ajouterRecette()"> ajouter recette </p>
            <ul id="listeIngredient">

            </ul>

            <label class="sous_titre" for="descriptif_id">Description</label>
            <textarea class="entrer_text" id="descriptif_id" name="descriptif" rows="5" cols="33" required>
                <?= htmlspecialchars($descriptif) ?>
            </textarea>

            
            <label class="sous_titre" for="progression_id">Progression</label>
            <textarea class="entrer_text" id="progression_id" name="progression" rows="5" cols="33" required>
                <?= htmlspecialchars($progression) ?>
            </textarea>
            

            <?=($create ? "" : '<input type="hidden" name="idRecette" value="' . rawurldecode($idRecette) . '"/>') ?>
                <input class="bouton_final" type="submit" value="<?= $create ? "Ajouter" : "Mettre à jour" ?>" />
            </p>
        </div>
    </fielset>
</form>
