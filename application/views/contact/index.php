<div id="index-banner" class="parallax-container">
    <div class="parallax"><img src="<?= base_url(); ?>assets/images/libre/couloir3.jpg" alt="Unsplashed background img 1"></div>
</div>
<div class="info-container light-blue darken-4" id="mainInfo">
    <div class="container well-pad">
        <div class="row">
            <p class="white-text">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, 
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia 
                deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, 
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            </p>
        </div>
    </div>
</div>
<div class="orange accent-3 well-pad info-container">
    <div class="container">
        <div class="row">
            <div class="col m6"><img src="<?= base_url(); ?>assets/images/defaultProfilePic.png" alt="coach" class="circle"></div>
            <div class="col m6 white-text">
                <h2 class="title">Le coach</h2>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, 
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia 
                    deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, 
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </p>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid info-container">
    <div class="container well-pad">
        <div class="row">
            <h2 class="title">Horaire des entraînements</h2>
            <table class="bordered">
                <thead>
                    <tr>
                        <th>Jour</th>
                        <th>Heures</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Lundi</td>
                        <td>18h30 - 20h30</td>
                    </tr>
                    <tr>
                        <td>Mardi</td>
                        <td>18h30 - 20h30</td>
                    </tr>
                    <tr>
                        <td>Mercredi</td>
                        <td>18h30 - 20h30</td>
                    </tr>
                    <tr>
                        <td>Vendredi</td>
                        <td>18h00 - 20h00</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<section class="col m12 grey lighten-3 well-pad" id="mainContact">
    <h2 class="center title">CONTACT</h2>
    <div class="row">
        <div class="col m5">
            <p>Contactez nous. Nous vous répondrons au plus vite.</p>
            <p><i class="material-icons">location_on</i> 1070 Anderlecht, Bruxelles <br>
                Drève Olympique 1</p>
            <p><i class="material-icons">call</i> +00 1515151515</p> 
            <p><i class="material-icons">email</i> myemail@something.com</p>
        </div>
        <div class="col m7">
            <?= validation_errors(); ?>

            <?= form_open('contact'); ?>

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