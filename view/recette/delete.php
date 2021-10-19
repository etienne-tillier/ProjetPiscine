<link rel="stylesheet" type="text/css" href="style/style_message.css">
<div class = "message_ajout">  
    <?php
        require (File::build_path(array("view", "recette", "list.php")));
    ?>
    <script type="text/javascript">
        alert("La recette a bien été supprimée");
        window.location = 'index.php?action=readAll&controller=recette';
    </script>

</div>
 