<section class="row">
    <h2>Ajouter un événement</h2>

    <?= form_open('backoffice/event_admin/add', $attributes) ?>
    <fieldset>

        <!-- Text input-->
        <div class="input-field">
            <input id="eventName" name="eventName" type="text" class="validate" required="required" value="<?= html_escape(set_value('eventName')); ?>">
            <label for="clubName">Nom de l'événement</label> 
        </div>

        <!-- Text input-->
        <div class="input-field">
            <textarea class="materialize-textarea" id="eventDescription" name="eventDescription" required="required" ><?= html_escape(set_value('eventDescription')); ?></textarea>
            <label for="eventDescription">Description de l'événement</label>
        </div>

        <div class="input-field">
            <select name="category" required="required">
                <option value="" disabled selected>Choisir la catégorie</option>
                <?php foreach ($categories as $category) { ?>
                    <option value="<?= html_escape($category->id); ?>" <?= html_escape(set_select('category', $category->id)); ?>><?= html_escape($category->name); ?></option>
                <?php } ?>
            </select>
            <label>Catégorie de l'événement</label>
        </div>

        <div class="input-field">
            <input id="eventDate" name="eventDate" type="date" class="datepicker" required="required" placeholder="Date de l'événement">          
        </div>

        <!-- Text input-->
        <div class="input-field">
            <input id="address" name="address" type="text" class="validate" required="required" value="<?= html_escape(set_value('address')); ?>">
            <label for="short">Adresse</label> 
        </div>

        <div class="input-field">
            <select name="localites" required="required" id="localites" class="browser-default">
                <option value="">Choisir la localite</option>
                <?php foreach ($localites as $localite) { ?>
                    <option value="<?= html_escape($localite->id); ?>" <?= html_escape(set_select('localites', $localite->id)); ?>><?= html_escape($localite->postcode) . ' ' . html_escape($localite->city); ?></option>
                <?php } ?>
            </select>
        </div>
        
        <div class="row"> 
            <div class="input-field col s6">
                <input id="addPostcode" name="addPostcode" type="number" min="0" class="validate" required="required" value="<?= html_escape(set_value('addPostcode')); ?>">
                <label for="addPostcode" data-error="Le code postale doit être un entier supérieur ou égale à 0 et ne pas avoir déjà été ajouté">Code postale</label> 
            </div>
            <div class="input-field col s6">
                <input id="addLocalite" name="addLocalite" type="text" class="validate" required="required" value="<?= html_escape(set_value('addLocalite')); ?>">
                <label for="addLocalite" data-error="La localité ne doit pas avoir déjà été ajoutée">Localite</label> 
            </div>
        </div>

        <div class="input-field">
            <input id="coord" name="coord" type="text" value="<?= html_escape(set_value('coord')); ?>">
            <label for="coord">Coordonnée Google Maps</label> 
        </div>

        <button name="btSendEvent" class="btn waves-effect" type="submit" >Ajouter le club</button>

    </fieldset>
</form>
</section>
