<section class = "row">
    <h2>Ajouter un itinéraire de jogging</h2>

    <div  class="container" id="floating-panel">
        <?= validation_errors(); ?>

        <?= form_open('backoffice/map_admin/add') ?>
        <fieldset>
            <input type="text" name="routeName" placeholder="Nom de l'itinéraire" >
            <input type="hidden" name="geoJsonInput" id="geoJsonInput">
            <button name="saveRoute" class="btn waves-effect" type="submit" id="saveRoute">Sauvegarder l'itinéraire</button>
        </fieldset>
        </form>
    </div>
    <div id="googleMapRoute"></div>

</section>