<link rel="stylesheet" type="text/css" href="style/style_message.css">
<div class = "message_supp">
    <?php
        echo "<p>L'ingrédient a bien été supprimée. </p>";
        require (File::build_path(array("view", "ingredient", "list.php")));
    ?>
</div>