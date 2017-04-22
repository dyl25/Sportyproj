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
            <input id="title" name="title" type="text" class="validate" required="">
            <label for="title">Titre</label> 
        </div>

        <!-- Textarea -->
        <div class="input-field">                  
            <textarea class="materialize-textarea" id="content" name="content" required="required"></textarea>
            <!--<label for="content">Contenu de l'article</label>-->
        </div>

        <div class="file-field input-field">
            <div class="btn">
                <span>Image associée</span>
                <input name="image" type="file">
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" type="text" name="filepath">
            </div>
        </div>

        <button name="btSendArticle" class="btn" type="submit">Ajouter l'article</button>

    </fieldset>
</form>
</section>
