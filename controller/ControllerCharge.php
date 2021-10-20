<?php

require_once (File::build_path(array("model", "ModelCharge.php")));

class ControllerTVA{
    protected static $object = 'Charge';

    public static function readAll() {
        $tab_i = ModelCharge::selectAll();     //appel au modèle pour gerer la BD
        $controller = ('Charge');
        $view = 'list';
        $pagetitle = 'Charges';
        require (File::build_path(array("view", "view.php")));  //"redirige" vers la vue
    }
    public static function read() {
        $pagetitle = 'Détails';
        $nomCharge = $_GET["nomCharge"];
        $p = ModelCharge::select('nomCharge');
        if ($p == null) {
            $controller = ('Charge');
            $view = 'error';
            require (File::build_path(array("view", "view.php")));
        } else {
            $controller = 'Charge';
            $view = 'detail';
            require (File::build_path(array("view", "view.php")));
        }
    }

}