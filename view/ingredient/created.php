<link rel="stylesheet" type="text/css" href="style/style_message.css">
<div class = "message_ajout">
    <?php
        echo "<p>Nouveau produit enregistré !</p>";
        require (File::build_path(array("view", "ingredient", "list.php")));
    ?>
</div>