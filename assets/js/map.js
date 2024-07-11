var origin, destination;
var map
var geocoder
var geocoderMarkers = [];
var info = [];
function initMap() { 
    var myLatLng = new google.maps.LatLng(0.0236, 37.9062);
    geocoder = new google.maps.Geocoder();
    map = new google.maps.Map(document.getElementById("map"), {
        zoom: 8,
        center: myLatLng
    });


    document.getElementById("track").addEventListener('click', function () {
        //e.preventDefault(); 
        var address = document.getElementById('from').value;
        //findAplace()
        
    });
    findPlaces(map)

}


function findPlaces(map) {
    origin = document.getElementById('from').value;
    destination = document.getElementById('to').value
    findAplace(origin,destination,map)
}

function findAplace(o, d,map) {
    geocoder.geocode({ 'address': o }, function (results, status) {
        if (status === google.maps.GeocoderStatus.OK) {
            map.setCenter(results[0].geometry.location);
            info.push(
                new google.maps.InfoWindow({
                    content: results[0].formatted_address
                })
            )
            geocoderMarkers.push(
                new google.maps.Marker({
                    position:results[0].geometry.location,
                    title: results[0].formatted_address,
                    animation: google.maps.Animation.DROP
                })
            )
            displayMarkers()
            
        } else {
            console.log('Not found:', +place + 'status:' + status);
        }
    });
    geocoder.geocode({ 'address': d }, function (results2, status2) {
        if (status2 === google.maps.GeocoderStatus.OK) {
            info.push(
                new google.maps.InfoWindow({
                    content: results2[0].formatted_address
                })
            )
            geocoderMarkers.push(
                new google.maps.Marker({
                    position:results2[0].geometry.location,
                    title: results2[0].formatted_address,
                    animation: google.maps.Animation.DROP
                }),
            )
            displayMarkers()
        } else {
            console.log('Not found:','status:' + status2);
        }
    });

}

function displayMarkers(){
    if(geocoderMarkers.length === 2){
        // var bounds = new google.maps.LatLngBounds(
        //     geocoderMarkers[0].getPosition(),
        //     geocoderMarkers[1].getPosition()
        // )
        geocoderMarkers[0].setMap(map);
        geocoderMarkers[1].setMap(map);
        geocoderMarkers[0].addListener('click', function(){
            info[0].open(map,geocoderMarkers[0])
        })
        geocoderMarkers[1].addListener('click', function(){
            info[1].open(map,geocoderMarkers[1])
        })

        path = new google.maps.Polyline({
            path: [geocoderMarkers[0].getPosition(), geocoderMarkers[1].getPosition()],
            strokeColor: "#FF0000",
            strokeOpacity: 1,
            strokeWeight: 2,
            map: map
        })
    }
}


