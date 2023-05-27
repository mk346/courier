<?php
require 'config/config.php';
require 'includes/register_customer.php';
require 'includes/login_handler.php';
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/css/register.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script type="text/javascript"  src="assets/js/register.js"></script>
    <title>Customer Login Page</title>
</head>

<body class="customer-body">
    <?php
    if (isset($_POST['reg_btn'])) {
        echo '
        <script>
        $(document).ready(function() {
            $("#first").hide();
            $("#second").show();
        });
        </script>
        
        ';
    }
    ?>
    <div class="wrapper-box">
        <div class="login_box">
            <div class="login_header">
                <h1>ONTIME COURIER</h1>
                Login or Sign up
            </div>
            <div id="first">
                <form action="register.php" method="POST">
                    <input type="email" name="log_email" placeholder="Enter Your Email Address" value="<?php
                    if (isset($_SESSION['log_email'])) {
                        echo $_SESSION['log_email'];
                    }
                    ?>" required>
                    <br>
                    <input type="password" name="log_password" placeholder="Enter Your Password">
                    <br>
                    <?php if (in_array("<span style='color: red;'>Email or Password was Incorrect</span><br>", $err_array)) echo "<span style='color: red;'>Email or Password was Incorrect</span><br>"; ?>
                    <input type="submit" name="log_btn" value="Login">
                    <br>
                    <a href="#" id="signup" class="signup">Need an Account? Sign up Here!</a>
                </form>
            </div>
            <div id="second">
                <form action="register.php" method="POST">
                    <input type="text" name="reg_fname" placeholder="First Name" value="<?php
                    if (isset($_SESSION['reg_fname'])) {
                        echo $_SESSION['reg_fname'];
                    } ?>" required>
                    <br>
                    <?php if (in_array("<span style='color: red;'>Your first name must between 2 and 25 characters</span><br>", $err_array)) {
                        echo "<span style='color: red;'>Your first name must between 2 and 25 characters</span><br>";
                    } ?>
                    <input type="text" name="reg_lname" placeholder="Last Name" value="<?php
                                                                                        if (isset($_SESSION['reg_lname'])) {
                                                                                            echo $_SESSION['reg_lname'];
                                                                                        }
                                                                                        ?>" required>
                    <br>
                    <?php if (in_array("<span style='color: red;'>Your last name must between 2 and 25 characters</span><br>", $err_array)) {
                        echo "<span style='color: red;'>Your last name must between 2 and 25 characters</span><br>";
                    } ?>
                    <input type="email" name="reg_email" placeholder="Your Email" value="<?php
                                                                                            if (isset($_SESSION['reg_email'])) {
                                                                                                echo $_SESSION['reg_email'];
                                                                                            }
                                                                                            ?>" required>
                    <br>
                    <?php if (in_array("<span style='color: red;'>Email already exists</span><br>", $err_array)) {
                        echo "<span style='color: red;'>Email already exists</span><br>";
                    } else if (in_array("<span style='color: red;'>Invalid Email Format</span><br>", $err_array)) {
                        echo "<span style='color: red;'>Invalid Email Format</span><br>";
                    } else if (in_array("<span style='color: red;'>Emails dont Match</span><br>", $err_array)) {
                        echo "<span style='color: red;'>Emails dont Match</span><br>";
                    }
                    ?>
                    <input type="email" name="reg_email2" placeholder="Confirm Email" value="<?php
                                                                                                if (isset($_SESSION['reg_email2'])) {
                                                                                                    echo $_SESSION['reg_email2'];
                                                                                                }
                                                                                                ?>" required>
                    <br>
                    <input type="password" name="reg_password" placeholder="Your Password" required>
                    <br>
                    <?php if (in_array("<span style='color: red;'>Your Passwords do not Match</span><br>", $err_array)) {
                        echo "<span style='color: red;'>Your Passwords do not Match</span><br>";
                    } else if (in_array("<span style='color: red;'>Password Can only contain characters or numbers</span><br>", $err_array)) {
                        echo "<span style='color: red;'>Password Can only contain characters or numbers</span><br>";
                    } else if (in_array("<span style='color: red;'>Password must be between 8 and 32 characters</span><br>", $err_array)) {
                        echo "<span style='color: red;'>Password must be between 8 and 32 characters</span><br>";
                    }
                    ?>
                    <input type="password" name="reg_password2" placeholder="Confirm Password" required>
                    <br>
                    <input type="submit" name="reg_btn" value="Register">
                    <br>
                    <?php if (in_array("<span style='color: #14C800;'>Account Created Successfully</span><br>", $err_array)) {
                        echo "<span style='color: #14C800;'>Account Created Successfully</span><br>";
                    } ?>
                    <a href="#" id="sigin" class="signin">Already have an Account? Sign in Here!</a>
                </form>
            </div>
        </div>
    </div>
</body>

</html>