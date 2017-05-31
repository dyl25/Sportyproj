<section class="row">
    <div class="col m12">
        <h2>Liste des résultats</h2>
        <a href="<?= site_url('backoffice/result_admin/add'); ?>" class="btn btn-primary waves-effect">Ajouter un résultats</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Epreuve</th>
                    <th>Athlète</th>
                    <td>Résultat</td>
                    <th>Evénement</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($results as $result): ?>
                <tr>
                    <td><?= $result->id; ?></td>
                    <td><?= $result->epreuve; ?></td>
                    <td><?= $result->athlete; ?></td>
                    <td><?= $result->result; ?></td>
                    <td><?= $result->event; ?></td>
                    <td>
                        <a href="<?= site_url('backoffice/result_admin/edit/') . $result->id; ?>"><i class="material-icons tooltipped" data-position="top" data-delay="50" data-tooltip="éditer">mode_edit</i></a>
                        <a href="<?= site_url('backoffice/result_admin/delete/') . $result->id; ?>"><i class="material-icons red-text tooltipped" data-position="bottom" data-delay="50" data-tooltip="supprimer">delete</i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>
