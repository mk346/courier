<?php


?>
<div class="top-nav" id="top-bar">
    <div class="bars">
        <span class="fas fa-bars menu-bars"></span>
    </div>
    <h4 class="mytitle">Courier Management System</h4>
    <a href="#" class="user-log">
        <i class="fa-solid fa-user logged-in"></i>
        <?php
        //echo $_SESSION['username'];
        //$login_id =  $_SESSION['login_id'];
        //echo $userLoggedIn;
        ?>
        <span class="fa fa-angle-down">
            <li><a href="logout.php"><i class="fa-solid fa-power-off"></i>Log Out</a></li>
        </span>
        <ul class="user-menu">
            <li><a href="#" id="manage-account"><i class="fa-solid fa-gear"></i>Manage Account</a></li>
            <li><a href="logout.php"><i class="fa-solid fa-power-off"></i>Log Out</a></li>
        </ul>
    </a>
</div>