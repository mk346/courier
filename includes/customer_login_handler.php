<?php
$err_array = array();
if(isset($_POST['log_btn'])){
    $email = filter_var($_POST['log_email'], FILTER_SANITIZE_EMAIL);
    $_SESSION['log_email'] = $email;

    $tracking_number = $_POST['track_no'];
    $check_db = mysqli_query($con, "SELECT * FROM parcels WHERE semail = '$email' OR remail = '$email' AND reference_number = '$tracking_number'");
    $check_login_query = mysqli_num_rows($check_db);

    if($check_login_query == 1){
        $row = mysqli_fetch_array($check_db);
        $username = $row['sname'];
        $_SESSION['sname'] = $username;
        header("location: home.php");
        exit();
    }else{
        array_push($err_array, "<span style='color: red;'>Email or Tracking Number was Incorrect</span><br>");
    }
}



?>