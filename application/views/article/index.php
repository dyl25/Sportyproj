<div id="articlesSearch" class="parallax-container">
    <div class="section no-pad-bot">
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
    </div>
    <div class="parallax"><img src="<?= base_url(); ?>assets/images/libre/piste-noire.jpg" alt="Unsplashed background img 1"></div>
</div>

<section class="container well-pad">
    <div class="row">
        <!-- Options -->
        <div class="col m2 s12">
            <div class="collection">
                <a href="#!" class="collection-item">Option 1</a>
                <a href="#!" class="collection-item active">Option 2</a>
                <a href="#!" class="collection-item">Option 3</a>
                <a href="#!" class="collection-item">Option 4</a>
            </div>
        </div>
        <!-- Articles -->


        <div class="col m10">
            <div class="row">
                <?php foreach ($articles as $article) { ?>
                    <div class="col m4">
                        <article class="card medium">
                            <div class="card-image">
                                <a href="<?= site_url('article/view/' . $article->slug); ?>">
                                    <?php if ($article->image) { ?>
                                        <img src="<?= base_url(); ?>assets/images/upload/<?= $article->image; ?>" alt="article" class="responsive-img">
                                    <?php } else { ?>
                                        <img src="<?= base_url(); ?>assets/images/articleDefault.png" alt="article" class="responsive-img">
                                    <?php } ?>
                                </a>
                            </div>
                            <div class="card-content">
                                <!--<p class="row">
                                    <span class="left">Par : <?= $article->login; ?></span>
                                    <span class="right">Créé le <?= $article->creation_date; ?></span>
                                </p>-->
                                <h2 class="card-title"><a href="<?= site_url('article/view/' . $article->slug); ?>"><?= $article->title; ?></a></h2>
                            </div>
                            <div class="card-action">
                                <span class="left">Par : <?= $article->login; ?></span>
                                <span class="right">Créé le <?= $article->creation_date; ?></span>
                            </div>
                        </article>
                        <!--<hr>-->
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <ul class="pagination center">
        <!--<li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>-->
        <!--<li class="active"><a href="#!">1</a></li>
        <li class="waves-effect"><a href="#!">2</a></li>
        <li class="waves-effect"><a href="#!">3</a></li>
        <li class="waves-effect"><a href="#!">4</a></li>
        <li class="waves-effect"><a href="#!">5</a></li>-->
        <?= $paginationLinks; ?>
        <!--<li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>-->
    </ul>

</section>