<section class="row">
    <h2>Ajouter un club</h2>
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

    <?= form_open_multipart('backoffice/club_admin/add', $attributes) ?>
    <fieldset>

        <!-- Text input-->
        <div class="input-field">
            <input id="clubName" name="clubName" type="text" class="validate" required="required">
            <label for="clubName">Nom du club</label> 
        </div>

        <!-- Text input-->
        <div class="input-field">
            <input id="short" name="short" type="text" class="validate" required="required">
            <label for="short">Initiales</label> 
        </div>
        
        <div class="input-field">
            <select name="localites" required="required">
                <option value="" disabled selected>Choisir la localite</option>
                <?php foreach ($localites as $localite) { ?>
                <option value="<?= $localite->id; ?>"><?= $category->name; ?></option>
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
