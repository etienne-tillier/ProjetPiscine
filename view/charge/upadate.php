<form method="post" action="index.php?action=<?= ($create ? "created" : "updated" )?>&controller=Charge">
    <fieldset>
        <legend><?= ($create ? "Ajout d'une nouvelle Charge" : "Mise à jour des charges") ?></legend>
        <p>
            <input type ="hidden" name ="action" value="created"/>
            <input type ="hidden" name ="controller" value="nomCharge"/>

           

            <label for="Nom Charge">Nom</label> :
            <input type="text" name="Nom Charge" <?= ($create ? "required" : "readonly") ?> value="<?= htmlspecialchars$nomCharge) ?>" id="nomCharge"/>
            <label for="montantCharge">Nom</label> :
            <input type="text" name="montant Charge" <?= ($create ? "required" : "readonly") ?> value="<?= htmlspecialchars$nomCharge) ?>" id="nomCharge"/>
                
        
        </p>
        
        
        
        <?=($create ? "" : '<input type ="hidden" name ="nomCharge" value="' . rawurldecode($nomCharge) . '"/>') ?>
            <input type="submit" value="<?= $create ? "Ajouter" : "Mettre à jour" ?>" />
        </p>
</form>
