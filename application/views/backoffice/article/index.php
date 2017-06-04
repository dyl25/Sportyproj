<section class="row">
    <div class="col m12">
        <h2>Liste des articles</h2>
        <a href="<?= site_url('backoffice/article_admin/add'); ?>" class="btn btn-primary">Ajouter un article</a>
        <table class="table table-striped">
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
                        <td><?= html_escape($article->creation_date); ?></td>
                        <td>
                            <a href="<?= site_url('backoffice/article_admin/edit/') . html_escape($article->id); ?>"><i class="material-icons tooltipped" data-position="top" data-delay="50" data-tooltip="éditer">mode_edit</i></a>
                            <a href="<?= site_url('backoffice/article_admin/delete/') . html_escape($article->id); ?>"><i class="material-icons red-text tooltipped" data-position="bottom" data-delay="50" data-tooltip="supprimer">delete</i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>
