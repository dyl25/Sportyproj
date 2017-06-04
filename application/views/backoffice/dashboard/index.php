<div class="row">
    <div class="col m4 s12">
        <div class="card-panel card-stat light-blue teal accent-3">
            <p><i class="medium material-icons">supervisor_account</i>Total users</p>
            <p><?= $countUsers; ?></p>
        </div>
    </div>
    <div class="col m4 s12">
        <div class="card-panel card-stat orange lighten-2">
            <p><i class="medium material-icons">library_books</i> Articles</p>
            <p><?= $countArticles; ?></p>
        </div>
    </div>
    <div class="col m4 s12">
        <div class="card-panel card-stat purple accent-4">
            <p><i class="medium material-icons">assessment</i> Résultats</p>
            <p><?= $countResults ?></p>
        </div>
    </div>


    <!-- Users table -->
    <div class="col m12">

        <div class="card-panel panel-analytic grey lighten-4">
            <h2><a href="<?= site_url('backoffice/user_admin') ?>">Derniers utilisateurs <i class="material-icons medium">supervisor_account</i></a></h2>
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
                            <td><?= html_escape($user->id); ?></td>
                            <td><?= html_escape($user->login); ?></td>
                            <td><?= html_escape($user->email); ?></td>
                            <td><?= html_escape($user->name); ?></td>
                            <td><?= html_escape($user->inscription_date); ?></td>
                            <td>
                                <a href="<?= site_url('backoffice/user_admin/edit/') . html_escape($user->id); ?>"><i class="material-icons tooltipped" data-position="top" data-delay="50" data-tooltip="éditer">mode_edit</i></a>
                                <a href="<?= site_url('backoffice/user_admin/delete/') . html_escape($user->id); ?>"><i class="material-icons red-text tooltipped" data-position="bottom" data-delay="50" data-tooltip="supprimer">delete</i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Articles table -->
    <div class="col m12">
        <div class="card-panel panel-analytic grey lighten-4">
            <h2><a href="<?= site_url('backoffice/article_admin'); ?>">Derniers articles <i class="material-icons medium">library_books</i></a></h2>
            <table class="bordered highlight analytic-table">
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
                            <td><a href="<?= site_url('backoffice/article_admin/view/' . html_escape($article->slug)) ?>"><?= html_escape($article->title); ?></a></td>
                            <td><?= html_escape($article->login); ?></td>
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
    <!-- Result table -->
    <div class="col m12">
        <div class="card-panel panel-analytic grey lighten-4">
            <h2><a href="<?= site_url('backoffice/result_admin'); ?>">Derniers résultats <i class="material-icons medium">alarm_on</i></a></h2>
            <table class="bordered highlight analytic-table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Epreuve</th>
                        <th>Athlète</th>
                        <th>Résultat</th>
                        <th>Evénement</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($results as $result): ?>
                        <tr>
                            <td><?= $result->id; ?></td>
                            <td><?= $result->epreuve; ?></td>
                            <td><?= html_escape($result->athlete); ?></td>
                            <td><?= html_escape($result->result); ?></td>
                            <td><?= html_escape($result->event); ?></td>
                            <td>
                                <a href="<?= site_url('backoffice/result_admin/edit/') . $result->id; ?>"><i class="material-icons tooltipped" data-position="top" data-delay="50" data-tooltip="éditer">mode_edit</i></a>
                                <a href="<?= site_url('backoffice/result_admin/delete/') . $result->id; ?>"><i class="material-icons red-text tooltipped" data-position="bottom" data-delay="50" data-tooltip="supprimer">delete</i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
