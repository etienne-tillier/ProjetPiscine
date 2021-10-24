<?php
//classe mère et elle contient ttes les requetes sql vers la base de données

/*------------------------------------------------------------------------------------------*/
/*      Le modèle contient les données manipulées par le programme. Il assure la gestion de */ 
/*  ces données et garantit leur intégrité. Dans le cas typique d'une base de données,      */
/*  c'est le modèle qui la contient.Le modèle offre des méthodes pour mettre à jour ces     */
/*    données (insertion suppression, changement de valeur)                                 */
/*------------------------------------------------------------------------------------------*/
require_once File::build_path(array("config", "Conf.php"));

class Model {

    public static $pdo;

    public static function Init() 
    {
        //pour se connecter à la base de données
        $hostname = Conf::getHostname();//j'utilise le getHostname() de la classe conf (::)
        $database_name = Conf::getDatabase();
        $login = Conf::getLogin();
        $password = Conf::getPassword();
        try {
            self::$pdo = new PDO("mysql:host=$hostname;dbname=$database_name", $login, $password,
                    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));//PDO objet ds php qui me permet de 
                    //me connecter à la BD et new PDO càd je crée une instance de connexion à la BD

        // On active le mode d'affichage des erreurs, et le lancement d'exception en cas d'erreur
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }
    }


    public static function selectAll() {//ça me renvoie un tableau de pls lignes et chaque ligne est un objet
        $table_name = static::$object;
        $class_name = "Model" . ucfirst($table_name);//entrain de construire le nom de la classe
        //concaténation de chaîne de caractères et j'auraoos ModelAuteur et ucfirst pour mettre.. 
        //..la première lettre en Maj
        $rep = (Model::$pdo)->query("Select * From " . ucfirst($table_name));
        $rep->setFetchMode(PDO::FETCH_CLASS, $class_name);//afficher une requête
        $tab = $rep->fetchAll();
        return $tab;
    }



    public static function select($primary_value) {//renvoie une ligne 
        $table_name = static::$object;
        $class_name = "Model" . ucfirst($table_name);
        $primary_key = static::$primary;
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
        return $tab[0];
    }
    
    
    /*---------------------------------------------------------------------*/
    /* selectname      cherche des données dans la table ingredients       */ 
    /*                            ou recette.                              */
    /*                                                                     */
    /* En entrée: la fonction prend en entrée le chaine de caractére tapée */
    /*           par l'utilisateur afin de faire une recherche pour        */
    /*           trouver un ingredient par exemple ou une recette.         */
    /*                                                                     */
    /* En sortie: les valeurs retrouvée seront stockées sur un tableau et  */
    /*            retournée par la fonction.                               */
    /*---------------------------------------------------------------------*/        

    public static function selectname($name_recherche) {//renvoie une ligne
        $table_name = static::$object;
        $class_name = "Model" . ucfirst($table_name);//entrain de construire le nom de la classe
        //concaténation de chaîne de caractères et j'auraoos ModelAuteur et ucfirst pour mettre.. 
        //..la première lettre en Maj 
        if(ucfirst($table_name) == "Ingredient")
        {
            $rep = (Model::$pdo)->query('Select * From  ' . ucfirst($table_name) . ' 
            NATURAL JOIN Typeingredient 
            WHERE (nomIngredient LIKE "%' . $name_recherche .'%"  
            OR ( prixUnitaire LIKE "' . $name_recherche .'%") 
            OR ( nomTypeIngredient LIKE "%' . $name_recherche .'%")
            OR ( unite LIKE "' . $name_recherche .'"))
            Order By nomIngredient');
        } else {
            $rep = (Model::$pdo)->query('Select * From  ' . ucfirst($table_name) . ' 
            NATURAL JOIN Auteur NATURAL JOIN Typerecette
            WHERE (nomRecette LIKE "%' . $name_recherche .'%"  
            OR ( nomAuteur LIKE "%' . $name_recherche .'%") 
            OR ( prenomAuteur LIKE "%' . $name_recherche .'%")
            OR ( nomTypeRecette LIKE "%' . $name_recherche .'%")
            OR ( nombrePortion LIKE "' . $name_recherche .'%")
            
            )');
        }

        $rep->setFetchMode(PDO::FETCH_CLASS, $class_name);//afficher une requête
        $tab = $rep->fetchAll();
        return $tab;
    
    }

    /* la fonction permet un element d'une certaine table */

    public static function delete($primary) {
        $table_name = static::$object;

        $primary_key = static::$primary;
        try {
            $sql = "DELETE FROM " . ucfirst($table_name) . " WHERE " . $primary_key . "=:nom_tag";
            $req_prep = Model::$pdo->prepare($sql);
            $values = array(
                "nom_tag" => $primary,
            );

            $req_prep->execute($values);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /* la fonction permet de mettre à jour un element d'une certaine table dans notre base de données */

    public static function update($data)
    {
        $table_name = ucfirst(static::$object);
        $primary_key = static::$primary;
        $sql = "UPDATE " . $table_name ." SET";
        foreach ($data as $cle => $valeur){
            if ($cle != "primary")
            {
                $sql = $sql." $cle =:$cle,";
            }
        }
        try{
            $sql = rtrim($sql, ",");
            $sql = $sql
            . " WHERE $primary_key=:primary";
            $req_prep = Model::$pdo->prepare($sql);
            $req_prep->execute($data);

        } catch (Exception $ex) {
        echo $ex->getMessage();
        }
    }

    /* la fonction de sauvegarder un element dans la base de données */
    public static function save($data) 
    {
        $table_name = ucfirst(static::$object);
        $sql = "INSERT INTO " . $table_name . " VALUES(";
        foreach($data as $cle => $valeur){
            $sql = $sql.":$cle,";
        }
        try{
        $sql = rtrim($sql,",").");";
        $req_prep = Model::$pdo->prepare($sql);
        $req_prep->execute($data);
        }
        catch (Exception $ex){
            echo $ex->getMessage();
        }
        
        
    }


}

Model::Init();
