var origin, destination;
function initMap() { 
    var myLatLng = { lat: 0.0236, lng: 37.9062 };
    // var directionsService = new google.maps.DirectionsService;
    // var directionsDisplay = new google.maps.DirectionsDisplay;
    var map = new google.maps.Map(document.getElementById("map"), {
        zoom: 5,
        center: myLatLng
    });
    map.setZoom(5);


    document.getElementById("track").addEventListener('click', function () {
        var address = document.getElementById('ref_no').value;
        findAplace(address, map)
        
    });
    findPlaces(map)
    //showDirection(directionsService, directionsDisplay)

}

function findPlaces(map) {
    const fetch_data1 = "<?php $origin; ?>";
    console.log(fetch_data1);
    origin = document.getElementById('origin').value;
    destination = document.getElementById('destination').value
    var places = [origin, destination];
    for (var i = 0; i < places.length; i++){
        findAplace(places[i], map);
        //console.log(places[i]);
    }
}

function findAplace(place, map) {
    var geocoder = new google.maps.Geocoder();

    geocoder.geocode({ 'address': place }, function (results, status) {
        if (status === google.maps.GeocoderStatus.OK) {
            map.setCenter(results[0].geometry.location);
            map.setZoom(7);

            var info = new google.maps.InfoWindow({
                content: results[0].formatted_address
            });
            var marker = new google.maps.Marker({
                position: results[0].geometry.location,
                title: results[0].formatted_address,
                animation: google.maps.Animation.DROP,
            });
            // for (var x = 0; x < results.length; x++){
            //     console.log(results[x][0]);
        
            // }
            // var line = new google.maps.Polyline({
            //     path: results[0].geometry.location.getPath(),
            //     strokeColor: "#FF0000",
            //     strokeOpacity: 0.5,
            //     strokeWeight: 1
            // })
            marker.setMap(map);
            //line.setMap(map);

            marker.addListener('click', function () {
                info.open(map, marker);
            });
        } else {
            console.log('Not found:', +place + 'status:' + status);
        }
    });
}

function showDirection(directionsService, directionsDisplay) { 
    directionsService.route({
        origin: origin,
        destination: destination,
        travelMode: 'DRIVING',
    }, function (response, status) {
        if (status === 'OK') {
            directionsDisplay.setDirection(response);

        } else {
            console.log('Direction request failed: '+ status);
        }
    })

}

