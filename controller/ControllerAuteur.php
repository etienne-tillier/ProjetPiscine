<?php

require_once (File::build_path(array("model", "ModelAuteur.php")));

class ControllerAuteur {

    protected static $object = 'auteur';

    /*---------------------------------------------------------------------*/
    /* readAll()      la fonction récupére les données de tous             */ 
    /*                les auteurs                                          */ 
    /*                                                                     */
    /* En sortie: la fonction redérige les données vers "view" afin        */
    /*            d'effectuer l'affichage ou traitement                    */
    /*---------------------------------------------------------------------*/  
    
    public static function readAll() 
    {
        $tab_a = ModelAuteur::selectAll();     //appel au modèle pour gerer la BD
        $controller = ('auteur');
        $view = 'list';
        $pagetitle = 'Tous les auteurs';
        require (File::build_path(array("view", "view.php")));  //"redirige" vers la vue
    }

    /*---------------------------------------------------------------------*/
    /* read()     la fonction récupére les données d'un auteur             */
    /*            sélectioné                                               */
    /*                                                                     */
    /* En sortie: la fonction redérige les données vers "view" afin        */
    /*            d'effectuer l'affichage                                  */
    /*---------------------------------------------------------------------*/  

    public static function read() 
    {
        $pagetitle = 'Détails';
        $idAuteur = $_GET["idAuteur"];
        $p = ModelAuteur::select($idAuteur);
        if ($p == null) 
        {
            $controller = ('auteur');
            $view = 'errorauteur';
            require (File::build_path(array("view", "view.php")));
        } else 
        {
            $controller = 'auteur';
            $view = 'detail';
            require (File::build_path(array("view", "view.php")));
        }
    }

    /*---------------------------------------------------------------------*/
    /* create()     la fonction initialise un nouvel auteur                */
    /*                                                                     */
    /* En sortie: la fonction redérige les données vers "view" afin        */
    /*            d'effectuer l'affichage                                  */
    /*---------------------------------------------------------------------*/  

    public static function create() 
    {
        $idAuteur = "";
        $nomAuteur = "";
        $prenomAuteur = "";
        $form = "readonly";
        $act = "created";
        $create = true;
        $pagetitle = 'NEW AUTEUR';
        $controller = 'auteur';
        $view = 'update';
        require (File::build_path(array("view", "view.php")));
    }
    
    /*---------------------------------------------------------------------*/
    /* created()     la fonction crée un nouvel auteur                     */
    /*                                                                     */
    /* En sortie: la fonction redérige les données vers "view" afin        */
    /*            d'effectuer l'affichage                                  */
    /*---------------------------------------------------------------------*/  
    
    
    public static function created() 
    {
        $data = array(
            "idAuteur" => 0,
            "nomAuteur" => $_POST["nomAuteur"],
            "prenomAuteur" => $_POST["prenomAuteur"]
        );

        $p = new ModelAuteur($_POST["nomAuteur"], $_POST["prenomAuteur"]);
        ModelAuteur::save($data);
        $tab_a = ModelAuteur::selectAll();
        $controller = ('auteur');
        $view = 'created';
        $pagetitle = 'Tous les auteurs';
        require (File::build_path(array("view", "view.php")));
    }

  /* on traite les erreurs et on les envoie vers erreur view */
    public static function error() 
    {
        $controller = ('auteur');
        $view = 'errorauteur';
        $pagetitle = 'Erreur';
        require (File::build_path(array("view", "view.php")));
    }


    /*---------------------------------------------------------------------*/
    /* update()     la fonction permets de modifier les données            */
    /*              d' un auteur et les mettre à jour                      */
    /*                                                                     */
    /* En sortie: la fonction redérige les données vers "view" afin        */
    /*            d'effectuer l'affichage                                  */
    /*---------------------------------------------------------------------*/  
    public static function update() 
    {
        $act = "updated";
        $form = "readonly";
        $pagetitle = 'Mise à jour information d\'auteur';
        $idAuteur = $_GET["idAuteur"];

        $p = ModelAuteur::select($idAuteur);
        $nomAuteur = $p->getnomAuteur();
        $prenomAuteur = $p -> getprenomAuteur();
        if ($p == null) {
            $controller = ('auteur');
            $view = 'errorauteur';
            require (File::build_path(array("view", "view.php")));
        } else {
            $controller = 'auteur';
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

    //TODO
    public static function updated() 
    {
        $tab_p = ModelAuteur::selectAll();
        $pagetitle = 'Auteur mis à jour';
        $idAuteur = $_POST["idAuteur"];
        $data = array(
            "nomAuteur" => $_POST["nomAuteur"],
            "prenomAuteur" => $_POST["prenomAuteur"],
            "primary" => $_POST["idAuteur"],
        );
        $p = ModelAuteur::select($idAuteur);
        $p->update($data);
        $controller = "auteur";
        $view = 'updated';
        require (File::build_path(array("view", "view.php")));
    }
    /*---------------------------------------------------------------------*/
    /* delete()     la fonction permets d'effectuer la suppresion          */
    /*              d'un auteur                                            */
    /*                                                                     */
    /* En sortie: la fonction redérige les données vers "view" afin        */
    /*            d'effectuer l'affichage                                  */
    /*---------------------------------------------------------------------*/  
    public static function delete() 
    {
        $tab_p = ModelAuteur::selectAll();     //appel au modèle pour gerer la BD
        $idAuteur = $_GET["idAuteur"];
        $p = ModelAuteur::select($iAuteur);
        if ($p == null) {
            $pagetitle = 'Erreur Auteur';
            $controller = ('auteur');
            $view = 'error';
            require (File::build_path(array("view", "view.php")));
        } else {
            
            
            ModelAuteur::delete($idAuteur);
            $controller = ('auteur');
            $view = 'delete';
            $pagetitle = 'Suppression de l\'auteur';
            require (File::build_path(array("view", "view.php")));
            
        }
    }
}
