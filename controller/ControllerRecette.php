<?php

require_once (File::build_path(array("model", "ModelRecette.php")));
require_once(File::build_path(array("model","ModelTypeRecette.php")));
require_once(File::build_path(array("model","ModelIngredientDansRecette.php")));
require_once(File::build_path(array("model","ModelAuteur.php")));

class ControllerRecette {

    protected static $object = 'Recette';

    public static function readAll() {
        $tab_r = ModelRecette::selectAll();     //appel au modèle pour gerer la BD
        $tabTypeRecette = ModelTypeRecette::selectAll();
        $controller = ('Recette');
        $view = 'list';
        $pagetitle = 'Recettes';
        require (File::build_path(array("view", "view.php")));  //"redirige" vers la vue
    }

    public static function read() {
        $idRecette = $_GET["idRecette"];
        $r = ModelRecette::select($idRecette);
        $auteur = ModelAuteur::select($r->getIdAuteur());
        $tabIngredientDansRecette = ModelIngredientDansRecette::selectIngredientDansRecette($idRecette);
        $tabIngredients = [];
        foreach($tabIngredientDansRecette as $ingredientDansRecette){
            array_push($tabIngredients, [ModelIngredient::select($ingredientDansRecette->getIdIngredient()),$ingredientDansRecette->getQuantiteIngredient()]);
        }
        $pagetitle = $r->getNomRecette();
        if ($r == null) {
            $controller = ('Recette');
            $view = 'error';
            require (File::build_path(array("view", "view.php")));
        } else {
            $controller = 'Recette';
            $view = 'detail';
            require (File::build_path(array("view", "view.php")));
        }
    }


            //à faire (pas fini) avec created
    public static function create() {
            $idRecette = "";
            $nomRecette = "";
            $idTypeRecette = "";
            $idAuteur = "";
            $nombrePortion = "";
            $descriptif = "";
            $progression = "";
            $prixMainOeuvre = "";
            $multiplicateur = "";
            $form = "readonly";
            $act = "created";
            $pagetitle = 'Nouveau produit';
            $controller = 'Recette';
            $view = 'update';
            require (File::build_path(array("view", "view.php")));
        }


        //à faire (pas fini)
    public static function created() {
            $data = array(
                "idRecette" => "",
                "nomRecette" => $_GET["nomRecette"],
                "nombrePortion" => $_GET["nombrePortion"],
                "descriptif" => $_GET["descriptif"],
                "progression" => $_GET["progression"],
            );

            $p = new ModelRecette($_GET["nomRecette"], $_GET["nombrePortion"], $_GET["descriptif"], $_GET["progression"], $_GET["paysProvenance"]);
            ModelRecette::save($data);
            $tab_p = ModelRecette::selectAll();
            $controller = ('Recette');
            $view = 'created';
            $pagetitle = 'Tous nos produits';
            require (File::build_path(array("view", "view.php")));
        }


    public static function error() {
        $controller = ('Recette');
        $view = 'error';
        $pagetitle = 'Erreur';
        require (File::build_path(array("view", "view.php")));
    }


    // à faire avec udptated
    public static function update() {
            $act = "updated";
            $form = "readonly";
            $pagetitle = 'Mise à jour informations produit';
            $idRecette = $_GET["idRecette"];

            $p = ModelRecette::select($idRecette);
            $nomRecette = $p->getNomRecette();
            $descriptif = $p->getdescriptif();
            $nombrePortion = $p->getunite();
            $progression = $p->getprogression();
            $paysProvenance = $p->getPaysProvenance();
            if ($p == null) {
                $controller = ('Recette');
                $view = 'error';
                require (File::build_path(array("view", "view.php")));
            } else {
                $controller = 'Recette';
                $view = 'update';
                require (File::build_path(array("view", "view.php")));
            }
        }


    //TODO
    public static function updated() {
            $tab_p = ModelRecette::selectAll();
            $pagetitle = 'Produit mis à jour';
            $idRecette = $_GET["idRecette"];
            $data = array(
                "nomRecette" => $_GET["nomRecette"],
                "nombrePortion" => $_GET["nombrePortion"],
                "progression" => $_GET["progression"],
                "paysProvenance" => $_GET["paysProvenance"],
                "primary" => $_GET["idRecette"],
            );
            $p = ModelRecette::select($idRecette);
            $p->update($data);
            $controller = "Recette";
            $view = 'updated';
            require (File::build_path(array("view", "view.php")));
        }

    public static function delete() {
            $tab_p = ModelRecette::selectAll();     //appel au modèle pour gerer la BD
            $idRecette = $_GET["idRecette"];
            $p = ModelRecette::select($idRecette);
            if ($p == null) {
                $pagetitle = 'Erreur produit';
                $controller = ('Recette');
                $view = 'error';
                require (File::build_path(array("view", "view.php")));
            } else {
                
                
                ModelRecette::delete($idRecette);
                $controller = ('Recette');
                $view = 'delete';
                $pagetitle = 'Suppression de produit';
                require (File::build_path(array("view", "view.php")));
                
            }
        }

//     public static function ajouterPanier() {
//         $panier = unserialize($_COOKIE["panier"]);
//         if (!in_array($_GET['idRecette'], $panier) && !ModelRecette::estAchete($_GET["idRecette"])) {
//             array_push($panier, $_GET["idRecette"]);
//             setcookie("panier", serialize($panier), time() + 3600);
//             $p = ModelRecette::select($_GET["idRecette"]);
//             $_SESSION["unitePanier"] = $_SESSION["unitePanier"] + $p->getunite();
//             $controller = ('Recette');
//             $view = 'ajoutPanier';
//             $pagetitle = 'Ajout de produit au panier';
//             require (File::build_path(array("view", "view.php")));
//         } else {
//             $controller = ('Recette');
//             $view = 'problemePanier';
//             $pagetitle = 'Panier';
//             require (File::build_path(array("view", "view.php")));
//         }
//     }

//     public static function supprimerPanier() {

//         $panier = unserialize($_COOKIE["panier"]);
//         $p = ModelRecette::select($_GET["idRecette"]);
//         if (in_array($_GET["idRecette"], $panier)) {
//             $_SESSION["unitePanier"] = $_SESSION["unitePanier"] - $p->getunite();
//         }
//         unset($panier[array_search($_GET["idRecette"], $panier)]);
//         sort($panier);
//         setcookie("panier", serialize($panier), time() + 3600);
//         $controller = ('Recette');
//         $view = 'supprimerPanier';
//         $pagetitle = 'Supression de produit du panier';
//         require (File::build_path(array("view", "view.php")));
//     }

//     public static function afficherPanier() {
//         $controller = ('Recette');
//         $view = 'panier';
//         $pagetitle = 'Votre panier';
//         require (File::build_path(array("view", "view.php")));
//     }

//     public static function viderPanier() {
//         $panier = array();
//         setcookie("panier", serialize($panier), time() + 3600);
//         $_SESSION["unitePanier"] = 0;
//         $controller = ('Recette');
//         $view = 'viderPanier';
//         $pagetitle = 'Votre panier';
//         require (File::build_path(array("view", "view.php")));
//     }

}
