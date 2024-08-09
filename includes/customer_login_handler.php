<?php
//decalare variables
$email = '';
$tracking_number = '';
$err_array = array();
if(isset($_POST['log_btn'])){
    $email = filter_var($_POST['log_email'], FILTER_SANITIZE_EMAIL);
    $_SESSION['log_email'] = $email;

    $tracking_number = strip_tags($_POST['track_no']);
    $_SESSION['track_no'] = $tracking_number;
    
    $check_db = mysqli_query($con, "SELECT * FROM parcels WHERE reference_number = '$tracking_number' AND semail='$email'");
    $check_login_query = mysqli_num_rows($check_db);

    if($check_login_query == 1){
        $row = mysqli_fetch_array($check_db);
        $track_no = $row['reference_number'];

        //store session data
        $_SESSION['reference_number'] = $track_no;
        //$_SESSION['track_no'] = $track_no;

        //echo $_SESSION['reference_number'];
        //echo $_SESSION['track_no'];

        header("location: home.php"); //redirect to home page
        exit();
    }else{
        array_push($err_array, "<span style='color: red;'>Tracking Number was Incorrect</span><br>");
    }
}



?>