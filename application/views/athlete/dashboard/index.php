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
                        <td><?= $event->name; ?></a></td>
                        <td><?= $event->categoryName; ?></td>
                        <td><?= $event->date; ?></td>
                        <td><?= $event->address . ', ' . $event->postcode . ' ' . $event->city ?></td>
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
                        <td><?= $result->epreuve; ?></td>
                        <td><?= $result->result; ?></td>
                        <td><?= $result->event; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

</div>
