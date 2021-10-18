

<head>
    <title>Recherche</title>
    <link rel="stylesheet" type="text/css" href="style/style_contenu_bd.css">
    <link rel="stylesheet" type="text/css" href="style/style_bouton_gestion_bd.css">
</head>
<body>
    <div id="corps">
            <div id="fenetre">
                <div id="entete">
                    <ul>
                        <li>Résultat de la recherche</li>
                        <li> 
                            <form method="GET" action="index.php" controller="recette">
                                <input type ="hidden" name ="controller" value="recette">
                                <input type ="hidden" name ="action" value="research">

                                <input id="barre_recherche" type="search" name="Recherche" placeholder="Recherche de recettes"> 
                                <input id="bouton_recherche" type="submit" value="Trouver">
                            </form>    
                        </li>
                    </ul>
                </div>
                <div id="contenu">
                    <p>
                        <?php
                        
                        foreach($typerecetteListe as $type){
                            $idType = $type->getIdTypeRecette();
                            foreach ($ListeRecette as $recette) {
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
                </ul>
            </div>
    </div>
</body>
