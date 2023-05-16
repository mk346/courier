    <?php
    require 'config/session.php';
    require 'functions.php';
    require 'config/config.php';
    
    if (isset($_SESSION['username'])) {
        $userLoggedIn = $_SESSION['username'];
        //$id = $_SESSION['login_id'];
        $user_details_query = mysqli_query($con, "SELECT * FROM users WHERE fname='$userLoggedIn'");
        //echo $userLoggedIn;
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
                            <h3><?php echo $con->query("SELECT * FROM parcels")->num_rows; ?></h3>
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
                            <h3><?php echo $con->query("SELECT * FROM branch")->num_rows; ?></h3>
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
                            <h3><?php echo $con->query("SELECT * FROM users where role !=1")->num_rows;?></h3>
                            <p>Total Staff</p>
                        </div>
                        <div class="icon">
                            <i class="icon-fa fa fa-users"></i>
                        </div>
                    </div>
                </div>
                <?php
                $status_arr = array("Item Accepted By Courier", "Collected", "Shipped", "In-Transit", "Arrived At Destination", "Out of Delivery", "Ready for Pickup", "Delivered", "Picked-Up", "Unsuccessful Delivery Attempt") ;
                foreach($status_arr as $k => $v):
                ?>
                <div class="col">
                    <div class="small-box">
                        <div class="inner">
                            <h3><?php echo $con->query("SELECT * FROM parcels where status = {$k} ")->num_rows; ?></h3>
                            <p><?php echo $v; ?></p>
                        </div>
                        <div class="icon">
                            <i class="icon-fa fa-solid fa-box"></i>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

        </div>
    </div>

    <script src="assets/js/menu.js"></script>
    </body>

    </html>