<section class="row">
    <h2>Editer un article</h2>
    <?php if (isset($notification)) { ?>
        <?php if ($notification['status'] == 'error') { ?>
            <div class="card-panel red">
                <p class="white-text"><i class="material-icons">report_problem</i> <?= $notification['msg']; ?></p>
            </div>
        <?php } elseif ($notification['status'] == 'success') { ?>
            <div class="card-panel green">
                <p class="white-text"><i class="material-icons">done</i> <?= $notification['msg']; ?></p>
            </div>
        <?php } ?>
    <?php } ?>
    <?= validation_errors(); ?>

    <?= form_open_multipart('backoffice/article_admin/edit/' . $article->id, $attributes) ?>

    <!-- Text input-->
    <div class="row">
        <div class="input-field col s6">
            <input id="title" name="title" type="text" placeholder="Titre de l'article" class="validate" required="" value="<?= $article->title ?>">
            <label for="title">Titre</label> 
        </div>
    </div>

    <!-- Textarea -->
    <div class="row">
        <div class="input-field col m12">                   
            <textarea class="materialize-textarea" id="content" name="content" placeholder="Contenu de l'article" required="required" ><?= $article->content ?></textarea>
            <label for="content">Contenu de l'article</label>
        </div>
    </div>

    <div class="row">
        <div class="file-field input-field col m9">
            <div class="btn">
                <span>Image associée</span>
                <input name="image" type="file">
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
            </div>
        </div>
        <button type='button' class="btn col m3 file-reset">Supprimer l'image</button>
    </div>

    <!-- Button -->
    <button id="btSendLogin" name="btSendArticle" class="btn">Modifier l'article</button>

</form>
</section>


