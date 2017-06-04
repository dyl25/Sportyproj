<section class="row">
    <div class="col m12">
        <h2>Liste des demandes pour devenir athlète</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Login</th>
                    <th>E-mail</th>
                    <th>Catégorie</th>
                    <th>Numéro de dossard</th>
                    <th>Date de l'envoi</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($demandes as $demande): ?>
                <tr>
                    <td><?= html_escape($demande->id); ?></td>
                    <td><?= html_escape($demande->login); ?></td>
                    <td><?= html_escape($demande->email) ?></td>
                    <td><?= html_escape($demande->categoryName); ?></td>
                    <td><?= html_escape($demande->dossard); ?></td>
                    <td><?= html_escape($demande->creation_date); ?></td>
                    <td>
                        <a href="<?= site_url('backoffice/demande_admin/add/') . html_escape($demande->id); ?>" class="waves-effect btn green">Accepter</a>
                        <a href="<?= site_url('backoffice/demande_admin/delete/') . html_escape($demande->id); ?>" class="waves-effect btn red">Refuser</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>
