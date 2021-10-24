<?php
error_reporting(0);

/*---------------------------------------------------------------------*/
/*   Dans la logique du modèle MVC, le contrôleur est appelé par       */
/*     le routeur. Son rôle est de lier le modèle et la vue            */
/*---------------------------------------------------------------------*/  


require_once File::build_path(array('controller','ControllerIngredient.php'));
require_once File::build_path(array('controller','ControllerTypeIngredient.php'));
require_once File::build_path(array('controller','ControllerTypeRecette.php'));
require_once File::build_path(array('controller','ControllerRecette.php'));
require_once File::build_path(array('controller','ControllerAuteur.php'));
require_once File::build_path(array('controller','ControllerTVA.php'));

// On recupère l'action passée dans l'URL

if (isset($_GET['action'])){
    $action = $_GET["action"];
}
else {
    $action = "readAll";
}

    $controller_default = 'ingredient';

if (isset($_GET['controller'])){
    $controller_default = $_GET['controller'];
}

$controller_class = 'Controller'.ucfirst($controller_default);
$method = get_class_methods($controller_class);

if(class_exists($controller_class)){
    if (in_array($action, $method)){
    $controller_class::$action(); 
    }
    else {
        ControllerIngredient::error();
    }
}
else {
    ControllerIngredient::error();
}

?>