<?php

require_once File::build_path(array("model", "Model.php"));

class ModelRecette extends Model{
    private $idRecette;
    private $idTypeRecette;
    private $idAuteur;
    private $nomRecette;
    private $nombrePortion;
    private $descriptif;
    private $progression;
    private $prixMainOeuvre;
    private $multiplicateur;
    protected static $object = "Ingredient";
    protected static $primary='idIngredient';
    
    
    function __construct($idRecette = null, $idTypeRecette = null, $idAuteur = null, $nomRecette = null, $nombrePortion = null, $descriptif = null, $progression = null, $prixMainOeuvre = null, $multiplicateur = null) {
        if (!is_null($idRecette) && !is_null($nomRecette) && !is_null($descriptif) && !is_null($nombrePortion) && !is_null($prixMainOeuvre) && !is_null($idTypeRecette)&& !is_null($idAuteur) && !is_null($progression)&& !is_null($    function __construct($idRecette = null, $idTypeRecette = null, $idAuteur = null, $nomRecette = null, $nombrePortion = null, $descriptif = null, $progression = null, $prixMainOeuvre = null, $multiplicateur = null) {
            ) {
            $this->idRecette = $idRecette;
            $this->idTypeRecette = $idTypeRecette;
            $this->idAuteur = $idAuteur;
            $this->nomRecette = $nomRecette;
            $this->nombrePortion = $nombrePortion;
            $this->descriptif = $descriptif;
            $this->progression = $progression;
            $this->prixMainOeuvre = $prixMainOeuvre;
            $this->multiplicateur = $multiplicateur;
            
        }
    }
    
    public static function estAchete($idRecette){
        try {
            $sql = "SELECT estAchete FROM Ingredient WHERE idIngredient=:idIngredient";
            $req_prep = Model::$pdo->prepare($sql);
            $value = array (
                'idIngredient' => $idRecette,
            );
            $req_prep->execute($value);
            $estAchete = $req_prep->fetchAll();
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
            if ($estAchete[0][0]){
                return true;
            }
            else {
                return false;
            }
            
    }
    
    function getIdRecette() {
        return $this->idRecette;
    }

    function getIdTypeRecette() {
        return $this->idTypeRecette;
    }

    function getIdAuteur() {
        return $this->idAuteur;
    }


    function getNomRecette() {
        return $this->nomRecette;
    }

    function getNombrePortion() {
        return $this->nombrePortion;
    }

    function getDescriptif() {
        return $this->descriptif;
    }


    function getProgression() {
        return $this->progression;
    }


    
    function getPrixMainOeuvre() {
        return $this->prixMainOeuvre;
    }

    function getMultiplicateur(){
        return $this->multiplicateur;
    }




    function setIdRecette($idRecette): void {
        $this->idRecette = $idRecette;
    }

    function setIdTypeRecette($idTypeRecette): void {
        $this->idTypeRecette = $idTypeRecette;
    }

    function setIdAuteur($idTypeAuteur): void {
        $this->idTypeAuteur = $idTypeAuteur
    }

    function setNomRecette($nomRecette): void {
        $this->nomRecette = $nomRecette;
    }

    function setNombrePortion($nombrePortion): void {
        $this->nombrePortion = $nombrePortion;
    }

    function setDescriptif($descriptif): void {
        $this->descriptif = $descriptif;
    }

    function setProgression($progression): void {
        $this->progression = $progression;
    }
    function setPrixMainOeuvre($prixMainOeuvre): void {
        $this->prixMainOeuvre = $prixMainOeuvre;
    }

    function setMultiplicateur($multiplicateur): void {
        $this->multiplicateur = $multiplicateur;
    }


    
    


    
    


    
}

