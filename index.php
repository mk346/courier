    <?php
    require 'config/session.php';
    require 'config/config.php';
    if (isset($_SESSION['username'])) {
        $userLoggedIn = $_SESSION['username'];
        $user_details_query = mysqli_query($con, "SELECT * FROM users WHERE fname='$userLoggedIn'");
        $user = mysqli_fetch_array($user_details_query);
    } else {
        header("Location: login.php");
    }
    ?>
    <?php include 'header.php'; ?>
    <div class="wrapper">
        <?php include 'sidebar.php' ?>
        <?php include 'topbar.php'; ?>
        <div class="sub-wrapper">
            <h1 class="main-header1">Dashboard</h1>
            <hr class="line">
        </div>
        <div class="container-1">
            <div class="row">
                <div class="col">
                    <div class="small-box">
                        <div class="inner">
                            <h3>6</h3>
                            <p>Total Parcels</p>
                        </div>
                        <div class="icon">
                            <i class="icon-fa fa fa-boxes"></i>
                        </div>
                    </div>

                </div>
                <div class="col">
                    <div class="small-box">
                        <div class="inner">
                            <h3>3</h3>
                            <p>Total Branches</p>
                        </div>
                        <div class="icon">
                            <i class="icon-fa fa fa-building"></i>
                        </div>
                    </div>

                </div>
                <div class="col">
                    <div class="small-box">
                        <div class="inner">
                            <h3>5</h3>
                            <p>Total Staff</p>
                        </div>
                        <div class="icon">
                            <i class="icon-fa fa fa-users"></i>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="small-box">
                        <div class="inner">
                            <h3>10</h3>
                            <p>Items Accepted by Courier</p>
                        </div>
                        <div class="icon">
                            <i class="icon-fa fa-solid fa-box"></i>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="small-box">
                        <div class="inner">
                            <h3>9</h3>
                            <p>Collected</p>
                        </div>
                        <div class="icon">
                            <i class="icon-fa fa-solid fa-box"></i>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="small-box">
                        <div class="inner">
                            <h3>3</h3>
                            <p>Shipped</p>
                        </div>
                        <div class="icon">
                            <i class="icon-fa fa-solid fa-truck-fast"></i>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="small-box">
                        <div class="inner">
                            <h3>15</h3>
                            <p>In-Transit</p>
                        </div>
                        <div class="icon">
                            <i class="icon-fa fa-solid fa-truck"></i>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="small-box">
                        <div class="inner">
                            <h3>10</h3>
                            <p>Arrived at Destination</p>
                        </div>
                        <div class="icon">
                            <i class="icon-fa fa-solid fa-plane-arrival"></i>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="small-box">
                        <div class="inner">
                            <h3>5</h3>
                            <p>Out of Delivery</p>
                        </div>
                        <div class="icon">
                            <i class="icon-fa fa-solid fa-truck"></i>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="small-box">
                        <div class="inner">
                            <h3>20</h3>
                            <p>Ready For Pickup</p>
                        </div>
                        <div class="icon">
                            <i class="icon-fa fa-solid fa-box-tissue"></i>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="small-box">
                        <div class="inner">
                            <h3>8</h3>
                            <p>Delivered</p>
                        </div>
                        <div class="icon">
                            <i class="icon-fa fa fa-boxes"></i>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="small-box">
                        <div class="inner">
                            <h3>3</h3>
                            <p>Picked Up</p>
                        </div>
                        <div class="icon">
                            <i class="icon-fa fa-solid fa-box"></i>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="small-box">
                        <div class="inner">
                            <h3>0</h3>
                            <p>Unsuccessfull Delivery Attempt</p>
                        </div>
                        <div class="icon">
                            <i class="icon-fa fa-solid fa-truck"></i>
                        </div>
                    </div>
                </div>


            </div>

        </div>
    </div>

    <script src="assets/js/menu.js"></script>
    </body>

    </html>