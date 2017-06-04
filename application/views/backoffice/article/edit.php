<section class="row">
    <h2>Editer un article</h2>

    <?= validation_errors(); ?>

    <?= form_open_multipart('backoffice/article_admin/edit/' . html_escape($article->id), $attributes) ?>

    <!-- Text input-->
    <div class="row">
        <div class="input-field col s6">
            <input id="title" name="title" type="text" placeholder="Titre de l'article" class="validate" required="" value="<?= html_escape($article->title) ?>">
            <label for="title">Titre</label> 
        </div>
    </div>

    <div class="input-field">
        <select name="category" required="required">
            <option value="" disabled>Choisir la catégorie</option>
            <?php foreach ($categories as $category) { ?>
                <option value="<?= html_escape($category->id); ?>" <?php if($category->id == $article->category_id){ echo "selected=selected";}  ?> ><?= html_escape($category->name); ?></option>
            <?php } ?>
        </select>
        <label>Catégorie de l'article</label>
    </div>

    <!-- Textarea -->
    <div class="row">
        <div class="input-field col m12">                   
            <textarea class="materialize-textarea" id="content" name="content" placeholder="Contenu de l'article" required="required" ><?= $article->content ?></textarea>
        </div>
    </div>

    <div class="row">
        <div class="file-field input-field col m9">
            <div class="btn">
                <span>Image associée</span>
                <input name="image" type="file" value="<?= html_escape($article->image); ?>">
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" type="text" value="<?= html_escape($article->image); ?>">
            </div>
        </div>
        <button type='button' class="btn col m3 file-reset">Supprimer l'image</button>
    </div>

    <!-- Button -->
    <button id="btSendLogin" name="btSendArticle" class="btn">Modifier l'article</button>

</form>
</section>


