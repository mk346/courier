var type = document.getElementById("type");
var pickup = document.getElementById("pickup");
var address = document.getElementById("address");
var hidediv = document.getElementById("hide-div");


function changeStatus() {
    if (type.value === 'Deliver') {
        pickup.style.display = "none";
        hidediv.style.display = "block";
    }
    else if (type.value === 'Pickup') {
        pickup.style.display = "block";
        hidediv.style.display = "none";
    }
    else {
        pickup.style.display = "none";
    }
}