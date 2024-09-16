<?php
require 'config/session.php';
require 'config/config.php';
require 'check_login.php';
include 'header.php';
include 'sidebar.php';
include 'topbar.php';
$id = '';
$status = $_GET['status'];
$branch_id = $_SESSION['branch_id'];
?>
</script>
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
                        <div class="col-search">
                            <div class="list-filter">
                                <label for="search" class="search">Search:
                                    <input type="search" class="search-control">
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row-1">
                        <div class="table-col">
                            <table class="branch-table" id="list">
                                <thead>
                                    <tr role="row" class="trow">
                                        <th class="rhead">#</th>
                                        <th class="rhead">Reference Number</th>
                                        <th class="rhead">Sender Name</th>
                                        <th class="rhead">Recipient Name</th>
                                        <th class="rhead">Status</th>
                                        <th class="rhead">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    if ($_SESSION['login_type'] == 1) {
                                        $query = $con->query("SELECT * FROM parcels WHERE status = '$status' ORDER BY parcel_id DESC LIMIT 20");
                                    } else if ($_SESSION['login_type'] == 2) {
                                        $query = $con->query("SELECT * FROM parcels WHERE branch_id='$branch_id' AND status = '$status' ORDER BY parcel_id DESC LIMIT 20");
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
                                                    echo $rows['rname']
                                                    ?>
                                                </b>
                                            </td>
                                            <td class="rbody text-center">
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
                                                    <!-- <a href="delete_parcel.php?&del_id=<?php //echo $rows['parcel_id'] ?>" class="btn-main btn-del">
                                                        <i class="fas fa-trash"></i>
                                                    </a> -->
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

<script src="assets/js/handler.js"></script>
<!-- <script src="assets/js/modal.js"></script> -->