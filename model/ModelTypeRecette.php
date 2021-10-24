<?php

require_once File::build_path(array("model", "Model.php"));

/*------------------------------------------------------------------------------------------*/
/*      On se dispose dans ce fichier des fonctions (getters, setters, etc.) qui ont but de */
/*    représente les données qui vont être utilisées dans l’application web.  tout ce qui   */
/*    permet de la modifier (getters, setters, etc.),que ça soit en local ou                */ 
/*    en distant (base de données).                                                         */
/*------------------------------------------------------------------------------------------*/

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

