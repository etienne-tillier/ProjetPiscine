<?php

require_once File::build_path(array("model", "Model.php"));

class ModelIngredientDansRecette extends Model{
    private $idRecette;
    private $idIngredient;
    private $quantiteIngredient;
    protected static $object = "ingredientDansRecette";//propriété d'une classe
    protected static $primary='idRecette';

    public static function selectIngredientDansRecette($primary_value,$mode) {//renvoie une ligne
        $table_name = static::$object;
        $class_name = "Model" . ucfirst($table_name);
        $primary_key = ($mode == "recette" ? "idRecette" : "idIngredient");
        try {
            $sql = "SELECT * from " . ucfirst($table_name) . " WHERE " . $primary_key . "=:nom_tag";
            // Préparation de la requête
            $req_prep = Model::$pdo->prepare($sql);

            $values = array(
                "nom_tag" => $primary_value,
                //nomdutag => valeur, ...
            );
            // On donne les valeurs et on exécute la requête
            $req_prep->execute($values);

            // On récupère les résultats comme précédemment
            $req_prep->setFetchMode(PDO::FETCH_CLASS, $class_name);
            $tab = $req_prep->fetchAll();
            // Attention, si il n'y a pas de résultats, on renvoie false
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }

        if (empty($tab))
            return false;
        return $tab;
    }

    
    function getIdRecette() {
        return $this->idRecette;
    }

    function getIdIngredient() {
        return $this->idIngredient;
    }

    function getQuantiteIngredient() {
        return $this->quantiteIngredient;
    }


}