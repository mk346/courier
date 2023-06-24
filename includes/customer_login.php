<?php
if(isset($_POST['log_btn'])){
    $email = filter_var($_POST['log_email'], FILTER_SANITIZE_EMAIL);
    $_SESSION['log_email'] = $email;

    $passwd = md5($_POST['log_password']);
    $check_db = mysqli_query($con, "SELECT * FROM customers WHERE email = '$email' AND password1 = '$passwd'");
    $check_login_query = mysqli_num_rows($check_db);

    if($check_login_query == 1){
        $row = mysqli_fetch_array($check_db);
        $username = $row['fname'];
        $_SESSION['fname'] = $username;
        header("location: home.php");
        exit();
    }else{
        array_push($err_array, "<span style='color: red;'>Email or Password was Incorrect</span><br>");
    }
}



?>