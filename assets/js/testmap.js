var geocoder;
var map;
var geocoderMarkers = [];
var path;

function initMap() { 
    geocoder = new google.maps.Geocoder();
    var latlng = new google.maps.LatLng(0.0236, 37.9062);
    var mapOtions = {
        zoom: 8,
        center: latlng
    }
    map = new google.maps.Map(document.getElementById('map'), mapOtions);
    document.getElementById("track").addEventListener('click', function(){
        var origin = document.getElementById('origin').value;
        var destination = document.getElementById('destination').value;
        //console.log("have been clicked")
        codeAddress(origin,destination)
    })
    //codeAddress(origin,destination)
}

function codeAddress(o,d) {
    // remove address
    for (var i = 0; i < geocoderMarkers.length; i++) { 
        geocoderMarkers[i].setMap(null);
    }

    //empty array
    geocoderMarkers.length = 0;

    if (typeof path !== 'undefined') { 
        path.setMap(null);
        path = undefined;
    }

    //or = document.getElementById('origin').value;

    geocoder.geocode({ 'address': o }, function (results, status) {
        //add marker
        if (status === google.maps.GeocoderStatus.OK) {
            geocoderMarkers.push(
                new google.maps.Marker({
                    position: results[0].geometry.location
                })
            );
            console.log(results[0])

            displayMarkers();
        } else {
            console.log("Geocoding failed" + status);
        }
    });
    //var destination = document.getElementById('destination').value;

    geocoder.geocode({ 'address': d }, function (results2, status2) {
        if (status2 === google.maps.GeocoderStatus.OK) {
            geocoderMarkers.push(
                new google.maps.Marker({
                    position: results2[0].geometry.location
                })
                
            );
            console.log(results2[0])
            displayMarkers();
        } else {
            console.log("Geocoding failed" +status2)
        }
    })

}

function displayMarkers() { 
    //check if geocoding was successful

    if (geocoderMarkers.length == 2) {
        // bound markers
        var bounds = new google.maps.LatLngBounds(
            geocoderMarkers[0].getPosition(),
            geocoderMarkers[1].getPosition()
        );

        //fit map to bounds
        // map.fitBounds(bounds);
        //var latlng = new google.maps.LatLng(0.0236, 37.9062);
        map.setCenter(geocoderMarkers[1].getPosition())

        //setting markers on the map
        geocoderMarkers[0].setMap(map);
        geocoderMarkers[1].setMap(map);

        path = new google.maps.Polyline({
            path: [geocoderMarkers[0].getPosition(), geocoderMarkers[1].getPosition()],
            strokeColor: "#FF0000",
            strokeOpacity: 1,
            strokeWeight: 2,
            map: map
        })
    } else {
        console.log("Display failed")
    }
}