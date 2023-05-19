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
                        <form action="#" method="POST" id="login">
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
                            <a href="#" type="submit">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                <input type="submit" name="login-btn" value="Login" class="login_btn">
                            </a>
                        </form>
                    </div>
                </div>
                <div class="box-sub-internal2">
                    <div class="box-wrapper">
                        <h2>Register</h2>
                        <form action="#" method="POST" id="register">
                            <div class="wrapper-input">
                                <input type="text" name="reg_fname" required>
                                <label for="fname">First Name</label>
                            </div>
                            <div class="wrapper-input">
                                <input type="text" name="reg_lname" required>
                                <label for="lname">Last Name</label>
                            </div>
                            <div class="wrapper-input">
                                <input type="email" name="reg_email" required>
                                <label for="fname">Email</label>
                            </div>
                            <div class="wrapper-input">
                                <input type="password" class="input_field2" name="reg_password1" required>
                                <label for="fname">Password</label>
                                <span class="input_icon-wrapper">
                                    <i class="input_icon2 ri-eye-off-line"></i>
                                </span>
                            </div>
                            <div class="wrapper-input">
                                <input type="password" class="input_field3" name="reg_password2" required>
                                <label for="fname">Confirm Password</label>
                                <span class="input_icon-wrapper">
                                    <i class="input_icon3 ri-eye-off-line"></i>
                                </span>
                            </div>
                            <a href="#">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                <input type="submit" name="reg-btn" value="Create An Account" class="login_btn">
                            </a>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </main>
    <script src="assets/js/passwd.js"></script>
</body>
</html>