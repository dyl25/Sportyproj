<section class="row">
    <h2><?= html_escape($event->name); ?></h2>

    <h3>Informations</h3>
    <div class="data-striped data-highlight">
        <p>Id : <?= html_escape($event->id); ?></p>
        <p>Nom : <?= html_escape($event->name); ?></p>
        <p> Adresse : <?= html_escape($event->address); ?></p>
        <p>Code postale : <?= html_escape($event->postcode); ?></p>
        <p>Localité : <?= html_escape($event->city); ?></p>
        <p>Coordonnées Google Maps : <?php if ($event->coord) { ?>
                <?= html_escape($event->coord); ?>
            <?php } else { ?>
                Aucune coordonnées spécifiées
            <?php } ?>
        </p>
    </div>
    <?php if ($event->coord) { ?>
        <div id="googleMap" style="height:300px;width:100%;"></div>
        <script>
            function myMap() {
                var myCenter = new google.maps.LatLng(<?= html_escape($event->coord); ?>);
                var mapProp = {center: myCenter, zoom: 15, scrollwheel: false, draggable: false, mapTypeId: google.maps.MapTypeId.ROADMAP};
                var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
                var marker = new google.maps.Marker({position: myCenter});
                marker.setMap(map);
            }
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC0TU9NGsHH2srdTO8JBU3lLAhTC4OOGqY&callback=myMap"></script>
    <?php } ?>
</section>
