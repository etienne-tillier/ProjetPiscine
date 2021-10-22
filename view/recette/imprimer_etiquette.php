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

window.onload = function () {
    afficherAllergene(listeIng)
}
</script>




<div id="etiquette">
    <div id="allergene" >
        <br>
        <p style=" border-style: outset; color: gold;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

            text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black; 
            width: 20%;
            text-align :center;
            margin-left : 40%;
            "> ETIQUETTE <p>
        <h3><?=$r->getNomRecette()?></h3>
        <div id="liste"><h4>listes des ingrédient : <h4></div>
        <br>
    </div>
</div>
<style type="text/css">
         @media print{
            header,footer, #precision_fonction, #fiche_tech{
                display : none;
            }
        }
    </style>

<div id="precision_fonction">
    <button href="#" onclick="window.print()">Imprimer l'etiquette</button>
</div>
