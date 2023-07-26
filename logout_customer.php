<?php
session_destroy(); // destroy session
//ob_end_flush();

// clear session cache
foreach($_SESSION as $key => $value){
    unset($_SESSION[$key]);
    $_SESSION['log_email'] = "";
    $_SESSION['track_no'] = "";

}
header("location: customer_login.php");
