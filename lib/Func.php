<?php

require_once (File::build_path(array("model", "ModelRecette.php")));
require_once (File::build_path(array("model", "ModelIngredient.php")));
require_once(File::build_path(array("model","ModelTypeRecette.php")));
require_once(File::build_path(array("model","ModelIngredientDansRecette.php")));
require_once(File::build_path(array("model","ModelRecetteDansRecette.php")));
require_once(File::build_path(array("model","ModelAuteur.php")));


function genererListeIngredient($tabIngredient){
    $liste = array();
    //var_dump($tabIngredient);
    foreach ($tabIngredient as $ingredient){
        //var_dump($ingredient);
        if (is_a($ingredient[0],"ModelRecette")){
            $listeSousRecette = array(
                "type" => "recette",
                "code" => $ingredient[0]->getIdRecette(),
                "nature" => $ingredient[0]->getNomRecette(),
                "quantite" => $ingredient[1],
                "ingredients" => array()
            );
            //var_dump($listeSousRecette);
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