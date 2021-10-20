
<link rel="stylesheet" type="text/css" href="style/style_formulaire_ingredient.css">
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

<!--<form id="ajout_ingredient" method="post" action="index.php?action=<?= ($create ? "created" : "updated" )?>&controller=ingredient">
    <fieldset class="bordure">
        <legend class="titre"><?= ($create ? "Ajout d'un nouvel ingrédient" : "Mise à jour d'un ingrédient") ?></legend>
        <div class="contenu_form">
        <p><input type ="hidden" name ="action" value=<?php echo "\"$act\"" ?>/></p>
            <div id=colonne_gauche>
                    
                    <p><label class="sous_titre" for="nom_ingredient">NOM</label></p>
                    <p class="sous_titre">TYPE INGREDIENT</p>
                    <p class="sous_titre">TYPE TVA</p>
                    <p><label class="sous_titre" for="unite_ingredient">UNITE</label></p>
                    <p><label class="sous_titre" for="prix_ingredient">PRIX UNITAIRE</label></p>
                    <p class="sous_titre">ALLERGENE</p>

            </div>


            <div id=colonne_droite>
                <p><input class="entrer_text" type="text" placeholder="Ex : Courgette" name="nomIngredient" <?= ($create ? "required" : "required") ?> value="<?= htmlspecialchars($nomIngredient) ?>" id="nom_ingredient"/></p>
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
                <p><input id="newTypeIngredient" type="text" name="newTypeIngredient" placeholder="Nouveau Type" style="display: none"></p>
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
                <p><input id="newTVA" type="text" name="newTVA" placeholder="Nouvelle TVA" style="display: none">
                <input id="tauxTVA" type="text" name="tauxTVA" placeholder="taux TVA" style="display: none"></p>
                <p><input class="entrer_text" type="text" name="unite" value="<?= htmlspecialchars($unite) ?>" id="unite_ingredient" required/></p>
                <p><input class="entrer_text" type="text" value="<?= htmlspecialchars($prixUnitaire) ?>"  name="prixUnitaire" id="prix_ingredient" required/></p>
                <div>
                    <input class="qcm_rond" type="radio" id="allergeneO" name="allergene" value="1">
                    <label for="allergeneO">Oui</label>
                </div>
                <div>
                    <input class="qcm_rond" type="radio" id="allergeneN" name="allergene" value="0" checked>
                    <label for="allergeneN">Non</label>
                </div>

            </div>

            
        <div id="bouton_fin">
            
            <div class="bouton_final" onClick="creerTypeIngredient()">Creer un nouveau type ingrédient</div>
            <div class="bouton_final" onClick="creerTVA()">Creer une nouvelle TVA</div>
            <?=($create ? "" : '<input type ="hidden" name ="idIngredient" value="' . rawurldecode($idIngredient) . '"/>') ?>
            <input class="bouton_final" type="submit" value="<?= $create ? "Ajouter" : "Mettre à jour" ?>" />
        </div>
    </fieldset>
</form>-->

<div class="titre"><?= ($create ? "Ajout d'un nouvel ingrédient" : "Mise à jour d'un ingrédient") ?></div>
<form  id="ajout_ingredient" method="post" action="index.php?action=<?= ($create ? "created" : "updated" )?>&controller=ingredient">
    <input type ="hidden" name ="action" value=<?php echo "\"$act\"" ?>/>
    <input type ="hidden" name ="controller" value="ingredient"/>    
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
                                    echo '<option value="' . $type->getIdTypeIngredient() . '" ' . ($type->getIdTypeIngredient() == $idTypeIngredient ? "selected" : "") . '>' .  $type->getNomTypeIngredient() . '</option>';
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
                                echo '<option value="' . $type->getNomTVA() . '" ' . ($type->getNomTVA() == $nomTVA ? "selected" : "") . '>' .  $type->getNomTVA() . '</option>';
                            }
                        ?>
                        <script>$("#TVASelect").chosen();</script>
                    </select>
                </div>
                <input id="newTVA" type="text" name="newTVA" placeholder="Nouvelle TVA" style="display: none">
                <input id="tauxTVA" type="text" name="tauxTVA" placeholder="taux TVA" style="display: none"></p>
            </div>

            <div class="reponse4">
                <input class="entrer_text" type="text" placeholder="Ex : kg" name="unite" value="<?= htmlspecialchars($unite) ?>" id="unite_ingredient" required/>
            </div>

            <div class="reponse5">
                <input class="entrer_text" type="text" placeholder="Ex : 1.5" value="<?= htmlspecialchars($prixUnitaire) ?>"  name="prixUnitaire" id="prix_ingredient" required/>
            </div>
                
            <div class="reponse6">
                <div>
                    <input class="qcm_rond" type="radio" id="allergeneO" name="allergene" value="1">
                    <label class="qcm_rond" for="allergeneO">Oui</label>
                </div>
                <div>
                    <input class="qcm_rond" type="radio" id="allergeneN" name="allergene" value="0" checked>
                    <label class="qcm_rond" for="allergeneN">Non</label>
                </div>
            </div>

            <div class="bouton1">
                <div class="bouton_js1" onClick="creerTypeIngredient()">Creer un nouveau type ingrédient</div>
            </div>

            <div class="bouton2">
                <div class="bouton_js2" onClick="creerTVA()">Creer une nouvelle TVA</div>
            </div>

            <div class="bouton3">
                <?=($create ? "" : '<input type ="hidden" name ="idIngredient" value="' . rawurldecode($idIngredient) . '"/>') ?>
                <input class="bouton_final" type="submit" value="<?= $create ? "Ajouter" : "Mettre à jour" ?>" />
            </div>

        </div>
    </div>
</form>