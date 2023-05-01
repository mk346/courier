$('new_cells').click(function () {
    var tr = $('#tbl_clone tr').clone()
    $('#parcel_details tbody').append(tr)
})


// var cells = 0;

// function addcells() {
//     // cells++;
//     var trow = "<tr>"
//             // trow += "<td>" + cells + "</td>"
//             trow += "<td class='rbody'><input type='text' name='weight[]' class='form-control' required></td>"
//             trow += "<td class='rbody'><input type='text' name='height[]' class='form-control' required></td>"
//             trow += "<td class='rbody'><input type='text' name='length[]' class='form-control' required></td>"
//             trow += "<td class='rbody'><input type='text' name='width[]' class='form-control' required></td>"
//             trow += "<td class='rbody'><input type='text' name='price[]' class='form-control' required></td>"
//             trow += "<td class='rbody'><input type='text' name='price[]' class='form-control' required></td>"
//     trow += "</tr>"

//     document.querySelector("#tbody").insertRow().innerHTML = trow

// }