<?php
require("config/config.php");
require("includes/login_handler.php");
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://kit.fontawesome.com/0fe3bc1f22.js" crossorigin="anonymous"></script>
    <title>Login Page</title>
</head>
<body>
    <section class="admin-login">
        <div class="login-wrapper">
            <div class="wrapper-title">
                <span>Courier Management System</span>
            </div>
            <form action="login.php" method="POST" class="wrapper-form">
                <div class="wrapper-row">
                    <i class="fa-solid fa-envelope"></i>
                    <input type="email" name="email" class="input-type-1" value="<?php if (isset($_SESSION['email'])) echo $_SESSION['email']; ?>" placeholder="Email" required>
                </div>
                <div class="wrapper-row">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" class="input-type-1" value="<?php if (isset($_SESSION['password'])) echo $_SESSION['password']; ?>" placeholder="Password" required>
                </div>
                <div class="wrapper-row">
                    <p class="error-message"><?php if (in_array("<span style='color: red;'>Email or Password was Incorrect</span><br>", $err_array)) echo "<span style='color: red;'>Email or Password was Incorrect</span><br>"; ?></p>
                </div>
                <div class="wrapper-row row-button">
                    <input type="submit" name="submit" value="Login" class="submit-login-1">
                </div>
            </form>
        </div>

    </section>



</body>
</html>