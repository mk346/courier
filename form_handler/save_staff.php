<?php
//declare variables
$fname = "";
$lname = "";
$role = "";
$branch = "";
$email = "";
$password = "";
$dt = date("Y-m-d"); //gets the current date
$err_array = array();

if(isset($_POST['save_staff'])){
    $fname = strip_tags($_POST['fname']); //strip html tags
    $fname = str_replace(' ', '', $fname); //remove spaces
    $fname = ucfirst(strtolower($fname)); //capitalize first character
    $_SESSION['fname'] = $fname; //store sessesion variable

    $lname = strip_tags($_POST['lname']); //strip html tags
    $lname = str_replace(' ', '', $lname); //remove spaces
    $lname = ucfirst(strtolower($lname)); //capitalize first character
    $_SESSION['lname'] = $lname; //store sessesion variable

    $role = $_POST['role'];

    $branch = $_POST['branch'];

    $email = strip_tags($_POST['email']); //strip html tags
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL); //sanitize email
    $email = str_replace(' ', '', $email); //remove spaces
    $_SESSION['email'] = $email; //store sessesion variable

    $password = strip_tags($_POST['password']); //strip html tags
    $_SESSION['password'] = $password; //store sessesion variable

    $email_check = mysqli_query($con, "SELECT email FROM users WHERE email = '$email'");
    $q_result = mysqli_num_rows($email_check);
    //check if email already exists
    if($q_result > 0){
        array_push($err_array, "<span style='color:red;'>Email already Exists</span><br>");
    }
    
    //control password length
    if(strlen($password) > 32 || strlen($password) < 8){
        array_push($err_array, "<span style='color:red;'>Password must be between 32 and 8 characters</span><br>");
    }

    //if no errors exist continue to save the data to the database
    if(empty($err_array)){
        $password = md5($password); //encrypt password before saving

        $query = mysqli_query($con, "INSERT INTO users VALUES ('','$fname','$lname','$email','$password','$role','$branch','$dt')");

        //clear session data
        $_SESSION['fname'] = '';
        $_SESSION['lname'] = '';
        $_SESSION['role'] = '';
        $_SESSION['branch'] = '';
        $_SESSION['email'] = '';
        $_SESSION['password'] = '';

        header('Location: staff.php');
    }
}






?>