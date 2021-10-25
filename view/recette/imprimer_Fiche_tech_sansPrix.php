<link rel="stylesheet" type="text/css" href="style/style_details_recette_SP.css">
<script defer>
console.log(<?= $listeAllIng ?>)
var listeIng =(<?= $listeAllIng ?>)

//Fonction qui permet de passer la première lettre d'une chaine de caractère en majuscule
function ucfirst_js(string) {
  return string.charAt(0).toUpperCase() + string.slice(1);
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
            $("#table").append("<tr class='ingredient'></tr>")
            $("#table tr:last").append("<td>" + ing.code + "</td>")
            $("#table tr:last").append("<td>" + ucfirst_js(ing.nature) + "</td>")
            $("#table tr:last").append("<td>" + ing.unite + "</td>")
            $("#table tr:last").append("<td>" + ing.quantite + "</td>")            
        }
        if (ing.type == "recette"){
           
            $("#table").append("<tr class='recette' style='font-weight: bold'></tr>")
            $("#table tr:last").append("<td>" + ing.code + "</td>")
            $("#table tr:last").append("<td>" + ucfirst_js(ing.nature) + "</td>")
            $("#table tr:last").append("<td></td>")
            $("#table tr:last").append("<td>" + ing.quantite + "</td>")

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

        <div class="sous_titre15">
            <p class="sous_titre">Portion</p>
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
                        <th>Code</th>
                        <th>Nature</th>
                        <th>Unité</th>
                        <th>Total</th>
                    </tr>
                </table>
            </div>           
        </div> 
    </div>
</div>
</div>


    <style type="text/css">
         @media print{
            header,footer, #boutons{
                display : none;
            }
        }
    </style>
<div id="boutons">
    <ul>
        <li class="case"><a href="#" onclick="window.print()"><i class="fas fa-print"></i> Imprimer la FT</p></li>
    </ul>
</div>
