var price = document.getElementById("price");
var amount = document.getElementById("amount");
var total
const VAT = 0.16;

function calcPrice(p) {
    //console.log(p.value)
    x = p.value
    total = x + (x * VAT)
    console.log(total)
}
// let total,p;


// total = price + price * VAT;

// x = total.replace(/,/g, '');
// total = parseFloat(x) + parseFloat(total);
// if (amount.length > 0) {
//     amount = amount.textContent(parseFloat(total).toLocaleString('en-US',{style: 'decimal', maximumFractionDigits:2,minimumFractionDigits:2}))
// }

