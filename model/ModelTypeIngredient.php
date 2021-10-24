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

