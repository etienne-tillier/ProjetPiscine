<?php

require_once File::build_path(array("model", "Model.php"));

class ModelIngredientDansRecette extends Model{
    private $idRecette;
    private $idIngredient;
    private $quantiteIngredient;
    protected static $object = "ingredientDansRecette";

    public static function select($data){
        try {
            $sql = "SELECT * from Commande WHERE quantiteIngredient=:quantiteIngredient AND idIngredient=:idIngredient";
    // Préparation de la requête
            $req_prep = Model::$pdo->prepare($sql);
    // On donne les valeurs et on exécute la requête	 
            $req_prep->execute($data);
    // On récupère les résultats comme précédemment
            $req_prep->setFetchMode(PDO::FETCH_CLASS, "ModelIngredientDansRecette");
            $tab = $req_prep->fetchAll();
    // Attention, si il n'y a pas de résultats, on renvoie false
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }

        if (empty($tab))
            return false;
        return $tab;
    }

    public static function selectIngredientDansRecette($idRecette){
        try{
            $sql = "SELECT * FROM ingredientDansRecette WHERE idRecette=:idRecette";
            $req_prep = Model::$pdo->prepare($sql);
            $value = array(
                "idRecette" => $idRecette
            );
            $req_prep->execute($value);
            $req_prep->setFetchMode(PDO::FETCH_CLASS, "ModelIngredientDansRecette");
            $tab = $req_prep->fetchAll();
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        if (empty($tab))
            return false;
        return $tab;
    }
    
    // public static function getPrixTotal($data){
    //     try {
    //         $sql = 'SELECT SUM(prix) FROM Commande JOIN Pierre ON Pierre.idRecette = Commande.idRecette WHERE quantiteIngredient=:quantiteIngredient AND idIngredient=:idIngredient';
            
    //         $req_prep = Model::$pdo->prepare($sql);
    //         $req_prep->execute($data);
    //         $prixTotal = $req_prep->fetchAll();
    //     } catch (Exception $ex) {
    //         echo $ex->getMessage();
    //     }
    //     return $prixTotal[0][0];
    // }
    
    // public static function getAllquantiteIngredient($idIngredient){
    //     try {
    //         $sql = "SELECT DISTINCT(quantiteIngredient) FROM Commande WHERE idIngredient=:idIngredient";
    //         $req_prep = Model::$pdo->prepare($sql);
    //         $value = array (
    //             'idIngredient' => $idIngredient,
    //         );
    //         $req_prep->execute($value);
    //         $quantiteIngredients = $req_prep->fetchAll();
            
    //     } catch (Exception $ex) {
    //         echo $ex->getMessage();
    //     }
    //     return $quantiteIngredients;
    // }
    
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