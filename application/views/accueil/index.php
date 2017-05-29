<div id="index-banner" class="parallax-container">
    <div class="parallax"><img src="<?= base_url(); ?>assets/images/image2-slide.jpg" alt="Unsplashed background img 1"></div>
</div>

<section class="orange accent-3 well-pad" id="who">
    <div class="container">
        <div class="section">
            <div class="row center">
                <p class="center-align title">Qui sommes nous?</p>
                <p class="center-align">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit</p>
                <a href="#" class="btn">En savoir plus <i class="material-icons right">info</i></a>
            </div>

        </div>
    </div>
</section>
<section class="container section">
    <table class="striped highlight">
        <thead>
            <tr>
                <th>Evenement</th>
                <th>date</th>
                <th>Lieux</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>Réunion annuelle</td>
                <td>1/06/2017</td>
                <td>Club d'Anderlecht</td>
            </tr>
            <tr>
                <td>Compétition White Star</td>
                <td>8/09/2017</td>
                <td>Club du White Star</td>
            </tr>
            <tr>
                <td>Remise des mérites de la commune</td>
                <td>20/12/2017</td>
                <td>Rue Fernand 30, 1070Anderlecht</td>
            </tr>
        </tbody>
    </table>
</section>
<div class="row section" id="mainContent">
    <div class="col l6 article-mosaic">
        <div class="row">
            <?php foreach ($articles as $article) { ?>
                <div class="col m4 s10">
                    <article class="card hoverable">
                        <div class="card-image">
                            <?php if ($article->image) { ?>
                                <img src="<?= base_url(); ?>assets/images/upload/<?= $article->image; ?>" alt="article" class="responsive-img">
                            <?php } else { ?>
                                <img src="<?= base_url(); ?>assets/images/articleDefault.png" alt="article" class="responsive-img">
                            <?php } ?>
                        </div>
                        <div class="caption">
                            <h3 class="center-align"><?= $article->title; ?></h3>
                        </div>
                    </article>
               </div>
            <?php } ?>
        </div>
    </div> 
    <div class="col l6 m12">
        <ul class="collapsible" data-collapsible="accordion">
            <li>
                <a class="collapsible-header">Derniers résultats <i class="material-icons">arrow_drop_down</i></a>
                <div class="collapsible-body">
                    <table class="bordered highlight centered result-table ">
                        <thead>
                            <tr>
                                <th>pos</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Résultat</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>VanMachin</td>
                                <td>Truc</td>
                                <td>11"09'</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>VanMachin</td>
                                <td>Truc</td>
                                <td>11"09'</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>VanMachin</td>
                                <td>Truc</td>
                                <td>11"09'</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>VanMachin</td>
                                <td>Truc</td>
                                <td>11"09'</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </li>
            <li>
                <a class="collapsible-header">Derniers résultats <i class="material-icons">arrow_drop_down</i></a>
                <div class="collapsible-body">
                    <table class="bordered highlight centered result-table ">
                        <thead>
                            <tr>
                                <th>pos</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Résultat</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>VanMachin</td>
                                <td>Truc</td>
                                <td>11"09'</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>VanMachin</td>
                                <td>Truc</td>
                                <td>11"09'</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>VanMachin</td>
                                <td>Truc</td>
                                <td>11"09'</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>VanMachin</td>
                                <td>Truc</td>
                                <td>11"09'</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </li>
            <li>
                <a class="collapsible-header">Derniers résultats <i class="material-icons">arrow_drop_down</i></a>
                <div class="collapsible-body">
                    <table class="bordered highlight centered result-table ">
                        <thead>
                            <tr>
                                <th>pos</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Résultat</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>VanMachin</td>
                                <td>Truc</td>
                                <td>11"09'</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>VanMachin</td>
                                <td>Truc</td>
                                <td>11"09'</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>VanMachin</td>
                                <td>Truc</td>
                                <td>11"09'</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>VanMachin</td>
                                <td>Truc</td>
                                <td>11"09'</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </li>
        </ul>
        <table class="striped highlight">
            <thead>
                <tr>
                    <th>Evenement</th>
                    <th>date</th>
                    <th>Lieux</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>Réunion annuelle</td>
                    <td>1/06/2017</td>
                    <td>Club d'Anderlecht</td>
                </tr>
                <tr>
                    <td>Compétition White Star</td>
                    <td>8/09/2017</td>
                    <td>Club du White Star</td>
                </tr>
                <tr>
                    <td>Remise des mérites de la commune</td>
                    <td>20/12/2017</td>
                    <td>Rue Fernand 30, 1070Anderlecht</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<section class="col m12 grey lighten-3 well-pad" id="mainContact">
    <h2 class="center title">CONTACT</h2>
    <div class="row">
        <div class="col m5">
            <p>Contactez nous. Nous vous répondrons au plus vite.</p>
            <p><span class="glyphicon glyphicon-map-marker"></span> Anderlecht, Bruxelles</p>
            <p><span class="glyphicon glyphicon-phone"></span> +00 1515151515</p>
            <p><span class="glyphicon glyphicon-envelope"></span> myemail@something.com</p>
        </div>
        <div class="col m7">
            <div class="row">
                <div class="col m6 input-field">
                    <input class="validate" id="name" name="name" type="text" required>
                    <label for="name">Nom</label>
                </div>
                <div class="col m6 input-field">
                    <input class="form-control" id="email" name="email" type="email" required>
                    <label for="email">Email</label>
                </div>
            </div>
            <div class="col m12 input-field">
                <textarea class="materialize-textarea" id="comments" name="comments" rows="5"></textarea><br>
                <label for="email">Votre message...</label>
            </div>
            <div class="col m12">
                <button class="btn right-align" type="submit">Envoyer</button>
            </div>
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