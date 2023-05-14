<?php
require 'config/config.php';

if (isset($_SESSION['username'])) {
    $userLoggedIn = $_SESSION['username'];
    $user_details_query = mysqli_query($con, "SELECT * FROM users WHERE fname='$userLoggedIn'");
    //echo $userLoggedIn;
    $user = mysqli_fetch_array($user_details_query);
} else {
    header("Location: login.php");
}

?>