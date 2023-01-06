<?php
//require("config/config.php");
//declaring variables
$err_array = array();
$email = "";
$password = "";
$username = "";

if(isset($_POST['submit'])){
    //cleaning input data before sending it to the database
    $email = strip_tags($_POST['email']); //strips html tags
    $email = filter_var($email,FILTER_SANITIZE_EMAIL); //sanitize email
    $_SESSION['email'] = $email;

    $password = md5($_POST['password']); // encrypt password

    // query the database to check if the user exists
    $check_database = mysqli_query($con, "SELECT * FROM users WHERE email = '$email' AND password = '$password'");
    $check_login_query = mysqli_num_rows($check_database);

    if($check_login_query == 1){
        $row = mysqli_fetch_array($check_database); //store database result in to an array
        $username = $row['fname'];
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        header("Location: index.php");
        exit();

    }
    else{
        array_push($err_array, "<span style='color: red;'>Email or Password was Incorrect</span><br>");
    }


}




?>