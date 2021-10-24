<!-- possible de faire mieux avec requete sql dans le modelIngredient en verifiant l'idTypeIngredient -->
<head>
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
                        <li> 
                            <form method="GET" action="index.php" controller="recette">
                                <input type ="hidden" name ="controller" value="recette">
                                <input type ="hidden" name ="action" value="researchrecette">
                                <input id="barre_recherche" type="search" name="RechercheRecette" placeholder="Recherche de recettes"> 
                                <input id="bouton_recherche" type="submit" value="Trouver">
                            </form>    
                        </li>
                    </ul>
                </div>
                <div id="contenu">
                    <p>
                        <?php
                        
                        foreach($tabTypeRecette as $type){

                            echo "<div id='type_ingredient'><p>" . '<a href= "index.php?action=read&controller=typerecette&idTypeRecette=' . $type->getIdTypeRecette() . '">' . $type->getNomTypeRecette() . '</p></div>';
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
                    <li class="case"><a href="index.php?controller=recette&action=create"><i class="fas fa-plus"></i> Ajouter</li>
                </ul>
            </div>
    </div>
</body>




