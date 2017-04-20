<section class="container">
    <div class="row">
        <article class="col m12">
            <h2><?= $article->title ?></h2>
            <p><?= $article->content ?></p>
        </article>
        <section class="col m12">
            <?php if (!empty($comments)) { ?>
                <div class="row">
                    <?php foreach ($comments as $comment) { ?>
                        <div class="card">
                            <div class="card-content">
                                <p><?= $comment->content; ?></p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
            <?php if (isset($this->session->userdata['id'])) { ?>
                <?php if (isset($error)) { ?>
                    <div class="card-panel <?= $error['cardColor']; ?>">
                        <p class="white-text"><i class="material-icons"><?= $error['icone']; ?></i> <?= $error['msg']; ?></p>
                    </div>
                <?php } ?>
                <?= validation_errors(); ?>
                <?= form_open('article/view/' . $article->slug, $attributes); ?>
                <fieldset>
                    <div class="input-field">                  
                        <textarea class="materialize-textarea" id="commentContent" name="commentContent" required="required"></textarea>
                        <label for="commentContent">Ecrire un commentaire ...</label>
                    </div>
                    <input type="hidden" value="<?= $this->session->userdata['id'] ?>" name="userId" >
                    <input type="hidden" value="<?= $article->id ?>" name="articleId" >

                    <button name="btSendComment" class="btn">Envoyer le commentaire</button>
                </fieldset>
                </form>
            <?php } ?>
        </section>
    </div>
</section>