<?php
$timezone = date_default_timezone_set("Africa/Nairobi");
$con = mysqli_connect("localhost", "root", "Apple@1mango", "courier");
if (mysqli_connect_errno()){
    echo "Failed to connect". mysqli_connect_errno();
}
?>