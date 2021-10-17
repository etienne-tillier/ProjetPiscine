<link rel="stylesheet" type="text/css" href="style/style_details_recette.css">

<div id="detail">
    <div id="precision_titre"><?php echo htmlspecialchars(ucfirst($r->getNomRecette())) ?></div>
    <div id="precision_contenu">
        
        <div>
            <p class="sous_titre">Information générale :</p>
            <?php 
                echo '<li> Auteur : ' . htmlspecialchars($auteur->getPrenomAuteur()) . ' ' . htmlspecialchars($auteur->getNomAuteur()) .'</li>' . 
                '<li> Nombre de portion : ' . htmlspecialchars($r->getNombrePortion())  . '</li>' . 
                '<li> Prix de main d\'oeuvre : ' . htmlspecialchars($r->getPrixMainOeuvre()) . '</li>' . 
                '<li> Multiplicateur : ' . htmlspecialchars($r->getMultiplicateur());
            ?>
        </div>
        
        <div>
            <p class="sous_titre">Contenu :</p>
        
            <div id="contenu">
                <?php
                foreach($tabRecettes as $recette) {
                    echo '<li><a href="index.php?action=read&controller=recette&idRecette='. rawurldecode($recette[0]->getIdRecette()) .'">' . htmlspecialchars($recette[1]) . ' ' . htmlspecialchars($recette[0]->getNomRecette()) . '</li>';
                }
                foreach($tabIngredients as $ingredient) {
                    echo '<li><a href="index.php?action=read&controller=ingredient&idIngredient='. rawurldecode($ingredient[0]->getIdIngredient()) .'">' . htmlspecialchars($ingredient[0]->getNomIngredient()) . ' ' . htmlspecialchars($ingredient[1]) . ' ' . htmlspecialchars($ingredient[0]->getUnite()) .'</a></li>';
                }
                ;
                ?>
            </div>
        </div>

        <div>
            <p class="sous_titre">Fiche Technique :</p>
            <div id=fiche_tech>

                <div id=entete_fiche>
                    <div id="descriptif">
                        <p class="titre_partie_niv1">Desciptifs</p>
                        <?php echo htmlspecialchars($r->getDescriptif()); ?>
                    </div>
                    <div id="nom">
                        <?php echo htmlspecialchars(ucfirst($r->getNomRecette())) ?>
                    </div>
                </div>

                <div id="corps_fiche">
                    <div id="progression">
                        <p class="titre_partie_niv1">Progression</p>
                        <?php htmlspecialchars($r->getProgression()) ?>
                    </div>
                    <div id="denomination">

                        <p class="titre_partie_niv1">Dénomination</br></p>

                        <div id="contenu_den">
                            <div id="code">
                                <p class="titre_partie">Code</p>
                            </div>
                            
                            <div id="nature">
                                <p class="titre_partie">Nature</p>
                            </div>
                            
                            <div id="unite">
                                <p class="titre_partie">Unité</p>
                            </div>
                        </div>

                    </div>
                    <div id="valorisation">

                        <p class="titre_partie_niv1">Valorisation</p>
                        
                        <div id="contenu_val">
                            <div id="total">
                                <p class="titre_partie">Total</p>
                            </div>
                            
                            <div id="prix_u">
                                <p class="titre_partie">Prix U</p>
                            </div>
                            
                            <div id="ptht">
                                <p class="titre_partie">PTHT</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="calcul_couts">

                </div>
            </div>

        </div>
    </div>

    <div id="precision_fonction">
        <ul>
            <li><?php echo '<a href="index.php?action=delete&controller=recette&idRecette=' . rawurlencode($r->getIdRecette()) . '"> Supprimer la recette </a>'; ?></li>
            <li><?php echo '<a href="index.php?action=update&controller=recette&idRecette=' . rawurlencode($r->getIdRecette()) . '"> Modifier la recette </a>'; ?></li>
            <li><a href="imprimer_recette.php">Imprimer</li>
</div>
<?php

//echo '<div class = "precision"><h2>' . htmlspecialchars(ucfirst($r->getNomRecette())) . '</h2>' .
 //'<li> Auteur : ' . htmlspecialchars($auteur->getPrenomAuteur()) . ' ' . htmlspecialchars($auteur->getNomAuteur()) .'</li>' .
 //'<li> nombre de portion : ' . htmlspecialchars($r->getNombrePortion())  . '</li>' .
 //'<li> Prix de main d\'oeuvre : ' . htmlspecialchars($r->getPrixMainOeuvre()) . ' Multiplicateur : ' . htmlspecialchars($r->getMultiplicateur())  . '</li></div>';

//echo '<div class="IngredientRecette"><h3>Ingredient</h3><ul>';
//foreach($tabIngredients as $ingredient) {
 //echo '<li class="RecetteListeIngredient">' . htmlspecialchars($ingredient[0]->getNomIngredient()) . ' ' . htmlspecialchars($ingredient[1]) . ' ' . htmlspecialchars($ingredient[0]->getUnite()) .'</li>';
//}
//echo '</ul></div>';

 //echo '<a href="index.php?action=delete&controller=recette&idRecette=' . rawurlencode($r->getIdRecette()) . '"> Supprimer la recette </a>';
 //echo '<a href="index.php?action=update&controller=recette&idRecette=' . rawurlencode($r->getIdRecette()) . '"> Modifier la recette </a>';?>

    
<?php
// if (Session::is_admin()) {
//     echo '<br><a href = "index.php?action=update&controller=pierre&idpierre=' . rawurlencode($p->getIdPierre()) . '"> Mettre à jour le produit </a>' .
//     '<br><a href = "index.php?action=delete&controller=pierre&idpierre=' . rawurlencode($p->getIdPierre()) . '"> Supprimer le produit </a></div>';
// }
?>