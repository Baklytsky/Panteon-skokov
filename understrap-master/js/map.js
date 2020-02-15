let map;
let marker;
let position = {lat: 49.426115, lng: 32.094522};
let info;

function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        center: position,
        zoom: 18
    });
    marker = new google.maps.Marker({
        map: map,
        position: position
    });
    info = new google.maps.InfoWindow({
        content: '<h3>Geekhub location</h3>'
    });
    marker.addListener('click', function () {
        info.open(map, marker);
    });
}
