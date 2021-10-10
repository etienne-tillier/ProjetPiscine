<?php

require_once File::build_path(array("model", "Model.php"));

class ModelTypeRecette extends Model{
    private $idTypeRecette;
    private $nomTypeRecette;
    protected static $object = "TypeRecette";
    protected static $primary='idTypeRecette';
    
    
    function __construct($idTypeRecette = null, $nomTypeRecette = null) {
        if (!is_null($idTypeRecette) && !is_null($nomTypeRecette)) {
            $this->idTypeRecette = $idTypeRecette;
            $this->nomTypeRecette = $nomTypeRecette;
        }
    }
    
    // public static function estAchete($idTypeRecette){
    //     try {
    //         $sql = "SELECT estAchete FROM Ingredient WHERE idTypeRecette=:idTypeRecette";
    //         $req_prep = Model::$pdo->prepare($sql);
    //         $value = array (
    //             'idTypeRecette' => $idTypeRecette,
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
    
    function getIdTypeRecette() {
        return $this->idTypeRecette;
    }


    function getNomTypeRecette() {
        return $this->nomTypeRecette;
    }



    function setIdTypeRecette($idTypeRecette): void {
        $this->idTypeRecette = $idTypeRecette;
    }

    function setNomTypeRecette($nomTypeRecette): void {
        $this->nomTypeRecette = $nomTypeRecette;
    }
    


    
}

