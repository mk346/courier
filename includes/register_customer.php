<?php
// require '../config/session.php';
// require '../config/config.php';
//variable declaration
$fname = "";
$lname = "";
$email = "";
$password1 = "";
$password2 = "";
$err_array = array();
$reg_date = date("Y-m-d"); //gets the current date

if(isset($_POST['reg_btn'])){
    $fname = strip_tags($_POST['reg_fname']);
    $fname = str_replace(' ', '',$fname);
    $fname = ucfirst(strtolower($fname));
    $_SESSION['reg_fname'] = $fname;

    $lname = strip_tags($_POST['reg_lname']);
    $lname = str_replace(' ', '',$lname);
    $lname = ucfirst(strtolower($lname));
    $_SESSION['reg_lname'] = $lname;

    $email = strip_tags($_POST['reg_email']);
    $email = str_replace(' ', '',$email);
    $_SESSION['reg_email'] = $email;

    $password1 = strip_tags($_POST['reg_password1']);
    $password1 = str_replace(' ', '',$password1);
    $_SESSION['password1'] = $password1;

    $password2 = strip_tags($_POST['reg_password2']);
    $password2 = str_replace(' ', '',$password2);
    $_SESSION['password2'] = $password2;

    //set password strength
    $uppercase = preg_match('@[A-Z]@', $password1); // uppercase check
    $number    = preg_match('@[0-9]@', $password1); // number check


    //validate email before saving
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);

        //check if email exists

        $e_check = mysqli_query($con, "SELECT email FROM customers WHERE email='$email'");

        $num_rows = mysqli_num_rows($e_check);
        if($num_rows > 0){
            array_push($err_array, "<span style='color: red;'>Email already exists</span><br>");
        }
    }else{
        array_push($err_array, "<span style='color: red;'>Invalid Email Format</span><br>");
    }

    //validate first name and last name
    if(strlen($fname) > 25 || strlen($fname) < 3 ){
        array_push($err_array, "<span style='color: red;'>Your first name must be between 3 and 25 characters</span><br>");
    }
    if(strlen($lname) > 25 || strlen($lname) < 3 ){
        array_push($err_array, "<span style='color: red;'>Your last name must be between 3 and 25 characters</span><br>");
    }

    //check if passwords match
    if($password1 != $password2){
        array_push($err_array, "<span style='color: red;'>Your Passwords do not Match</span><br>");
    }else {
        //check password strength
        if(!$uppercase || !$number){
            array_push($err_array, "<span style='color: red;'>Password must contain one Uppercase letter and one Number</span><br>");
        }
    }
    //check password length
    if(strlen($password1) > 32 || strlen($password1) < 8){
        array_push($err_array, "<span style='color: red;'>Password must be between 8 and 32 characters</span><br>");
    }
    if(empty($err_array)){
        //encrypt password
        $password1 = md5($password1);

        $query = mysqli_query($con, "INSERT INTO customers VALUES('','$fname','$lname','$email','$password1','$reg_date')");

        array_push($err_array, "<span style='color: #14C800;'>Account Created Successfully</span><br>");

        //clear session variables
        $_SESSION['fname'] = "";
        $_SESSION['lname'] = "";
        $_SESSION['email'] = "";
        $_SESSION['password1'] = "";
        $_SESSION['password2'] = "";

        
    }
}



?>