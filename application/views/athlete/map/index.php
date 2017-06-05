<section class="row">
    <div class="col m12">
        <h2>Liste des parcours</h2>
        <p>Dans cette partie vous pouvez créer vos propres itinéraires visible pour l'échauffement et également par les autres athlètes.</p>
        <a href="<?= site_url('athlete/map_athlete/add'); ?>" class="btn btn-primary waves-effect">Ajouter un parcours</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Créé par</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($routes as $route): ?>
                <tr>
                    <td><a href="<?= site_url('athlete/map_athlete/view/'.html_escape($route->id)); ?>"><?= html_escape($route->name); ?></a></td>
                    <td><?= html_escape($route->login); ?></td>
                    <?php if($route->user_id == $this->session->userdata['id']) { ?>
                    <td>
                        <a href="<?= site_url('athlete/map_athlete/edit/') . html_escape($route->id); ?>"><i class="material-icons tooltipped" data-position="top" data-delay="50" data-tooltip="éditer">mode_edit</i></a>
                        <a href="<?= site_url('athlete/map_athlete/delete/') . html_escape($route->id); ?>"><i class="material-icons red-text tooltipped" data-position="bottom" data-delay="50" data-tooltip="supprimer">delete</i></a>
                    </td>
                    <?php } ?>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>
