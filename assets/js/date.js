var today = new Date().toISOString().split('T')[0];
var from_date = document.getElementById('mydate');
var to_date = document.getElementById('mydate2');
var date1 = from_date.value

from_date.setAttribute("max",today)

from_date.addEventListener("change",function(){
    if(from_date.value > today){
        alert("Invalid Date")
    }
})

to_date.setAttribute("max", today);

to_date.addEventListener("change",function(){
    if(to_date.value > today){
        alert("Invalid Date")
    }
})
