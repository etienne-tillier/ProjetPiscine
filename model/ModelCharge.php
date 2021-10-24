<?php

require_once File::build_path(array("model", "Model.php"));

class ModelCharge extends Model{
    private $nomCharge;
    private $montantCharge;
    protected static $object = "Charge";
    protected static $primary='nomCharge';
    
    
    function __construct($nomCharge = null, $montantCharge = null) {
        if (!is_null($nomCharge) && !is_null($montantCharge)) {
            $this->nomCharge = $nomCharge;
            $this->montantCharge = $montantCharge;
        }
    }

    
    function getnomCharge() {
        return $this->nomCharge;
    }


    function getMontantCharge() {
        return $this->montantCharge;
    }



    function setnomCharge($nomCharge): void {
        $this->nomCharge = $nomCharge;
    }

    function setmontantCharge($montantCharge): void {
        $this->montantCharge = $montantCharge;
    }
    


    
}

