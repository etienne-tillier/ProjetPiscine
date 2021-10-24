<?php

require_once (File::build_path(array("model", "ModelTVA.php")));

class ControllerTVA
{
    protected static $object = 'TVA';
    
    /*---------------------------------------------------------------------*/
    /* readAll()      la fonction récupére les données de tous             */ 
    /*                les TVA                                              */ 
    /*                                                                     */
    /* En sortie: la fonction redérige les données vers "view" afin        */
    /*            d'effectuer l'affichage ou traitement                    */
    /*---------------------------------------------------------------------*/ 
    
    public static function readAll() 
    {
        $tab_i = ModelTVA::selectAll();     //appel au modèle pour gerer la BD
        $controller = ('TVA');
        $view = 'list';
        $pagetitle = 'TVA';
        require (File::build_path(array("view", "view.php")));  //"redirige" vers la vue
    }

    /*---------------------------------------------------------------------*/
    /* read()     la fonction récupére les données d'une Tva               */
    /*            sélectioné                                               */
    /*                                                                     */
    /* En sortie: la fonction redérige les données vers "view" afin        */
    /*            d'effectuer l'affichage                                  */
    /*---------------------------------------------------------------------*/

    public static function read()   
    {
        $pagetitle = 'Détails';
        $nomTVA = $_GET["nomTVA"];
        $p = ModelTypeRecette::select('nomTVA');
        if ($p == null) {
            $controller = ('TVA');
            $view = 'error';
            require (File::build_path(array("view", "view.php")));
        } else {
            $controller = 'TVA';
            $view = 'detail';
            require (File::build_path(array("view", "view.php")));
        }
    }

    /*---------------------------------------------------------------------*/
    /* create()     la fonction initialise une nouvelle TVA                */
    /*                                                                     */
    /* En sortie: la fonction redérige les données vers "view" afin        */
    /*            d'effectuer l'affichage                                  */
    /*---------------------------------------------------------------------*/ 
    
    public static function create() 
    {
        $nomTVA = "";
        $tauxTVA = "";
        $pagetitle = 'Nouvelle TVA';
        $controller = 'TVA';
        $view = 'update';
        require (File::build_path(array("view", "view.php")));
    }

    /*---------------------------------------------------------------------*/
    /* created()     la fonction crée une nouvelle TVA                     */
    /*                                                                     */
    /* En sortie: la fonction redérige les données vers "view" afin        */
    /*            d'effectuer l'affichage                                  */
    /*---------------------------------------------------------------------*/ 

    public static function created()
    {
        $data = array(
         "nomTVA" => $_POST["nomTVA"],
         "nomRecette" => $_POST["nomRecette"],
         "montantCharge"=> $_POST["montantCharge"],
        );
    }
    /* on traite les erreurs et on les envoie vers erreur view */
    public static function error() 
    {
        $controller = ('TVA');
        $view = 'error';
        $pagetitle = 'Erreur';
        require (File::build_path(array("view", "view.php")));
    }

    /*---------------------------------------------------------------------*/
    /* update()     la fonction permets de modifier les données            */
    /*              d' une TVA et les mettre à jour                        */
    /*                                                                     */
    /* En sortie: la fonction redérige les données vers "view" afin        */
    /*            d'effectuer l'affichage                                  */
    /*---------------------------------------------------------------------*/
    
    public static function update() 
    {
        $act = "updated";
        $form = "readonly";
        $pagetitle = 'Mise à jour informations TVA';
        $nomTVA = $_GET["nomTVA"];

        $p = ModelTVA::select($nomTVA);
        $montantTVA = $p->getmontantTVA();
        if ($p == null) {
            $controller = ('TVA');
            $view = 'error';
            require (File::build_path(array("view", "view.php")));
        } else {
            $controller = 'TVA';
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
        $tab_p = ModelTVA::selectAll();
        $pagetitle = 'TVA mise à jour';
        $nomTVA = $_POST["nomTVA"];
        $data = array(
            "nomTVA" => $_POST["nomTVA"],
            "montantTVA" => $_POST["nomTVA"],
        );
        $p = ModelTVA::select($nomTVA);
        $p->update($data);
        $controller = "TVA";
        $view = 'updated';
        require (File::build_path(array("view", "view.php")));
    }

    /*---------------------------------------------------------------------*/
    /* delete()     la fonction permets d'effectuer la suppresion          */
    /*              d'une TVA                                              */
    /*                                                                     */
    /* En sortie: la fonction redérige les données vers "view" afin        */
    /*            d'effectuer l'affichage                                  */
    /*---------------------------------------------------------------------*/ 
    
    public static function delete() {
            $tab_p = ModelTVA::selectAll();     //appel au modèle pour gerer la BD
            $nomTVA = $_GET["nomTVA"];
            $p = ModelTVA::select($nomTVA);
            if ($p == null) {
                $pagetitle = 'Erreur TVA';
                $controller = ('TVA');
                $view = 'error';
                require (File::build_path(array("view", "view.php")));
            } else {
                
                
                ModelTVA::delete($nomTVA);
                $controller = ('TVA');
                $view = 'delete';
                $pagetitle = 'Suppression de la TVA';
                require (File::build_path(array("view", "view.php")));
                
            }
        }
}