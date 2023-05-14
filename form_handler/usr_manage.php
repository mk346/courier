<?php
include '../config/config.php';

//new data to update database
$id = $_POST['memi'];
$a = $_POST['fname'];
$b = $_POST['lname'];
$c = $_POST['email'];
$d = $_POST['password'];
$e = date("Y-m-d");

//query to update the database
$update = $con->query("UPDATE users SET fname = '$a', lname = '$b', email = '$c', password = '$d', date_created = '$e' WHERE id = '$id'");

header("location: ../index.php");

?>