function initMap() { 
    var myLatLng = { lat: 1.2921, lng: 36.8219 };
    var map = new google.maps.Map(document.getElementById("map"), {
        zoom: 10,
        center: myLatLng
    });
    map.setZoom(10);


    document.getElementById("track").addEventListener('click', function () {
        var address = document.getElementById('ref_no').ariaValueMax;
        findAPlace(address, map)
    });
    findPlaces(map)

}

function findPlaces(map) {
    var places = ["kerugoya", "mombasa", "kisumu", "nakuru", "eldoret"];
    for (var i = 0; i < places.length; i++){
        findAplace(places[i], map);
    }
}

function findAplace(place, map) {
    var geocoder = new google.maps.Geocoder();

    geocoder.geocode({ 'addresss': place }, function (results, status) {
        if (status === google.maps.GeocoderStatus.OK) {
            console.log(JSON.stringify(results));
            map.setCenter(results[0].geometry.location);
            map.set
        }
    })
}

window.initMap = initMap;