<?php

require_once (File::build_path(array("model", "ModelTypeRecette.php")));

class ControllerTypeRecette 
{

    protected static $object = 'TypeRecette';

    /*---------------------------------------------------------------------*/
    /* readAll()      la fonction récupére les données de tous             */ 
    /*                les typesrecette                                     */ 
    /*                                                                     */
    /* En sortie: la fonction redérige les données vers "view" afin        */
    /*            d'effectuer l'affichage ou traitement                    */
    /*---------------------------------------------------------------------*/  
    
    public static function readAll() 
    {
        $tab_i = ModelTypeRecette::selectAll();     //appel au modèle pour gerer la BD
        $controller = ('TypeRecette');
        $view = 'list';
        $pagetitle = 'Types Recettes';
        require (File::build_path(array("view", "view.php")));  //"redirige" vers la vue
    }

    /*---------------------------------------------------------------------*/
    /* read()     la fonction récupére les données d'un typerecette        */
    /*            sélectioné                                               */
    /*                                                                     */
    /* En sortie: la fonction redérige les données vers "view" afin        */
    /*            d'effectuer l'affichage                                  */
    /*---------------------------------------------------------------------*/  

    public static function read() 
    {
        $pagetitle = 'Détails';
        $idTypeRecette = $_GET["idTypeRecette"];
        $p = ModelTypeRecette::select($idTypeRecette);
        $RecetteListe = ModelRecette::selectAll();
        if ($p == null) {
            $controller = ('TypeRecette');
            $view = 'error';
            require (File::build_path(array("view", "view.php")));
        } else {
            $controller = 'TypeRecette';
            $view = 'detail';
            require (File::build_path(array("view", "view.php")));
        }
    }

    /*---------------------------------------------------------------------*/
    /* create()     la fonction initialise un nouvel typerecette           */
    /*                                                                     */
    /* En sortie: la fonction redérige les données vers "view" afin        */
    /*            d'effectuer l'affichage                                  */
    /*---------------------------------------------------------------------*/  
           
    public static function create() 
    {
        $create=true;//différencier entre mise à jour et l'ajout
        $idTypeRecette = "";
        $nomTypeRecette = ""; 
        $pagetitle = 'Nouveau Type';
        $controller = 'TypeRecette';
        $view = 'update';
        require (File::build_path(array("view", "view.php")));//appel les lignes
        //création des variables ds controlleurs et on les utilise ds view
    }

    /*---------------------------------------------------------------------*/
    /* created()     la fonction crée un nouvel typerecette                */
    /*                                                                     */
    /* En sortie: la fonction redérige les données vers "view" afin        */
    /*            d'effectuer l'affichage                                  */
    /*---------------------------------------------------------------------*/

    public static function created() 
    {
        $data = array(
            "idTypeRecette" => "",
            "nomTypeRecette" => $_POST["nomTypeRecette"]
            
        );

        $p = new ModelTypeRecette($_POST["nomTypeRecette"]);
        ModelTypeRecette::save($data);
        $tab_p = ModelTypeRecette::selectAll();
        $controller = ('TypeRecette');
        $view = 'created';
        $pagetitle = 'Tous nos types recettes';
        require (File::build_path(array("view", "view.php")));
    }

    /* on traite les erreurs et on les envoie vers erreur view */
    public static function error() {
        $controller = ('TypeRecette');
        $view = 'error';
        $pagetitle = 'Erreur';
        require (File::build_path(array("view", "view.php")));
    }

    /*---------------------------------------------------------------------*/
    /* update()     la fonction permets de modifier les données            */
    /*              d' un typerecette et les mettre à jour                 */
    /*                                                                     */
    /* En sortie: la fonction redérige les données vers "view" afin        */
    /*            d'effectuer l'affichage                                  */
    /*---------------------------------------------------------------------*/

    public static function update() {
            $act = "updated";
            $form = "readonly";
            $pagetitle = 'Mise à jour informations Type recette';
            $idTypeRecette = $_GET["idTypeRecette"];
            $p = ModelTypeRecette::select($idTypeRecette);
            $nomTypeRecette = $p->getNomTypeRecette();
            $create = false;
            if ($p == null) {
                $controller = ('TypeRecette');
                $view = 'error';
                require (File::build_path(array("view", "view.php")));
            } else {
                $controller = 'TypeRecette';
                $view = 'update';
                require (File::build_path(array("view", "view.php")));
            }
        }

    /*---------------------------------------------------------------------*/
    /* updated()     la fonction verifie et confirme la mise à jour        */
    /*                                                                     */
    /* En sortie: la fonction redérige les données vers "view" afin        */
    /*            de confirmer à l'utilisateur la MS                       */
    /*---------------------------------------------------------------------*/ 

    public static function updated() 
    {
        $tab_p = ModelTypeRecette::selectAll();
        $pagetitle = 'Produit mis à jour';
        $idTypeRecette = $_POST["idTypeRecette"];
        $data = array(
            "nomTypeRecette" => $_POST["nomTypeRecette"],
            "primary" => $_POST["idTypeRecette"],
        );
        $p = ModelTypeRecette::select($idTypeRecette);
        $p->update($data);
        $controller = "TypeRecette";
        $view = 'updated';
        require (File::build_path(array("view", "view.php")));
    }

    /*---------------------------------------------------------------------*/
    /* delete()     la fonction permets d'effectuer la suppresion          */
    /*              d'un typerecette                                       */
    /*                                                                     */
    /* En sortie: la fonction redérige les données vers "view" afin        */
    /*            d'effectuer l'affichage                                  */
    /*---------------------------------------------------------------------*/  
    
    public static function delete() 
    {
        $tab_p = ModelTypeRecette::selectAll();     //appel au modèle pour gerer la BD
        $idTypeRecette = $_GET["idTypeRecette"];
        $p = ModelTypeRecette::select($idTypeRecette);
        if ($p == null) {
            $pagetitle = 'Erreur produit';
            $controller = ('TypeRecette');
            $view = 'error';
            require (File::build_path(array("view", "view.php")));
        } else {
            
            
            ModelTypeRecette::delete($idTypeRecette);
            $controller = ('TypeRecette');
            $view = 'delete';
            $pagetitle = 'Suppression de Type Recette';
            require (File::build_path(array("view", "view.php")));
            
        }
    }
}