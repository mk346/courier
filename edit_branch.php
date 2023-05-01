<?php
require 'config/pdo.php';
include 'header.php';
include 'sidebar.php';
include 'topbar.php';
$id = $_GET['id'];
$result = $db_con->prepare("SELECT * FROM branch WHERE id = :id");
$result->bindParam(':id', $id);
$result->execute();
for ($i = 0; $row = $result->fetch(); $i++) {
?>

    <div class="sub-wrapper2">
        <h1 class="main-header1">Edit Branch</h1>
        <hr class="line">
    </div>
    <!-- <section class="content"> -->
    <div class="container-fluid">
        <div class="card-1 card-outline card-primary">
            <div class="card-body">
                <form action="form_handler/saveedit_branch.php" method="POST">
                    <div class="form-row">
                        <div class="form-col">
                            <div class="form-row">
                                <div class="col-1 form-group">
                                    <label for class="control-label">Street/Building</label>
                                    <input type="hidden" name="memi" value="<?php echo $id; ?>">
                                    <input type="text" name="street" class="form-control" value="<?php echo $row['street'] ?>">
                                </div>
                                <div class="col-1 form-group">
                                    <label for class="control-label">City/Town</label>
                                    <input type="text" name="city" class="form-control" value="<?php echo $row['city'] ?>">
                                </div>
                                <div class="col-1 form-group">
                                    <label for class="control-label">Branch Code</label>
                                    <input type="text" name="code" class="form-control" value="<?php echo $row['code'] ?>">
                                </div>
                                <div class="col-1 form-group">
                                    <label for class="control-label">Postal Code</label>
                                    <input type="text" name="postal" class="form-control" value="<?php echo $row['postal'] ?>">
                                </div>
                                <div class="col-1 form-group">
                                    <label for class="control-label">County</label>
                                    <input type="text" name="county" class="form-control" value="<?php echo $row['county'] ?>">
                                </div>
                                <div class="col-1 form-group">
                                    <label for class="control-label">Contact</label>
                                    <input type="text" name="contact" class="form-control" value="<?php echo $row['contact'] ?>">
                                </div>
                                <hr class="line2">
                                <div class="col-2">
                                    <button class="btn1">Save Changes</button>
                                    <a href="branchlist.php" class="btn2">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            <?php
        }
            ?>

            </div>

        </div>

    </div>
    <script src="assets/js/handler.js"></script>