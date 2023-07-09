var modal = $('.modalBox');
var openModal = $('.openModal');
var close = $('.close');
openModal.click(function () {
    var id = $(this).data('id');
    //console.log(id);
    $('#status').change(function () { 
        var status = $("#status option:selected").val();
        $('#status').val(status);
        $('#updateId').val(id);
        //console.log(status);
    })

    // open modal
    modal.addClass('active');
});

$('#save').click(function () { 
    var id = $('#updateId').val();
    var status = $('#status').val();

    $.ajax({
        url:    '../form_handler/update_status.php',
        method:  'post',
        data:   { id, status },
        success: function (response) {
            console.log(response);
        }
    })

})
// close modal
close.click(function () { 
    modal.removeClass('active');
})