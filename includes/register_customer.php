<?php

//variable declaration
$fname = "";
$lname = "";
$email = "";
$password1 = "";
$password2 = "";
$err_array = array();
$reg_date = date("Y-m-d"); //gets the current date

if(isset($_POST['reg-btn'])){
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
    $_SESSION['reg_password1'] = $password1;

    $password2 = strip_tags($_POST['reg_password2']);
    $password2 = str_replace(' ', '',$password2);
    $_SESSION['reg_password2'] = $password2;

    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);

        //check if email exists
    }






}



?>