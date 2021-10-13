<!-- possible de faire mieux avec requete sql dans le modelIngredient en verifiant l'idTypeIngredient -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Recettes</title>
    <link rel="stylesheet" type="text/css" href="style/style_contenu_bd.css">
    <link rel="stylesheet" type="text/css" href="style/style_bouton_gestion_bd.css">
</head>
<body>
    <div id="corps">
            <div id="fenetre">
                <div id="entete">
                    <ul>
                        <li>Recettes</li>
                        <li>Filtres</li>
                    </ul>
                </div>
                <div id="contenu">
                    <p>
                        <?php
                        
                        foreach($tabTypeRecette as $type){

                            echo '<div id="type_recette"><p>' . $type->getNomTypeRecette() . '</p></div>';

                            $idType = $type->getIdTypeRecette();
                            foreach ($tab_r as $recette) {
                                if ($idType == $recette->getIdTypeRecette()){
                                    $nombrePortion = $recette->getNombrePortion();
                                    $nom = $recette->getNomRecette();
                                    $id = rawurlencode($recette->getIdRecette()); 
                                    echo '<div id="list_recette"><a href= "index.php?action=read&controller=recette&idRecette=' . $id . '">' . $nom . " : " . $nombrePortion . " personnes </a>" . '</div>';
                                }
                            }
                        }
                        ?>
                    </p>
                </div>
            </div>
            <div id="boutons">
                <ul>
                    <li id="case_add_rece"><a href="index.php?controller=recette&action=create">Ajouter</li>
                    <li id="case_imp_rece"><a href="imprimer_recette.php">Imprimer</li>
                </ul>
            </div>
    </div>
</body>
</html>



