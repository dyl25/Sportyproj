<h2>Espace athlète</h2>
<hr>
<!-- Users table -->
<div class="col m12">
    <div class="card-panel panel-analytic grey lighten-4">
        <h2>Liste des prochains événements <i class="material-icons medium">add_alert</i></a></h2>
        <table class="bordered highlight analytic-table">
            <thead>
                <tr>
                    <th>Nom de l'événement</th>
                    <th>Catégorie</th>
                    <th>Date</th>
                    <th>Adresse</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($events as $event): ?>
                    <tr>
                        <td><?= html_escape($event->name); ?></a></td>
                        <td><?= html_escape($event->categoryName); ?></td>
                        <td><?= html_escape($event->date); ?></td>
                        <td><?= html_escape($event->address) . ', ' . html_escape($event->postcode) . ' ' . html_escape($event->city) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Result table -->
<div class="col m12">
    <div class="card-panel panel-analytic grey lighten-4">
        <h2>Liste des derniers résultats <i class="material-icons medium">alarm_on</i></a></h2>
        <table class="bordered highlight analytic-table">
            <thead>
                <tr>
                    <th>Epreuve</th>
                    <th>Résultat</th>
                    <th>Evénement</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($results as $result): ?>
                    <tr>
                        <td><?= html_escape($result->epreuve); ?></td>
                        <td><?= html_escape($result->result); ?></td>
                        <td><?= html_escape($result->event); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

</div>
