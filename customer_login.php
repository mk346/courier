<html lang="en" class="html-2">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                                <input type="email" name="email" required>
                                <label for="email">Email</label>
                            </div>
                            <div class="wrapper-input">
                                <input type="password" name="password" required>
                                <label for="password">Password</label>
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
                                <input type="text" name="fname" required>
                                <label for="fname">First Name</label>
                            </div>
                            <div class="wrapper-input">
                                <input type="text" name="lname" required>
                                <label for="lname">Last Name</label>
                            </div>
                            <div class="wrapper-input">
                                <input type="email" name="email" required>
                                <label for="fname">Email</label>
                            </div>
                            <div class="wrapper-input">
                                <input type="password" name="password1" required>
                                <label for="fname">Password</label>
                            </div>
                            <div class="wrapper-input">
                                <input type="password" name="password2" required>
                                <label for="fname">Confirm Password</label>
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
</body>
</html>