<div class="well">
    <h2>Liste des utilisateurs</h2>
    <a href="<?= site_url('backoffice/user_admin/add'); ?>" class="btn btn-primary">Ajouter un utilisateur</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Login</th>
                <th>E-mail</th>
                <th>Rôle</th>
                <th>Date d'inscription</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $user->id; ?></td>
                    <td><?= $user->login ?></td>
                    <td><?= $user->email; ?></td>
                    <td><?= $user->name; ?></td>
                    <td><?= $user->inscription_date; ?></td>
                    <td>
                        <a href="<?= site_url('backoffice/user_admin/edit/') . $user->id; ?>"><i class="material-icons tooltipped" data-position="top" data-delay="50" data-tooltip="éditer">mode_edit</i></a>
                        <a href="<?= site_url('backoffice/user_admin/delete/') . $user->id; ?>"><i class="material-icons tooltipped" data-position="bottom" data-delay="50" data-tooltip="supprimer">delete</i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
