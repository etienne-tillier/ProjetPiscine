<?php

require_once (File::build_path(array("model", "ModelRecette.php")));
require_once (File::build_path(array("model", "ModelIngredient.php")));
require_once(File::build_path(array("model","ModelTypeRecette.php")));
require_once(File::build_path(array("model","ModelIngredientDansRecette.php")));
require_once(File::build_path(array("model","ModelRecetteDansRecette.php")));
require_once(File::build_path(array("model","ModelAuteur.php")));

//Fonction qui permet de générer une liste de données pour la liste d'ingrédients insérée en paramètre (liste d'une recette)
//Cette liste permet un transfert de donnée facile vers le javaScript
function genererListeIngredient($tabIngredient){
    $liste = array();
    foreach ($tabIngredient as $ingredient){
        if (is_a($ingredient[0],"ModelRecette")){
            $listeSousRecette = array(
                "type" => "recette",
                "code" => $ingredient[0]->getIdRecette(),
                "nature" => $ingredient[0]->getNomRecette(),
                "multiplicateur" => $ingredient[0]->getMultiplicateur(),
                "coutPersonnel" => $ingredient[0]->getPrixMainOeuvre(),
                "nombrePortion" => $ingredient[0]->getNombrePortion(),
                "progression" => $ingredient[0]->getProgression(),
                "quantite" => $ingredient[1],
                "ingredients" => array()
            );
            $ingredientsSousRecette = getListIngredient($ingredient[0],$ingredient[1]);

            $listeSousRecette["ingredients"] = genererListeIngredient($ingredientsSousRecette);
            array_push($liste,$listeSousRecette);
        }
        else if (is_a($ingredient[0],"ModelIngredient")){
            array_push($liste,array(
                "type" => "ingredient",
                "code" => $ingredient[0]->getIdIngredient(),
                "nature" => $ingredient[0]->getNomIngredient(),
                "unite" => $ingredient[0]->getUnite(),
                "prix" => $ingredient[0]->getPrixUnitaire(),
                "quantite" => $ingredient[1],
                "tva" => $ingredient[2],
                "allergene" => $ingredient[0]->getAllergene()
            ));
        }
    }
    return $liste;
}

//Fonction qui récupère la liste des ingrédients et sous-recette présent dans la recette renseignée en paramètre avec leur quantité
// en fonction de la quantité de la recette renseignée.
function getListIngredient($ingredient,$quantite){
    $idRecette = $ingredient->getIdRecette();
    $tabIngredientDansRecette = ModelIngredientDansRecette::selectIngredientDansRecette($idRecette,"recette");
    $tabRecetteDansRecette = ModelRecetteDansRecette::selectRecetteDansRecette($idRecette,"mère");
    $tabIngredients = [];
    if (!empty($tabIngredientDansRecette)) {
        foreach ($tabIngredientDansRecette as $ingredientDansRecette) {
            $ingredientRecette = ModelIngredient::select($ingredientDansRecette->getIdIngredient());
            $tva = ModelTVA::select($ingredientRecette->getIdTVA());
            array_push($tabIngredients, [$ingredientRecette,$quantite * $ingredientDansRecette->getQuantiteIngredient(),$tva->getTauxTVA()]);
        }
    }
    if (!empty($tabRecetteDansRecette)) {
        foreach ($tabRecetteDansRecette as $recetteDansRecette) {
            array_push($tabIngredients, [ModelRecette::select($recetteDansRecette->getIdRecetteFille()),$quantite * $recetteDansRecette->getQuantiteRecette()]);
        }
    }
    return $tabIngredients;
}


?>