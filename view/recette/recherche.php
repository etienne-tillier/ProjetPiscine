<div id="contenu">
    <p>
        <?php
        
            foreach($typerecetteListe as $type){

                echo '<div id="type_recette"><p>' . $type->getNomTypeRecette() . '</p></div>';

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