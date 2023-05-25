<?php
require 'config/session.php';
require 'config/config.php';
$err_array = array();
include 'includes/register_customer.php';
include 'includes/customer_login.php';

?>
<html lang="en" class="html-2">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Customer Login Page</title>
</head>
<body class="customer-body">
    <main class="content-box">
        <input type="checkbox" class="input-checkbox" id="input-checkbox" name="input-checkbox">
        <section class="sec_label">
            <label for="input-checkbox" class="ck-label"></label>
        </section>
        <div class="box-main">
            <div class="box-internal">
                <div class="box-sub-internal">
                    <div class="box-wrapper">
                        <h2>Login</h2>
                        <form action="customer_login.php" method="POST" id="login">
                            <div class="wrapper-input">
                                <input type="email" name="log_email" required>
                                <label for="email">Email</label>
                            </div>
                            <div class="wrapper-input">
                                <input type="password" class="input_field1" name="log_password" required>
                                <label for="password">Password</label>
                                <span class="input_icon-wrapper">
                                    <i class="input_icon1 ri-eye-off-line"></i>
                                </span>
                            </div>
                            <a href="customer_login.php">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                <input type="submit" name="login-btn" value="Login" class="login_btn">
                            </a>
                            <br>
                            <div class="error-message mg-tp">
                                <?php
                                    if (in_array("<span style='color: red;'>Email or Password was Incorrect</span><br>", $err_array)){
                                        echo "<span style='color: red;'>Email or Password was Incorrect</span><br>";
                                    }
                                ?>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="box-sub-internal2">
                    <div class="box-wrapper">
                        <h2>Register</h2>
                        <form action="includes/register_customer.php" method="POST" id="register">
                            <div class="wrapper-input">
                                <input type="text" name="reg_fname" required>
                                <label for="reg_fname">First Name</label>
                            </div>
                            <div class="wrapper-input">
                                <input type="text" name="reg_lname" required>
                                <label for="reg_lname">Last Name</label>
                            </div>
                            <div class="wrapper-input">
                                <input type="email" name="reg_email" required>
                                <label for="reg_email">Email</label>
                                <br>
                                <?php
                                if(in_array("<span style='color: red;'>Email already exists</span><br>", $err_array)){
                                        echo "<span style='color: red;'>Email already exists</span><br>";
                                }else if (in_array("<span style='color: red;'>Invalid Email Format</span><br>", $err_array)) {
                                        echo "<span style='color: red;'>Invalid Email Format</span><br>";
                                }
                                ?>
                            </div>
                            <div class="wrapper-input">
                                <input type="password" class="input_field2" name="reg_password1" required>
                                <label for="reg_password1">Password</label>
                                <span class="input_icon-wrapper">
                                    <i class="input_icon2 ri-eye-off-line"></i>
                                </span>
                                <br>
                                <?php if (in_array("<span style='color: red;'>Your Passwords do not Match</span><br>", $err_array)) {
                                    echo "<span style='color: red;'>Your Passwords do not Match</span><br>";
                                } else if (in_array("<span style='color: red;'>Password must contain one Uppercase letter and one Number</span><br>", $err_array)) {
                                    echo "<span style='color: red;'>Password must contain one Uppercase letter and one Number</span><br>";
                                } else if (in_array("<span style='color: red;'>Password must be between 8 and 32 characters</span><br>", $err_array)) {
                                    echo "<span style='color: red;'>Password must be between 8 and 32 characters</span><br>";
                                }
                                ?>
                            </div>
                            <div class="wrapper-input">
                                <input type="password" class="input_field3" name="reg_password2" required>
                                <label for="reg_password2">Confirm Password</label>
                                <span class="input_icon-wrapper">
                                    <i class="input_icon3 ri-eye-off-line"></i>
                                </span>
                            </div>
                            <input type="submit" name="reg_btn" value="Create An Account" class="login_btn">
                            <!-- <a href="#">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                
                            </a> -->
                            <br>
                            <div class="error-message mg-tp">
                                <?php if (in_array("<span style='color: #14C800;'>Account Created Successfully</span><br>", $err_array)) {
                                    echo "<span style='color: #14C800;'>Account Created Successfully</span><br>";
                                } ?>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </main>
    <script src="assets/js/passwd.js"></script>
</body>
</html>