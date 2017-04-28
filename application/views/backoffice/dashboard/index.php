<div class="row">
    <div class="col m4 s12">
        <div class="card-panel card-stat light-blue teal accent-3">
            <p><i class="medium material-icons">supervisor_account</i> Users</p>
            <p>29</p>
        </div>
    </div>
    <div class="col m4 s12">
        <div class="card-panel card-stat orange lighten-2">
            <p><i class="medium material-icons">library_books</i> Articles</p>
            <p>50</p>
        </div>
    </div>
    <div class="col m4 s12">
        <div class="card-panel card-stat purple accent-4">
            <p><i class="medium material-icons">assessment</i> Résultats</p>
            <p>100</p>
        </div>
    </div>


<!-- Users table -->
<div class="col m12">
    <div class="card-panel panel-analytic grey lighten-4">
        <h2><a href="<?= site_url('backoffice/user_admin') ?>">Liste des utilisateurs <i class="material-icons medium">supervisor_account</i></a></h2>
        <table class="bordered highlight analytic-table">
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
                            <a href="<?= site_url('backoffice/user_admin/delete/') . $user->id; ?>"><i class="material-icons red-text tooltipped" data-position="bottom" data-delay="50" data-tooltip="supprimer">delete</i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Articles table -->
<div class="col m12">
    <div class="card-panel grey lighten-4">
        <h2><a href="<?= site_url('backoffice/article_admin'); ?>">Liste des articles <i class="material-icons medium">library_books</i></a></h2>
        <table class="bordered highlight">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Titre de l'article</th>
                    <th>Auteur</th>
                    <th>Date de création</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($articles as $article): ?>
                    <tr>
                        <td><?= $article->id; ?></td>
                        <td><a href="<?= site_url('backoffice/article_admin/view/' . $article->slug) ?>"><?= $article->title; ?></a></td>
                        <td><?= $article->login; ?></td>
                        <td><?= $article->creation_date; ?></td>
                        <td>
                            <a href="<?= site_url('backoffice/article_admin/edit/') . $article->id; ?>"><i class="material-icons tooltipped" data-position="top" data-delay="50" data-tooltip="éditer">mode_edit</i></a>
                            <a href="<?= site_url('backoffice/article_admin/delete/') . $article->id; ?>"><i class="material-icons red-text tooltipped" data-position="bottom" data-delay="50" data-tooltip="supprimer">delete</i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</div>
