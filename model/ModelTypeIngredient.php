<?php

require_once File::build_path(array("model", "Model.php"));

/*------------------------------------------------------------------------------------------*/
/*      On se dispose dans ce fichier des fonctions (getters, setters, etc.) qui ont but de */
/*    représente les données qui vont être utilisées dans l’application web.  tout ce qui   */
/*    permet de la modifier (getters, setters, etc.),que ça soit en local ou                */ 
/*    en distant (base de données).                                                         */
/*------------------------------------------------------------------------------------------*/

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

