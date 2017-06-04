<section class="row">
    <div class="col m12">
        <h2>Liste des itinéraires</h2>
        <a href="<?= site_url('backoffice/map_admin/add'); ?>" class="btn btn-primary waves-effect">Ajouter un itinéraire</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nom</th>
                    <th>Créé par</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($routes as $route): ?>
                <tr>
                    <td><?= html_escape($route->id); ?></td>
                    <td><a href="<?= site_url('backoffice/map_admin/view/'.html_escape($route->id)); ?>"><?= html_escape($route->name); ?></a></td>
                    <td><?= html_escape($route->login); ?></td>
                    <td>
                        <a href="<?= site_url('backoffice/map_admin/edit/') . html_escape($route->id); ?>"><i class="material-icons tooltipped" data-position="top" data-delay="50" data-tooltip="éditer">mode_edit</i></a>
                        <a href="<?= site_url('backoffice/map_admin/delete/') . html_escape($route->id); ?>"><i class="material-icons red-text tooltipped" data-position="bottom" data-delay="50" data-tooltip="supprimer">delete</i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>
