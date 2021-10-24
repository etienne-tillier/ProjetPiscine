<?php

require_once (File::build_path(array("model", "ModelRecette.php")));
require_once (File::build_path(array("model", "ModelIngredient.php")));
require_once(File::build_path(array("model","ModelTypeRecette.php")));
require_once(File::build_path(array("model","ModelIngredientDansRecette.php")));
require_once(File::build_path(array("model","ModelRecetteDansRecette.php")));
require_once(File::build_path(array("model","ModelAuteur.php")));
require_once(File::build_path(array("lib","Func.php")));

class ControllerRecette 
{

    protected static $object = 'Recette';
    
    /*---------------------------------------------------------------------*/
    /* readAll()      la fonction récupére les données de toutes           */ 
    /*                les recettes                                         */ 
    /*                                                                     */
    /* En sortie: la fonction redérige les données vers "view" afin        */
    /*            d'effectuer l'affichage ou traitement                    */
    /*---------------------------------------------------------------------*/ 
    
    public static function readAll() 
    {
        $tab_r = ModelRecette::selectAll();     //appel au modèle pour gerer la BD
        $tabTypeRecette = ModelTypeRecette::selectAll();
        $controller = ('Recette');
        $view = 'list';
        $pagetitle = 'Recettes';
        require (File::build_path(array("view", "view.php")));  //"redirige" vers la vue
    }

    /*---------------------------------------------------------------------*/
    /* read()     la fonction récupére les données d'une recette           */
    /*            sélectioné                                               */
    /*                                                                     */
    /* En sortie: la fonction redérige les données vers "view" afin        */
    /*            d'effectuer l'affichage                                  */
    /*---------------------------------------------------------------------*/  

