<?php

require_once File::build_path(array("model", "Model.php"));

class ModelAuteur extends Model{
    private $idAuteur;
    private $prenomAuteur;
    private $nomAuteur;
    protected static $object = "Auteur";
    protected static $primary='idAuteur';
    
    
    function __construct($idAuteur = null, $prenomAuteur = null, $nomAuteur = null) {
        if (!is_null($idAuteur) && !is_null($nomAuteur) && !is_null($prenomAuteur)) {
            ) {
            $this->idAuteur = $idAuteur;
            $this->prenomAuteur = $prenomAuteur;
            $this->nomAuteur = $nomAuteur;
            
        }
    }
    
    // public static function estAchete($idAuteur){
    //     try {
    //         $sql = "SELECT estAchete FROM Ingredient WHERE idIngredient=:idIngredient";
    //         $req_prep = Model::$pdo->prepare($sql);
    //         $value = array (
    //             'idIngredient' => $idAuteur,
    //         );
    //         $req_prep->execute($value);
    //         $estAchete = $req_prep->fetchAll();
    //     } catch (Exception $ex) {
    //         echo $ex->getMessage();
    //     }
    //         if ($estAchete[0][0]){
    //             return true;
    //         }
    //         else {
    //             return false;
    //         }
            
    // }
    

    function getIdAuteur() {
        return $this->idAuteur;
    }

    
    function getprenomAuteur() {
        return $this->prenomAuteur;
    }

    function getnomAuteur() {
        return $this->nomAuteur;
    }




    function setIdAuteur($idAuteur): void {
        $this->idAuteur = $idAuteur
    }

    function setPrenomAuteur($prenomAuteur): void {
        $this->prenomAuteur = $prenomAuteur;
    }

    function setNomAuteur($nomAuteur): void {
        $this->nomAuteur = $nomAuteur;
    }



    
    


    
    


    
}

