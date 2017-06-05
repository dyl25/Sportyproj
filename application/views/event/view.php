<section class="container">
    <div class="row section">
        <article class="col m12">
            <h2><?= html_escape($event->name) ?></h2>
            <hr>
            <?= $event->description; ?>
        </article>
    </div>
    <?php if ($event->coord) { ?>
        <div id="googleMap" style="height:300px;width:100%;"></div>
        <script>
            function myMap() {
                var myCenter = new google.maps.LatLng(<?= $event->coord; ?>);
                var mapProp = {center: myCenter, zoom: 15, scrollwheel: false, draggable: false, mapTypeId: google.maps.MapTypeId.ROADMAP};
                var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
                var marker = new google.maps.Marker({position: myCenter});
                marker.setMap(map);
            }
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC0TU9NGsHH2srdTO8JBU3lLAhTC4OOGqY&callback=myMap"></script>
    <?php } ?>
</section>