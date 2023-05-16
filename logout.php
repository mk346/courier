<?php
session_destroy();
//ob_end_flush();
foreach($_SESSION as $key => $value){
    unset($_SESSION[$key]);
    $_SESSION['username'] = "";
    $_SESSION['password'] = "";

}
header("location: login.php");


?>