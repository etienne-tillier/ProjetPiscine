<?php
$create = false;
?>
<script type="text/javascript">
    alert("Les modifications ont été apportées à la recette");
    window.location = 'index.php';
</script>
<?php
require (File::build_path(array("view", "ingredient", "list.php")));
?>

    


