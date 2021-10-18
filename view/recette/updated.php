<?php
$create = false;
?>
<script type="text/javascript">
    alert("Les modifications ont été apportées à la recette");
    window.location = 'view/recette/list.php';
</script>
<?php
require (File::build_path(array("view", "recette", "list.php")));
?>

    


