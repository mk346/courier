<?php
require '../config/config.php';
require '../config/config.php';
//declare variables
$sname = "";
$saddress = "";
$scontact = "";
$rname = "";
$raddress = "";
$rcontact = "";
$type = "";
$processed_br = "";
$pickup_br = "";
$delivery_loc = "";
$weight = "";
$height = "";
$length = "";
$width = "";
$price = "";
$amount = "";
$VAT = 0.16;
//$i = 0;
$reference_number = sprintf("%'012d", mt_rand(100000000, 9999999999999)); // generate a random reference number

$status = "";
$date_created = date("Y-m-d"); // get the current date

// clean the data before saving
$sname = strip_tags($_POST['sname']); // strip html tags
$sname = ucwords($_POST['sname']); // capitalize every first letter
$_SESSION['sname'] = $sname; // store session variable

$saddress = strip_tags($_POST['saddress']); // strip html tags
$saddress  = ucwords($_POST['saddress']); // capitalize every first letter
$_SESSION['saddress'] = $saddress; // store session variable

$scontact = strip_tags($_POST['scontact']); // strip html tags
$scontact   = ucwords($_POST['scontact']); // capitalize every first letter
$_SESSION['scontact'] =$scontact; // store session variable

$rname = strip_tags($_POST['rname']); // strip html tags
$rname = ucwords($_POST['rname']); // capitalize every first letter
$_SESSION['rname'] = $rname; // store session variable

$raddress = strip_tags($_POST['raddress']); // strip html tags
$raddress  = ucwords($_POST['raddress']); // capitalize every first letter
$_SESSION['raddress'] = $raddress; // store session variable

$rcontact = strip_tags($_POST['rcontact']); // strip html tags
$_SESSION['rcontact'] = $rcontact; // store session variable

$type = strip_tags($_POST['type']);
$_SESSION['type'] = $type;

$processed_br = strip_tags($_POST['processed_br']);
$_SESSION['processed_br'] = $processed_br;

$pickup_br = strip_tags($_POST['pickup_br']);
$_SESSION['pickup_br'] = $pickup_br;

$delivery_loc = strip_tags($_POST['delivery_loc']);
$_SESSION['delivery_loc'] = $delivery_loc;


$weight = strip_tags($_POST['weight']);
$_SESSION['weight'] = $weight;

$height = strip_tags($_POST['height']);
$_SESSION['height'] = $height;

$length = strip_tags($_POST['length']);
$_SESSION['length'] = $length;

$width = strip_tags($_POST['width']);
$_SESSION['width'] = $width;

$price = strip_tags($_POST['price']);
$_SESSION['price'] = $price;

$amount = $price + ($price * $VAT);




//sql query to save the data into the database
$query = mysqli_query($con, "INSERT INTO parcels VALUES ('','$sname','$saddress','$scontact','$rname','$raddress','$rcontact','$type','$processed_br','$pickup_br','$delivery_loc','$weight','$height','$length','$width','$price','$amount','$reference_number','','$date_created')");



header('Location: ../list_parcel.php');

?>