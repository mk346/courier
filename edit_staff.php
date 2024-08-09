<?php
require 'config/session.php';
require 'config/pdo.php';
require 'config/config.php';
require 'check_login.php';
include 'header.php';
include 'sidebar.php';
include 'topbar.php';
$id = $_GET['id'];
$result = $db_con->prepare("SELECT fname,lname,email,password,role,date_created FROM users WHERE id = :id");
$result->bindParam(':id', $id);
$result->execute();
$options = "";
$err_array = array();
for ($i = 0; $row = $result->fetch(); $i++) {
?>
    <div class="sub-wrapper2">
        <h1 class="main-header1">Edit Staff</h1>
        <hr class="line">
    </div>
    <div class="container-fluid">
        <div class="col-3">
            <div class="card-1 card-outline card-primary">
                <div class="card-body">
                    <form action="form_handler/saveedit_staff.php" method="POST" id="edit_staff">

                        <div class="row">
                            <div class="form-col2">
                                <div class="row">
                                    <div class="form-group2 form-col2">
                                        <label for class="control-label">First Name</label>
                                        <input type="hidden" name="memi" value="<?php echo $id; ?>">
                                        <input type="text" name="fname" id="" class="form-control" value="<?php echo $row['fname'] ?>" required>
                                    </div>
                                    <div class="form-group2 form-col2">
                                        <label for class="control-label">Last Name</label>
                                        <input type="text" name="lname" id="" class="form-control" value="<?php echo $row['lname'] ?>" required>
                                    </div>
                                    <div class="form-group2 form-col2">
                                        <label for class="control-label">User Role</label>
                                        <select name="role" id="" class="form-control" required>
                                            <?php
                                            if ($row['role'] == 1){
                                                echo '<option value="' . htmlspecialchars($row["role"]) . '">' . htmlspecialchars("Admin").'</option>';
                                            }else if($row['role'] == 2){
                                                echo '<option value="' . htmlspecialchars($row["role"]) . '">' . htmlspecialchars("Normal") . '</option>';
                                            }
                                            ?>
                                            <!-- <option value="#">User Role</option>
                                            <option value="1">1 - Admin</option>
                                            <option value="2">2 - Normal</option> -->
                                        </select>
                                    </div>
                                    <div class="form-group2 form-col2">
                                        <?php
                                        //extract data from database
                                        $query = "SELECT street,city FROM branch ORDER BY id DESC";
                                        $result2 = mysqli_query($con, $query);
                                        ?>
                                        <label for class="control-label">Branch</label>
                                        <select name="branch" id="" class="form-control" required>
                                            <?php
                                            if (mysqli_num_rows($result2) > 0) {
                                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                                    echo '<option value="' . htmlspecialchars($row2["street"]) . '">' . htmlspecialchars($row2["street"]) . ' - ' . htmlspecialchars($row2["city"]) . '</option>';
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group2 form-col2">
                                        <label for class="control-label">Email</label>
                                        <input type="email" name="email" class="form-control" value="<?php echo $row['email'] ?>" required>
                                        <?php
                                        if (in_array("<span style='color:red;'>Email already Exists</span><br>", $err_array)) {
                                            echo "<span style='color:red;'>Email already Exists</span><br>";
                                        }
                                        ?>
                                    </div>
                                    <div class="form-group2 form-col2">
                                        <label for class="control-label">Password</label>
                                        <input type="password" name="password" class="form-control" value="<?php echo $row['password'] ?>" required>
                                        <?php
                                        if (in_array("<span style='color:red;'>Password must be between 32 and 8 characters</span><br>", $err_array)) {
                                            echo "<span style='color:red;'>Password must be between 32 and 8 characters</span><br>";
                                        }
                                        ?>
                                    </div>
                                </div>
                                <hr class="line3">
                                <div class="col-2">
                                    <button class="btn1" form="edit_staff">Save Changes</button>
                                    <a href="staff.php" class="btn2">Cancel</a>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>
<?php } ?>

<script src="assets/js/handler.js"></script>