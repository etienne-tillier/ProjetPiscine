<<<<<<< HEAD

<?php
//possible de faire mieux avec requete sql dans le modelIngredient
//en verifiant l'idTypeIngredient
foreach($typeIngredientListe as $type){


    $idType = $type->getIdTypeIngredient();
    echo '<div class="typeIngredient">
            <p>' . $type->getNomTypeIngredient() . '</p></div>';
    foreach ($tab_i as $ingredient) {
        if ($idType == $ingredient->getIdTypeIngredient()){
            $prix = $ingredient->getPrixUnitaire();
            $nom = $ingredient->getNomIngredient();
            $unite = $ingredient->getUnite();
            $allergene = $ingredient->getAllergene();
            $id = rawurlencode($ingredient->getIdIngredient());
        // if(in_array($ingredient, ModelIngredient::selectAll())){

        //echo '<div class = "produit">' . '<a href= "index.php?action=read&idpierre=' . rawurlencode($p->getIdPierre()) .'"><img src="' . $link . '"alt="id1" height=150px width=150px/><br><strong>' . $p->getNom() . " : " . $p->getPrix() . 'euros</strong></a></div>';

                echo '<div class="ingredient">
                    <a href= "index.php?action=read&idIngredient=' . $ingredient->getIdIngredient() . '"><strong>' . $nom . " : " . $prix . "€/ ". $unite . "</strong></a>"
                . '</div>';
            
        //}
        }
    }
}
?>

<?= Session::is_admin() ? '<br><a class="addP" href="index.php?action=create" class="ajout"> Ajouter un nouveau produit </a>' : "" ?>



=======
<!-- possible de faire mieux avec requete sql dans le modelIngredient en verifiant l'idTypeIngredient -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Ingredients</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div id="corps">
            <div id="fenetre">
                <div id="entete">
                    <ul>
                        <li>Ingrédients</li>
                        <li>Filtres</li>
                    </ul>
                </div>
                <div id="contenu">
                    <p>
                        <?php
                        
                        foreach($typeIngredientListe as $type){

                            echo '<div id="type_ingredient"><p>' . $type->getNomTypeIngredient() . '</p></div>';

                            $idType = $type->getIdTypeIngredient();
                            foreach ($tab_i as $ingredient) {
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
                    <li id="case_add_ingr"><a href="view/ingredient/update.php">Ajouter</li>
                </ul>
            </div>
    </div>
</body>
</html>
>>>>>>> etienne

