<link rel="stylesheet" type="text/css" href="style/style_details_recette_AP.css">
    <div id='detail'> 
        <?php include("choix_impression.php"); ?>
        <style> 
            #boutons1
            {
                display : none;
            }
        </style>
    </div> 
    <div id="boutons">
        <ul>
            <!--onclick pour la confirmation; Return Confirm("test");Fonction Confirm qui va afficher la popup de confirmation -->
            <li class="case"><?php echo '<a href="index.php?action=delete&controller=recette&idRecette=' . rawurlencode($r->getIdRecette()) . '" onclick="return confirm(\'Voulez vous supprimer cette recette?\')"><i class="fas fa-trash-alt"></i> Supprimer la recette </a>';?></li>
            <li class="case"><?php echo '<a href="index.php?action=update&controller=recette&idRecette=' . rawurlencode($r->getIdRecette()) . '"><i class="fas fa-sliders-h"></i> Modifier la recette </a>'; ?></li>
            <li class="case"><?php echo '<a href="index.php?action=choiximpression&controller=recette&idRecette=' . rawurlencode($r->getIdRecette()) . '"><i class="fas fa-print"></i> Imprimer la recette</a>'; ?></li>
    </div>
<?php
