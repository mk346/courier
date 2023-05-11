<html>

<head>
    <title>Track Parcel</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script src="https://kit.fontawesome.com/0fe3bc1f22.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/style.css">
    <script type="module" src="assets/js/map.js"></script>
</head>
<?php
require 'config/config.php';
require 'config/pdo.php';
// include 'header.php';
include 'sidebar.php';
include 'topbar.php';
?>

<body>
    <div class="container-fluid">
        <div class="track-div">
            <div class="input-group">
                <form action="tracktest.php" method="POST">
                    <input type="search" name="track_no" class="form-control form-control2" id="ref_no" placeholder="Enter tracking Number" required>
                    <input type="submit" name="submit" class="search-btn" value="Track" id="track">
                    <br>
                </form>
            </div>
        </div>
        <div id="map"></div>
    </div>
    <script src="assets/js/handler.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB3OescahbXQEeGpLf3N61FwiIVSiIvaVk&callback=initMap&v=weekly" defer></script>
</body>
</html>