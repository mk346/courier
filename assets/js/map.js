/* 
javascript google maps api key
    AIzaSyCa4gKZc_ZR6uqxAw_Y5WUloQzBbGhAl6w 
    AIzaSyB3OescahbXQEeGpLf3N61FwiIVSiIvaVk
google maps matrix api
    AIzaSyB3OescahbXQEeGpLf3N61FwiIVSiIvaVk 
*/

// Initialize and add the map
let map;

async function initMap() {
    // The location of Uluru
    const position = { lat: 1.2921, lng: 36.8219};
    // Request needed libraries.
    //@ts-ignore
    const { Map } = await google.maps.importLibrary("maps");
    const { AdvancedMarkerView } = await google.maps.importLibrary("marker");

    // The map, centered at Uluru
    map = new Map(document.getElementById("map"), {
        zoom: 8,
        center: position,
        mapId: "tracker",
    });

    // The marker, positioned at Uluru
    const marker = new AdvancedMarkerView({
        map: map,
        position: position,
        title: "Map",
    });
}

initMap();