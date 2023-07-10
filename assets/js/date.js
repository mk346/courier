var today = new Date().toISOString().split('T')[0];
var from_date = document.getElementById('mydate');
var to_date = document.getElementById('mydate2');

from_date.setAttribute("max", today);
to_date.setAttribute("max", today);
