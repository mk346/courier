
function clicked() {
        console.log("button clicked");

    }

    function track_now() {
        console.log("button clicked");
        start_load();
        var tracking_num = $('#ref_no').val();
        if (tracking_num == '') {
            $('#parcel_history').html('');
            end_load();
        } else {
            $.ajax({
                url: 'admin.php?action=get_parcel_data',
                method: 'POST',
                data: {
                    ref_no: tracking_num
                },
                error: err => {
                    console.log(err)
                    alert_toast("An error occurred", 'error')
                    end_load()
                },
                success: function(resp) {
                    if (typeof resp === 'object' || Array.isArray(resp) || typeof JSON.parse(resp) === 'object') {
                        resp = JSON.parse(resp)
                        if (Object.keys(resp).length > 0) {
                            $('#parcel_history').html('')
                            Object.keys(resp).map(function(k) {
                                var tl = $('#clone_timeline-item .item').clone()
                                tl.find('.dtime').text(resp[k].date_created)
                                tl.find('.timeline-body').text(resp[k].status)
                                $('#parcel_history').append(tl)

                            })

                        }
                    } else if (resp == 2) {
                        alert_toast('Unknown Tracking Number.', "error")
                    }
                },
                complete: function() {
                    end_load()
                }
            })
        }
    }
    $('#track-btn').click(function() {
        track_now()
    })
    $('#ref_no').on('search', function() {
        track_now()
    })
