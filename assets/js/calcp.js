var price = document.getElementById("price");
var amount = document.getElementById("amount");
var total;
let x, y, z;
const VAT = 0.16;

function calcPrice(p) {
    x = (p.parentElement.parentElement.children[4].children[0].value)
    y = parseFloat(x) * VAT 
    total = parseFloat(y) + parseFloat(x)
    //console.log(total)
    amount.innerHTML = parseFloat(total)
    z = parseFloat(total);
}


