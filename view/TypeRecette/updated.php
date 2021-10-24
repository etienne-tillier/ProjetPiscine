<?php
$create = false;
?>

<link rel="stylesheet" type="text/css" href="style/style_message.css">
<div class = "message_supp">
    <script type="text/javascript">
        alert("Les modifications ont bien été apportées au type de recette");
        window.location = 'index.php';
    </script>
    <?php
        // require (File::build_path(array("view", "typeingredient", "list.php")));

        /* 
            j'ai enlever ça car on a pas besoin d'afficher la liste des types d'ingredient. 
            Si vous souhaitez voir que la liste des types d'ingredients enlelever les // sur la ligne 20
        */
    ?>
</div>