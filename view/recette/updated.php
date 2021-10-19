<?php
require (File::build_path(array("view", "recette", "list.php")));
?>
<?php
$create = false;
?>
<script type="text/javascript">
    alert("Les modifications ont été apportées à la recette");
    window.location = 'index.php?action=readAll&controller=recette';
</script>

    


