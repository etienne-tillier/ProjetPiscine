<?php

require_once File::build_path(array("model", "Model.php"));

class ModelRecetteDansRecette extends Model{
    private $idRecetteMere;
    private $idRecetteFille;
    private $quantiteRecette;
    protected static $object = "recetteDansRecette";//propriété d'une classe
    protected static $primary='idRecetteMere';

    
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
    
    function getIdRecetteMere() {
        return $this->idRecetteMere;
    }

    function getIdRecetteFille() {
        return $this->idRecetteFille;
    }

    function getQuantiteRecette() {
        return $this->quantiteRecette;
    }


}