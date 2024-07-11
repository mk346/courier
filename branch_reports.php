<?php
require 'config/session.php';
require 'config/config.php';
require 'config/pdo.php';
include 'header.php';
include 'sidebar.php';
include 'topbar.php';

//variables needed for loading reports
// SELECT COUNT(branch_id) AS count FROM `parcels` WHERE branch_id = 27;
// SELECT COUNT(status) AS count FROM `parcels` WHERE status = 7;
$from_date = "";
$to_date = "";
$status = "";
$update = "";
$err_array = array();
$branch_id = "";
$i = 0;
?>
<div class="sub-wrapper2">
    <h1 class="main-header1">Branch Analytics Reports</h1>
    <hr class="line">
</div>
<div class="container-fluid">
    <div class="fluid-col">
        <div class="card-1 card-outline card-primary">
            <div class="card-body">
                <div class="d-flex w-100 px-1 justify-content align-items">
                    <form action="branch_reports.php" method="POST" class="report-form">
                        <label for="branch" class="mx-1">Branch</label>
                        <?php
                        $query = "SELECT * FROM branch ORDER BY id DESC";
                        $result = mysqli_query($con, $query);
                        ?>
                        <select name="mybranch" id="branch" class="select-sm col-sm">
                            <?php
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<option value="' . htmlspecialchars($row["street"]) . '">' . htmlspecialchars($row["street"]) . ' - ' . htmlspecialchars($row["city"]) . '</option>';
                                }
                            }
                            ?>
                        </select>
                        <label for="date_from" class="mx-1">From</label>
                        <input type="date" class="form-control col-sm" id="mydate" name="from_date" required>
                        <label for="date_to" class="mx-1">To</label>
                        <input type="date" class="form-control col-sm" id="mydate2" name="to_date" required>
                        <input type="submit" name="filter" class="btn-main btn-view" value="View Report">
                        <br>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="fluid-col">
                <div class="card-1">
                    <div class="card-body">
                        <div class="row">
                            <table class="branch-table">
                                <thead>
                                    <tr class="trow">
                                        <th class="rhead">#</th>
                                        <th class="rhead">Branch Name</th>
                                        <th class="rhead">County</th>
                                        <th class="rhead">Total Processed Parcels</th>
                                        <th class="rhead">Unclaimed Parcels</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (isset($_POST['filter'])) {
                                        $branch = $_POST['mybranch'];
                                        $from_date = $_POST['from_date'];
                                        $to_date = $_POST['to_date'];

                                        //query to get the branch id
                                        $my_query = "SELECT id FROM branch WHERE street = '$branch'";
                                        $result = mysqli_query($con, $my_query);
                                        if (mysqli_num_rows($result) > 0) {
                                            $row = mysqli_fetch_assoc($result);
                                            $branch_id = $row['id'];
                                        } else {
                                            echo "Branch not found";
                                        }
                                        // query parcels and filter with branch_id
                                        $query_1 = "SELECT street,city FROM branch WHERE id = '$branch_id'";
                                        $result_1 = mysqli_query($con, $query_1);
                                        if ($result_1) {
                                            $rows = mysqli_num_rows($result_1);
                                            if ($rows > 0) {
                                                foreach ($result_1 as $data) {
                                                    $i++;
                                    ?>
                                                    <tr class="trow">
                                                        <td class="rbody"><?php echo $i ?></td>
                                                        <td class="rbody"><?php echo $data['street'] ?></td>
                                                        <td class="rbody"><?php echo $data['city'] ?></td>
                                                        <td class="rbody">
                                                            <?php
                                                            echo $con->query("SELECT * FROM parcels WHERE branch_id = '$branch_id' AND date_created BETWEEN '$from_date' AND '$to_date' ")->num_rows;
                                                            ?>
                                                        </td>
                                                        <td class="rbody">
                                                            <?php
                                                            echo $con->query("SELECT * FROM parcels WHERE branch_id = '$branch_id' AND status = 7 AND date_created BETWEEN '$from_date' AND '$to_date' ")->num_rows;
                                                            ?>
                                                        </td>
                                                    </tr>
                                    <?php
                                                }
                                            } else if ($row <= 0) {
                                                array_push($err_array, "<span style='color: red;'>No Records Found</span><br>");
                                            }
                                        }
                                    }

                                    ?>
                                    <tr>
                                        <div class="error-display">
                                            <?php
                                            if (in_array("<span style='color: red;'>No Records Found</span><br>", $err_array)) {
                                                echo "<span style='color: red;'>No Records Found</span><br>";
                                            }
                                            ?>
                                        </div>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="assets/js/date.js"></script>
<script src="assets/js/handler.js"></script>