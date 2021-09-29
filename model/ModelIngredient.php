<?php

require_once File::build_path(array("model", "Model.php"));

class ModelIngredient extends Model{
    private $idIngredient;
    private $idTypeIngredient;
    private $idTVA;
    private $nomIngredient;
    private $unite;
    private $allergene;
    private $prixUnitaire;
    protected static $object = "Ingredient";
    protected static $primary='idIngredient';
    
    
    function __construct($idIngredient = null, $idTypeIngredient = null, $idTVA = null, $nomIngredient = null, $unite = null, $allergene = null, $prixUnitaire = null) {
        if (!is_null($idIngredient) && !is_null($nomIngredient) && !is_null($allergene) && !is_null($unite) && !is_null($prixUnitaire) && !is_null($idTypeIngredient)&& !is_null($idTVA)) {
            $this->idIngredient = $idIngredient;
            $this->idTypeIngredient = $idTypeIngredient;
            $this->idTVA = $idTVA;
            $this->nom = $nomIngredient;
            $this->prix = $unite;
            $this->poids = $allergene;
            $this->volume = $prixUnitaire;
            
        }
    }
    
    // public static function estAchete($idIngredient){
    //     try {
    //         $sql = "SELECT estAchete FROM Ingredient WHERE idIngredient=:idIngredient";
    //         $req_prep = Model::$pdo->prepare($sql);
    //         $value = array (
    //             'idIngredient' => $idIngredient,
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
    
    function getIdIngredient() {
        return $this->idIngredient;
    }


    function getNomIngredient() {
        return $this->nomIngredient;
    }

    
    function getPrixUnitaire() {
        return $this->prixUnitaire;
    }

    function getUnite(){
        return $this->unite;
    }

    function getAllergene(){
        return $this->allergene;
    }



    function setIdIngredient($idIngredient): void {
        $this->idIngredient = $idIngredient;
    }

    function setIdTypeIngredient($idTypeIngredient): void {
        $this->IdTypeIngredient = $idTypeIngredient;
    }

    function setIdTypeTVA($idTypeTVA): void {
        $this->IdTypeTVA + $IdTypeTVA;
    }

    function setNomIngredient($nomIngredient): void {
        $this->nomIngredient = $nomIngredient;
    }

    function setPrixUnitaire($prixUnitaire): void {
        $this->prixUnitaire = $prixUnitaire;
    }

    function setAllergene($allergene): void {
        $this->allergene = $allergene;
    }

    function setUnite($unite): void {
        $this->unite = $unite;
    }

    
    


    
    


    
}

