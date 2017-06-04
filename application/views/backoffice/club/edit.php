<section class="row">
    <h2>Modifier un club</h2>

    <?= validation_errors(); ?>

    <?= form_open('backoffice/club_admin/edit/' . $club->id, $attributes) ?>
    <fieldset>

        <!-- Text input-->
        <div class="input-field">
            <input id="clubName" name="clubName" type="text" value="<?= html_escape($club->name); ?>" class="validate" required="required">
            <label for="clubName">Nom du club</label> 
        </div>

        <!-- Text input-->
        <div class="input-field">
            <input id="short" name="short" type="text" value="<?= html_escape($club->shortname); ?>" class="validate" required="required">
            <label for="short">Initiales</label> 
        </div>

        <!-- Text input-->
        <div class="input-field">
            <input id="address" name="address" type="text" value="<?= html_escape($club->address); ?>" class="validate" required="required">
            <label for="short">Adresse</label> 
        </div>

        <div class="input-field">
            <select name="localites" required="required" id="localites" class="browser-default">
                <option value="">Choisir la localite</option>
                <?php foreach ($localites as $localite) { ?>
                    <option value="<?= html_escape($localite->id); ?>" <?php if ($localite->id == $club->localite_id) {
                    echo "selected=selected";
                } ?> ><?= html_escape($localite->postcode) . ' ' . html_escape($localite->city); ?></option>
<?php } ?>
            </select>
        </div>
        <div class="row">
            <div class="input-field col s6">
                <input id="addPostcode" name="addPostcode" type="number" min="0" class="validate" required="required">
                <label for="addPostcode" data-error="Le code postale doit être un entier supérieur ou égale à 0 et ne pas avoir déjà été ajouté">Code postale</label> 
            </div>
            <div class="input-field col s6">
                <input id="addLocalite" name="addLocalite" type="text" class="validate" required="required">
                <label for="addLocalite" data-error="La localité ne doit pas avoir déjà été ajoutée">Localite</label> 
            </div>
        </div>

        <div class="input-field">
            <input id="coord" name="coord" type="text" value="<?= html_escape($club->coord); ?>">
            <label for="coord">Coordonnée Google Maps</label> 
        </div>

        <button name="btSendEditClub" class="btn waves-effect" type="submit">Modifier le club</button>

    </fieldset>
</form>
</section>
