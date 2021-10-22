<link rel="stylesheet" type="text/css" href="style/style_details_type_ingr.css">
<head>
    <title><?php echo ucfirst($type->getNomTypeIngredient());?></title>
    <link rel="stylesheet" type="text/css" href="style/style_contenu_bd.css">
    <link rel="stylesheet" type="text/css" href="style/style_bouton_gestion_bd.css">
</head>
<body>
    <div id="corps">
            <div id="fenetre">
                <div id="entete">
                    <ul>
                        <li><?php echo ucfirst($type->getNomTypeIngredient());?></li>
                        <li>
                            <form method="GET" action="index.php" controller="ingredient">
                                <input type ="hidden" name ="action" value="research">

                                <input id="barre_recherche" type="search" name="Recherche" placeholder="Recherche d'ingredients"> 
                                <input id="bouton_recherche" type="submit" value="Trouver">
                            </form>    
                        </li>
                    </ul>
                </div>
                <div id="contenu">
                    <p>
                        <?php
                            $idType = $type->getIdTypeIngredient();
                            foreach ($IngredientListe as $ingredient)
                            {
                                if ($idType == $ingredient->getIdTypeIngredient())
                                {
                                    $prix = $ingredient->getPrixUnitaire();
                                    $nom = $ingredient->getNomIngredient();
                                    $unite = $ingredient->getUnite();
                                    $allergene = $ingredient->getAllergene();
                                    $id = rawurlencode($ingredient->getIdIngredient());
                                
                                    echo '<div id="list_ingredient"> </br> <a href= "index.php?action=read&idIngredient=' . $ingredient->getIdIngredient() . '">' . $nom . " : " . $prix . "€ / ". $unite . "</a></br>" . '</div>';
                                }
                            }
                        ?>
                    
                    </p>
                </div>
            </div>
            <div id="boutons">
                <ul>
                    <li class="case"><?php echo '<a href="index.php?action=update&controller=typeingredient&idTypeIngredient=' . rawurlencode($type->getIdTypeIngredient()) . '"> Modifier le type</a>'; ?></li>
                    <li class="case"><?php echo '<a href="index.php?action=delete&controller=typeingredient&idTypeIngredient=' . rawurlencode($type->getIdTypeIngredient()) . '"> Supprimer le type</a></br>';?></li>
                </ul>
            </div>
    </div>
</body>
