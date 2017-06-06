<section class="container well-pad">
    <div class="row">
        <div class="col m10">
            <div class="row">
                <h2>Derniers résultats</h2>
                <hr>
                <table class="bordered highlight centered result-table ">
                    <thead>
                        <tr>
                            <th>Epreuve</th>
                            <th>Athlète</th>
                            <th>Résultat</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($results as $result): ?>
                            <tr>
                                <td><?= html_escape($result->epreuve); ?></td>
                                <td><?= html_escape($result->athlete); ?></td>
                                <td><?= html_escape($result->result); ?></td>
                                <td><?= html_escape($result->eventDate); ?></td>
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