<section class="row">
    <h2>Modifier un événement</h2>

    <?= validation_errors(); ?>

    <?= form_open('backoffice/event_admin/edit/' . html_escape($event->id), $attributes) ?>
    <fieldset>

        <div class="input-field">
            <input id="eventName" name="eventName" type="text" class="validate" required="required" value="<?= html_escape($event->name); ?>">
            <label for="clubName">Nom de l'événement</label> 
        </div>

        <!-- Text input-->
        <div class="input-field">
            <textarea class="materialize-textarea" id="eventDescription" name="eventDescription" required="required" ><?= html_escape($event->description); ?></textarea>
            <label for="eventDescription">Description de l'événement</label>
        </div>

        <div class="input-field">
            <select name="category" required="required">
                <option value="" disabled>Choisir la catégorie</option>
                <?php foreach ($categories as $category) { ?>
                    <option value="<?= html_escape($category->id); ?>" <?php if ($category->id == $event->category_id) {
                    echo "selected=selected";
                } ?> ><?= html_escape($category->name); ?></option>
<?php } ?>
            </select>
            <label>Catégorie de l'événement</label>
        </div>

        <div class="input-field">
            <input id="eventDate" name="eventDate" type="date" class="datepicker" required="required" placeholder="Date de l'événement" value="<?= html_escape($event->date); ?>">          
        </div>

        <!-- Text input-->
        <div class="input-field">
            <input id="address" name="address" type="text" value="<?= html_escape($event->address); ?>" class="validate" required="required">
            <label for="short">Adresse</label> 
        </div>

        <div class="input-field">
            <select name="localites" required="required" id="localites" class="browser-default">
                <option value="">Choisir la localite</option>
                <?php foreach ($localites as $localite) { ?>
                    <option value="<?= html_escape($localite->id); ?>" <?php
                    if ($localite->id == $event->localite_id) {
                        echo "selected=selected";
                    }
                    ?> ><?= html_escape($localite->postcode) . ' ' . html_escape($localite->city); ?></option>
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
            <input id="coord" name="coord" type="text" value="<?= html_escape($event->coord); ?>">
            <label for="coord">Coordonnée Google Maps</label> 
        </div>

        <button name="btSendEditEvenement" class="btn waves-effect" type="submit">Modifier l'événement</button>

    </fieldset>
</form>
</section>
