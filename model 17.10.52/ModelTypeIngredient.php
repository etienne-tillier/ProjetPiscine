<?php

require_once File::build_path(array("model", "Model.php"));

class ModelTypeIngredient extends Model{
    private $idTypeIngredient;
    private $nomTypeIngredient;
    protected static $object = "TypeIngredient";
    protected static $primary='idTypeIngredient';
    
    
    function __construct($idTypeIngredient = null, $nomTypeIngredient = null) {
        if (!is_null($idTypeIngredient) && !is_null($nomTypeIngredient)) {
            $this->idTypeIngredient = $idTypeIngredient;
            $this->nomTypeIngredient = $nomTypeIngredient;
        }
    }
    
    // public static function estAchete($idTypeIngredient){
    //     try {
    //         $sql = "SELECT estAchete FROM Ingredient WHERE idTypeIngredient=:idTypeIngredient";
    //         $req_prep = Model::$pdo->prepare($sql);
    //         $value = array (
    //             'idTypeIngredient' => $idTypeIngredient,
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
    
    function getIdTypeIngredient() {
        return $this->idTypeIngredient;
    }


    function getNomTypeIngredient() {
        return $this->nomTypeIngredient;
    }



    function setIdTypeIngredient($idTypeIngredient): void {
        $this->idTypeIngredient = $idTypeIngredient;
    }

    function setNomTypeIngredient($nomTypeIngredient): void {
        $this->nomTypeIngredient = $nomTypeIngredient;
    }
    


    
}

