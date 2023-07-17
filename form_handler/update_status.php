<?php
require '../config/pdo.php';
require '../config/config.php';
include ("mail_config.php");

//set timezone
$timezone = date_default_timezone_set("Africa/Nairobi");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


//update status
if (isset($_POST['status'])){
    $id = $_POST['id'];
    $a = $_POST['status'];
    $date_updated = date("Y-m-d H:i:s");

    // update status
    $update = $con->query("UPDATE parcels SET status='$a' WHERE parcel_id = '$id'");


    // fetch data from database
    $query = $con->query("SELECT * FROM parcels WHERE parcel_id ='$id'");
    while ($rows = $query->fetch_assoc()) {
        $sender_name = $rows['sname'];
        $sender_mail = $rows['semail'];
        $receiver_name = $rows['rname'];
        $receiver_mail = $rows['remail'];
        $status = $rows['status'];
        $date_dispatched = $rows['date_created'];
        $date_arrived = $rows['status_date'];

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

        // send mail to customers
        if($status == 0){
            $mail->setFrom('ontimecourier742@gmail.com', $name = 'ontimecourier742@gmail.com', auto: false);
            $mail->addAddress($sender_mail);
            $mail->isHTML(true);
            $mail->Subject = 'Ontime Courier Services';
            $mail->Body = 'Dear ' . ' ' . $sender_name . ' ' . 'Your Parcel is has been Accepted by the Courier' . '<br>' . ' ' . 'Thank You for choosing Ontime Courier.';
            $mail->send();

            $mail->setFrom('ontimecourier742@gmail.com', $name = 'ontimecourier742@gmail.com', auto: false);
            $mail->addAddress($receiver_mail);
            $mail->isHTML(true);
            $mail->Subject = 'Ontime Courier Services';
            $mail->Body = 'Dear ' . ' ' . $receiver_name . ' ' . 'A Parcel has been Sent to You by '. ' '. $sender_name .' '. 'We will let you know once it arrives at the desired destination'. '<br>' . ' ' . 'Thank You for choosing Ontime Courier.';
            $mail->send();
        }else if ($status == 1) {
            $mail->setFrom('ontimecourier742@gmail.com', $name = 'ontimecourier742@gmail.com', auto: false);
            $mail->addAddress($sender_mail);
            $mail->isHTML(true);
            $mail->Subject = 'Ontime Courier Services';
            $mail->Body = 'Dear ' . ' ' . $sender_name . ' ' . 'Your Parcel is has been Collected' . '<br>' . ' ' . 'Thank You for choosing Ontime Courier.';
            $mail->send();

            //update status date
            $date_updated = date("Y-m-d H:i:s");
            $update = $con->query("UPDATE parcels SET status_date='$date_updated' WHERE parcel_id = '$id'");
        } else if ($status == 2) {
            $mail->setFrom('ontimecourier742@gmail.com', $name = 'ontimecourier742@gmail.com', auto: false);
            $mail->addAddress($sender_mail);
            $mail->isHTML(true);
            $mail->Subject = 'Ontime Courier Services';
            $mail->Body = 'Dear ' . ' ' . $sender_name . ' ' . 'Your Parcel is has been Dispatched to its Destination' . '<br>' . ' ' . 'Thank You for choosing Ontime Courier.';
            $mail->send();

            //update status date
            $date_updated = date("Y-m-d H:i:s");
            $update = $con->query("UPDATE parcels SET status_date='$date_updated' WHERE parcel_id = '$id'");
        } else if ($status == 3) {
            $mail->setFrom('ontimecourier742@gmail.com', $name = 'ontimecourier742@gmail.com', auto: false);
            $mail->addAddress($sender_mail);
            $mail->isHTML(true);
            $mail->Subject = 'Ontime Courier Services';
            $mail->Body = 'Dear ' . ' ' . $sender_name . ' ' . 'Your Parcel is has arrived at its Destination' . '<br>' . ' ' . 'Thank You for choosing Ontime Courier.';
            $mail->send();

            $mail->setFrom('ontimecourier742@gmail.com', $name = 'ontimecourier742@gmail.com', auto: false);
            $mail->addAddress($receiver_mail);
            $mail->isHTML(true);
            $mail->Subject = 'Ontime Courier Services';
            $mail->Body = 'Dear ' . ' ' . $receiver_name . ' ' . 'Your Parcel is has arrived at its Destination and is ready for Pickup. Kindly come with your Original ID card.' . '<br>' . ' ' . 'Thank You for choosing Ontime Courier.';
            $mail->send();

            //update status date
            $date_updated = date("Y-m-d H:i:s");
            $update = $con->query("UPDATE parcels SET status_date='$date_updated' WHERE parcel_id = '$id'");
        } else if ($status == 4) {
            $mail->setFrom('ontimecourier742@gmail.com', $name = 'ontimecourier742@gmail.com', auto: false);
            $mail->addAddress($sender_mail);
            $mail->isHTML(true);
            $mail->Subject = 'Ontime Courier Services';
            $mail->Body = 'Dear ' . ' ' . $sender_name . ' ' . 'Your Parcel is has been handed over to the Receiver Successfully' . '<br>' . ' ' . 'Thank You for choosing Ontime Courier.';
            $mail->send();

            // update delivery date
            $date_updated = date("Y-m-d H:i:s");
            $update = $con->query("UPDATE parcels SET status_date='$date_updated' WHERE parcel_id = '$id'");
        } else if ($status == 5) {
            $mail->setFrom('ontimecourier742@gmail.com', $name = 'ontimecourier742@gmail.com', auto: false);
            $mail->addAddress($receiver_mail);
            $mail->isHTML(true);
            $mail->Subject = 'Ontime Courier Services';
            $mail->Body = 'Dear ' . ' ' . $receiver_name . ' ' . 'Your Parcel is ready for pick-up. Kindly Come with your original ID card' . '<br>' . ' ' . 'Thank You for choosing Ontime Courier.';
            $mail->send();

            //update status date
            $date_updated = date("Y-m-d H:i:s");
            $update = $con->query("UPDATE parcels SET status_date='$date_updated' WHERE parcel_id = '$id'");
        } else if ($status == 6) {
            $mail->setFrom('ontimecourier742@gmail.com', $name = 'ontimecourier742@gmail.com', auto: false);
            $mail->addAddress($sender_mail);
            $mail->isHTML(true);
            $mail->Subject = 'Ontime Courier Services';
            $mail->Body = 'Dear ' . ' ' . $sender_name . ' ' . 'Your Parcel is has been Delivered' . '<br>' . ' ' . 'Thank You for choosing Ontime Courier.';
            $mail->send();

            // update delivery date
            $date_updated = date("Y-m-d H:i:s");
            $update = $con->query("UPDATE parcels SET status_date='$date_updated' WHERE parcel_id = '$id'");
        } else if ($status == 7) {
            $mail->setFrom('ontimecourier742@gmail.com', $name = 'ontimecourier742@gmail.com', auto: false);
            $mail->addAddress($sender_mail);
            $mail->isHTML(true);
            $mail->Subject = 'Ontime Courier Services';
            $mail->Body = 'Dear ' . ' ' . $sender_name . ' ' . 'Your Parcel is has been Delivered Successfully' . '<br>' . ' ' . 'Thank You for choosing Ontime Courier.';
            $mail->send();

            // update status date
            $date_updated = date("Y-m-d H:i:s");
            $update = $con->query("UPDATE parcels SET status_date='$date_updated' WHERE parcel_id = '$id'");
        } else if ($status == 8) {
            $mail->setFrom('ontimecourier742@gmail.com', $name = 'ontimecourier742@gmail.com', auto: false);
            $mail->addAddress($sender_mail);
            $mail->isHTML(true);
            $mail->Subject = 'Ontime Courier Services';
            $mail->Body = 'Dear ' . ' ' . $sender_name . ' ' . 'Your Parcel is has been Picked-Up' . '<br>' . ' ' . 'Thank You for choosing Ontime Courier.';
            $mail->send();

            // update status date
            $date_updated = date("Y-m-d H:i:s");
            $update = $con->query("UPDATE parcels SET status_date='$date_updated' WHERE parcel_id = '$id'");
        } else if ($status == 9) {
            $mail->setFrom('ontimecourier742@gmail.com', $name = 'ontimecourier742@gmail.com', auto: false);
            $mail->addAddress($sender_mail);
            $mail->isHTML(true);
            $mail->Subject = 'Ontime Courier Services';
            $mail->Body = 'Dear ' . ' ' . $sender_name . ' ' . 'Your Parcel is has not been Claimed' . '<br>' . ' ' . 'Thank You for choosing Ontime Courier.';
            $mail->send();

            // update status date
            $date_updated = date("Y-m-d H:i:s");
            $update = $con->query("UPDATE parcels SET status_date='$date_updated' WHERE parcel_id = '$id'");
        }


    }


}





?>