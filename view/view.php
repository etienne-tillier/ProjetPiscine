<!DOCTYPE html>

<html>

<head>
    <title><?php echo $pagetitle; ?></title>
    <link rel="stylesheet" type="text/css" href="style/style.css">
</head>
    
<header>
    <!-- Menu -->
    <div id='Menu'> 
        <?php include("menu.php"); ?>
    </div>   
</header>

<body>

            <div>

                <?php
// Si $controleur='voiture' et $view='list',
// alors $filepath="/chemin_du_site/view/voiture/list.php"
                $filepath = File::build_path(array("view", $controller, "$view.php"));
                require $filepath;
                ?>

            </div>
</body>

<footer>
    <!-- Footer -->
    <div id='Footer'>   
        <?php include("footer.php"); ?>
    </div>
</footer>



</html>
