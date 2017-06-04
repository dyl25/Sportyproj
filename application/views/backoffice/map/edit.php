<section class = "row">
    <h2>Modifier un itinéraire de jogging</h2>

    <div id="floating-panel">
        <?= validation_errors(); ?>

        <?= form_open('backoffice/map_admin/edit/'.html_escape($route->id)) ?>
        <fieldset>
            <input type="text" name="routeName" placeholder="Nom de l'itinéraire" value="<?= html_escape($route->name); ?>">
            <input type="hidden" name="geoJsonInput" id="geoJsonInput">
            <button name="saveRoute" class="btn waves-effect" type="submit" id="saveRoute">Sauvegarder l'itinéraire</button>
        </fieldset>
        </form>
    </div>
    <div id="googleMapRoute"></div>

</section>