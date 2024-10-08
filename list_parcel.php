<?php
require 'config/session.php';
require 'config/config.php';
require 'config/pdo.php';
require 'check_login.php';
include 'header.php';
include 'sidebar.php';
include 'topbar.php';
$id = '';
//$status = $_GET['status'];
$branch_id = $_SESSION['branch_id'];

?>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


<div class="sub-wrapper2" id="sub-wrapper">
    <h1 class="main-header1">Parcel List</h1>
    <hr class="line">
</div>
<div class="container-fluid" id="container">
    <div class="col-3">
        <div class="card-1 card-outline card-primary">
            <div class="card-header">
                <div class="card-item">
                    <a href="add_parcel.php" class="btn3">
                        <i class="fa fa-plus"></i>
                        Add New
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="container-wrapper">
                    <div class="row-1">
                        <div class="table-col">
                            <table class="branch-table" id="list">
                                <thead>
                                    <tr role="row" class="trow">
                                        <th class="rhead">#</th>
                                        <th class="rhead">Reference Number</th>
                                        <th class="rhead">Sender Name</th>
                                        <th class="rhead">Processing Branch</th>
                                        <th class="rhead">Recipient Name</th>
                                        <th class="rhead">Payment</th>
                                        <th class="rhead">Status</th>
                                        <th class="rhead" colspan="2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    if ($_SESSION['login_type'] == 1) {
                                        $query = $con->query("SELECT * FROM parcels ORDER BY parcel_id DESC");
                                    } else if ($_SESSION['login_type'] == 2) {
                                        $query = $con->query("SELECT * FROM parcels WHERE branch_id='$branch_id'  ORDER BY parcel_id DESC");
                                    }
                                    while ($rows = $query->fetch_assoc()) :
                                    ?>
                                        <tr>
                                            <td class="rbody"><?php echo $i++ ?></td>
                                            <td class="rbody text-center">
                                                <b>
                                                    <?php
                                                    echo $rows['reference_number']
                                                    ?>
                                                </b>
                                            </td>
                                            <td class="rbody text-center">
                                                <b>
                                                    <?php
                                                    echo $rows['sname']
                                                    ?>
                                                </b>
                                            </td>
                                            <td class="rbody text-center">
                                                <b>
                                                    <?php
                                                    echo $rows['processed_br']
                                                    ?>
                                                </b>
                                            </td>
                                            <td class="rbody text-center">
                                                <b>
                                                    <?php
                                                    echo $rows['rname']
                                                    ?>
                                                </b>
                                            </td>
                                            <td class="rbody text-center">
                                                <b>
                                                    <?php
                                                    echo $rows['payment']
                                                    ?>
                                                </b>
                                            </td>
                                            <td class="rbody text-center" colspan="2">
                                                <?php
                                                //create a switch case to set the parcel status
                                                switch ($rows['status']) {
                                                    case '1':
                                                        echo "<span class='status-btn'>Collected</span>";
                                                        break;
                                                    case '2':
                                                        echo "<span class='status-btn'>Shipped</span>";
                                                        break;
                                                    case '3':
                                                        echo "<span class='status-btn'>In-Transit</span>";
                                                        break;
                                                    case '4':
                                                        echo "<span class='status-btn'>Arrived at Destination</span>";
                                                        break;
                                                    case '5':
                                                        echo "<span class='status-btn'>Ready for Pickup</span>";
                                                        break;
                                                    case '6':
                                                        echo "<span class='status-btn'>Delivered</span>";
                                                        break;
                                                    case '7':
                                                        echo "<span class='status-btn'>Unsuccessful Delivery</span>";
                                                        break;
                                                    default:
                                                        echo "<span class='status-btn'>Item Accepted By Courier</span>";
                                                        break;
                                                }

                                                ?>
                                            </td>
                                            <td class="rbody">
                                                <div class="btn-group">
                                                    <a href="edit_parcel.php?&parcel_id=<?php echo $rows['parcel_id'] ?>&cs=<?php echo $rows['status'] ?>" class="btn-main btn-edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>

                                                    <!-- <a href="delete_parcel.php?&del_id=<?php //echo $rows['parcel_id'] 
                                                                                            ?>" class="btn-main btn-del">
                                                        <i class="fas fa-trash"></i>
                                                    </a> -->
                                                    <a href="#myModal" id="openmd" class="btn-main btn-upd openModal" data-id="<?php echo $rows['parcel_id']; ?>"><i class="fa-solid fa-pen-nib"></i> Update Status</a>
                                                </div>
                                            </td>
                                        </tr>

                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

<!-- modal update -->
<div class="modalBox" id="mymodal">
    <div class="modalContent">

        <div class="modal-header">
            <div class="modal-title">Update Status</div>
            <span class="close"><i class="fas fa-times-circle"></i></span>
        </div>
        <div class="form-box">
            <?php $status_arr = array("Item Accepted By Courier", "Collected", "Shipped", "In-Transit", "Arrived At Destination", "Ready for Pickup", "Delivered", "Unsuccessful Delivery Attempt");
            ?>
            <select name="status_update" id="status" class="select-sm">
                <?php foreach ($status_arr as $k => $v) : ?>
                    <option value="<?php echo $k ?>">
                        <?php echo $v; ?>
                    </option>
                <?php
                endforeach;
                ?>
            </select>
            <input type="hidden" name="id" id="updateId">
            <div class="dialog-row">
                <button name="submit" id="save" class="btn-main btn-edit dialog-btn"><i class="icon icon-save icon-large"></i>Save</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->



<script src="assets/js/handler.js"></script>
<script>
    $(document).ready(function() {
        var modal = $('.modalBox');
        var openModal = $('.openModal');
        var close = $('.close');

        //function to handle the modal
        openModal.click(function() {
            var id = $(this).data('id');
            var aTag = $(this);

            // Open modal
            modal.addClass('active');

            $('#status').change(function() {
                var status = $("#status option:selected").val();
                $('#status').val(status);
                $('#updateId').val(id);


                // Disable the a tag if status is delivered or collected
                if (status === '1' || status === '6') {
                    aTag.addClass('disabled');
                    //console.log(status)
                } else {
                    aTag.removeClass('disabled');
                }
            });
        });

        //save the status upon option select change
        $('#save').click(function() {
            var id = $('#updateId').val();
            var status = $('#status').val();

            // Disable the a tag if status is delivered or collected
            if (status === '1' || status === '6') {
                $('a[data-id="' + id + '"]').addClass('disabled');
                //save the status and id to the local storage
                localStorage.setItem('status-' + id, status);

            } else {
                localStorage.removeItem('status-' + id);
            }

            //send data to update the database
            $.ajax({
                url: 'form_handler/update_status.php',
                method: 'post',
                data: {
                    id: id,
                    status: status
                },
                success: function(response) {
                    if (response == 200) {
                        //console.log(response);
                    }
                }
            });

            //Reload the page after 500ms
            setTimeout(function() {
                location.reload();
            }, 500);

            modal.removeClass('active');
        });

        // Check localStorage on page load to disable the relevant a tags
        $('a.openModal').each(function() {
            var id = $(this).data('id');
            var status = localStorage.getItem('status-' + id);
            if (status === '1' || status === '6') {
                $(this).addClass('disabled');
            }
        });

        // Close modal
        close.click(function() {
            modal.removeClass('active');
        });
    });
</script>