<section class="row">
    <div class="col m12">
        <h2>Résultats réalisés</h2>
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
</section>
