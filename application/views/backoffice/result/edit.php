<section class="row">
    <h2>Modifier un résultat</h2>

    <?= validation_errors(); ?>

    <?= form_open('backoffice/result_admin/edit/' . html_escape($result->id), $attributes) ?>
    <fieldset>

        <div class="input-field">
            <select name="event" required="required">
                <option value="" disabled selected>Choisir l'événement associé</option>
                <?php foreach ($events as $event) { ?>
                    <option value="<?= html_escape($event->id); ?>" <?php if($event->id == $result->event_id){ echo "selected=selected";}  ?>><?= html_escape($event->name); ?></option>
                <?php } ?>
            </select>
            <label>Evénement associé</label>
        </div>

        <div class="input-field">
            <select name="epreuve" required="required">
                <option value="" disabled selected>Choisir l'epreuve</option>
                <?php foreach ($epreuves as $epreuve) { ?>
                    <option value="<?= html_escape($epreuve->id); ?>" <?php if($epreuve->id == $result->epreuve_id){ echo "selected=selected";} ?>><?= html_escape($epreuve->name); ?></option>
                <?php } ?>
            </select>
            <label>Epreuve</label>
        </div>

        <!-- Text input-->
        <div class="input-field">
            <input id="result" name="result" type="number" class="validate" required="required" value="<?= html_escape($result->result); ?>" min="0" step="0.01">
            <label for="result">Résultat</label> 
        </div>

        <div class="input-field">
            <select name="athlete" required="required">
                <option value="" disabled selected>Choisir l'athlète</option>
                <?php foreach ($athletes as $athlete) { ?>
                    <option value="<?= html_escape($athlete->id); ?>" <?php if($athlete->id == $result->athlete_id){ echo "selected=selected";} ?>><?= html_escape($athlete->athleteName); ?></option>
                <?php } ?>
            </select>
            <label>Athlètet associé</label>
        </div>

        <button name="btSendResult" class="btn waves-effect" type="submit" >Ajouter le résultat</button>

    </fieldset>
</form>
</section>
