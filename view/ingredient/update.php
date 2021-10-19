
<link rel="stylesheet" type="text/css" href="style/style_formulaire.css">
<script defer>
    function creerTypeIngredient(){
        if (document.getElementById("newTypeIngredient").required == false){
            $("#typeIngredientSelect").toggle();
            $("#typeIngredientSelect select").prop("required",false)
            $("#typeIngredientSelect select").trigger("chosen:updated");
            $("#newTypeIngredient").toggle();
            $("#newTypeIngredient").prop("required",true)
            $("#NewTypeIngredient").text("Choisir un type existant");
        }
        else {
            $("#typeIngredientSelect").toggle();
            $("#typeIngredientSelect select").prop("required",true)
            $("#newTypeIngredient").toggle();
            $("#newTypeIngredient").prop("required",false)
            $("#newTypeIngredient").prop("value","")
            $("#NewTypeIngredient").text("Creer un nouveau type ingrédient");
        }
    }

    function creerTVA(){
        if (document.getElementById("newTVA").required == false){
            $("#TVAlist").toggle();
            $("#TVAlist select").prop("required",false)
            $("#TVAlist select").trigger("chosen:updated");
            $("#newTVA").toggle();
            $("#newTVA").prop("required",true)
            $("#textTVA").text("Choisir une TVA existante");
            $("#tauxTVA").toggle();
            $("#tauxTVA").prop("required",true)
        }
        else {
            $("#TVAlist").toggle();
            $("#TVAlist select").prop("required",true)
            $("#newTVA").toggle();
            $("#newTVA").prop("required",false)
            $("#newTVA").prop("value","")
            $("#tauxTVA").toggle();
            $("#tauxTVA").prop("required",false)
            $("#tauxTVA").prop("value","")
            $("#textTVA").text("Creer une nouvelle TVA");
        }
    }
</script>


<form id="ajout_ingredient" method="post" action="index.php?action=<?= ($create ? "created" : "updated" )?>&controller=ingredient">
    <fieldset class="bordure">
        <legend class="titre"><?= ($create ? "Ajout d'un nouvel ingrédient" : "Mise à jour d'un ingrédient") ?></legend>
        <div class="contenu_form">
            <p>
                <input type ="hidden" name ="action" value=<?php echo "\"$act\"" ?>/>
                <label class="sous_titre" for="nom_ingredient">Nom</label> :
                <input class="entrer_text" type="text" placeholder="Ex : courgette" name="nomIngredient" <?= ($create ? "required" : "required") ?> value="<?= htmlspecialchars($nomIngredient) ?>" id="nom_ingredient"/>
            </p>
            <p class="sous_titre">Type Ingredient
                <div id="typeIngredientSelect">
                    <select id="typeIngredientList" class="liste_der" name="idTypeIngredient" required>
                        <option value="" disabled <?= ($create ? "selected" : "") ?>>Choisissez un Type</option>
                        <?php
                            foreach($typeIngredientList as $type){
                                echo '<option value="' . $type->getIdTypeIngredient() . '" ' . ($type->getIdTypeIngredient() == $idTypeIngredient ? "selected" : "") . '>' .  $type->getNomTypeIngredient() . '</option>';
                            }
                        ?>
                        <script>$("#typeIngredientList").chosen();</script>
                    </select>
                </div>
                <input id="newTypeIngredient" type="text" name="newTypeIngredient" placeholder="Nouveau Type" style="display: none">
            </p>
            <div id="NewTypeIngredient" onClick="creerTypeIngredient()">Creer un nouveau type ingrédient</div>
                <p class="sous_titre">Type TVA
                    <div id="TVAlist">
                        <select id="TVASelect" class="liste_der" name="nomTVA" required>
                            <option value="" disabled <?= ($create ? "selected" : "") ?>>Choisissez une TVA</option>
                            <?php
                                foreach($typeTVAList as $type){
                                    echo '<option value="' . $type->getNomTVA() . '" ' . ($type->getNomTVA() == $nomTVA ? "selected" : "") . '>' .  $type->getNomTVA() . '</option>';
                                }
                            ?>
                            <script>$("#TVASelect").chosen();</script>
                        </select>
                    </div>
                    <input id="newTVA" type="text" name="newTVA" placeholder="Nouvelle TVA" style="display: none">
                    <input id="tauxTVA" type="text" name="tauxTVA" placeholder="taux TVA" style="display: none">
                </p>

                <div id="textTVA" onClick="creerTVA()">Creer une nouvelle TVA</div>

            <p>
                <label class="sous_titre" for="unite_ingredient">Unité</label> :
                <input class="entrer_text" type="text" name="unite" value="<?= htmlspecialchars($unite) ?>" id="unite_ingredient" required/>
            </p>
            <p>
                <label class="sous_titre" for="prix_ingredient">Prix unitaire</label> :
                <input class="entrer_text" type="text" value="<?= htmlspecialchars($prixUnitaire) ?>"  name="prixUnitaire" id="prix_ingredient" required/>
            </p>
            <p class="sous_titre">Allergène</p>

            <div>
                <input class="qcm_rond" type="radio" id="allergeneO" name="allergene" value="1">
                <label for="allergeneO">Oui</label>
            </div>

            <div>
                <input class="qcm_rond" type="radio" id="allergeneN" name="allergene" value="0" checked>
                <label for="allergeneN">Non</label>
            </div>
            </p>
        <?=($create ? "" : '<input type ="hidden" name ="idIngredient" value="' . rawurldecode($idIngredient) . '"/>') ?>
            <input class="bouton_final" type="submit" value="<?= $create ? "Ajouter" : "Mettre à jour" ?>" />
        </p>
        </div>
    </fieldset>
</form>

