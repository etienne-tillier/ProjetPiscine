<link rel="stylesheet" type="text/css" href="style/style_message.css">
<div class = "message_supp">
    <?php
        echo "<p>La recette a bien été supprimée. <br>";
        require (File::build_path(array("view", "recette", "list.php")));
    ?>
</div>
 