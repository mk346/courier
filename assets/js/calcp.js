var price = document.getElementById("price");
var weight = document.getElementById("weight");
var charge = document.getElementById("charge");
var amount = document.getElementById("amount");
var del_loc = document.getElementById("delivery_location");
var pickup = document.getElementById("pickup")
var total;
var tax;
//var price_kg = 50;
let x, y, z;
const VAT = 0.16;

if (del_loc){
    console.log(del_loc.options[del_loc.selectedIndex].value)
}else if (pickup){
    console.log(pickup.value)
}


function calcPrice(p) {
    w = (p.parentElement.parentElement.children[0].children[0].value) //weight
    // x = (p.parentElement.parentElement.children[1].children[0].value) //price
    v = (p.parentElement.parentElement.children[2].children[0].value) //charge
    if(w <= 10){
        a = 5 * w;
        price.innerHTML = parseInt(a)
    }else if(w > 10){
        //weight - constant * constant
        a = 5 * w + (w-10) * 10;
        price.innerHTML = parseInt(a)
    }
    // y = parseFloat(w) * parseFloat(x)
    //console.log("weight * price" +y)
    u = parseInt(a) + parseInt(v)
    //console.log("plus charge" +u)
    tax = parseInt(u) * VAT;
    //console.log("tax is" +tax)
    total = tax + u;
    //console.log("total cost" +total)
    amount.innerHTML = parseInt(total)
    z = parseInt(total);
}


