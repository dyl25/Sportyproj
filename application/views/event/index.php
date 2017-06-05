<section class="container well-pad">
    <div class="row">
        <div class="col m10">
            <div class="row">
                <h2>Prochains événements</h2>
                <hr>
                <table class="striped highlight">
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
        </div>
    </div>

    <ul class="pagination center">
        <?= $paginationLinks; ?>
    </ul>

</section>