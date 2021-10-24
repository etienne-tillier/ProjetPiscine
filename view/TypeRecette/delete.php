<link rel="stylesheet" type="text/css" href="style/style_message.css">
<div class = "message_supp">
    <script type="text/javascript">
        alert("Le type de recette a bien été supprimé");
        window.location = 'index.php';
    </script>
    <?php
        require (File::build_path(array("view", "typerecette", "list.php")));
    ?>
</div>