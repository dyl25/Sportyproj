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
                    <td><?= $demande->id; ?></td>
                    <td><?= $demande->login; ?></td>
                    <td><?= $demande->email ?></td>
                    <td><?= $demande->categoryName; ?></td>
                    <td><?= $demande->dossard; ?></td>
                    <td><?= $demande->creation_date; ?></td>
                    <td>
                        <a href="<?= site_url('backoffice/demande_admin/add/') . $demande->id; ?>" class="waves-effect btn green">Accepter</a>
                        <a href="<?= site_url('backoffice/demande_admin/delete/') . $demande->id; ?>" class="waves-effect btn red">Refuser</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>
