<?php
require '../config/pdo.php';
require '../config/config.php';
include ("mail_config.php");


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


//update status
$id = $_GET['parcel_id'];
//$id = $_POST['memi'];
$a = $_POST['status_update'];
echo $a;
$update = $con->query("UPDATE parcels SET status='$a' WHERE parcel_id = '$id'");

//redirect back to list_parcel page
// header("Location: ../list_parcel.php");




?>