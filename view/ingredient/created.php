<link rel="stylesheet" type="text/css" href="style/style_message.css">
<div class = "message_ajout">  
    <?php
        require (File::build_path(array("view", "ingredient", "list.php")));
    ?>
    <script type="text/javascript">
        alert("Nouveau produit enregistré !");
        window.location = 'index.php';
    </script>

</div>
