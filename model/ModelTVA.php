<?php

require_once File::build_path(array("model", "Model.php"));

class ModelTVA extends Model{
    private $nomTVA;
    private $tauxTVA;
    protected static $object = "TVA";
    protected static $primary='nomTVA';
    
    
    function __construct($nomTVA = null, $tauxTVA = null) {
        if (!is_null($nomTVA) && !is_null($tauxTVA)) {
            $this->nomTVA = $nomTVA;
            $this->tauxTVA = $tauxTVA;
        }
    }
    
    // public static function estAchete($nomTVA){
    //     try {
    //         $sql = "SELECT estAchete FROM Ingredient WHERE nomTVA=:nomTVA";
    //         $req_prep = Model::$pdo->prepare($sql);
    //         $value = array (
    //             'nomTVA' => $nomTVA,
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
    
    function getnomTVA() {
        return $this->nomTVA;
    }


    function getTauxTVA() {
        return $this->tauxTVA;
    }



    function setNomTVA($nomTVA): void {
        $this->nomTVA = $nomTVA;
    }

    function setTauxTVA($tauxTVA): void {
        $this->tauxTVA = $tauxTVA;
    }
    


    
}

