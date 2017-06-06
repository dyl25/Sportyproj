<div id="index-banner" class="parallax-container">
    <div class="parallax"><img src="<?= base_url(); ?>assets/images/image2-slide.jpg" alt="athlete en position de départ"></div>
</div>

<section class="orange accent-3 well-pad" id="who">
    <div class="container">
        <div class="section">
            <div class="row center">
                <p class="center-align title">Qui sommes nous?</p>
                <p class="center-align">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit</p>
                <a href="<?= site_url('contact') ?>" class="btn">En savoir plus <i class="material-icons right">info</i></a>
            </div>

        </div>
    </div>
</section>
<section class="grey lighten-3">
    <div class="container section">
        <h2><a href="<?= site_url('event/index') ?>">Prochains événements</a></h2>
        <hr>
        <table class="striped highlight">
            <thead>
                <tr>
                    <th>Evénement</th>
                    <th>Catégorie</th>
                    <th>Date</th>
                    <th>Adresse</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($events as $event): ?>
                    <tr>
                        <td><a href="<?= site_url('event/view/') . html_escape($event->id); ?>"><?= html_escape($event->name); ?></a></td>
                        <td><?= html_escape($event->categoryName); ?></td>
                        <td><?= html_escape($event->date); ?></td>
                        <td><?= html_escape($event->address).', '.html_escape($event->postcode).' '.html_escape($event->city); ?></td>
                    </tr>
<?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>
<div class="row section" id="mainContent">
    <div class="col l6 article-mosaic">
        <div class="row">
<?php foreach ($articles as $article) { ?>
                <div class="col m4 s10">
                    <article class="card hoverable">
                        <div class="card-image">
                            <?php if ($article->image) { ?>
                                <img src="<?= base_url(); ?>assets/images/upload/<?= html_escape($article->image); ?>" alt="image d'illustration pour article" class="responsive-img">
                            <?php } else { ?>
                                <img src="<?= base_url(); ?>assets/images/articleDefault.png" alt="image d'illustration pour article" class="responsive-img">
    <?php } ?>
                        </div>
                        <div class="caption">
                            <h3 class="center-align"><?= html_escape($article->title); ?></h3>
                        </div>
                    </article>
                </div>
<?php } ?>
        </div>
    </div> 
    <div class="col l6 m12">
        <h2><a href="<?= site_url('result/index') ?>">Derniers résultats</a></h2>
        <table class="bordered highlight centered result-table ">
            <thead>
                <tr>
                    <th>Epreuve</th>
                    <th>Athlète</th>
                    <th>Résultat</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
<?php foreach ($results as $result): ?>
                    <tr>
                        <td><?= html_escape($result->epreuve); ?></td>
                        <td><?= html_escape($result->athlete); ?></td>
                        <td><?= html_escape($result->result); ?></td>
                        <td><?= html_escape($result->eventDate); ?></td>
                    </tr>
<?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<section class="col m12 grey lighten-3 well-pad" id="mainContact">
    <h2 class="center title">CONTACT</h2>
    <div class="row">
        <div class="col m5">
            <p>Contactez nous. Nous vous répondrons au plus vite.</p>
            <p><i class="material-icons">location_on</i> 1070 Anderlecht, Bruxelles <br>
                Drève Olympique 1</p>
            <p><span class="glyphicon glyphicon-phone"></span> +00 1515151515</p>
            <p><span class="glyphicon glyphicon-envelope"></span> myemail@something.com</p>
        </div>
        <div class="col m7">
            <?= validation_errors(); ?>
            <?= form_open('accueil'); ?>
            <fieldset>
                <div class="row">
                    <div class="col m6 input-field">
                        <input class="validate" id="user_name" name="user_name" type="text" required>
                        <label for="user_name">Votre nom</label>
                    </div>
                    <div class="col m6 input-field">
                        <input class="validate" id="email" name="email" type="email" required>
                        <label for="email">E-mail</label>
                    </div>
                </div>
                <div class="col m12 input-field">
                    <textarea class="materialize-textarea" id="email_content" name="email_content"></textarea>
                    <label for="email_content">Votre message</label>
                </div>
                <div class="col m12">
                    <button class="btn right-align" type="submit" name="btSendEmail">Envoyer</button>
                </div>
            </fieldset>
            </form>
        </div>
    </div>
</section>
<div id="googleMap" style="height:400px;width:100%;"></div>
<script>
    function myMap() {
        var myCenter = new google.maps.LatLng(50.822118, 4.273013);
        var mapProp = {center: myCenter, zoom: 15, scrollwheel: false, draggable: false, mapTypeId: google.maps.MapTypeId.ROADMAP};
        var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
        var marker = new google.maps.Marker({position: myCenter});
        marker.setMap(map);
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC0TU9NGsHH2srdTO8JBU3lLAhTC4OOGqY&callback=myMap"></script>
<!-- Modal Structure -->
<div id="modal1" class="modal">
    <div class="modal-content">
        <h4>Bienvenue visiteur !</h4>
        <p>Ce site utilise des cookies dans le but d'assurer votre sécurité et d'améliorer l'expérience utilisateur. <br>
            En poursuivant la navigation sur le site vous acceptez l'utilisation de ces cookies/</p>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">J'accepte</a>
    </div>
</div>