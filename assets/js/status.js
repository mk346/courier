var type = document.getElementById("type");
var pickup = document.getElementById("pickup");
var address = document.getElementById("address");
var hidediv = document.getElementById("hide-div");
var label = document.getElementById("mylabel");
// var d_label = document.getElementById("mylabel2")


function changeStatus() {
    if (type.value === 'Deliver') {
        pickup.style.display = "none";
        hidediv.style.display = "block";
        label.style.display = "none"
    }
    else if (type.value === 'Pickup') {
        pickup.style.display = "block";
        hidediv.style.display = "none";
        label.style.display = "block"
        

    }
    else {
        pickup.style.display = "none";
    }
}