    public static function read() 
    {
        $idRecette = $_GET["idRecette"];
        $r = ModelRecette::select($idRecette);
        $auteur = ModelAuteur::select($r->getIdAuteur());
        $tabIngredients = getListIngredient($r,1);
        $listeAllIng = json_encode(genererListeIngredient($tabIngredients));
        $infoRecette = array(
            "prixMainOeuvre" => $r->getPrixMainOeuvre(),
            "multiplicateur" => $r->getMultiplicateur(),
            "nombrePortion" => $r->getNombrePortion()
        );
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

    /*---------------------------------------------------------------------*/
    /* choiximpression     la fonction récupére les données d'une recette  */
    /*                  afin de créer une fiche technique aves les prix    */
    /*                                                                     */
    /* En sortie: la fonction redérige les données vers "view" afin        */
    /*            d'effectuer l'affichage                                  */
    /*---------------------------------------------------------------------*/  

    public static function choiximpression()
    {
        $idRecette = $_GET["idRecette"];
        $r = ModelRecette::select($idRecette);
        $auteur = ModelAuteur::select($r->getIdAuteur());
        $tabIngredients = getListIngredient($r,1);
        $listeAllIng = json_encode(genererListeIngredient($tabIngredients));
        $infoRecette = array(
            "prixMainOeuvre" => $r->getPrixMainOeuvre(),
            "multiplicateur" => $r->getMultiplicateur(),
            "nombrePortion" => $r->getNombrePortion()
        );
        $pagetitle = $r->getNomRecette();
        if ($r == null) {
            $controller = ('Recette');
            $view = 'error';
            require (File::build_path(array("view", "view.php")));
        } else {
                $controller = 'Recette';
                $view = 'choix_impression';
            }
        require (File::build_path(array("view", "view.php")));
    }

    /*---------------------------------------------------------------------*/
    /* impressionetiquette la fonction récupére les données d'une recette  */
    /*                  afin de créer une etiquette                        */
    /*                                                                     */
    /* En sortie: la fonction redérige les données vers "view" afin        */
    /*            d'effectuer l'affichage                                  */
    /*---------------------------------------------------------------------*/  

    public static function impressionetiquette()
    {
        $idRecette = $_GET["idRecette"];
        $r = ModelRecette::select($idRecette);
        $tabIngredients = getListIngredient($r,1);
        $listeAllIng = json_encode(genererListeIngredient($tabIngredients));
        $pagetitle = $r->getNomRecette();
        if ($r == null) {
            $controller = ('Recette');
            $view = 'error';
            require (File::build_path(array("view", "view.php")));
        } else {
                $controller = 'Recette';
                $view = 'imprimer_etiquette';
            }
        require (File::build_path(array("view", "view.php")));
    }

    /*---------------------------------------------------------------------*/
    /* impressionfiche     la fonction récupére les données d'une recette  */
    /*                  afin de créer une fiche technique sans les prix    */
    /*                                                                     */
    /* En sortie: la fonction redérige les données vers "view" afin        */
    /*            d'effectuer l'affichage                                  */
    /*---------------------------------------------------------------------*/  
    
    public static function impressionfiche()
    {
        $idRecette = $_GET["idRecette"];
        $r = ModelRecette::select($idRecette);
        $tabIngredients = getListIngredient($r,1);
        $listeAllIng = json_encode(genererListeIngredient($tabIngredients));
        $pagetitle = $r->getNomRecette();
        $infoRecette = array(
            "prixMainOeuvre" => $r->getPrixMainOeuvre(),
            "multiplicateur" => $r->getMultiplicateur(),
            "nombrePortion" => $r->getNombrePortion()
        );
        if ($r == null) {
            $controller = ('Recette');
            $view = 'error';
            require (File::build_path(array("view", "view.php")));
        } else {
                $controller = 'Recette';
                $view = 'imprimer_Fiche_tech_sansPrix';
            }
        require (File::build_path(array("view", "view.php")));
    }
    
    /*---------------------------------------------------------------------*/
    /* research      la fonction récupére et traite les données retrouvée  */
    /*                 par la  fonction selectname                         */ 
    /*                                                                     */
    /* En sortie: la fonction redérige les données vers "view" afin        */
    /*            d'effectuer l'affichage                                  */
    /*---------------------------------------------------------------------*/   
    public static function researchrecette()
    {
        $recetteRechercher = $_GET["RechercheRecette"];
        $ListeRecette = ModelRecette::selectname($recetteRechercher);
        $typerecetteListe = ModelTypeRecette::selectAll();
        $pagetitle = "Resultat de recherche recette";
        if(empty($ListeRecette))
        {
            $controller = ('recette');
            $view = 'erreurrecette';
            require (File::build_path(array("view", "view.php")));
        }else {
            $controller = 'recette';
            $view = 'recherche';
            require (File::build_path(array("view", "view.php")));
        }  
    }   

    /*---------------------------------------------------------------------*/
    /* create()     la fonction initialise une nouvelle recette            */
    /*                                                                     */
    /* En sortie: la fonction redérige les données vers "view" afin        */
    /*            d'effectuer l'affichage                                  */
    /*---------------------------------------------------------------------*/ 

    public static function create() 
    {
        $auteurList = ModelAuteur::selectAll();
        $typeRecetteList = ModelTypeRecette::selectAll();
        $listeIngredient = ModelIngredient::selectAll();
        $listeRecette = ModelRecette::selectAll();
        $idRecette = "";
        $nomRecette = "";
        $idTypeRecette = "";
        $idAuteur = "";
        $nombrePortion = "";
        $descriptif = "";
        $progression = "";
        $prixMainOeuvre = "";
        $multiplicateur = "";
        $create = true;
        $form = "readonly";
        $act = "created";
        $pagetitle = 'Nouveau produit';
        $controller = 'Recette';
        $view = 'create';
        require (File::build_path(array("view", "view.php")));
    }


    /*---------------------------------------------------------------------*/
    /* create()     la fonction crée une nouvelle recette                  */
    /*                                                                     */
    /* En sortie: la fonction redérige les données vers "view" afin        */
    /*            d'effectuer l'affichage                                  */
    /*---------------------------------------------------------------------*/ 

    public static function created() 
    {
        $idTypeRecette = "";
        $idAuteur = "";
        if ($_POST["newNom"] == "" && $_POST["newPrenom"] == ""){
            $idAuteur = $_POST["idAuteur"];
        }
        else {
            $dataAuteur = array(
                "idAuteur" => 0,
                "nomAuteur" => $_POST["newNom"],
                "prenomAuteur" => $_POST["newPrenom"]
            );
            ModelAuteur::save($dataAuteur);
            $auteurList = ModelAuteur::selectAll();
            $idAuteur = $auteurList[count($auteurList) - 1]->getIdAuteur();
        }
        if ($_POST["newTypeRecette"] == ""){
            $idTypeRecette = $_POST["idTypeRecette"];
        }
        else {
            $dataTypeRec = array(
                "idTypeRecette" => 0,
                "nomTypeRecette" => $_POST["newTypeRecette"]
            );
            ModelTypeRecette::save($dataTypeRec);
            $typeRecetteListe = ModelTypeRecette::selectAll();
            $idTypeRecette = $typeRecetteListe[count($typeRecetteListe) - 1]->getIdTypeRecette();
        }
        $data = array(
            "idRecette" => 0,
            "idTypeRecette" => $idTypeRecette,
            "idAuteur" => $idAuteur,
            "nomRecette" => $_POST["nomRecette"],
            "nombrePortion" => $_POST["nombrePortion"],
            "descriptif" => $_POST["descriptif"],
            "progression" => $_POST["progression"],
            "prixMainOeuvre" => $_POST["prixMainOeuvre"],
            "multiplicateur" => $_POST["multiplicateur"],
        );
        $ingredients = $_POST["ingredients"];
        $quantitesIngredients = $_POST["quantitesIngredients"];
        $recettes = $_POST["recettes"];
        $quantitesRecettes = $_POST["quantitesRecettes"];
        $r = new ModelRecette($_POST["idTypeRecette"],$_POST["idAuteur"],$_POST["nomRecette"], $_POST["nombrePortion"], $_POST["descriptif"], $_POST["progression"], $_POST["prixMainOeuvre"],$_POST["multiplicateur"]);
        ModelRecette::save($data);
        $tabTypeRecette = ModelTypeRecette::selectAll();
        $tab_r = ModelRecette::selectAll();

        for ($i = 0; $i < count($ingredients); $i++) {
            $ingredientDansRecette = array(
                "idRecette" => $tab_r[count($tab_r)-1]->getIdRecette(),
                "idIngredient" => $ingredients[$i],
                "quantiteIngredient" =>$quantitesIngredients[$i]

            );
            ModelIngredientDansRecette::save($ingredientDansRecette);
        }

        for ($i = 0; $i < count($recettes); $i++) {
            $recetteDansRecette = array(
                "idRecetteMere" => $tab_r[count($tab_r)-1]->getIdRecette(),
                "idRecetteFille" => $recettes[$i],
                "quantiteRecette" =>$quantitesRecettes[$i]

            );
            ModelRecetteDansRecette::save($recetteDansRecette);
        }
        $controller = ('Recette');
        $view = 'created';
        $pagetitle = 'Tous nos produits';
        require (File::build_path(array("view", "view.php")));
    }

    /* on traite les erreurs et on les envoie vers erreur view */
    public static function error() {
        $controller = ('Recette');
        $view = 'error';
        $pagetitle = 'Erreur';
        require (File::build_path(array("view", "view.php")));
    }


    /*---------------------------------------------------------------------*/
    /* update()     la fonction permets de modifier les données            */
    /*              d' une recette et les mettre à jour                    */
    /*                                                                     */
    /* En sortie: la fonction redérige les données vers "view" afin        */
    /*            d'effectuer l'affichage                                  */
    /*---------------------------------------------------------------------*/
    public static function update() 
    {
        $act = "updated";
        $create = false;
        $form = "readonly";
        $pagetitle = 'Mise à jour informations produit';
        $idRecette = $_GET["idRecette"];

        $r = ModelRecette::select($idRecette);
        $nomRecette = $r->getNomRecette();
        $idAuteur = $r->getIdAuteur();
        $idTypeRecette = $r->getIdTypeRecette();
        $descriptif = $r->getdescriptif();
        $nombrePortion = $r->getNombrePortion();
        $progression = $r->getProgression();
        $multiplicateur = $r->getMultiplicateur();
        $prixMainOeuvre = $r->getPrixMainOeuvre();
        $auteurList = ModelAuteur::selectAll();
        $typeRecetteList = ModelTypeRecette::selectAll();
        $listeIngredient = ModelIngredient::selectAll();
        $listeRecette = ModelRecette::selectAll();
        $tabIngredientDansRecette = ModelIngredientDansRecette::selectIngredientDansRecette($idRecette,"recette");
        $tabRecetteDansRecette = ModelRecetteDansRecette::selectRecetteDansRecette($idRecette,"mère");

        if ($r == null) {
            $controller = ('Recette');
            $view = 'error';
            require (File::build_path(array("view", "view.php")));
        } else {
            $controller = 'Recette';
            $view = ($tabIngredientDansRecette != null && $tabRecetteDansRecette != null ? "update" : ($tabIngredientDansRecette == null ? 'updateRec' : "updateIng" ));
            require (File::build_path(array("view", "view.php")));
        }
    }

    /*---------------------------------------------------------------------*/
    /* updated()     la fonction permet de confirmer la mise à jour        */
    /*                                                                     */
    /* En sortie: la fonction redérige les données vers "view" afin        */
    /*            de confirmer à l'utilisateur la MS                       */
    /*---------------------------------------------------------------------*/  

    public static function updated() 
    {
        $idTypeRecette = "";
        $idAuteur = "";
        if ($_POST["newNom"] == "" && $_POST["newPrenom"] == ""){
            $idAuteur = $_POST["idAuteur"];
        }
        else {
            $dataAuteur = array(
                "idAuteur" => 0,
                "nomAuteur" => $_POST["newNom"],
                "prenomAuteur" => $_POST["newPrenom"]
            );
            ModelAuteur::save($dataAuteur);
            $auteurList = ModelAuteur::selectAll();
            $idAuteur = $auteurList[count($auteurList) - 1]->getIdAuteur();
        }
        if ($_POST["newTypeRecette"] == ""){
            $idTypeRecette = $_POST["idTypeRecette"];
        }
        else {
            $dataTypeRec = array(
                "idTypeRecette" => 0,
                "nomTypeRecette" => $_POST["newTypeRecette"]
            );
            ModelTypeRecette::save($dataTypeRec);
            $typeRecetteListe = ModelTypeRecette::selectAll();
            $idTypeRecette = $typeRecetteListe[count($typeRecetteListe) - 1]->getIdTypeRecette();
        }
        $tab_p = ModelRecette::selectAll();
        $pagetitle = 'Produit mis à jour';
        $idRecette = $_POST["idRecette"];
        $data = array(
            "idAuteur" => $idAuteur,
            "idTypeRecette" => $idTypeRecette,
            "nomRecette" => $_POST["nomRecette"],
            "nombrePortion" => $_POST["nombrePortion"],
            "progression" => $_POST["progression"],
            "prixMainOeuvre" => $_POST["prixMainOeuvre"],
            "multiplicateur" => $_POST["multiplicateur"],
            "progression" => $_POST["progression"],
            "primary" => $_POST["idRecette"],
        );
        ModelIngredientDansRecette::delete($idRecette);
        ModelRecetteDansRecette::delete($idRecette);
        $ingredients = $_POST["ingredients"];
        $quantitesIngredients = $_POST["quantitesIngredients"];
        $recettes = $_POST["recettes"];
        $quantitesRecettes = $_POST["quantitesRecettes"];
        for ($i = 0; $i < count($ingredients); $i++) {
            $ingredientDansRecette = array(
                "idRecette" => $idRecette,
                "idIngredient" => $ingredients[$i],
                "quantiteIngredient" =>$quantitesIngredients[$i]

            );
            ModelIngredientDansRecette::save($ingredientDansRecette);
        }

        for ($i = 0; $i < count($recettes); $i++) {
            $recetteDansRecette = array(
                "idRecetteMere" => $idRecette,
                "idRecetteFille" => $recettes[$i],
                "quantiteRecette" =>$quantitesRecettes[$i]

            );
            ModelRecetteDansRecette::save($recetteDansRecette);
        }
        $p = ModelRecette::select($idRecette);
        $p->update($data);
        $controller = "Recette";
        $view = 'updated';
        $tabTypeRecette = ModelTypeRecette::selectAll();
        $tab_r = ModelRecette::selectAll();
        require (File::build_path(array("view", "view.php")));
    }

    /*---------------------------------------------------------------------*/
    /* delete()     la fonction permets d'effectuer la suppresion          */
    /*              d'une recette                                          */
    /*                                                                     */
    /* En sortie: la fonction redérige les données vers "view" afin        */
    /*            d'effectuer l'affichage                                  */
    /*---------------------------------------------------------------------*/ 

    public static function delete() 
    {
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
}
