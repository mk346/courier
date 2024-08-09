<?php
require 'config/session.php';
require 'config/config.php';
require 'check_login.php';
include 'header.php';
include 'sidebar.php';
include 'topbar.php';
require 'form_handler/save_staff.php';
$street = "";
$city="";
$options ="";
?>
<div class="sub-wrapper2">
    <h1 class="main-header1">New Staff</h1>
    <hr class="line">
</div>
<div class="container-fluid">
    <div class="col-3">
        <div class="card-1 card-outline card-primary">
            <div class="card-body">
                <form action="new_staff.php" method="POST">
                    <div class="row">
                        <div class="form-col2">
                            <div class="row">
                                <div class="form-group2 form-col2">
                                    <label for class="control-label">First Name</label>
                                    <input type="text" name="fname" id="" class="form-control" required>
                                </div>
                                <div class="form-group2 form-col2">
                                    <label for class="control-label">Last Name</label>
                                    <input type="text" name="lname" id="" class="form-control" required>
                                </div>
                                <div class="form-group2 form-col2">
                                    <label for class="control-label">User Role</label>
                                    <select name="role" id="" class="form-control" required>
                                        <option value="#">User Role</option>
                                        <option value="1">1 - Admin</option>
                                        <option value="2">2 - Normal</option>
                                    </select>
                                </div>
                                <div class="form-group2 form-col2">
                                    <?php
                                    //extract data from database
                                    $query = "SELECT street,city FROM branch ORDER BY id DESC";
                                    $result = mysqli_query($con, $query);
                                    ?>
                                    <label for class="control-label">Select Branch</label>
                                    <select name="branch" id="" class="form-control" required>
                                        <?php
                                            if (mysqli_num_rows($result) > 0) {
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                echo '<option value="' . htmlspecialchars($row["street"]) . '">' .htmlspecialchars($row["street"]) .' - '.htmlspecialchars($row["city"]) . '</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group2 form-col2">
                                    <label for class="control-label">Email</label>
                                    <input type="email" name="email" id="" class="form-control" required>
                                    <?php
                                    if (in_array("<span style='color:red;'>Email already Exists</span><br>", $err_array)){
                                        echo "<span style='color:red;'>Email already Exists</span><br>";
                                    }
                                    ?>
                                </div>
                                <div class="form-group2 form-col2">
                                    <label for class="control-label">Password</label>
                                    <input type="password" name="password" id="" class="form-control" required>
                                    <?php
                                if (in_array("<span style='color:red;'>Password must be between 32 and 8 characters</span><br>", $err_array)) {
                                    echo "<span style='color:red;'>Password must be between 32 and 8 characters</span><br>";
                                }
                                    ?>
                                </div>
                            </div>
                            <hr class="line3">
                            <div class="col-2">
                                <input type="submit" name="save_staff" value="Save" class="btn1">
                                <a href="staff.php" class="btn2">Cancel</a>
                            </div>

                        </div>
                    </div>
                </form>
            </div>


        </div>
    </div>
</div>


<script src="assets/js/handler.js"></script>