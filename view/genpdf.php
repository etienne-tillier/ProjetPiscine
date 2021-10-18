
<?php
    // Generation de Pdf

    use Dompdf\Dompdf; // reference the Dompdf namespace
    use Dompdf\Options;
   
    /*Démarer le buffer 
    (petite mémoire qui permet de stocker des inforamtions 
    le temps d'exécution du code)
    */


    ob_start(); 
    require_once 'recette/FT.php';    // on récupére les données  (FT n'existe pas encore ) 
    $html = ob_get_contents();  // mes données sont stocké dans la variable html
    ob_end_clean(); //arreter le buffer donc effacer l'html qu'on a générer avant
    
    require_once 'dompdf/autoload.inc.php'; // include autoloader
    
    //si on veut ajouter des options sur la fonte
    $options = new Options();
    $options -> set('defaultFont', 'Courier');

    // instantiate and use the dompdf class
    $dompdf = new Dompdf();
    $dompdf->loadHtml($html);

    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4', 'portrait');

    // Render the HTML as PDF
    $dompdf->render();

    // Changement du nom de fichier
    $fichier = 'FT.pdf';

    // Output the generated PDF to Browser
    $dompdf->stream($fichier);

?>