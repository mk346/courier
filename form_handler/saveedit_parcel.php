<?php
require '../config/pdo.php';
require '../config/config.php';
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
$i = $_POST['processed_br'];
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


//update status
$update = $con->query("UPDATE parcels SET sname='$a' ,semail='$o',saddress='$b',scontact ='$c',rname='$d', remail='$p' ,raddress='$e',rcontact='$f',type='$g',status='$h',processed_br='$i',pickup_br='$j',deliver_loc='$k',weight='$l',charge='$n',price='$m',amount='$total',date_created='$date_created' WHERE parcel_id = '$id'");

if ($h == 1){
    $mail->setFrom('ontimecourier742@gmail.com', $name = 'ontimecourier742@gmail.com', auto:false);
    $mail->addAddress($o);
    $mail->isHTML(true);
    $mail->Subject = 'Ontime Courier Services';
    $mail->Body = 'Dear '.' '. $a .' '. 'Your Parcel is has been Collected'.'<br>'.' '.'Thank You for choosing Ontime Courier.';
    $mail->send();
}
else if($h == 3){
    $mail->setFrom('ontimecourier742@gmail.com', $name = 'ontimecourier742@gmail.com', auto: false);
    $mail->addAddress($o);
    $mail->isHTML(true);
    $mail->Subject = 'Ontime Courier Services';
    $mail->Body = 'Dear ' . ' ' . $a . ' ' . 'Your Parcel is has been Dispatched to its Destination' . '<br>' . ' ' . 'Thank You for choosing Ontime Courier.';
    $mail->send();
}else if($h == 4){
    $mail->setFrom('ontimecourier742@gmail.com', $name = 'ontimecourier742@gmail.com', auto: false);
    $mail->addAddress($o);
    $mail->isHTML(true);
    $mail->Subject = 'Ontime Courier Services';
    $mail->Body = 'Dear ' . ' ' . $a . ' ' . 'Your Parcel is has arrived at its Destination' . '<br>' . ' ' . 'Thank You for choosing Ontime Courier.';
    $mail->send();

    $mail->setFrom('ontimecourier742@gmail.com', $name = 'ontimecourier742@gmail.com', auto: false);
    $mail->addAddress($p);
    $mail->isHTML(true);
    $mail->Subject = 'Ontime Courier Services';
    $mail->Body = 'Dear ' . ' ' . $d . ' ' . 'Your Parcel is has arrived at its Destination and is ready for Pickup. Kindly come with your Original ID card.' . '<br>' . ' ' . 'Thank You for choosing Ontime Courier.';
    $mail->send();
}else if($h == 5){
    $mail->setFrom('ontimecourier742@gmail.com', $name = 'ontimecourier742@gmail.com', auto: false);
    $mail->addAddress($o);
    $mail->isHTML(true);
    $mail->Subject = 'Ontime Courier Services';
    $mail->Body = 'Dear ' . ' ' . $a . ' ' . 'Your Parcel is has been handed over to the Receiver Successfully' . '<br>' . ' ' . 'Thank You for choosing Ontime Courier.';
    $mail->send();
}else if($h == 6){
    $mail->setFrom('ontimecourier742@gmail.com', $name = 'ontimecourier742@gmail.com', auto: false);
    $mail->addAddress($p);
    $mail->isHTML(true);
    $mail->Subject = 'Ontime Courier Services';
    $mail->Body = 'Dear ' . ' ' . $d . ' ' . 'Your Parcel is ready for pick-up. Kindly Come with your original ID card' . '<br>' . ' ' . 'Thank You for choosing Ontime Courier.';
    $mail->send();
}else if($h == 7){
    $mail->setFrom('ontimecourier742@gmail.com', $name = 'ontimecourier742@gmail.com', auto: false);
    $mail->addAddress($o);
    $mail->isHTML(true);
    $mail->Subject = 'Ontime Courier Services';
    $mail->Body = 'Dear ' . ' ' . $a . ' ' . 'Your Parcel is has been Delivered' . '<br>' . ' ' . 'Thank You for choosing Ontime Courier.';
    $mail->send();
}else if($h == 8){
    $mail->setFrom('ontimecourier742@gmail.com', $name = 'ontimecourier742@gmail.com', auto: false);
    $mail->addAddress($o);
    $mail->isHTML(true);
    $mail->Subject = 'Ontime Courier Services';
    $mail->Body = 'Dear ' . ' ' . $a . ' ' . 'Your Parcel is has been Delivered Successfully' . '<br>' . ' ' . 'Thank You for choosing Ontime Courier.';
    $mail->send();
}else if($h == 9){
    $mail->setFrom('ontimecourier742@gmail.com', $name = 'ontimecourier742@gmail.com', auto: false);
    $mail->addAddress($o);
    $mail->isHTML(true);
    $mail->Subject = 'Ontime Courier Services';
    $mail->Body = 'Dear ' . ' ' . $a . ' ' . 'Your Parcel is has been Picked-Up' . '<br>' . ' ' . 'Thank You for choosing Ontime Courier.';
    $mail->send();
}else if($h == 10){
    $mail->setFrom('ontimecourier742@gmail.com', $name = 'ontimecourier742@gmail.com', auto: false);
    $mail->addAddress($o);
    $mail->isHTML(true);
    $mail->Subject = 'Ontime Courier Services';
    $mail->Body = 'Dear ' . ' ' . $a . ' ' . 'Your Parcel is has not been Claimed' . '<br>' . ' ' . 'Thank You for choosing Ontime Courier.';
    $mail->send();
}
header("Location: ../list_parcel.php");



?>