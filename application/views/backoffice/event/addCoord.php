<section class="row">
    <h2>Ajouter des coordonnées</h2>

    <?= validation_errors(); ?>

    <?= form_open('backoffice/event_admin/addCoord/'.html_escape($event->id), $attributes) ?>
    <fieldset>

        <div class="input-field">
            <input id="coord" name="coord" type="text" value="<?= html_escape(set_value('coord')); ?>">
            <label for="coord">Coordonnée Google Maps</label> 
        </div>

        <button name="btSendEvent" class="btn waves-effect" type="submit" >Ajouter les coordonnées</button>

    </fieldset>
</form>
</section>
