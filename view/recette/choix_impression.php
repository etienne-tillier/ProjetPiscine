<link rel="stylesheet" type="text/css" href="style/style_details_recette.css">
<script defer>
console.log(<?= $listeAllIng ?>)
var listeIng =(<?= $listeAllIng ?>)

const calculerPrixRecette = (recette) => {
    let somme = 0
    for (let ing of recette){
        if (ing.type == "ingredient"){
            somme += ing.prix * ing.quantite
        }
        if (ing.type == "recette"){
            somme += calculerPrixRecette(ing.ingredients)
        }
    }
    return somme
}

const genererListeAllergene = (recette) => {
    let listeAllergene = []
    for (let ing of recette){
        if (ing.type == "ingredient" && ing.allergene == 1){
            listeAllergene.push(ing)
        }
        if (ing.type == "recette"){
            listeAllergene.concat(genererListeAllergene(ing.ingredients))
        }
    }
    return listeAllergene
}

const triListIngredient = (list) => {
    let listeTrie = list
    for (let i of listeTrie){
        let trouve = false;
        let nbOccurence = 0;
        let compteur = 0;
        while (compteur < listeTrie.length && !trouve){
            if (listeTrie[compteur].nature == i.nature){
                nbOccurence++;
            }
            if (nbOccurence > 1){
                trouve = true;
                listeTrie.splice(compteur, 1)
            }
            compteur++
        }
    }
    return listeTrie
}


const genererListeAllIngredient = (recette) => {
    let listeIngredient = []
    for (let ing of recette){
        if (ing.type == "ingredient"){
            listeIngredient.push(ing)
        }
        if (ing.type == "recette"){
            listeIngredient = listeIngredient.concat(genererListeAllIngredient(ing.ingredients))
        }
    }
    listeIngredient = triListIngredient(listeIngredient)
    return listeIngredient;
}


const afficherAllergene = (recette) => {
    let listeIngredient = genererListeAllIngredient(recette)
    let chaine = ""
    for (let ingredient of listeIngredient) {
        chaine += (ingredient.allergene == 1 ? '<b class="allergene">' + ingredient.nature + ', </b>' : ingredient.nature + ', ')
    }
    chaine = chaine.substring(0, chaine.length - 2);
    console.log(chaine)
    let date = new Date();
    $("#allergene #liste").append(chaine)
    $("#allergene h3").append(" le " + date.getDate()+ "/" + date.getMonth() + " à " + date.getHours() + "h" + date.getMinutes())
}

const afficherFicheTech = (list) => {
    for (let ing of list){
        if (ing.type == "ingredient"){
            let PTHT = ing.prix * ing.quantite;
            let augmentationTVA = ing.prix * ing.tva;
            let PTTTC = PTHT + augmentationTVA;
            $("#table").append("<tr class='ingredient'></tr>")
            $("#table tr:last").append("<td>" + ing.code + "</td>")
            $("#table tr:last").append("<td>" + ing.nature + "</td>")
            $("#table tr:last").append("<td>" + ing.unite + "</td>")

            $("#tablePrix").append("<tr class='ingredient'></tr>")
            $("#tablePrix tr:last").append("<td>" + ing.quantite + "</td>")
            $("#tablePrix tr:last").append("<td>" + ing.prix + "</td>")
            $("#tablePrix tr:last").append("<td>" + PTHT + "</td>")
            $("#tablePrix tr:last").append("<td>" + PTTTC + "</td>")
        }
        if (ing.type == "recette"){
            let prix = calculerPrixRecette(ing.ingredients)
            let PTHT = prix * ing.quantite;
            $("#table").append("<tr class='recette' style='font-weight: bold'></tr>")
            $("#table tr:last").append("<td>" + ing.code + "</td>")
            $("#table tr:last").append("<td>" + ing.nature + "</td>")
            $("#table tr:last").append("<td></td>")

            $("#tablePrix").append("<tr class='recette' style='font-weight: bold'></tr>")
            $("#tablePrix tr:last").append("<td>" + ing.quantite + "</td>")
            $("#tablePrix tr:last").append("<td>" + prix + "</td>")
            $("#tablePrix tr:last").append("<td>" + PTHT + "</td>")
            $("#tablePrix tr:last").append("<td></td>")
            afficherFicheTech(ing.ingredients);
        }
    }
}
window.onload = function () {
    afficherFicheTech(listeIng)
    afficherAllergene(listeIng)
}
</script>

