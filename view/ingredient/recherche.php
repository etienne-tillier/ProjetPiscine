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
                            <form method="GET" action="index.php" controller="ingredient">
                                <input type ="hidden" name ="action" value="research">
                                <input type="search" name="Recherche" placeholder="Recherche d'ingredients"> 
                                <input type="submit" value="Trouver">
                            </form>    
                        </li>
                    </ul>
                </div>
                <div id="contenu">
                    <p>
                        <?php
                        foreach($typeIngredientListe as $type){
                            $idType = $type->getIdTypeIngredient();
                            foreach ($ListeIngredient as $ingredient) {
                                if ($idType == $ingredient->getIdTypeIngredient()){
                                    $prix = $ingredient->getPrixUnitaire();
                                    $nom = $ingredient->getNomIngredient();
                                    $unite = $ingredient->getUnite();
                                    $allergene = $ingredient->getAllergene();
                                    $id = rawurlencode($ingredient->getIdIngredient());
                                    
                                    echo '<div id="list_ingredient"><a href= "index.php?action=read&idIngredient=' . $ingredient->getIdIngredient() . '">' . $nom . " : " . $prix . "€/ ". $unite . "</a>" . '</div>';
                                }
                            }
                        }
                        ?>
                    
                    </p>
                </div>
            </div>
            <div id="boutons">
                <ul>
                <li id="case_add_ingr"><a href="index.php?controller=ingredient&action=create">Ajouter</li>
                </ul>
            </div>
    </div>
</body>