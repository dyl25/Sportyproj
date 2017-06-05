<section class="row">
    <div class="col m12">
        <h2>Liste des événements</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Evénement</th>
                    <th>Catégorie</th>
                    <th>Date</th>
                    <th>Adresse</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($events as $event): ?>
                    <tr>
                        <td><a href="<?= site_url('event/view/') . html_escape($event->id); ?>"><?= html_escape($event->name); ?></a></td>
                        <td><?= html_escape($event->categoryName); ?></td>
                        <td><?= html_escape($event->date); ?></td>
                        <td><?= html_escape($event->address) . ', ' . html_escape($event->postcode) . ' ' . html_escape($event->city); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>
