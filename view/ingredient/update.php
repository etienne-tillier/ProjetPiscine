
<link rel="stylesheet" type="text/css" href="style/style_formulaire_ingredient.css">
<script defer>

    //Fonction qui permet de gérer l'affichage afin de créer un nouveau type ingrédient
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

    //Fonction qui permet de gérer l'affichage afin de pouvoir modifier une TVA existante
    function updateTVA(){

        if (document.getElementById("tauxUpdateTVA").required == false){
            $("#tauxUpdateTVA").toggle();
            $("#textTVA").toggle();
            $("#tauxUpdateTVA").prop("required",true)
            $("#textUpdateTVA").text("Retour");
        }
        else {
            $("#tauxUpdateTVA").toggle();
            $("#textTVA").toggle();
            $("#tauxUpdateTVA").prop("required",false)
            $("#tauxUpdateTVA").prop("value","")
            $("#textUpdateTVA").text("Mettre a jour la TVA");
        }

    }

//Fonction qui permet de gérer l'affichage afin de pouvoir créer une nouvelle TVA
    function creerTVA(){
        if (document.getElementById("newTVA").required == false){
            $("#textUpdateTVA").toggle();
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
            $("#textUpdateTVA").toggle();
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


<div class="titre"><?= ($create ? "Ajout d'un nouvel ingrédient" : "Mise à jour d'un ingrédient") ?></div>
<form  id="ajout_ingredient" method="post" action="index.php?action=<?= ($create ? "created" : "updated" )?>&controller=ingredient">
    <fieldset>
        <div class="contenu_form">
            <div class="grid">

                <div class="sous_titre1">
                    <p>NOM</p>
                </div>

                <div class="sous_titre2">
                    <p>TYPE INGREDIENT</p>
                </div>

                <div class="sous_titre3">
                    <p>TYPE TVA</p>
                </div>

                <div class="sous_titre4">
                    <p>UNITE</p>
                </div>
                <div class="sous_titre5">
                    <p>PRIX UNITAIRE</p>
                </div>

                <div class="sous_titre6">
                    <p>ALLERGENE</p>
                </div>

                <div class="reponse1">
                    <input class="entrer_text" type="text" placeholder="Ex : Courgette" name="nomIngredient" <?= ($create ? "required" : "required") ?> value="<?= htmlspecialchars($nomIngredient) ?>" id="nom_ingredient"/>
                </div>

                <div class="reponse2">
                    <div id="typeIngredientSelect">
                        <p><select id="typeIngredientList" name="idTypeIngredient" required>
                                <option class="liste_der" value="" disabled <?= ($create ? "selected" : "") ?>>Choisissez un Type</option>
                                <?php
                                    foreach($typeIngredientList as $type){
                                        echo '<option value="' . $type->getIdTypeIngredient() . '" ' . ($type->getIdTypeIngredient() == $idTypeIngredient ? "selected" : "") . '>' .  htmlspecialchars(ucfirst($type->getNomTypeIngredient())) . '</option>';
                                    }
                                ?>
                                <script>$("#typeIngredientList").chosen();</script>
                            </select>
                    </div>
                    <input id="newTypeIngredient" type="text" name="newTypeIngredient" placeholder="Nouveau Type" style="display: none"></p>
                </div>

                <div class="reponse3">
                    <div id="TVAlist">
                        <p><select id="TVASelect" name="nomTVA" required>
                            <option class="liste_der" value="" disabled <?= ($create ? "selected" : "") ?>>Choisissez une TVA</option>
                            <?php
                                foreach($typeTVAList as $type){
                                    echo '<p>' . $type->getNomTVA() . '</p>';
                                    echo '<option value="' . $type->getNomTVA() . '" ' . ($type->getNomTVA() == $nomTVA ? "selected" : "") . '>' .  htmlspecialchars(ucfirst($type->getNomTVA())) . '</option>';
                                }
                            ?>
                            <script>$("#TVASelect").chosen();</script>
                        </select>
                    </div>
                    <input id="newTVA" type="text" name="newTVA" placeholder="Nouvelle TVA" style="display: none">
                    <input id="tauxTVA" type="text" name="tauxTVA" placeholder="taux TVA en %"" style="display: none">
                    <input id="tauxUpdateTVA" type="text" name="tauxUpdateTVA" placeholder="nouveau taux TVA en %" style="display: none"></p>
                </div>

                <div class="reponse4">
                    <input class="entrer_text" type="text" placeholder="Ex : kg" name="unite" value="<?= htmlspecialchars($unite) ?>" id="unite_ingredient" required/>
                </div>

                <div class="reponse5">
                    <input class="entrer_text" type="text" placeholder="Ex : 1.5" value="<?= htmlspecialchars($prixUnitaire) ?>"  name="prixUnitaire" id="prix_ingredient" required/>
                </div>
                    
                <div class="reponse6">
                    <div>
                        <input class="qcm_rond" type="radio" id="allergeneO" name="allergene" value="1" <?= ($allergene == "1" ? "checked" : "") ?>>
                        <label class="qcm_rond" for="allergeneO">Oui</label>
                    </div>
                    <div>
                        <input class="qcm_rond" type="radio" id="allergeneN" name="allergene" value="0" <?= ($allergene == "1" ? "" : "checked") ?>>
                        <label class="qcm_rond" for="allergeneN">Non</label>
                    </div>
                </div>

                <div class="bouton1">
                    <div id="NewTypeIngredient" class="bouton_js1" onClick="creerTypeIngredient()">Creer un nouveau type ingrédient</div>
                </div>

                <div class="bouton2">
                    <div id="textTVA" class="bouton_js2" onClick="creerTVA()">Creer une nouvelle TVA</div>
                </div>


                <div class="bouton3">
                    <?=($create ? "" : '<input type ="hidden" name="idIngredient" value="' . rawurldecode($idIngredient) . '"/>') ?>
                    <input class="bouton_final" type="submit" value="<?= $create ? "Ajouter" : "Mettre à jour" ?>" />
                </div>

                <div class="bouton4">
                    <div id="textUpdateTVA" onClick="updateTVA()">Mettre à jour la TVA</div>
                </div>



            </div>
        </div>
    </fieldset>
</form>