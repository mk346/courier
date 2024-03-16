<?php
$timezone = date_default_timezone_set("Africa/Nairobi");
$con = mysqli_connect("127.0.0.1:3307", "caleb", "Apple@1mango", "courier");
//$con = mysqli_connect("localhost", "root", "", "courier");
if (mysqli_connect_errno()){
    echo "Failed to connect". mysqli_connect_errno();
}
?>