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
        $pagetitle = 'Ingrédients';
        require (File::build_path(array("view", "view.php")));  //"redirige" vers la vue
    }

    public static function read() {
        $idIngredient = $_GET["idIngredient"];
        $i = ModelIngredient::select($idIngredient);
        $pagetitle = $i->getNomIngredient();
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
        
    /*---------------------------------------------------------------------*/
    /* research      la fonction récupére et traite les données retrouvée  */
    /*                 par la  fonction selectname                         */ 
    /*                                                                     */
    /* En sortie: la fonction redérige les données vers "view" afin        */
    /*            d'effectuer l'affichage                                  */
    /*---------------------------------------------------------------------*/ 
    public static function research()
    {
        $ingredientRechercher = $_GET["Recherche"];
        $ListeIngredient = ModelIngredient::selectname($ingredientRechercher);
        $typeIngredientListe = ModelTypeIngredient::selectAll();
        $pagetitle = "Resultat de recherche";
        if(empty($ListeIngredient))
        {
            $controller = ('ingredient');
            $view = 'errorresearch';
            require (File::build_path(array("view", "view.php")));
        }else {
            $controller = 'ingredient';
            $view = 'recherche';
            require (File::build_path(array("view", "view.php")));
        }  
    }   

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
            $idTypeIngredient = "";
            $nomTVA = "";
            if ($_POST["newTVA"] == "" && $_POST["tauxTVA"] == ""){
                $idTypeIngredient = $_POST["nomTVA"];
            }
            else {
                $dataTVA= array(
                    "nomTVA" => $_POST["newTVA"],
                    "tauxTVA" => $_POST["tauxTVA"]
                );
                ModelTVA::save($dataTVA);
                $TVAliste = ModelTVA::selectAll();
                $nomTVA = $TVAliste[count($TVAliste) - 1]->getNomTVA();
            }
            if ($_POST["newTypeIngredient"] == ""){
                $idTypeIngredient = $_POST["idTypeIngredient"];
            }
            else {
                $dataTypeIng = array(
                    "idTypeIngredient" => 0,
                    "nomTypeIngredient" => $_POST["newTypeIngredient"]
                );
                ModelTypeIngredient::save($dataTypeIng);
                $typeIngredientListe = ModelTypeIngredient::selectAll();
                $idTypeIngredient = $typeIngredientListe[count($typeIngredientListe) - 1]->getIdTypeIngredient();
            }
            var_dump($nomTVA);
            $data = array(
                "idIngredient" => 0,
                "idTypeIngredient" => $idTypeIngredient,
                "nomTVA" => $nomTVA,
                "nomIngredient" => $_POST["nomIngredient"],
                "unite" => $_POST["unite"],
                "allergene" => $_POST["allergene"],
                "prixUnitaire" => $_POST["prixUnitaire"],
            );

            $p = new ModelIngredient($_POST["idTypeIngredient"], $_POST["nomTVA"], $_POST["nomIngredient"], $_POST["unite"], $_POST["allergene"], $_POST["prixUnitaire"]);
            ModelIngredient::save($data);
            $tab_i = ModelIngredient::selectAll();
            $typeIngredientListe = ModelTypeIngredient::selectAll();
            $controller = ('ingredient');
            $view = 'created';
            $pagetitle = 'Ingrédients';
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
            $pagetitle = 'Mise à jour ingrédient';
            $idIngredient = $_GET["idIngredient"];
            $create = false;
            $typeIngredientList = ModelTypeIngredient::selectAll();
            $typeTVAList = ModelTVA::selectAll();
            $i = ModelIngredient::select($idIngredient);
            $nomIngredient = $i->getNomIngredient();
            $allergene = $i->getAllergene();
            $unite = $i->getunite();
            $prixUnitaire = $i->getPrixUnitaire();
            $idTypeIngredient = $i->getIdTypeIngredient();
            $nomTVA = $i->getIdTVA();
            if ($i == null) {
                $controller = ('ingredient');
                $view = 'error';
                require (File::build_path(array("view", "view.php")));
            } else {
                $controller = 'ingredient';
                $view = 'update';
                require (File::build_path(array("view", "view.php")));
            }
        }


    public static function updated() {
        $idTypeIngredient = "";
        $nomTVA = "";
        if ($_POST["newTVA"] == "" && $_POST["tauxTVA"] == ""){
            $idTypeIngredient = $_POST["nomTVA"];
        }
        else {
            $dataTVA= array(
                "nomTVA" => $_POST["newTVA"],
                "tauxTVA" => $_POST["tauxTVA"]
            );
            ModelTVA::save($dataTVA);
            $TVAliste = ModelTVA::selectAll();
            $nomTVA = $TVAliste[count($TVAliste) - 1]->getNomTVA();
        }
        if ($_POST["newTypeIngredient"] == ""){
            $idTypeIngredient = $_POST["idTypeIngredient"];
        }
        else {
            $dataTypeIng = array(
                "idTypeIngredient" => 0,
                "nomTypeIngredient" => $_POST["newTypeIngredient"]
            );
            ModelTypeIngredient::save($dataTypeIng);
            $typeIngredientListe = ModelTypeIngredient::selectAll();
            $idTypeIngredient = $typeIngredientListe[count($typeIngredientListe) - 1]->getIdTypeIngredient();
        }
        $data = array(
            "idIngredient" => 0,
            "idTypeIngredient" => $idTypeIngredient,
            "nomTVA" => $nomTVA,
            "nomIngredient" => $_POST["nomIngredient"],
            "unite" => $_POST["unite"],
            "allergene" => $_POST["allergene"],
            "prixUnitaire" => $_POST["prixUnitaire"],
        );
            $pagetitle = 'Produit mis à jour';
            $idIngredient = $_POST["idIngredient"];
            $data = array(
                "nomIngredient" => $_POST["nomIngredient"],
                "unite" => $_POST["unite"],
                "prixUnitaire" => $_POST["prixUnitaire"],
                "allergene" => $_POST["allergene"],
                "primary" => $_POST["idIngredient"],
                "idTVA" => $nomTVA,
                "idTypeIngredient" => $idTypeIngredient
            );
            $i = ModelIngredient::select($idIngredient);
            $typeIngredientListe = ModelTypeIngredient::selectAll();
            $i->update($data);
            $controller = "ingredient";
            $view = 'updated';
            $tab_i = ModelIngredient::selectAll();
            require (File::build_path(array("view", "view.php")));
        }

    public static function delete() {
            $typeIngredientListe = ModelTypeIngredient::selectAll();
            $idIngredient = $_GET["idIngredient"];
            $p = ModelIngredient::select($idIngredient);
            if ($p == null) {
                $pagetitle = 'Erreur produit';
                $controller = ('ingredient');
                $view = 'error';
                $tab_i = ModelIngredient::selectAll();     //appel au modèle pour gerer la BD
                require (File::build_path(array("view", "view.php")));
            } else {
                
                
                ModelIngredient::delete($idIngredient);
                $controller = ('ingredient');
                $view = 'delete';
                $pagetitle = 'Suppression de produit';
                $tab_i = ModelIngredient::selectAll();     //appel au modèle pour gerer la BD
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
