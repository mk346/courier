<?php
require '../config/session.php';
require '../config/config.php';
//variable neded
$ref_no = "";
$err_array = array();
$track_number;
$reference_number;

if (isset($_POST['submit'])) {
    $ref_no = strip_tags($_POST['track_no']);
    $qry2 = "SELECT * FROM parcels WHERE reference_number = '$ref_no'";
    $result = mysqli_query($con, $qry2);
    if ($result) {
        $rows = mysqli_num_rows($result);
        if ($rows > 0) {
            while ($rows = mysqli_fetch_assoc($result)) {
                $reference_number = $rows['reference_number'];
                $origin = $rows['saddress'];
                $destination = $rows['raddress'];

                $_SESSION['reference'] = $reference_number;
                $_SESSION['origin'] = $origin;
                $_SESSION['destination'] = $destination;
                echo $_SESSION['origin'];
                echo $_SESSION['destination'];
            }
            header("Location: ../customer_track.php");
        } else if ($rows <= 0) {
            array_push($err_array, "<span style='color: red;'>Tracking Number Not Found</span><br>");
            // $_SESSION['reference'] = "";
            // $_SESSION['origin'] = "";
            // $_SESSION['destination'] = "";
        }
    }
}
