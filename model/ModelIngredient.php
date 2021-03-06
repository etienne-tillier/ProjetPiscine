<?php

require_once File::build_path(array("model", "Model.php"));

/*------------------------------------------------------------------------------------------*/
/*      On se dispose dans ce fichier des fonctions (getters, setters, etc.) qui ont but de */
/*    représente les données qui vont être utilisées dans l’application web.  tout ce qui   */
/*    permet de la modifier (getters, setters, etc.),que ça soit en local ou                */ 
/*    en distant (base de données).                                                         */
/*------------------------------------------------------------------------------------------*/

class ModelIngredient extends Model{
    private $idIngredient;
    private $idTypeIngredient;
    private $idTVA;
    private $nomIngredient;
    private $unite;
    private $allergene;
    private $prixUnitaire;
    protected static $object = "ingredient";
    protected static $primary='idIngredient';
    
    
    function __construct($idIngredient = null, $idTypeIngredient = null, $idTVA = null, $nomIngredient = null, $unite = null, $allergene = null, $prixUnitaire = null) {
        if (!is_null($idIngredient) && !is_null($nomIngredient) && !is_null($allergene) && !is_null($unite) && !is_null($prixUnitaire) && !is_null($idTypeIngredient)&& !is_null($idTVA)) {
            $this->idIngredient = $idIngredient;
            $this->idTypeIngredient = $idTypeIngredient;
            $this->idTVA = $idTVA;
            $this->nom = $nomIngredient;
            $this->prix = $prixUnitaire;
            $this->unite = $unite;
            $this->allergene = $allergene;
            
        }
    }

    function getIdIngredient() {
        return $this->idIngredient;
    }

    function getIdTypeIngredient() {
        return $this->idTypeIngredient;
    }

    function getIdTVA(){
        return $this->idTVA;
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
        $this->IdTypeTVA + $idTypeTVA;
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

