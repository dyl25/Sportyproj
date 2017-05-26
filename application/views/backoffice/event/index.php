<section class="row">
    <div class="col m12">
        <h2>Liste des événements</h2>
        <a href="<?= site_url('backoffice/event_admin/add'); ?>" class="btn btn-primary waves-effect">Ajouter un événement</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nom du l'événement</th>
                    <th>Adresse</th>
                    <th>Code postal</th>
                    <th>Localité</th>
                    <th>Coordonnée Google Maps</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($events as $event): ?>
                    <tr>
                        <td><?= $event->id; ?></td>
                        <td><a href="<?= site_url('backoffice/event_admin/view/') . $event->id; ?>"><?= $event->name; ?></a></td>
                        <td><?= $event->address; ?></td>
                        <td><?= $event->postcode; ?></td>
                        <td><?= $event->city; ?></td>
                        <td><?= $event->coord; ?></td>
                        <td>
                            <a href="<?= site_url('backoffice/event_admin/edit/') . $event->id; ?>"><i class="material-icons tooltipped" data-position="top" data-delay="50" data-tooltip="éditer">mode_edit</i></a>
                            <a href="<?= site_url('backoffice/event_admin/delete/') . $event->id; ?>"><i class="material-icons red-text tooltipped" data-position="bottom" data-delay="50" data-tooltip="supprimer">delete</i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>
