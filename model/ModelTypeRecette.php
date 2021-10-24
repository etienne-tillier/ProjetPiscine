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

