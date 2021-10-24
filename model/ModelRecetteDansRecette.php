<?php

require_once File::build_path(array("model", "Model.php"));

/*------------------------------------------------------------------------------------------*/
/*      On se dispose dans ce fichier des fonctions (getters, setters, etc.) qui ont but de */
/*    représente les données qui vont être utilisées dans l’application web.  tout ce qui   */
/*    permet de la modifier (getters, setters, etc.),que ça soit en local ou                */ 
/*    en distant (base de données).                                                         */
/*------------------------------------------------------------------------------------------*/


class ModelRecetteDansRecette extends Model{
    private $idRecetteMere;
    private $idRecetteFille;
    private $quantiteRecette;
    protected static $object = "recetteDansRecette";//propriété d'une classe
    protected static $primary='idRecetteMere';

    public static function selectRecetteDansRecette($primary_value,$mode) {//renvoie une ligne
        $table_name = static::$object;
        $class_name = "Model" . ucfirst($table_name);
        $primary_key = ($mode == "mère" ? "idRecetteMere" : "idRecetteFille");
        try {
            $sql = "SELECT * from " . ucfirst($table_name) . " WHERE " . $primary_key . "=:nom_tag";
            // Préparation de la requête
            $req_prep = Model::$pdo->prepare($sql);

            $values = array(
                "nom_tag" => $primary_value,
                //nomdutag => valeur, ...
            );
            // On donne les valeurs et on exécute la requête
            $req_prep->execute($values);

            // On récupère les résultats comme précédemment
            $req_prep->setFetchMode(PDO::FETCH_CLASS, $class_name);
            $tab = $req_prep->fetchAll();
            // Attention, si il n'y a pas de résultats, on renvoie false
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }

        if (empty($tab))
            return false;
        return $tab;
    }


    function getIdRecetteMere() {
        return $this->idRecetteMere;
    }

    function getIdRecetteFille() {
        return $this->idRecetteFille;
    }

    function getQuantiteRecette() {
        return $this->quantiteRecette;
    }


}