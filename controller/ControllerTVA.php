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
         "nomTVA" => $_POST["nomTVA"],
         "nomRecette" => $_POST["nomRecette"],
         "montantCharge"=> $_POST["montantCharge"],
         );

        }

     public static function error() {
         $controller = ('TVA');
            $view = 'error';
            $pagetitle = 'Erreur';
            require (File::build_path(array("view", "view.php")));
        }

        public static function update() {
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
        public static function updated() {
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