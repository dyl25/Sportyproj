<section class="row">
    <h2>Ajouter un résultat</h2>

    <?= validation_errors(); ?>

    <?= form_open('backoffice/result_admin/add', $attributes) ?>
    <fieldset>

        <div class="input-field">
            <select name="event" required="required">
                <option value="" disabled selected>Choisir l'événement associé</option>
                <?php foreach ($events as $event) { ?>
                    <option value="<?= $event->id; ?>" <?= set_select('event', $event->id); ?>><?= $event->name; ?></option>
                <?php } ?>
            </select>
            <label>Evénement associé</label>
        </div>

        <div class="input-field">
            <select name="epreuve" required="required">
                <option value="" disabled selected>Choisir l'epreuve</option>
                <?php foreach ($epreuves as $epreuve) { ?>
                    <option value="<?= $epreuve->id; ?>" <?= set_select('epreuve', $epreuve->id); ?>><?= $epreuve->name; ?></option>
                <?php } ?>
            </select>
            <label>Epreuve</label>
        </div>

        <!-- Text input-->
        <div class="input-field">
            <input id="result" name="result" type="number" class="validate" required="required" value="<?= set_value('result'); ?>" min="0" step="0.01">
            <label for="result">Résultat</label> 
        </div>

        <div class="input-field">
            <select name="athlete" required="required">
                <option value="" disabled selected>Choisir l'athlète</option>
                <?php foreach ($athletes as $athlete) { ?>
                    <option value="<?= $athlete->id; ?>" <?= set_select('athlete', $athlete->id); ?>><?= $athlete->athleteName; ?></option>
                <?php } ?>
            </select>
            <label>Athlètet associé</label>
        </div>

        <button name="btSendResult" class="btn waves-effect" type="submit" >Ajouter le résultat</button>

    </fieldset>
</form>
</section>
