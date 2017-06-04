<section class="row">
    <h2><?= $club->name; ?></h2>

    <h3>Informations</h3>
    <div class="data-striped data-highlight">
        <p>Id : <?= $club->id; ?></p>
        <p>Nom : <?= html_escape($club->name); ?></p>
        <p>Initiales : <?= html_escape($club->shortname); ?></p>
        <p> Adresse : <?= html_escape($club->address); ?></p>
        <p>Code postale : <?= html_escape($club->postcode); ?></p>
        <p>Localité : <?= html_escape($club->city); ?></p>
        <p>Coordonnées Google Maps : <?php if ($club->coord) { ?>
                <?= html_escape($club->coord); ?>
            <?php } else { ?>
                Aucune coordonnées spécifiées
            <?php } ?>
        </p>
    </div>
    <?php if ($club->coord) { ?>
        <div id="googleMap" style="height:300px;width:100%;"></div>
        <script>
            function myMap() {
                var myCenter = new google.maps.LatLng(<?= $club->coord; ?>);
                var mapProp = {center: myCenter, zoom: 15, scrollwheel: false, draggable: false, mapTypeId: google.maps.MapTypeId.ROADMAP};
                var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
                var marker = new google.maps.Marker({position: myCenter});
                marker.setMap(map);
            }
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC0TU9NGsHH2srdTO8JBU3lLAhTC4OOGqY&callback=myMap"></script>
    <?php } ?>
</section>