<div class="maxiParent">
    <div class="grid">
        <div class="titre"><?php echo htmlspecialchars(ucfirst($r->getNomRecette()))?></div>
        <div class="sous_titre11">Descriptif</div>

        <div class="sous_titre12">Progression</div>

        <div class="sous_titre13">Dénomination</div>

        <div class="sous_titre14">Valorisation</div>

        <div class="sous_titre15">Portion</div>

        <div class="sous_titre21">Coût production total</div>

        <div class="sous_titre22">Coût production par portion</div>

        <div class="sous_titre23">Total denrée</div>

        <div class="sous_titre24">ASS 5%</div>

        <div class="sous_titre25">Coût matière</div>

        <div class="sous_titre26">Coût personnel</div>

        <div class="sous_titre27">Multiplicateur</div>

        <div class="contenu_fiche1"><?php echo htmlspecialchars($r->getDescriptif()); ?></div>

        <div class="contenu_fiche2"><?php //echo htmlspecialchars($r->getProgression()); ?></div> <!-- A VERIFIER SELON TA FONCTION ETIENNE || Obtenir la portion -->

        <div class="contenu_fiche3"><?php //echo htmlspecialchars($r->getPortion()); ?></div> <!-- A VERIFIER SELON TA FONCTION ETIENNE || Obtenir la portion -->

        <div class="contenu_fiche4">
            <div id="contenu_den">
                <table id="table">
                    <tr>
                        <th>Code</th>
                        <th>Nature</th>
                        <th>Unité</th>
                    </tr>
                    <tr>
                        <td><?php ?></td>
                        <td><?php ?></td>
                        <td><?php ?></td>
                    </tr>
                </table>
            </div>           
        </div>

        <div class="contenu_fiche5">
            <div id="contenu_val">
                <table id="tablePrix">
                    <tr>
                        <th>Total</th>
                        <th>Prix U</th>
                        <th>PTHT</th>
                        <th>PTTTC</th>
                    </tr>
                    <tr>
                        <td><?php ?></td>
                        <td><?php ?></td>
                        <td><?php ?></td>
                    </tr>
                </table>
            </div>

        </div>

        <div class="contenu_fiche6">1<!-- Coût production total --></div>
        <div class="contenu_fiche7">1<!-- Coût production par portion --></div>
        <div class="contenu_fiche8">1<!-- Denrée (somme cout recette) --></div>
        <div class="contenu_fiche9">1<!-- ASS 5% (somme cout recette)*0.05 --></div>
        <div class="contenu_fiche10">1<!-- Cout Matiere=SOMME(Denrée, ASS 5%) --></div>
        <div class="contenu_fiche11">1<?php //echo htmlspecialchars($r->getMulti()); ?></div> <!-- A VERIFIER SELON TA FONCTION ETIENNE || Obtenir le multiplicateur -->
        <div class="contenu_fiche12">1<?php //echo htmlspecialchars($r->getMain()); ?></div> <!-- A VERIFIER SELON TA FONCTION ETIENNE || Obtenir la main d'oeuvre -->
    </div>
</div>

<style type="text/css">
         @media print{
            header,footer, #precision_fonction1{
                display : none;
            }
        }
</style>

<div id="precision_fonction1">
    <ul>
    <li><?php echo '<a href="index.php?action=impressionetiquette&controller=recette&idRecette=' . rawurlencode($r->getIdRecette()) . '"> ETIQUETTE</a>'; ?></li>
    <li><a href="#" onclick="window.print()">FT AVEC PRIX</li>
    <li><?php echo '<a href="index.php?action=impressionfiche&controller=recette&idRecette=' . rawurlencode($r->getIdRecette()) . '"> FT SANS Prix</a>'; ?></li>
    </ul>

</div>

