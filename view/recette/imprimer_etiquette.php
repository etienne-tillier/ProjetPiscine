<link rel="stylesheet" type="text/css" href="style/style_details_recette_E.css">

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
        chaine += (ingredient.allergene == 1 ? '<b class="allergene">' + ucfirst_js(ingredient.nature) + '</b>, ' : ingredient.nature + ', ')
    }
    chaine = chaine.substring(0, chaine.length - 2);
    console.log(chaine)
    let date = new Date();
    $(".grid .ingr").append(chaine)
    $(".grid .date_crea").append(date.getDate()+ "/" + date.getMonth() + " à " + date.getHours() + "h" + date.getMinutes())
    $(".grid .date_per").append((date.getDate()+3)+ "/" + date.getMonth() + " à " + date.getHours() + "h" + date.getMinutes())
}

window.onload = function () {
    afficherAllergene(listeIng)
}

function hide(element)
{
    element.style.display = 'none';
}

$(function(){
  var button = document.querySelector('.btn_copy');
  $(".btn_copy").on('click', function(){
    $(".grid").clone().appendTo(".maxiParent");

    hide(button);
  })
})




</script>

<div class="maxiParent">
    <div class="grid">
        <div class="nom">
            <p class="nom_text"><?php echo htmlspecialchars(ucfirst($r->getNomRecette()))?></p>
        </div>

        <div class="ingr">
            <p class="ingr_text">Ingrédients  </p>
        </div>

        <div class="date_crea">
            <p class="date">Date de création :  </p>
        </div>

        <div class="date_per">
            <p class="date">Date de péremption :  </p>
        </div>
    </div>
</div>





<style type="text/css">
    @media print{
        header,footer, #boutons, .btn_copy{
            display : none;
        }
    }
</style>

<div id="boutons">
    <ul>
        <li class="case"><a href="#" onclick="window.print()"><i class="fas fa-print"></i> Imprimer l'étiquette</a></li>
        <li class="btn_copy"><a href="#"><i class="fas fa-clone"></i> Dupliquer</a></li> 
    </ul>
</div>