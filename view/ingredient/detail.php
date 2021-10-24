
<head>
    <title><?php echo ucfirst($i->getNomIngredient());?></title>
    <link rel="stylesheet" type="text/css" href="style/style_contenu_bd.css">
    <link rel="stylesheet" type="text/css" href="style/style_bouton_gestion_bd.css">
</head>
<body>
    <div id="corps">
            <div id="fenetre">
                <div id="entete">
                    <ul>
                        <li><?php echo ucfirst($i->getNomIngredient());?></li>
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
                    <ul>
                        <li class="detail_ingr"><?php echo "Prix : " . htmlspecialchars($i->getPrixUnitaire()) . "€ / " . htmlspecialchars(ucfirst($i->getUnite()));?></li>
                        <li class="detail_ingr"><?php echo "Allergene : " . (($i->getAllergene() == 1 ? "Oui" : "Non") . "</li>");?></li>
                    </ul>
                </div>
            </div>
            <div id="boutons">
                <ul>
                    <li class="case"><?php echo '<a href="index.php?action=update&controller=ingredient&idIngredient=' . rawurlencode($i->getIdIngredient()) . '"><i class="fas fa-sliders-h"></i> Modifier l\'ingrédient </a>';?></li>
                    <li class="case"><?php echo '<a href="index.php?action=delete&controller=ingredient&idIngredient=' . rawurlencode($i->getIdIngredient()) . '" onclick="return confirm(\'Voulez vous supprimer cet ingrédient?\')"><i class="fas fa-trash-alt"></i> Supprimer l\'ingrédient </a>';?></li>
                </ul>
            </div>
    </div>
</body>
