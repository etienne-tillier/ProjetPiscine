<link rel="stylesheet" type="text/css" href="style/style_formulaire_recette.css">
<script type="text/javascript" defer>

    function creerTypeRecette(){
        if (document.getElementById("newTypeRecette").required == false){
            $("#typeRecetteSelect").toggle();
            $("#typeRecetteSelect select").prop("required",false)
            $("#typeRecetteSelect select").trigger("chosen:updated");
            $("#newTypeRecette").toggle();
            $("#newTypeRecette").prop("required",true)
            $("#textTypeIngredient").text("Choisir un type existant");
        }
        else {
            $("#typeRecetteSelect").toggle();
            $("#typeRecetteSelect select").prop("required",true)
            $("#newTypeRecette").toggle();
            $("#newTypeRecette").prop("required",false)
            $("#newTypeRecette").prop("value","")
            $("#textTypeIngredient").text("Creer un nouveau type ingrédient");
        }
    }

    function creerAuteur(){
        if (document.getElementById("newAuteurNom").required == false){
            $("#auteurSelect").toggle();
            $("#auteurSelect select").prop("required",false)
            $("#auteurSelect select").trigger("chosen:updated");
            $("#newAuteurNom").toggle();
            $("#newAuteurNom").prop("required",true)
            $("#newAuteurPrenom").toggle();
            $("#newAuteurPrenom").prop("required",true)
            $("#textAuteur").text("Choisir un auteur existant");
        }
        else {
            $("#auteurSelect").toggle();
            $("#auteurSelect select").prop("required",true)
            $("#newAuteurNom").toggle();
            $("#newAuteurNom").prop("required",false)
            $("#newAuteurNom").prop("value","")
            $("#newAuteurPrenom").toggle();
            $("#newAuteurPrenom").prop("required",false)
            $("#newAuteurPrenom").prop("value","")
            $("#textAuteur").text("Creer un nouvel auteur");
        }
    }
    var i = 0;

    function genererSelectUpdate() {
            <?php foreach ($tabIngredientDansRecette as $ingredientDansRecette){?>
            $("#listeIngredient").append("<div id='" + i + "'></div>");
            $("#listeIngredient div:last").append("<li><select class='choix' class='liste_der' name='ingredients[]' placeholder='Choisissez ingrédient' required></select></li>");
            <?php foreach ($listeIngredient as $ingredient){?>
                    $("#listeIngredient div:last select:last").append($('<option>', {
                        value: "<?php echo $ingredient->getIdIngredient()?>",
                        text: "<?php echo $ingredient->getNomIngredient()?>"
                        <?= ($ingredientDansRecette->getIdIngredient() == $ingredient->getIdIngredient() ? ',selected : true' : '') ?>
                    }));
                <?php };?>
            $("#listeIngredient div:last").append("<li><input class='entrer_text1' type='text' value='<?= $ingredientDansRecette->getQuantiteIngredient() ?>'name='quantitesIngredients[]' placeholder='Quantité ingredient' required></input></li>");
            $("#listeIngredient div:last").append("<li><div class='boutonIngredient' onclick='$(this).parent().parent().remove()'>Supprimer</div></li>");
            i++;
            <?php };?>
            <?php foreach ($tabRecetteDansRecette as $recetteDansRecette){?>
            $("#listeRecette").append("<div id='" + i + "'></div>");
            $("#listeRecette div:last").append("<li><select class='choix' name='recettes[]' placeholder='Choisissez la recette' required></select></li>");
            <?php foreach ($listeRecette as $recette){?>
                $("#listeRecette div:last select:last").append($('<option>', {
                    value: "<?php echo $recette->getIdRecette()?>",
                    text: "<?php echo $recette->getNomRecette()?>"
                    <?= ($recetteDansRecette->getIdRecetteFille() == $recette->getIdRecette() ? ',selected : true' : '') ?>
                }));
                <?php };?>
            $("#listeRecette div:last").append("<li><input class='entrer_text1' class='entrer_text' type='text' value='<?= $recetteDansRecette->getQuantiteRecette() ?>' name='quantitesRecettes[]' placeholder='Quantité recette' required></input></li>");
            $("#listeRecette div:last").append("<li><div class='boutonRecette' onclick='$(this).parent().parent().remove()'>Supprimer<br></div></li>");
            i++;
            <?php };?>
            $(".choix").chosen();
    }

    function ajouterIngredient(){
        $("#listeIngredient").append("<div id='" + i + "'></div>");
        $("#listeIngredient div:last").append("<li><select class='choix' name='ingredients[]' placeholder='Choisissez ingrédient' required></select></li>");
        <?php foreach ($listeIngredient as $ingredient){?>
            $("#listeIngredient div:last select:last").append($('<option>', {
                value: "<?php echo $ingredient->getIdIngredient()?>",
                text: "<?php echo $ingredient->getNomIngredient()?>"
            }));
        <?php }; ?>
        $("#listeIngredient div:last").append("<li><input class='entrer_text1' type='text' name='quantitesIngredients[]' placeholder='Quantité ingredient' required></input></li>");
        $("#listeIngredient div:last").append("<li><div class='boutonIngredient' onclick='$(this).parent().parent().remove()'>Supprimer</div></li>");
        i++;
        $(".choix").chosen();
    }
    function ajouterRecette(){
        $("#listeRecette").append("<div id='" + i + "'></div>");
        $("#listeRecette div:last").append("<li><select class='choix' name='recettes[]' placeholder='Choisissez la recette' required></select></li>");
        <?php foreach ($listeRecette as $recette){?>
        $("#listeRecette div:last select:last").append($('<option>', {
            value: "<?php echo $recette->getIdRecette()?>",
            text: "<?php echo $recette->getNomRecette()?>"
        }));
        <?php }; ?>
        $("#listeRecette div:last").append("<li><input class='entrer_text1' type='text' name='quantitesRecettes[]' placeholder='Quantité recette' required></input></li>");
        $("#listeRecette div:last").append("<li><div class='boutonRecette' onclick='$(this).parent().parent().remove()'>Supprimer</div></li>");
        i++;
        $(".choix").chosen();
    }

    window.onload = function () {
        genererSelectUpdate();
    }
