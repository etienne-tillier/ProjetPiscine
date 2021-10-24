<?php

require_once File::build_path(array("model", "Model.php"));

/*------------------------------------------------------------------------------------------*/
/*      On se dispose dans ce fichier des fonctions (getters, setters, etc.) qui ont but de */
/*    représente les données qui vont être utilisées dans l’application web.  tout ce qui   */
/*    permet de la modifier (getters, setters, etc.),que ça soit en local ou                */ 
/*    en distant (base de données).                                                         */
/*------------------------------------------------------------------------------------------*/


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

    function getNomTVA() {
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

