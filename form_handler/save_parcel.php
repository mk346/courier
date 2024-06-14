<?php
require '../config/config.php';
require '../config/config.php';
include ("mail_config.php");


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;



//declare variables
$sname = "";
$saddress = "";
$scontact = "";
$semail = "";
$rname = "";
$raddress = "";
$rcontact = "";
$remail = "";
$type = "";
$pickup_br = "";
$delivery_loc = "";
$weight = "";
$charge = "";
$price = "";
$tax = 0;
$amount = 0;
$total = 0;
$VAT = 0.16;
$payment = "";
$error_array = array();
//$i = 0;
$reference_number = sprintf("%'012d", mt_rand(100000000, 9999999999999)); // generate a random reference number

$status = 0;
$date_created = date("Y-m-d H:i:s"); // get the current date and time

if(isset($_POST['save_parcel'])){
    $processed_br = $_POST['origin'];
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

    $semail = strip_tags($_POST['semail']); // strip html tags
    $_SESSION['semail'] = $semail; // store session variable

    $rname = strip_tags($_POST['rname']); // strip html tags
    $rname = ucwords($_POST['rname']); // capitalize every first letter
    $_SESSION['rname'] = $rname; // store session variable

    $raddress = strip_tags($_POST['raddress']); // strip html tags
    $raddress  = ucwords($_POST['raddress']); // capitalize every first letter
    $_SESSION['raddress'] = $raddress; // store session variable

    $rcontact = strip_tags($_POST['rcontact']); // strip html tags
    $_SESSION['rcontact'] = $rcontact; // store session variable

    $remail = strip_tags($_POST['remail']); // strip html tags
    $_SESSION['remail'] = $remail; // store session variable

    $type = strip_tags($_POST['type']);
    $_SESSION['type'] = $type;


    // $TEST = $_POST['origin'];
    // //$_SESSION['processed_br'] = $processed_br;
    // //echo $processed_br;



    $pickup_br = strip_tags($_POST['pickup_br']);
    $_SESSION['pickup_br'] = $pickup_br;

    $delivery_loc = strip_tags($_POST['delivery_loc']);
    $_SESSION['delivery_loc'] = $delivery_loc;


    $weight = strip_tags($_POST['weight']);
    $_SESSION['weight'] = $weight;
    $weight = intval($weight);

    if($weight <= 10){
        $price = $weight * 5;
    }else if($weight > 10){
        $price = ($weight - 10) * 10 + 5 * $weight;
    }

    // $price = strip_tags($_POST['price']);
    // $_SESSION['price'] = $price;
    // $price = intval($price);

    $charge = strip_tags($_POST['charge']);
    $_SESSION['charge'] = $charge;
    $charge = intval($charge);


    $amount = $charge + $price;
    $tax = $amount * $VAT;
    $total = $amount + $tax;

    $payment = strip_tags($_POST['payment']);
    $status_date = date("Y-m-d");

    //Validating phone number
    if(preg_match('/^[0-9]{10}+$/', $scontact)){
        $sender_phone = $scontact;
    }else{
        array_push($error_array, "<span style='color:red;'>Phone Number Must be atleast 10 Digits</span>");
    }
    if(preg_match('/^[0-9]{10}+$/', $rcontact)){
        $receiver_phone = $rcontact;
    }else{
        array_push($error_array, "<span style='color:red;'>Phone Number Must be atleast 10 Digits</span>");
    }



    // if no errors save data to db
    if(empty($error_array)){
        //sql query to save the data into the database
    $query = mysqli_query($con, "INSERT INTO parcels VALUES (NULL,'$sname','$saddress','$sender_phone','$semail','$rname','$raddress','$receiver_phone ','$remail','$type','$processed_br','$pickup_br','$delivery_loc','$weight','$charge','$price','$total','$payment','$reference_number',$status,'$date_created','$status_date')");

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

    $mail->setFrom('ontimecourier742@gmail.com', $name = 'ontimecourier742@gmail.com', auto:false);
    $mail->addAddress($semail);
    $mail->isHTML(true);
    $mail->Subject = 'Ontime Courier Services';
    $mail->Body = 'Dear '.' '. $sname .' '. 'Your Parcel has been processed successfully.'.'<br>'.'Use'.' '.$reference_number.' '.'to track of your parcel. Thank You for choosing Ontime Courier.';
    $mail->send();

    $mail->setFrom('ontimecourier742@gmail.com', $name = 'ontimecourier742@gmail.com', auto:false);
    $mail->addAddress($remail);
    $mail->isHTML(true);
    $mail->Subject = 'Ontime Courier Services';
    $mail->Body = 'Dear'.' '. $rname .' '. 'a parcel has been sent to you from'.' '. $saddress.' ' .'by ' . $sname .'<br>'.'Use '.' '.$reference_number.' '. 'to track of your parcel. Thank You for choosing Ontime Courier.';
    $mail->send();





    header('Location: ../list_parcel.php');

    }
}

?>
