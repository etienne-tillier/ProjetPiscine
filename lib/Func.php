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
        if (is_a($ingredient,"ModelRecette")){
            $listeSousRecette = array(
                "type" => "recette",
                "code" => $ingredient->getIdRecette(),
                "nature" => $ingredient->getNomRecette(),
                "ingredients" => array()
            );
            //var_dump($listeSousRecette);
            $ingredientsSousRecette = getListIngredient($ingredient->getIdRecette());

            $listeSousRecette["ingredients"] = genererListeIngredient($ingredientsSousRecette);
            array_push($liste,$listeSousRecette);
        }
        else if (is_a($ingredient,"ModelIngredient")){
            array_push($liste,array(
                "type" => "ingredient",
                "code" => $ingredient->getIdIngredient(),
                "nature" => $ingredient->getNomIngredient(),
                "unite" => $ingredient->getUnite(),
                "prix" => $ingredient->getPrixUnitaire(),
                "allergene" => $ingredient->getAllergene()
            ));
        }
    }
    return $liste;
}

function getListIngredient($idRecette){
    $tabIngredientDansRecette = ModelIngredientDansRecette::selectIngredientDansRecette($idRecette,"recette");
    $tabRecetteDansRecette = ModelRecetteDansRecette::selectRecetteDansRecette($idRecette,"mère");
    $tabIngredients = [];
    if (!empty($tabIngredientDansRecette)) {
        foreach ($tabIngredientDansRecette as $ingredientDansRecette) {
            array_push($tabIngredients, ModelIngredient::select($ingredientDansRecette->getIdIngredient()));
        }
    }
    if (!empty($tabRecetteDansRecette)) {
        foreach ($tabRecetteDansRecette as $recettetDansRecette) {
            array_push($tabIngredients, ModelRecette::select($recettetDansRecette->getIdRecetteFille()));
        }
    }
    return $tabIngredients;
}


?>