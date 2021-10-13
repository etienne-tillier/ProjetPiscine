<?php

require_once (File::build_path(array("model", "ModelTVA.php")));

class ControllerTVA{
    protected static $object = 'TVA';

    public static function readAll() {
        $tab_i = ModelTVA::selectAll();     //appel au modèle pour gerer la BD
        $controller = ('TVA');
        $view = 'list';
        $pagetitle = 'TVA';
        require (File::build_path(array("view", "view.php")));  //"redirige" vers la vue
    }

    public static function read() {
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
     public static function create() {
         $nomTVA = "";
         $tauxTVA = "";
         $pagetitle = 'Nouvelle TVA';
         $controller = 'TVA';
         $view = 'update';
         require (File::build_path(array("view", "view.php")));
        }
     public static function created() {
         $data = array(
         "nomTVA" => $_GET["nomTVA"],
         "nomIngredient" => $_GET["nomIngredient"],
         "tauxTVA"=> $_GET["tauxTVA"],
         );

        }
}