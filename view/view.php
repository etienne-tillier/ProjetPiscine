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

<<<<<<< HEAD
    </head>

    <body>
        <div class ="wrapper">
            <header>
                <nav>
                    <p><a href = index.php?action=readAll > Accueil</a></p>

                    <p><a href="index.php?action=<?= $login_action ?>&controller=utilisateur"><?= $login_label ?></a></p> 
                    <?= (!isset($_SESSION['login']) ? '<p><a href="index.php?action=create&controller=utilisateur">Inscription</a></p>' : "") ?>
                    <?= (isset($_SESSION['login']) ? "<p><a href=\"index.php?action=read&controller=utilisateur&login=" . $_SESSION["login"] . "\">Profil</a></p>" : "") ?>
                    <?= "<p><a href=\"index.php?controller=pierre&action=afficherPanier\">Mon panier</a>"?>
                    <?= "<p><a href=\"index.php?controller=ingredient&action=create\">Créer ingredient</a>"?>
                    <?= "<p><a href=\"index.php?controller=typeingredient&action=create\">Créer Type ingredient</a>"?>
                    <?= "<p><a href=\"index.php?controller=auteur&action=create\">Créer Auteur</a>"?>
                    <?= (Session::is_admin()) ? "<p><a href =\"index.php?action=readAll&controller=utilisateur\">Tous les utilisateurs (admin)</a></p>" : "" ?>
                </nav>
            </header>
=======
>>>>>>> etienne
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
