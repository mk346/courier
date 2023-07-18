<?php
require 'config/session.php';
require 'config/config.php';
require 'includes/customer_login_handler.php';


?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script type="text/javascript"  src="assets/js/register.js"></script>
    <title>Customer Login Page</title>
</head>

<body class="customer-body">
    <div class="wrapper-div">
        <div class="login_box">
            <div class="login_header">
                <h1>ONTIME COURIER</h1>
                Login
            </div>
            <div id="first">
                <form action="customer_login.php" class="myform" method="POST">
                    <input type="email" name="log_email" class="input-1" placeholder="Enter Your Email Address" value="<?php
                    if (isset($_SESSION['log_email'])) {
                        echo $_SESSION['log_email'];
                    }
                    ?>" required>
                    <input type="password" name="track_no" value="<?php if (isset($_SESSION['track_no'])) //echo $_SESSION['track_no'] ?>" class="input-1 pass3"  placeholder="Enter Tracking Number">
                    <span class="show_pass3">
                        <i class="input_icon3 ri-eye-off-line"></i>
                    </span>
                    <br>
                    <?php if (in_array("<span style='color: red;'>Tracking Number was Incorrect</span><br>", $err_array)) echo "<span style='color: red;'>Tracking Number was Incorrect</span><br>"; ?>
                    <input type="submit" name="log_btn" class="btn-submit" value="Login">
                    <br>
                    <!-- <a href="#" id="signup" class="signup">Need an Account? Sign up Here!</a> -->
                </form>
            </div>
            <!-- <div id="second">
                <form action="customer_login.php" class="myform" method="POST">
                    <input type="text" name="reg_fname" class="input-1"  placeholder="First Name" value="<?php
                    //if (isset($_SESSION['reg_fname'])) {
                        //echo $_SESSION['reg_fname'];
                    //} ?>" required>
                    <br>
                    <?php //if (in_array("<span style='color: red;'>Your first name must be between 3 and 25 characters</span><br>", $err_array)) {
                        //echo "<span style='color: red;'>Your first name must be between 3 and 25 characters</span><br>";
                   //} ?>
                    <input type="text" name="reg_lname" class="input-1" placeholder="Last Name" value="<?php
                                                                                       // if (isset($_SESSION['reg_lname'])) {
                                                                                            //echo $_SESSION['reg_lname'];
                                                                                        //}
                                                                                        ?>" required>
                    <br>
                    <?php //if (in_array("<span style='color: red;'>Your last name must be between 3 and 25 characters</span><br>", $err_array)) {
                        //echo "<span style='color: red;'>Your last name must be between 3 and 25 characters</span><br>";
                    //} ?>
                    <input type="email" name="reg_email" class="input-1" placeholder="Your Email" value="<?php
                                                                                           // if (isset($_SESSION['reg_email'])) {
                                                                                               // echo $_SESSION['reg_email'];
                                                                                           // }
                                                                                            ?>" required>
                    <br>
                    <?php //if (in_array("<span style='color: red;'>Email already exists</span><br>", $err_array)) {
                        //echo "<span style='color: red;'>Email already exists</span><br>";
                    //}
                    //if (in_array("<span style='color: red;'>Invalid Email Format</span><br>", $err_array)) {
                        //echo "<span style='color: red;'>Invalid Email Format</span><br>";
                    //}
                    ?>
                    <input type="password" name="reg_password1" class="input-1 pass1" placeholder="Your Password" required>
                    <span class="show_pass2">
                        <i class="input_icon1 ri-eye-off-line"></i>
                    </span>
                    <br>
                    <?php //if (in_array("<span style='color: red;'>Your Passwords do not Match</span><br>", $err_array)) {
                        //echo "<span style='color: red;'>Your Passwords do not Match</span><br>";
                    //}//else if (in_array("<span style='color: red;'>Password must contain one Uppercase letter and one Number</span><br>", $err_array)) {
                            //echo "<span style='color: red;'>Password must contain one Uppercase letter and one Number</span><br>";
                    //}//else if (in_array("<span style='color: red;'>Password must be between 8 and 32 characters</span><br>", $err_array)) {
                        //echo "<span style='color: red;'>Password must be between 8 and 32 characters</span><br>";
                    //}
                    ?>
                    <input type="password" name="reg_password2" class="input-1 pass2" placeholder="Confirm Password" required>
                    <span class="show_pass">
                        <i class="input_icon2 ri-eye-off-line"></i>
                    </span>
                    <br>
                    <input type="submit" name="reg_btn" class="btn-submit" value="Register">
                    <br>
                    <?php //if (in_array("<span style='color: #14C800;'>Account Created Successfully</span><br>", $err_array)) {
                        //echo "<span style='color: #14C800;'>Account Created Successfully</span><br>";
                    //} ?>
                    <a href="#" id="sigin" class="signin">Already have an Account? Sign in Here!</a>
                </form>
            </div> -->
        </div>
    </div>
    <script src="assets/js/passwd.js"></script>
</body>

</html>