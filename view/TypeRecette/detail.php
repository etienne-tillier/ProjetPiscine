<link rel="stylesheet" type="text/css" href="style/style_details_type_ingr.css">
<head>
    <title><?php echo ucfirst($p->getNomTypeRecette());?></title>
    <link rel="stylesheet" type="text/css" href="style/style_contenu_bd.css">
    <link rel="stylesheet" type="text/css" href="style/style_bouton_gestion_bd.css">
</head>
<body>
    <div id="corps">
            <div id="fenetre">
                <div id="entete">
                    <ul>
                        <li><?php echo ucfirst($p->getNomTypeRecette());?></li>
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
                            $idType = $p->getIdTypeRecette();
                            foreach ($RecetteListe as $recette)
                            {
                                if ($idType == $recette ->getIdTypeRecette())
                                {
                                    $nombrePortion = $recette->getNombrePortion();
                                    $nom = $recette->getNomRecette();
                                    $id = rawurlencode($recette->getIdRecette()); 
                                    echo '<div id="list_recette"><a href= "index.php?action=read&controller=recette&idRecette=' . $id . '">' . $nom . " : " . $nombrePortion . " personnes </a>" . '</div>';
                                }                   
                            }
                        ?>
                    
                    </p>
                </div>
            </div>
            <div id="boutons">
                <ul>
                    <li class="case"><?php echo '<a href="index.php?action=update&controller=typerecette&idTypeRecette=' . rawurlencode($p->getIdTypeRecette()) . '"> Modifier le type</a>'; ?></li>
                    <li class="case"><?php echo '<a href="index.php?action=delete&controller=typerecette&idTypeRecette=' . rawurlencode($p->getIdTypeRecette()) . '"onclick="return confirm(\'Voulez vous supprimer cette recette?\')"> Supprimer le type</a></br>';?></li>
                </ul>
            </div>
    </div>
</body>
