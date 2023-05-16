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
        echo $_SESSION['username'];
        $login_id =  $_SESSION['login_id'];
        //echo $userLoggedIn;
        ?>
        <span class="fa fa-angle-down"></span>
        <ul class="user-menu">
            <?php
            //$i = 1;
            $query = $con->query("SELECT * FROM users WHERE id = '$login_id' ");
            while ($row = $query->fetch_assoc()){
                $user_id = $row['id'];

            }
            ?>
            <li><a href="manage_account.php?&id=<?php echo $user_id ?>" id="manage-account"><i class="fa-solid fa-gear"></i>Manage Account</a></li>
            <li><a href="logout.php"><i class="fa-solid fa-power-off"></i>Log Out</a></li>
        </ul>
    </a>
</div>