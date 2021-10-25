<link rel="stylesheet" type="text/css" href="style/style_details_recette_AP.css">
<script defer>
console.log(<?= $listeAllIng ?>)
var listeIng =(<?= $listeAllIng ?>)
var infoRecette = <?= json_encode($infoRecette) ?>


//Fonction qui permet de passer la première lettre d'une chaine de caractère en majuscule
function ucfirst_js(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}

//Fonction qui permet de calculer le prix totalHT d'une recette passée en paramètre
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

//Fonction qui permet de calculer le prix total avec la TVA comprise d'une recette passée en paramètre
const calculerPrixRecetteTVA = (recette) => {
    let somme = 0
    for (let ing of recette){
        if (ing.type == "ingredient"){
            let PTHT = ing.prix * ing.quantite;
            let augmentationTVA = (ing.prix * (ing.tva/100)) * ing.quantite;
            let PTTTC = PTHT + augmentationTVA;
            somme += PTTTC
        }
        if (ing.type == "recette"){
            somme += calculerPrixRecetteTVA(ing.ingredients)
        }
    }
    return somme
}

//Fonction qui renvoie la liste des ingrédient allergène d'une recette passée en paramètre
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

//Fonction qui permet de trier une liste passée en paramètre afin de n'avoir qu'une seule occurence maximale de chaque valeur dans la liste (peut être mieux codée)
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

//Fonction qui récupère et renvoie tous les ingrédients (pas les recettes) présents dans la recette passée en paramètres
//Si doublons, alors ne renvoie qu'une seule occurence
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

//Fonction qui permet de générer l'étiquette d'une recette passée en paramètre avec la liste des ingrédients où les allergènes sont en gras
const afficherAllergene = (recette) => {
    let listeIngredient = genererListeAllIngredient(recette)
    let chaine = ""
    for (let ingredient of listeIngredient) {
        chaine += (ingredient.allergene == 1 ? '<b class="allergene">' + ingredient.nature + ', </b>' : ingredient.nature + ', ')
    }
    chaine = chaine.substring(0, chaine.length - 2);
    let date = new Date();
    $("#allergene #liste").append(chaine)
    $("#allergene h3").append(" le " + date.getDate()+ "/" + date.getMonth() + " à " + date.getHours() + "h" + date.getMinutes())
}

//Fonction qui permet de générer la fiche technique à partir d'une recette passée en paramètre
const afficherFicheTech = (list) => {
    for (let ing of list){
        if (ing.type == "ingredient"){
            let PTHT = (ing.prix * ing.quantite).toFixed(2);
            let augmentationTVA = (parseFloat(ing.prix) * parseFloat(ing.tva/100)) * parseFloat(ing.quantite);
            let PTTTC = (parseFloat(PTHT) + parseFloat(augmentationTVA)).toFixed(2);
            $("#table").append("<tr class='ingredient'></tr>")
            $("#table tr:last").append("<td>" + ing.code + "</td>")
            $("#table tr:last").append("<td>" + ucfirst_js(ing.nature) + "</td>")
            $("#table tr:last").append("<td>" + ing.unite + "</td>")

            $("#tablePrix").append("<tr class='ingredient'></tr>")
            $("#tablePrix tr:last").append("<td>" + ing.quantite.toFixed(2) + "</td>")
            $("#tablePrix tr:last").append("<td>" + ing.prix + "</td>")
            $("#tablePrix tr:last").append("<td>" + PTHT + "</td>")
            $("#tablePrix tr:last").append("<td>" + PTTTC + "</td>")
        }
        if (ing.type == "recette"){
            let prix = (calculerPrixRecette(ing.ingredients)).toFixed(2)
            let PTHT = (prix * ing.quantite).toFixed(2);
            let PTTTC = (calculerPrixRecetteTVA(ing.ingredients)).toFixed(2)
            $("#table").append("<tr class='recette' style='font-weight: bold'></tr>")
            $("#table tr:last").append("<td>" + ing.code + "</td>")
            $("#table tr:last").append("<td>" + ucfirst_js(ing.nature) + "</td>")
            $("#table tr:last").append("<td></td>")

            $("#tablePrix").append("<tr class='recette' style='font-weight: bold'></tr>")
            $("#tablePrix tr:last").append("<td>" + ing.quantite.toFixed(2) + "</td>")
            $("#tablePrix tr:last").append("<td>" + prix + "</td>")
            $("#tablePrix tr:last").append("<td>" + PTHT + "</td>")
            $("#tablePrix tr:last").append("<td>" + PTTTC + "</td>")
            afficherFicheTech(ing.ingredients);
        }
    }
}

