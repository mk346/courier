var price = document.getElementById("price");
var weight = document.getElementById("weight");
var charge = document.getElementById("charge");
var amount = document.getElementById("amount");
var total;
var tax;
//var price_kg = 50;
let x, y, z;
const VAT = 0.16;

function calcPrice(p) {
    w = (p.parentElement.parentElement.children[0].children[0].value) //weight
    x = (p.parentElement.parentElement.children[1].children[0].value) //price
    v = (p.parentElement.parentElement.children[2].children[0].value) //charge
    y = parseFloat(w) * parseFloat(x)
    //console.log("weight * price" +y)
    u = parseFloat(y) + parseFloat(v)
    //console.log("plus charge" +u)
    tax = parseFloat(u) * VAT;
    //console.log("tax is" +tax)
    total = (parseFloat(u) * VAT) + u;
    //console.log("total cost" +total)
    amount.innerHTML = parseFloat(total)
    z = parseFloat(total);
}


