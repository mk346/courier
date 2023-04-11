<?php
require 'config/config.php';
if (isset($_SESSION['username'])) {
    $userLoggedIn = $_SESSION['username'];
    $user_details_query = mysqli_query($con, "SELECT * FROM users WHERE fname='$userLoggedIn'");
    $user = mysqli_fetch_array($user_details_query);
} else {
    header("Location: login.php");
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/0fe3bc1f22.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Home</title>
</head>

<body>
    <div class="wrapper">
        <div class="sidebar">
            <h2 class="text">OnTime Courier</h2>
            <nav class="menus">
                <ul class="list">
                    <li class="flex">
                        <a href="#"><i class="fa-solid fa-gauge"></i>Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#" class="btn-1"><i class="fa-solid fa-code-branch"></i>Branch
                            <span class="fas fa-caret-down first"></span>
                        </a>
                        <ul class="show-1">
                            <li><a href="#"><i class="fas fa-caret-right"></i>Add New</a></li>
                            <li><a href="#"><i class="fas fa-caret-right"></i>List</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="btn-2"><i class="fa-solid fa-users"></i>Branch Staff
                            <span class="fas fa-caret-down second"></span>
                        </a>
                        <ul class="show-2">
                            <li><a href="#"><i class="fas fa-caret-right"></i>Add New</a></li>
                            <li><a href="#"><i class="fas fa-caret-right"></i>List</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="btn-3"><i class="fa-solid fa-box"></i>Parcels
                            <span class="fas fa-caret-down third"></span>
                        </a>
                        <ul class="show-3">
                            <li><a href="#"><i class="fas fa-caret-right"></i>Add New</a></li>
                            <li><a href="#"><i class="fas fa-caret-right"></i>List</a></li>
                            <li><a href="#"><i class="fas fa-caret-right"></i>Item Accepted</a></li>
                            <li><a href="#"><i class="fas fa-caret-right"></i>Collected</a></li>
                            <li><a href="#"><i class="fas fa-caret-right"></i>List</a></li>
                            <li><a href="#"><i class="fas fa-caret-right"></i>Shipped</a></li>
                            <li><a href="#"><i class="fas fa-caret-right"></i>In-Transit</a></li>
                            <li><a href="#"><i class="fas fa-caret-right"></i>Out of Delivery</a></li>
                            <li><a href="#"><i class="fas fa-caret-right"></i>Ready to Pickup</a></li>
                            <li><a href="#"><i class="fas fa-caret-right"></i>Delivered</a></li>
                            <li><a href="#"><i class="fas fa-caret-right"></i>Picked-Up</a></li>
                            <li><a href="#"><i class="fas fa-caret-right"></i>Unsuccessful Delivery</a></li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="fa-solid fa-magnifying-glass"></i>Track Parcel</a></li>
                    <li><a href="#"><i class="fa-solid fa-book"></i>Reports</a></li>
                </ul>
            </nav>
        </div>
        <div class="top-nav">
            <div class="bars">
                <span class="fas fa-bars menu-bars"></span>
            </div>
            <h4 class="mytitle">Courier Management System</h4>
            <a href="#" class="user-log">
                <i class="fa-solid fa-user logged-in"></i>Administrator
                <span class="fa fa-angle-down"></span>
                <ul class="user-menu">
                    <li><a href="#"><i class="fa-solid fa-gear"></i>Manage Account</a></li>
                    <li><a href="#"><i class="fa-solid fa-power-off"></i>Log Out</a></li>
                </ul>
            </a>
        </div>
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