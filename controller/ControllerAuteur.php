<?php

require_once (File::build_path(array("model", "ModelAuteur.php")));

class ControllerAuteur {

    protected static $object = 'auteur';

    public static function readAll() 
    {
        $tab_a = ModelAuteur::selectAll();     //appel au modèle pour gerer la BD
        $controller = ('auteur');
        $view = 'list';
        $pagetitle = 'Tous les auteurs';
        require (File::build_path(array("view", "view.php")));  //"redirige" vers la vue
    }

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


//à faire (pas fini) avec created
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


//à faire (pas fini)
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


    public static function error() 
    {
        $controller = ('auteur');
        $view = 'errorauteur';
        $pagetitle = 'Erreur';
        require (File::build_path(array("view", "view.php")));
    }


    // à faire avec udptated
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
