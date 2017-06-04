<section class="container">
    <div class="row section">
        <?php if ($this->session->flashdata('notification')) { ?>
            <?php if ($this->session->flashdata('notification')['status'] == 'error') { ?>
                <div class="card-panel red">
                    <p class="white-text"><i class="material-icons">report_problem</i> <?= $this->session->flashdata('notification')['msg']; ?></p>
                </div>
            <?php } elseif ($this->session->flashdata('notification')['status'] == 'success') { ?>
                <div class="card-panel green">
                    <p class="white-text"><i class="material-icons">done</i> <?= $this->session->flashdata('notification')['msg']; ?></p>
                </div>
            <?php } ?>
        <?php } ?>
        <article class="col m12">
            <h2><?= html_escape($article->title) ?></h2>
            <hr>
            <?php if($article->image) { ?>
            <p><img src="<?= base_url() ?>assets/images/upload/<?= html_escape($article->image) ?>" alt="image d'illustration de l'article"></p>
            <?php } ?>
            <?= $article->content; ?>
        </article>
        <hr>
        <section class="col m12">
            <h3>Commentaires</h3>
            <hr>
            <?php if (!empty($comments)) { ?>
                <div class="row">
                    <?php foreach ($comments as $comment) { ?>
                        <div class="card">
                            <div class="card-content">
                                <p><?= html_escape($comment->content); ?></p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
            <?php if (isset($this->session->userdata['id'])) { ?>
                <?= validation_errors(); ?>
                <?= form_open('article/view/' . html_escape($article->slug), $attributes); ?>
                <fieldset>
                    <div class="input-field">                  
                        <textarea class="materialize-textarea" id="commentContent" name="commentContent" required="required"></textarea>
                        <label for="commentContent">Ecrire un commentaire ...</label>
                    </div>
                    <input type="hidden" value="<?= $this->session->userdata['id'] ?>" name="userId" >
                    <input type="hidden" value="<?= html_escape($article->id) ?>" name="articleId" >

                    <button name="btSendComment" class="btn">Envoyer le commentaire</button>
                </fieldset>
                </form>
            <?php } ?>
        </section>
    </div>
</section>