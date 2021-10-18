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
                                <input id="barre_recherche" type="search" name="Recherche" placeholder="Recherche de recettes"> 
                                <input id="bouton_recherche" type="submit" value="Trouver">
                            </form>    
                        </li>
                    </ul>
                </div>
                <div id="contenu">
                    <p>Aucune recette trouvée</p>
                </div>
            </div>
            <div id="boutons">
                <ul>
                <li id="case_add_ingr"><a href="index.php?controller=ingredient&action=create">Ajouter</li>
                </ul>
            </div>
    </div>
</body>