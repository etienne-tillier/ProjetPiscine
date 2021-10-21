<link rel="stylesheet" type="text/css" href="style/style_message.css">
<div class = "message_supp">
    <script type="text/javascript">
        alert("L'ingrédient a bien été supprimé");
        window.location = 'index.php';
    </script>
    <?php
        require (File::build_path(array("view", "ingredient", "list.php")));
    ?>
</div>
