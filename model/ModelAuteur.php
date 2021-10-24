<?php

require_once File::build_path(array("model", "Model.php"));

/*------------------------------------------------------------------------------------------*/
/*      On se dispose dans ce fichier des fonctions (getters, setters, etc.) qui ont but de */
/*    représente les données qui vont être utilisées dans l’application web.  tout ce qui   */
/*    permet de la modifier (getters, setters, etc.),que ça soit en local ou                */ 
/*    en distant (base de données).                                                         */
/*------------------------------------------------------------------------------------------*/


class ModelAuteur extends Model{
    private $idAuteur;
    private $prenomAuteur;
    private $nomAuteur;
    protected static $object = "Auteur";//propriété d'une classe
    protected static $primary='idAuteur';
    


    function __construct($idAuteur = null, $prenomAuteur = null, $nomAuteur = null) {
        if (!is_null($idAuteur) && !is_null($nomAuteur) && !is_null($prenomAuteur)) {
            $this->idAuteur = $idAuteur;
            $this->prenomAuteur = $prenomAuteur;
            $this->nomAuteur = $nomAuteur;
            
        }
    }
    

    function getIdAuteur() {
        return $this->idAuteur;
    }

    
    function getPrenomAuteur() {
        return $this->prenomAuteur;
    }

    function getNomAuteur() {
        return $this->nomAuteur;
    }




    function setIdAuteur($idAuteur): void {
        $this->idAuteur = $idAuteur;
    }

    function setPrenomAuteur($prenomAuteur): void {
        $this->prenomAuteur = $prenomAuteur;
    }

    function setNomAuteur($nomAuteur): void {
        $this->nomAuteur = $nomAuteur;
    }
}

