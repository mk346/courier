<?php
require 'config/config.php';
include 'header.php';
include 'sidebar.php';
include 'topbar.php';
?>
<!-- <div class="wrapper-main"> -->
<div class="sub-wrapper2">
    <h1 class="main-header1">Track Parcel</h1>
    <hr class="line">
</div>
<div class="container-fluid">
    <div class="fluid-col">
        <div class="card-1 card-outline card-primary">
            <div class="card-body">
                <div class="track-div">
                    <label for="">Enter Tracking Number</label>
                    <div class="input-group">
                        <input type="search" class="form-control form-control2" placeholder="Enter tracking Number" required>
                        <div class="input-group-append">
                            <button type="button" class="search-btn">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="assets/js/handler.js"></script>