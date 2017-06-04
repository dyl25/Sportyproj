<section class="row">
    <div class="col m12">
        <h2>Liste des événements</h2>
        <a href="<?= site_url('backoffice/event_admin/add'); ?>" class="btn btn-primary waves-effect">Ajouter un événement</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nom de l'événement</th>
                    <th>Catégorie</th>
                    <th>Date</th>
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
                        <td><?= html_escape($event->id); ?></td>
                        <td><a href="<?= site_url('backoffice/event_admin/view/') . html_escape($event->id); ?>"><?= html_escape($event->name); ?></a></td>
                        <td><?= html_escape($event->categoryName); ?></td>
                        <td><?= html_escape($event->date); ?></td>
                        <td><?= html_escape($event->address); ?></td>
                        <td><?= html_escape($event->postcode); ?></td>
                        <td><?= html_escape($event->city); ?></td>
                        <td><?php if($event->coord){ echo html_escape($event->coord);}else{ ?><a href="<?= site_url('backoffice/event_admin/addCoord/') . html_escape($event->id); ?>" class="waves-effect btn">Ajouter des coordonnées</a> <?php } ?></td>
                        <td>
                            <a href="<?= site_url('backoffice/event_admin/edit/') . html_escape($event->id); ?>"><i class="material-icons tooltipped" data-position="top" data-delay="50" data-tooltip="éditer">mode_edit</i></a>
                            <a href="<?= site_url('backoffice/event_admin/delete/') . html_escape($event->id); ?>"><i class="material-icons red-text tooltipped" data-position="bottom" data-delay="50" data-tooltip="supprimer">delete</i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>
