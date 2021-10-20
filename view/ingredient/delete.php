<link rel="stylesheet" type="text/css" href="style/style_message.css">
<div class = "message_supp">
    <script type="text/javascript">
        //alert("L'ingrédient a bien été supprimé");
        if (confirm('Are you sure you want to save this thing into the database?')) {
  // Save it!
  console.log('Thing was saved to the database.');
    } else {
  // Do nothing!
  console.log('Thing was not saved to the database.');
    }

        window.location = 'index.php';
    </script>
    <?php
        require (File::build_path(array("view", "ingredient", "list.php")));
    ?>
</div>
