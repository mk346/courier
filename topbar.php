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
        //echo $userLoggedIn;
        ?>
        <span class="fa fa-angle-down"></span>
        <ul class="user-menu">
            <?php
            //$i = 1;
            $query = $con->query("SELECT * FROM users ORDER BY id DESC");
            // $i = mysqli_num_rows($query);
            // for($j = 0; $j = $i; $j++){
            //     while ($row = $query->fetch_assoc()) {
            //         $id = $row['id'];
            //     }

            // }

            ?>
                <li><a href="#" id="manage-account"><i class="fa-solid fa-gear"></i>Manage Account</a></li>
            <?php //endwhile; ?>
            <li><a href="logout.php"><i class="fa-solid fa-power-off"></i>Log Out</a></li>


        </ul>
    </a>
</div>