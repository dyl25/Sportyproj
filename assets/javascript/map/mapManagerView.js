
var map;
var geoJsonInput;
function initMap() {
    var myCenter = new google.maps.LatLng(50.822118, 4.273013);
    var mapProp = {center: myCenter, zoom: 15, mapTypeId: google.maps.MapTypeId.ROADMAP};
    map = new google.maps.Map(document.getElementById("googleMapRoute"), mapProp);
    var marker = new google.maps.Marker({position: myCenter});

    //map.data.setControls(['LineString']);
    map.data.setStyle({
        strokeColor: '#f44336',
        strokeOpacity: 1,
        strokeWeight: 2,
    });
    marker.setMap(map);
    geoJsonInput = document.getElementById('geoJsonInput');

    map.data.addGeoJson(userGeoJsonData);
}

initMap();
