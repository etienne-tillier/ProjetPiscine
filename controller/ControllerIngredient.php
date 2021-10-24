<?php

require_once (File::build_path(array("model", "ModelIngredient.php")));
require_once (File::build_path(array("model", "ModelTypeIngredient.php")));
require_once (File::build_path(array("model", "ModelTVA.php")));

class ControllerIngredient {

    protected static $object = 'ingredient';
    
    /*---------------------------------------------------------------------*/
    /* readAll()      la fonction récupére les données de tous             */ 
    /*                les ingredients                                      */ 
    /*                                                                     */
    /* En sortie: la fonction redérige les données vers "view" afin        */
    /*            d'effectuer l'affichage ou traitement                    */
    /*---------------------------------------------------------------------*/  
    
    public static function readAll() 
    {
        $tab_i = ModelIngredient::selectAll();     //appel au modèle pour gerer la BD
        $typeIngredientListe = ModelTypeIngredient::selectAll();
        $controller = ('ingredient');
        $view = 'list';
        $pagetitle = 'Ingrédients';
        require (File::build_path(array("view", "view.php")));  //"redirige" vers la vue
    }

    /*---------------------------------------------------------------------*/
    /* read()     la fonction récupére les données d'un ingredient         */
    /*            sélectioné                                               */
    /*                                                                     */
    /* En sortie: la fonction redérige les données vers "view" afin        */
    /*            d'effectuer l'affichage                                  */
    /*---------------------------------------------------------------------*/  

    public static function read() 
    {
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

    
    /*---------------------------------------------------------------------*/
    /* create()     la fonction initialise un nouvel ingredient            */
    /*                                                                     */
    /* En sortie: la fonction redérige les données vers "view" afin        */
    /*            d'effectuer l'affichage                                  */
    /*---------------------------------------------------------------------*/  

    public static function create() 
    {
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

    /*---------------------------------------------------------------------*/
    /* created()     la fonction crée un nouvel ingredient                 */
    /*                                                                     */
    /* En sortie: la fonction redérige les données vers "view" afin        */
    /*            d'effectuer l'affichage                                  */
    /*---------------------------------------------------------------------*/  
    
    public static function created() 
    {
        $idTypeIngredient = "";
        $nomTVA = "";
        if ($_POST["newTVA"] == "" && $_POST["tauxTVA"] == ""){
            $nomTVA = $_POST["nomTVA"];
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

        $p = new ModelIngredient($_POST["idTypeIngredient"], $_POST["nomTVA"], $_POST["nomIngredient"], $_POST["unite"], $_POST["allergene"], $_POST["prixUnitaire"]);
        ModelIngredient::save($data);
        $tab_i = ModelIngredient::selectAll();
        $typeIngredientListe = ModelTypeIngredient::selectAll();
        $controller = ('ingredient');
        $view = 'created';
        $pagetitle = 'Ingrédients';
        require (File::build_path(array("view", "view.php")));
    }

    /* on traite les erreurs et on les envoie vers erreur view */
    public static function error() 
    {
        $controller = ('ingredient');
        $view = 'error';
        $pagetitle = 'Erreur';
        require (File::build_path(array("view", "view.php")));
    }

    /*---------------------------------------------------------------------*/
    /* update()     la fonction permets de modifier les données            */
    /*              d' un ingredient et les mettre à jour                  */
    /*                                                                     */
    /* En sortie: la fonction redérige les données vers "view" afin        */
    /*            d'effectuer l'affichage                                  */
    /*---------------------------------------------------------------------*/  

    public static function update() 
    {
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
        echo $allergene;
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

    /*---------------------------------------------------------------------*/
    /* updated()     la fonction verifie de confirmer la mise à jour       */
    /*                                                                     */
    /* En sortie: la fonction redérige les données vers "view" afin        */
    /*            de confirmer à l'utilisateur la MS                       */
    /*---------------------------------------------------------------------*/  

    public static function updated() 
    {
        $idTypeIngredient = "";
        $nomTVA = "";
        if ($_POST["newTVA"] == "" && $_POST["tauxTVA"] == ""){
            $nomTVA = $_POST["nomTVA"];
        }
        else {
            $dataTVA= array(
                "nomTVA" => $_POST["newTVA"],
                "tauxTVA" => $_POST["tauxTVA"]/100
            );
            ModelTVA::save($dataTVA);
            $TVAliste = ModelTVA::selectAll();
            $nomTVA = $_POST["newTVA"];
        }
        if ($_POST["tauxUpdateTVA"] != ""){
            echo "ouiuiiii";
            $dataUpdateTVA= array(
                "primary" => $_POST["nomTVA"],
                "tauxTVA" => $_POST["tauxUpdateTVA"]/100
            );
            ModelTVA::update($dataUpdateTVA);
            $nomTVA = $_POST["nomTVA"];
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
    
    /*---------------------------------------------------------------------*/
    /* delete()     la fonction permets d'effectuer la suppresion          */
    /*              d'un ingredient                                        */
    /*                                                                     */
    /* En sortie: la fonction redérige les données vers "view" afin        */
    /*            d'effectuer l'affichage                                  */
    /*---------------------------------------------------------------------*/  

    public static function delete() 
    {
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
}
