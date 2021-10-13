<?php   

require_once (File::build_path(array("model", "ModelTypeIngredient.php")));
require_once (File::build_path(array("model", "ModelIngredient.php")));

class ControllerTypeIngredient {
    
    protected static $object = 'typeingredient';

    public static function readAll() 
    {
        $tab_i = ModelTypeIngredient::selectAll(); //on appele le model pour gerer la BD
        $IngredientListe = ModelIngredient::selectAll(); 
        $controller = ('typeingredient');
        $view = 'list';
        $pagetitle = 'Tous les types ingredients';
        require (File::build_path(array("view", "view.php"))); //"redirige" vers la vue
    }

    public static function read()
    {
        $pagetitle = 'Détails';
        $idTypeIngredient = $_GET["idTypeIngredient"];
        $type = ModelTypeIngredient::select($idTypeIngredient);
        $IngredientListe = ModelIngredient::selectAll();
        if($type == null)
        {
            $controller = ('typeingredient');
            $view = 'errortype';
            require(File::build_path(array("view", "view.php")));
        } else {
            $controller = 'typeingredient';
            $view = 'detail';
            require (File::build_path(array("view", "view.php")));
        }
    }
    public static function create() 
    {
        $idTypeIngredient = "";
        $nomTypeIngredient = "";
        $IngredientListe = ModelIngredient::selectAll();
        $form = "readonly";
        $act = "created";
        $create = true;
        $pagetitle = 'Nouveau type ingredient';
        $controller = 'typeingredient';
        $view = 'update';
        require (File::build_path(array("view", "view.php")));
    }
    
    public static function created()
    {

        $data = array(
            "idTypeIngredient" => 0,
            "nomTypeIngredient" => $_GET["nomTypeIngredient"]
        );

        $p = new ModelTypeIngredient($_GET["nomTypeIngredient"]);
        ModelTypeIngredient::save($data);
        $tab_i = ModelTypeIngredient::selectAll();
        $IngredientListe = ModelIngredient::selectAll();
        $controller = ('typeingredient');
        $view = 'created';
        $pagetitle = 'TypeIngrédients';
        require (File::build_path(array("view", "view.php")));
    }
    
    public static function error() {
        $controller = ('typeingredient');
        $view = 'errortype';
        $pagetitle = 'Erreur';
        require (File::build_path(array("view", "view.php")));
    }

    public static function update() {
        $act = "updated";
        $form = "readonly";
        $pagetitle = 'Mise à jour Typeingrédient';
        $idTypeIngredient = $_GET["idTypeIngredient"];
        $create = false;
        $typeIngredientList = ModelTypeIngredient::selectAll();
        $i = ModelTypeIngredient::select($idTypeIngredient);
        $idTypeIngredient = $i->getIdTypeIngredient();

        if ($i == null) {
            $controller = ('typeingredient');
            $view = 'errortype';
            require (File::build_path(array("view", "view.php")));
        } else {
            $controller = 'typeingredient';
            $view = 'update';
            require (File::build_path(array("view", "view.php")));
        }
    }

    public static function updated() 
    {
        $tab_i = ModelTypeIngredient::selectAll();
        $pagetitle = 'TypeIngredient mis à jour';
        $idTypeIngredient = $_GET["idTypeIngredient"];
        $nomTypeIngredient = $_GET["nomTypeIngredient"];
        $data = array(
            "nomTypeIngredient" => $_GET["nomTypeIngredient"],
            "primary" => $_GET["idTypeIngredient"]
        );
        $i = ModelTypeIngredient::select($idTypeIngredient);
        $typeIngredientListe = ModelTypeIngredient::selectAll();
        $i->update($data);
        $controller = "typeingredient";
        $view = 'updated';
        require (File::build_path(array("view", "view.php")));
    }
    
    public static function delete() 
    {
        $tab_i = ModelTypeIngredient::selectAll();     //appel au modèle pour gerer la BD
        $typeIngredientListe = ModelTypeIngredient::selectAll();
        $idTypeIngredient = $_GET["idTypeIngredient"];
        $p = ModelTypeIngredient::select($idTypeIngredient);
        if ($p == null) {
            $pagetitle = 'Erreur produit';
            $controller = ('typeingredient');
            $view = 'errortype';
            require (File::build_path(array("view", "view.php")));
        } else {
            
            
            ModelTypeIngredient::delete($idTypeIngredient);
            $controller = ('typeingredient');
            $view = 'delete';
            $pagetitle = 'Suppression du type ingredient';
            require (File::build_path(array("view", "view.php")));
        }
    }
}


?>   