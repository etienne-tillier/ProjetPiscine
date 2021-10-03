<?php

require_once (File::build_path(array("model", "ModelIngredient.php")));
require_once (File::build_path(array("model", "ModelTypeIngredient.php")));
require_once (File::build_path(array("model", "ModelTVA.php")));

class ControllerIngredient {

    protected static $object = 'ingredient';

    public static function readAll() {
        $tab_i = ModelIngredient::selectAll();     //appel au modèle pour gerer la BD
        $typeIngredientListe = ModelTypeIngredient::selectAll();
        $controller = ('ingredient');
        $view = 'list';
        $pagetitle = 'Stonezone : Tous nos minéraux';
        require (File::build_path(array("view", "view.php")));  //"redirige" vers la vue
    }

    public static function read() {
        $pagetitle = 'Détails';
        $idIngredient = $_GET["idIngredient"];
        $i = ModelIngredient::select($idIngredient);
        if ($i == null) {
            $controller = ('ingredient');
            $view = 'error';
            require (File::build_path(array("view", "view.php")));
        } else {
            $controller = 'ingredient';
            $view = 'detail';
            require (File::build_path(array("view", "view.php")));
        }
    }


            //à faire (pas fini) avec created
    public static function create() {
            $idIngredient = "";
            $nomIngredient = "";
            $typeIngredientList = ModelTypeIngredient::selectAll();
            $typeTVAList = ModelTVA::selectAll();
            $typeIngredient= "";
            $typeTVA = "";
            $unite = "";
            $allergene = "";
            $prixUnitaire = "";
            $form = "readonly";
            $act = "created";
            $create = true;
            $pagetitle = 'Nouveau ingredient';
            $controller = 'ingredient';
            $view = 'update';
            require (File::build_path(array("view", "view.php")));
        }


        //à faire (pas fini)
    public static function created() {
            $data = array(
                "idIngredient" => 0,
                "idTypeIngredient" => $_GET["idTypeIngredient"],
                "nomTVA" => $_GET["nomTVA"],
                "nomIngredient" => $_GET["nomIngredient"],
                "unite" => $_GET["unite"],
                "allergene" => $_GET["allergene"],
                "prixUnitaire" => $_GET["prixUnitaire"],
            );

            $p = new ModelIngredient($_GET["idTypeIngredient"], $_GET["nomTVA"], $_GET["nomIngredient"], $_GET["unite"], $_GET["allergene"], $_GET["prixUnitaire"]);
            ModelIngredient::save($data);
            $tab_i = ModelIngredient::selectAll();
            $typeIngredientListe = ModelTypeIngredient::selectAll();
            $controller = ('ingredient');
            $view = 'created';
            $pagetitle = 'Tous nos produits';
            require (File::build_path(array("view", "view.php")));
        }


    public static function error() {
        $controller = ('ingredient');
        $view = 'error';
        $pagetitle = 'Erreur';
        require (File::build_path(array("view", "view.php")));
    }


    // à faire avec udptated
    public static function update() {
            $act = "updated";
            $form = "readonly";
            $pagetitle = 'Mise à jour informations produit';
            $idIngredient = $_GET["idIngredient"];

            $p = ModelIngredient::select($idIngredient);
            $nomIngredient = $p->getNomIngredient();
            $allergene = $p->getallergene();
            $unite = $p->getunite();
            $prixUnitaire = $p->getprixUnitaire();
            $paysProvenance = $p->getPaysProvenance();
            if ($p == null) {
                $controller = ('ingredient');
                $view = 'error';
                require (File::build_path(array("view", "view.php")));
            } else {
                $controller = 'ingredient';
                $view = 'update';
                require (File::build_path(array("view", "view.php")));
            }
        }


    //TODO
    public static function updated() {
            $tab_p = ModelIngredient::selectAll();
            $pagetitle = 'Produit mis à jour';
            $idIngredient = $_GET["idIngredient"];
            $data = array(
                "nomIngredient" => $_GET["nomIngredient"],
                "unite" => $_GET["unite"],
                "prixUnitaire" => $_GET["prixUnitaire"],
                "paysProvenance" => $_GET["paysProvenance"],
                "primary" => $_GET["idIngredient"],
            );
            $p = ModelIngredient::select($idIngredient);
            $p->update($data);
            $controller = "ingredient";
            $view = 'updated';
            require (File::build_path(array("view", "view.php")));
        }

    public static function delete() {
            $tab_i = ModelIngredient::selectAll();     //appel au modèle pour gerer la BD
            $typeIngredientListe = ModelTypeIngredient::selectAll();
            $idIngredient = $_GET["idIngredient"];
            $p = ModelIngredient::select($idIngredient);
            if ($p == null) {
                $pagetitle = 'Erreur produit';
                $controller = ('ingredient');
                $view = 'error';
                require (File::build_path(array("view", "view.php")));
            } else {
                
                
                ModelIngredient::delete($idIngredient);
                $controller = ('ingredient');
                $view = 'delete';
                $pagetitle = 'Suppression de produit';
                require (File::build_path(array("view", "view.php")));
                
            }
        }

//     public static function ajouterPanier() {
//         $panier = unserialize($_COOKIE["panier"]);
//         if (!in_array($_GET['idIngredient'], $panier) && !Modelingredient::estAchete($_GET["idIngredient"])) {
//             array_push($panier, $_GET["idIngredient"]);
//             setcookie("panier", serialize($panier), time() + 3600);
//             $p = Modelingredient::select($_GET["idIngredient"]);
//             $_SESSION["unitePanier"] = $_SESSION["unitePanier"] + $p->getunite();
//             $controller = ('ingredient');
//             $view = 'ajoutPanier';
//             $pagetitle = 'Ajout de produit au panier';
//             require (File::build_path(array("view", "view.php")));
//         } else {
//             $controller = ('ingredient');
//             $view = 'problemePanier';
//             $pagetitle = 'Panier';
//             require (File::build_path(array("view", "view.php")));
//         }
//     }

//     public static function supprimerPanier() {

//         $panier = unserialize($_COOKIE["panier"]);
//         $p = Modelingredient::select($_GET["idIngredient"]);
//         if (in_array($_GET["idIngredient"], $panier)) {
//             $_SESSION["unitePanier"] = $_SESSION["unitePanier"] - $p->getunite();
//         }
//         unset($panier[array_search($_GET["idIngredient"], $panier)]);
//         sort($panier);
//         setcookie("panier", serialize($panier), time() + 3600);
//         $controller = ('ingredient');
//         $view = 'supprimerPanier';
//         $pagetitle = 'Supression de produit du panier';
//         require (File::build_path(array("view", "view.php")));
//     }

//     public static function afficherPanier() {
//         $controller = ('ingredient');
//         $view = 'panier';
//         $pagetitle = 'Votre panier';
//         require (File::build_path(array("view", "view.php")));
//     }

//     public static function viderPanier() {
//         $panier = array();
//         setcookie("panier", serialize($panier), time() + 3600);
//         $_SESSION["unitePanier"] = 0;
//         $controller = ('ingredient');
//         $view = 'viderPanier';
//         $pagetitle = 'Votre panier';
//         require (File::build_path(array("view", "view.php")));
//     }

}
