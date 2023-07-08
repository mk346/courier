<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require("phpmailer/src/Exception.php");
require("phpmailer/src/PHPMailer.php");
require("phpmailer/src/SMTP.php");


// phpmailer configuration
$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'ontimecourier742@gmail.com';
$mail->Password = 'huquajsglqyticib';
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;


?>