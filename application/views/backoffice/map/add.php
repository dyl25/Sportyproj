<section class = "row">
    <h2>Ajouter un itinéraire de jogging</h2>
    <?php if (isset($notification)) {
        ?>
        <?php if ($notification['status'] == 'error') { ?>
            <div class="card-panel red">
                <p class="white-text"><i class="material-icons">report_problem</i> <?= $notification['msg']; ?></p>
            </div>
        <?php } elseif ($notification['status'] == 'success') { ?>
            <div class="card-panel green">
                <p class="white-text"><i class="material-icons">done</i> <?= $notification['msg']; ?></p>
            </div>
        <?php } ?>
    <?php } ?>
    <div id="floating-panel">
        <?= validation_errors(); ?>

        <?= form_open('backoffice/map_admin/add') ?>
        <fieldset>
            <input type="hidden" name="geoJsonInput" id="geoJsonInput">
            <button name="saveRoute" class="btn waves-effect" type="submit" id="saveRoute">Sauvegarder l'itinéraire</button>
        </fieldset>
        </form>
    </div>
    <div id="googleMapRoute"></div>

</section>