<?php
require 'config/session.php';
require 'config/config.php';
require 'config/pdo.php';
require 'check_login.php';
include 'header.php';
include 'sidebar.php';
include 'topbar.php';

//variables
$ref_no = "";
$err_array = array();
$track_number;
$reference_number;


?>
<div class="toast" id="alert_toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-body text-white">
    </div>
</div>
<div class="toasts-top-right fixed" id="toastsContainerTopRight">

</div>
<div class="sub-wrapper2">
    <h1 class="main-header1">Track Parcel</h1>
    <hr class="line">
</div>
<div class="container-fluid">
    <div class="fluid-col">
        <div class="card-1 card-outline card-primary">
            <div class="card-body">
                <div class="track-div">
                    <!-- <label for="">Enter Tracking Number</label> -->
                    <div class="input-group">
                        <form action="form_handler/fetchdata.php" method="POST" id="tracker" class="capture-input">
                            <input type="text" name="track_no" class="form-control form-control2" id="ref_no" placeholder="Enter tracking Number" required>
                            <input type="submit" name="submit" class="search-btn" value="Track" id="track">
                            <br>
                        </form>
                    </div>
                </div>
                <div class="error-display">
                    <?php
                    if (in_array("<span style='color: red;'>Tracking Number Not Found</span><br>", $err_array)) {
                        echo "<span style='color: red;'>Tracking Number Not Found</span><br>";
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <input type="hidden" name="ref_number" id="ref_no" value="<?php echo isset($_SESSION['reference']) ? $_SESSION['reference'] : '' ?>">
                <input type="hidden" name="origin_town" id="from" value="<?php echo isset($_SESSION['origin']) ? $_SESSION['origin'] : ''; ?>">
                <input type="hidden" name="destination_town" id="to" value="<?php echo isset($_SESSION['destination']) ? $_SESSION['destination'] : '' ?>">
            </div>
        </div>
    </div>
    <div id="map" class="mymap">


    </div>

</div>

<script src="assets/js/handler.js"></script>
<!-- <script src="assets/js/fetch.js"></script> -->
<script src="assets/js/map2.js"></script>
<script src="your api key" defer></script>