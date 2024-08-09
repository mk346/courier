<?php
require '../config/pdo.php';
require '../config/config.php';
require '../check_login.php';
include ("mail_config.php");


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$VAT = 0.16;
$tax = 0;
$amount = 0;
$total = 0;
$reference_number = "";
$date_created = "";

//NEW DATA TO UPDATE THE DATABASE
$id = $_POST['memi'];
$a = $_POST['sname'];
$o = $_POST['semail'];
$b = $_POST['saddress'];
$c = $_POST['scontact'];
$d = $_POST['rname'];
$p = $_POST['remail'];
$e = $_POST['raddress'];
$f = $_POST['rcontact'];
$g = $_POST['type'];
$h = $_POST['status'];
$i = $_POST['origin'];
$j = $_POST['pickup_br'];
$k = $_POST['delivery_loc'];
$l = $_POST['weight'];
$l = intval($l);
$m = $_POST['price'];
$m = intval($m);
$n = $_POST['charge'];
$n = intval($n);
$amount = $n + ($l * $m);
$tax = $amount * $VAT;
$total = $amount + $tax;
$payment = strip_tags($_POST['payment']);
$reference_number;
$date_created = date("Y-m-d");


//mail configuration
$mail = new PHPMailer(true);

$mail->isSMTP();
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'ontimecourier742@gmail.com';
$mail->Password = 'huquajsglqyticib';
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;


//fetch branch id from database
$my_query = "SELECT id FROM branch WHERE street = '$j' ";
$result = mysqli_query($con, $my_query);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $branch_id = $row['id'];

//update status
$update = $con->query("UPDATE parcels SET sname='$a' ,semail='$o',saddress='$b',scontact ='$c',rname='$d', remail='$p' ,raddress='$e',rcontact='$f',type='$g',status='$h',processed_br='$i',pickup_br='$j',deliver_loc='$k',weight='$l',charge='$n',price='$m',amount='$total',payment='$payment',date_created='$date_created',branch_id='$branch_id' WHERE parcel_id = '$id'");


} else {
    echo 'branch not found';
}

//redirect to this page
header("Location: ../list_parcel.php");



?>