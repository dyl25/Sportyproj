<section class="row">
    <h2>Ajouter un article</h2>
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

    <?= form_open_multipart('backoffice/article_admin/add', $attributes) ?>
    <fieldset>

        <!-- Text input-->
        <div class="input-field">
            <input id="title" name="title" type="text" class="validate" required="required">
            <label for="title">Titre</label> 
        </div>

        <div class="input-field">
            <select name="category" required="required">
                <option value="" disabled selected>Choisir la catégorie</option>
                <?php foreach ($categories as $category) { ?>
                <option value="<?= $category->id; ?>"><?= $category->name; ?></option>
                <?php } ?>
            </select>
            <label>Catégorie de l'article</label>
        </div>

        <!-- Textarea -->
        <div class="input-field">                  
            <textarea class="materialize-textarea" id="content" name="content" required="required"></textarea>
        </div>
        <div class="row">
            <div class="file-field input-field">
                <div class="file-field input-field col m9">
                    <div class="btn">
                        <span>Image associée</span>
                        <input name="image" type="file">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" name="filepath">
                    </div>
                </div>
                <button type='button' class="btn col m3 file-reset">Supprimer l'image</button>
            </div>
        </div>

        <button name="btSendArticle" class="btn" type="submit">Ajouter l'article</button>

    </fieldset>
</form>
</section>
