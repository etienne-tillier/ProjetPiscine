<link rel="stylesheet" type="text/css" href="style/style_details_recette.css">
<div id="etiquette">
    <div id="allergene" >
        <br>
        <p style=" border-style: outset; color: gold;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

            text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black; 
            width: 20%;
            text-align :center;
            margin-left : 40%;
            "> ETIQUETTE <p>
        <h3><?=$r->getNomRecette()?></h3>
        <div id="liste"><h4>listes des ingrédient : <h4></div>
        <br>
    </div>
</div>
<style type="text/css">
         @media print{
            header,footer, #precision_fonction, #fiche_tech{
                display : none;
            }
        }
    </style>

<div id="precision_fonction">
    <button href="#" onclick="window.print()">Imprimer l'etiquette</button>
</div>
