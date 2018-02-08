    <!--<div class="section no-pad-bot">
        <div class="container">
            <div class="row">
                <p class="center">Rechercher un article sur le site</p>
                <div class="input-field col m4 s12 offset-m4">
                    <i class="material-icons prefix">search</i>
                    <input class="validate" id="title" name="title" type="text" required>
                    <label for="title">Titre de l'article</label>
                </div>
            </div>
        </div>
    </div>-->

<section class="container well-pad">
    <div class="row">
        <!-- Options -->
        <!--<div class="col m2 s12">
            <div class="collection">
                <a href="#!" class="collection-item">Option 1</a>
                <a href="#!" class="collection-item active">Option 2</a>
                <a href="#!" class="collection-item">Option 3</a>
                <a href="#!" class="collection-item">Option 4</a>
            </div>
        </div>-->
        <!-- Articles -->


        <div class="col m10">
            <div class="row">
                <?php foreach ($articles as $article) { ?>
                    <div class="col m4">
                        <article class="card medium">
                            <div class="card-image">
                                <a href="<?= site_url('article/show/' . html_escape($article->slug)); ?>">
                                    <?php if ($article->image) { ?>
                                        <img src="<?= base_url(); ?>assets/images/upload/<?= html_escape($article->image); ?>" alt="image d'illustration pour article" class="responsive-img">
                                    <?php } else { ?>
                                        <img src="<?= base_url(); ?>assets/images/articleDefault.png" alt="image d'illustration pour article" class="responsive-img">
                                    <?php } ?>
                                </a>
                            </div>
                            <div class="card-content">
                                <h2 class="card-title title"><a href="<?= site_url('article/view/' . html_escape($article->slug)); ?>"><?= html_escape($article->title); ?></a></h2>
                            </div>
                            <div class="card-action">
                                <span class="left">Par : <?= html_escape($article->login); ?></span>
                                <span class="right">Créé le <?= html_escape($article->creation_date); ?></span>
                            </div>
                        </article>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <ul class="pagination center">
        <?= $paginationLinks; ?>
    </ul>

</section>