</script>

<div class="titre_form"><?= ($create ? "Ajout d'une nouvelle recette" : "Mise à jour d'une recette") ?></div>
<form id="formulaire" method="post" action="index.php?action=<?= ($create ? "created" : "updated" )?>&controller=recette">
    <fieldset>
        <input type ="hidden" name ="action" value=<?php echo "\"$act\"" ?>/>
        <input type ="hidden" name ="controller" value="recette"/>
        <div class="maxiParent">
            <div class="grid">
                <div class="titre1">
                    <p class="titre"><input class="entrer_text_titre" type="text" placeholder="Ex : Soupe de poisson" name="nomRecette" <?= ($create ? "required" : "required") ?> value="<?= htmlspecialchars($nomRecette) ?>" id="nom_recette"/></p>
                </div>

                <div class="sous_titre11">
                    <p class="sous_titre">Descriptif</p>
                </div>

                <div class="sous_titre12">
                    <p class="sous_titre">Progression</p>
                </div>

                <div class="sous_titre13">
                    <p id="ajouterIngredient" onclick="ajouterIngredient()"> Ajouter Ingrédient </p>
                </div>

                <div class="sous_titre14">
                    <p id="ajouterRecette" onclick="ajouterRecette()"> Ajouter Recette </p>
                </div>

                <div class="sous_titre15">
                    <p class="sous_titre">Portion</p>
                </div>

                <div class="sous_titre21">
                    <p class="sous_titre">Type Recette</p>
                </div>

                <div class="sous_titre22">
                    <p class="sous_titre">Auteur</p>
                </div>

                <div class="sous_titre26">
                    <p class="sous_titre">Coût personnel</p>
                </div>

                <div class="sous_titre27">
                    <p class="sous_titre">Multiplicateur</p>
                </div>

                <div class="contenu_fiche1">
                    <textarea class="entrer_text_area" id="descriptif_id" name="descriptif" rows="5" cols="33" required value="<?=( $descriptif ? htmlspecialchars($descriptif) : "")?>"></textarea>
                </div>

                <div class="contenu_fiche2">
                    <textarea class="entrer_text_area" id="progression_id" name="progression" rows="5" cols="33" placeholder="1/ Foie gras sauté. * Parer les foies de canard, dénerver partiellement. * Escaloper le foie gras, le faire sauter rapidement à sec. Assaisonner, réserver." required value="<?=( $progression ? htmlspecialchars($progression) : "")?>"></textarea>
                </div> 

                <div class="contenu_fiche3">
                    <p class="num"><input class="entrer_text_num" type="text" name="nombrePortion" value="<?= htmlspecialchars($nombrePortion) ?>" id="nombre_Portion" required/></p>
                </div> 

                <div class="contenu_fiche4">
                    <div class="sous_div"><ul id="listeIngredient"></ul> </div>        
                </div>

                <div class="contenu_fiche5">
                    <div class="sous_div"><ul id="listeRecette"></ul></div>
                </div>

                <div class="contenu_fiche6">
                    <div id="typeRecetteSelect">
                        <p class="liste_der"><select id="selectTypeRecette" name="idTypeRecette" required>
                            <option class="liste_der" value="" disabled <?= ($create ? "selected" : "") ?>>Choisissez un type</option>
                            <?php
                            foreach($typeRecetteList as $type){
                                echo '<option value="' . $type->getIdTypeRecette() . '" ' . ($type->getIdTypeRecette() == $idTypeRecette ? "selected" : "") . '>' .  $type->getNomTypeRecette() . '</option>';
                            }
                            ?>
                            <script>$("#selectTypeRecette").chosen();</script>
                        </select>
                    </div>
                        <ul>
                            <li><input id="newTypeRecette" type="text" name="newTypeRecette" placeholder="Nouveau Type" style="display: none"></li></p>
                        </ul>

                </div>

                <div class="contenu_fiche7">
                    <div id="auteurSelect">
                        <p class="liste_der"><select id="selectAuteur" name="idAuteur" required>
                            <option class="liste_der" value="" disabled <?= ($create ? "selected" : "") ?>>Choisissez un auteur</option>
                            <?php
                                foreach($auteurList as $auteur){
                                    echo '<option value="' . $auteur->getIdAuteur() . '" ' . ($auteur->getidAuteur() == $idAuteur ? "selected" : "") . '>' .  $auteur->getNomAuteur() . '</option>';
                                }
                            ?>
                            <script>$("#selectAuteur").chosen();</script>
                        </select>
                    </div>
                        <ul>
                            <li><input id="newAuteurNom" type="text" name="newNom" placeholder="Nom" style="display: none"></li>
                            <li><input id="newAuteurPrenom" type="text" name="newPrenom" placeholder="Prenom" style="display: none"></li>
                        </ul>
                    </p>
                </div>

                <div class="contenu_fiche11">
                    <p class="num"><input class="entrer_text_num" type="text" name="prixMainOeuvre" value="<?= htmlspecialchars($prixMainOeuvre) ?>" id="prixMain_Oeuvre" required/></p>
                </div> 
                
                <div class="contenu_fiche12">
                    <p class="num"><input class="entrer_text_num" type="text" name="multiplicateur" value="<?= htmlspecialchars($multiplicateur) ?>" id="multiplicateur_id" required/></p>
                </div> 

                <div class="bouton1">
                    <div class="bouton" onClick="creerTypeRecette()">Nouveau type recette</div>
                </div>

                <div class="bouton2">
                    <div class="bouton" onClick="creerAuteur()">Nouvel auteur</div>
                </div>

            </div>
        </div>
        <div class="bouton3">
            <?=($create ? "" : '<input type="hidden" name="idRecette" value="' . rawurldecode($idRecette) . '"/>') ?>
            <input class="bouton_final" type="submit" value="<?= $create ? "Ajouter" : "Mettre à jour" ?>" />         
        </div>
    </fieldset>
</form>