//Fonction qui permet de générer à partir d'une recette passée en paramètre les prix totaux et charges finales appliquées
const afficherChargesEtPrixTotaux = (recette) => {
    let prixRecetteAvecTVA = (calculerPrixRecetteTVA(recette)).toFixed(2)
    let ASS = (prixRecetteAvecTVA * 0.05).toFixed(2)
    let prixAvecASS = (parseFloat(prixRecetteAvecTVA) + parseFloat(ASS)).toFixed(2)
    let coutPersonnel = infoRecette.prixMainOeuvre
    let multiplicateur = infoRecette.multiplicateur
    let prixTotal = ((parseFloat(prixAvecASS) + parseFloat(coutPersonnel)) * multiplicateur).toFixed(2)
    let nombrePortion = infoRecette.nombrePortion
    let prixPortion = (prixTotal / nombrePortion).toFixed(2)
    $(".contenu_fiche8 .contenu_fiche").append(prixRecetteAvecTVA)
    $(".contenu_fiche9 .contenu_fiche").append(ASS)
    $(".contenu_fiche10 .contenu_fiche").append(prixAvecASS)
    $(".contenu_fiche6 .contenu_fiche").append(prixTotal)
    $(".contenu_fiche7 .contenu_fiche").append(prixPortion)
}
window.onload = function () {
    afficherFicheTech(listeIng)
    afficherAllergene(listeIng)
    afficherChargesEtPrixTotaux(listeIng)
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
            <p class="contenu_fiche"><?= htmlspecialchars($r->getDescriptif()); ?></p>
        </div>

        <div class="contenu_fiche2">
            <p class="contenu_fiche21"><?= htmlspecialchars($r->getProgression()); ?></p><!-- A VERIFIER SELON TA FONCTION ETIENNE || Obtenir la portion -->
        </div> 

        <div class="contenu_fiche3">
            <p class="contenu_fiche"><?= htmlspecialchars($r->getNombrePortion()); ?></p><!-- A VERIFIER SELON TA FONCTION ETIENNE || Obtenir la portion -->
        </div>

        <div class="contenu_fiche4">
            <div id="contenu_den">
                <table id="table">
                    <tr>
                        <th class="tab1">Code</th>
                        <th class="tab2">Nature</th>
                        <th class="tab1">Unité</th>
                    </tr>
                </table>
            </div>           
        </div>

        <div class="contenu_fiche5">
            <div id="contenu_val">
                <table id="tablePrix">
                    <tr>
                        <th class="tab1">Total</th>
                        <th class="tab1">Prix U</th>
                        <th class="tab1">PTHT</th>
                        <th class="tab1">PTTTC</th>
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
            <p class="contenu_fiche"><?= htmlspecialchars($r->getPrixMainOeuvre()); ?></p><!-- A VERIFIER SELON TA FONCTION ETIENNE || Obtenir le multiplicateur -->
        </div> 
        
        <div class="contenu_fiche12">
            <p class="contenu_fiche"><?= htmlspecialchars($r->getMultiplicateur()); ?></p><!-- A VERIFIER SELON TA FONCTION ETIENNE || Obtenir la main d'oeuvre -->
        </div>
    </div>
</div>


<style type="text/css">
         @media print{
            header,footer, #boutons1{
                display : none;
            }
        }
</style>

<div id="boutons1">
    <ul>
        <li class="case"><?php echo '<a href="index.php?action=impressionetiquette&controller=recette&idRecette=' . rawurlencode($r->getIdRecette()) . '"><i class="fas fa-ticket-alt"></i> Etiquette</a>'; ?></li>
        <li class="case"><a href="#" onclick="window.print()"><i class="fas fa-file-invoice-dollar"></i> FT avec prix</li>
        <li class="case"><?php echo '<a href="index.php?action=impressionfiche&controller=recette&idRecette=' . rawurlencode($r->getIdRecette()) . '"><i class="fas fa-receipt"></i> FT sans prix</a>'; ?></li>
    </ul>

</div>

