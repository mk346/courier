<?php
require 'config/config.php';
include 'header.php';
include 'sidebar.php';
include 'topbar.php';
// require 'config/pdo.php';
?>
<div class="sub-wrapper2">
    <h1 class="main-header1">Parcel List</h1>
    <hr class="line">
</div>
<div class="container-fluid">
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
                            <table class="branch-table">
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
                                    $query = $con->query("SELECT * FROM parcels ORDER BY parcel_id DESC");
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
                                                        echo "<span class='status-btn'>Out of Delivery</span>";
                                                        break;
                                                    case '6':
                                                        echo "<span class='status-btn'>Ready for Pickup</span>";
                                                        break;
                                                    case '7':
                                                        echo "<span class='status-btn'>Delivered</span>";
                                                        break;
                                                    case '8':
                                                        echo "<span class='status-btn'>Picked Up</span>";
                                                        break;
                                                    case '9':
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
                                                    <button data-modal-target="#modal-parcel" class="btn-main btn-green" data-id="<?php echo $rows['parcel_id'] ?>">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                    <!-- <a href="view_parcel.php?view_id=<?php //echo $rows['parcel_id'] 
                                                                                            ?>" class="btn-main btn-green view-parcel" data-modal-target="#modal-parcel" id="showDialog">
                                                        <i class="fas fa-eye"></i>
                                                    </a> -->
                                                    <a href="#" class="btn-main btn-edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="#" class="btn-main btn-del">
                                                        <i class="fas fa-trash"></i>

                                                    </a>
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

<!-- modal section -->
<div class="modal fade show" role="dialog" id="modal-parcel">
    <div class="modal-dialog modal-md large" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Parcel's Details</h5>
            </div>
            <div class="modal-body">
                <div class="container-fluid2">
                    <div class="colum-main">
                        <div class="row">
                            <div class="column-main">
                                <div class="info-1 info-head">
                                    <dl>
                                        <dt>Tracking Number:</dt>
                                        <dd>
                                            <h4 class="track-no"><b class="stronger">12303777377</b></h4>
                                        </dd>
                                    </dl>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="column-small">
                                <div class="info-1 info-head">
                                    <b class="border-bottom border-primary">Sender Information</b>
                                    <dl>
                                        <dt>Name:</dt>
                                        <dd>John Kim</dd>
                                        <dt>Address:</dt>
                                        <dd>Kikuyu</dd>
                                        <dt>Contact:</dt>
                                        <dd>01887881819</dd>
                                    </dl>
                                </div>
                                <div class="info-1 info-head">
                                    <b class="border-bottom border-primary">Recipient Information</b>
                                    <dl>
                                        <dt>Name:</dt>
                                        <dd>Rubi Kim</dd>
                                        <dt>Address:</dt>
                                        <dd>Mombasa</dd>
                                        <dt>Contact:</dt>
                                        <dd>01885681819</dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
<div id="modal-overlay"></div>



<script src="assets/js/handler.js"></script>
<script src="assets/js/modal.js"></script>