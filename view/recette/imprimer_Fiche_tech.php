<link rel="stylesheet" type="text/css" href="style/style_details_recette.css">
<script defer>
console.log(<?= $listeAllIng ?>)
var listeIng =(<?= $listeAllIng ?>)

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
            $("#table").append("<tr class='ingredient'></tr>")
            $("#table tr:last").append("<td>" + ing.nature + "</td>")
            $("#table tr:last").append("<td>" + ing.unite + "</td>")

            $("#tablePrix").append("<tr class='ingredient'></tr>")
            $("#tablePrix tr:last").append("<td>" + ing.quantite + "</td>")
        }
        if (ing.type == "recette"){
           
            $("#table").append("<tr class='recette' style='font-weight: bold'></tr>")
            $("#table tr:last").append("<td>" + ing.code + "</td>")
            $("#table tr:last").append("<td>" + ing.nature + "</td>")
            $("#table tr:last").append("<td></td>")

            $("#tablePrix").append("<tr class='recette' style='font-weight: bold'></tr>")
            $("#tablePrix tr:last").append("<td>" + ing.quantite + "</td>")
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
        <div class="titre1">
            <p class="titre"><?php echo htmlspecialchars(ucfirst($r->getNomRecette()))?></p>
        </div>

        <div class="sous_titre11">
            <p class="sous_titre">Descriptif</p>
        </div>

        <div class="sous_titre12">
            <p class="sous_titre">Progression</p>
        </div>

        <div class="sous_titre13">
            <p class="sous_titre">Dénomination</p>
        </div>

        <div class="sous_titre14">
            <p class="sous_titre">Valorisation</p>
        </div>

        <div class="sous_titre15">
            <p class="sous_titre">Portion</p>
        </div>

        <div class="sous_titre21">
            <p class="sous_titre_niv2">Coût production total</p>
        </div>

        <div class="sous_titre22">
            <p class="sous_titre_niv2">Coût production par portion</p>
        </div>

        <div class="sous_titre23">
            <p class="sous_titre_niv2">Total denrée</p>
        </div>

        <div class="sous_titre24">
            <p class="sous_titre_niv2">ASS 5%</p>
        </div>

        <div class="sous_titre25">
            <p class="sous_titre_niv2">Coût matière</p>
        </div>

        <div class="sous_titre26">
            <p class="sous_titre_niv2">Coût personnel</p>
        </div>

        <div class="sous_titre27">
            <p class="sous_titre_niv2">Multiplicateur</p>
        </div>

        <div class="contenu_fiche1">
            <p class="contenu_fiche"><?php echo htmlspecialchars($r->getDescriptif()); ?></p>
        </div>

        <div class="contenu_fiche2">
            <p class="contenu_fiche"><?php //echo htmlspecialchars($r->getProgression()); ?></p><!-- A VERIFIER SELON TA FONCTION ETIENNE || Obtenir la portion -->
        </div> 

        <div class="contenu_fiche3">
            <p class="contenu_fiche"><?php //echo htmlspecialchars($r->getPortion()); ?></p><!-- A VERIFIER SELON TA FONCTION ETIENNE || Obtenir la portion -->
        </div> 

        <div class="contenu_fiche4">
            <div id="contenu_den">
                <table id="table">
                    <tr>
                        <th>Nature</th>
                        <th>Unité</th>
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
                </table>
            </div>

        </div>

        <div class="contenu_fiche6">
            <p class="contenu_fiche"><!-- Coût production total --></p>
        </div>

        <div class="contenu_fiche7">
            <p class="contenu_fiche"><!-- Coût production par portion --></p>
        </div>

        <div class="contenu_fiche8">
            <p class="contenu_fiche"><!-- Denrée (somme cout recette) --></p>
        </div>

        <div class="contenu_fiche9">
            <p class="contenu_fiche"><!-- ASS 5% (somme cout recette)*0.05 --></p>
        </div>

        <div class="contenu_fiche10">
            <p class="contenu_fiche"><!-- Cout Matiere=SOMME(Denrée, ASS 5%) --></p>
        </div>

        <div class="contenu_fiche11">
            <p class="contenu_fiche"><?php //echo htmlspecialchars($r->getMulti()); ?></p><!-- A VERIFIER SELON TA FONCTION ETIENNE || Obtenir le multiplicateur -->
        </div> 
        
        <div class="contenu_fiche12">
            <p class="contenu_fiche"><?php //echo htmlspecialchars($r->getMain()); ?></p><!-- A VERIFIER SELON TA FONCTION ETIENNE || Obtenir la main d'oeuvre -->
        </div> 
    </div>
</div>
</div>


    <style type="text/css">
         @media print{
            header,footer, #precision_fonction{
                display : none;
            }
        }
    </style>
<div id="impression_ft">
    <p><a href="#" onclick="window.print()">Imprimer la fiche technique</p>
</div>
