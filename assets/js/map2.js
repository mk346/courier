document.addEventListener('DOMContentLoaded', function () {
    var origin, destination;
    var map;
    var geocoder;
    var geocoderMarkers = [];
    var info = [];

    function initMap() { 
        var myLatLng = new google.maps.LatLng(0.0236, 37.9062);
        geocoder = new google.maps.Geocoder();
        map = new google.maps.Map(document.getElementById("map"), {
            zoom: 8,
            center: myLatLng
        });

        document.getElementById("track").addEventListener('click', function (e) {
            //e.preventDefault(); // Prevent the form from submitting normally
            var address = document.getElementById('from').value; 
        });
        findPlaces(map);
        

        // Fetch initial values for origin and destination and log them
        origin = document.getElementById('from').value;
        destination = document.getElementById('to').value;
        console.log('Initial Origin:', origin);
        console.log('Initial Destination:', destination);
    }

    function findPlaces(map) {
        origin = document.getElementById('from').value;
        destination = document.getElementById('to').value;
        console.log('Fetched Origin:', origin);
        console.log('Fetched Destination:', destination);
        findAplace(origin, destination, map);
    }

    function findAplace(o, d, map) {
        geocoder.geocode({ 'address': o }, function (results, status) {
            if (status === google.maps.GeocoderStatus.OK) {
                map.setCenter(results[0].geometry.location);
                info.push(
                    new google.maps.InfoWindow({
                        content: results[0].formatted_address
                    })
                );
                geocoderMarkers.push(
                    new google.maps.Marker({
                        position: results[0].geometry.location,
                        title: results[0].formatted_address,
                        animation: google.maps.Animation.DROP,
                        icon: 'https://maps.google.com/mapfiles/kml/shapes/cabs.png' // Custom icon for origin
                    })
                );
                displayMarkers();
            } else {
                console.log('Not found: ' + o + ' status: ' + status);
            }
        });

        geocoder.geocode({ 'address': d }, function (results2, status2) {
            if (status2 === google.maps.GeocoderStatus.OK) {
                info.push(
                    new google.maps.InfoWindow({
                        content: results2[0].formatted_address
                    })
                );
                geocoderMarkers.push(
                    new google.maps.Marker({
                        position: results2[0].geometry.location,
                        title: results2[0].formatted_address,
                        animation: google.maps.Animation.DROP,
                        icon: 'http://maps.google.com/mapfiles/ms/icons/red-dot.png' // Custom icon for destination
                    })
                );
                displayMarkers();
            } else {
                console.log('Not found: ' + d + ' status: ' + status2);
            }
        });
    }

    function displayMarkers() {
        if (geocoderMarkers.length === 2) {
            geocoderMarkers[0].setMap(map);
            geocoderMarkers[1].setMap(map);
            geocoderMarkers[0].addListener('click', function () {
                info[0].open(map, geocoderMarkers[0]);
            });
            geocoderMarkers[1].addListener('click', function () {
                info[1].open(map, geocoderMarkers[1]);
            });

            var path = new google.maps.Polyline({
                path: [geocoderMarkers[0].getPosition(), geocoderMarkers[1].getPosition()],
                strokeColor: "#FF0000",
                strokeOpacity: 1,
                strokeWeight: 2,
                map: map
            });
        }
    }

    // Initialize the map when the page is loaded
    initMap();
});
