let map;
let marker;
let geocoder;
var places;

function initMap() {
    map = new google.maps.Map(document.getElementById("map"), {
        zoom: 8,
        center: { lat: -34.397, lng: 150.644 },
        mapTypeControl: true,
        mapTypeControlOptions: {
            style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
            position: google.maps.ControlPosition.TOP_LEFT
        }
    });
    geocoder = new google.maps.Geocoder();

    const origin = document.getElementById("departure");
    const destination = document.getElementById("destination");


    const submitButton = document.getElementById("track");

    map.controls[google.maps.ControlPosition.TOP_LEFT].push(origin);
    map.controls[google.maps.ControlPosition.TOP_RIGHT].push(destination);
    map.controls[google.maps.ControlPosition.TOP_CENTER].push(submitButton);
    marker = new google.maps.Marker({
        map,
    });
    map.addListener("click", (e) => {
        geocode({ location: e.latLng });
        // geocode2({ location: e.latLng });
    });
    places = [origin.value, destination.value];
    for (var i = 0; i < places.length; i++) { 
        submitButton.addEventListener("click", () =>
        geocode({ address: places[i] }),
    );
    }
}

function geocode(request) {
    geocoder
        .geocode(request)
        .then((result) => {
            const { results } = result;

            map.setCenter(results[0].geometry.location);
            marker.setPosition(results[0].geometry.location);
            console.log(results);
            marker.setMap(map);
            return results;
        })
        .catch((e) => {
        console.log("Geocode was not successful for the following reason: " + e);
        });
}

// function geocode2(request2) {
//     geocoder
//         .geocode2(request2)
//         .then((result) => {
//             const { results } = result;
//             map.setCenter(results[0].geometry.location);
//             marker.setPosition(results[0].geometry.location);
//             marker.setMap(map);
//             return results;
//         })
//         .catch((e) => {
//         alert("Geocode was not successful for the following reason: " + e);
//         });
    
// }

function callme() {
    console.log("here i am")
}

window.initMap = initMap;

