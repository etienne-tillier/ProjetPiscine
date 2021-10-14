<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once File::build_path(array('controller','ControllerPierre.php'));
require_once File::build_path(array('controller','ControllerUtilisateur.php'));
require_once File::build_path(array('controller','ControllerCommande.php'));
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
        ControllerPierre::error();
    }
}
else {
    ControllerPierre::error();
}

?>