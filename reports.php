<?php
require 'config/session.php';
require 'config/config.php';
require 'config/pdo.php';
include 'header.php';
include 'sidebar.php';
include 'topbar.php';
//include 'form_handler/view_report.php';
$from_date = "";
$to_date = "";
$status = "";
$update = "";
$err_array = array();
$sender_name = "";
$recipient_name = "";
$date_created = "";
$amount = "";
$i = 0;

$status = isset($_GET['status']) ? $_GET['status'] : 'all'

?>
<div class="sub-wrapper2">
    <h1 class="main-header1">Reports</h1>
    <hr class="line">
</div>
<div class="container-fluid">
    <div class="fluid-col">
        <div class="card-1 card-outline card-primary">
            <div class="card-body">
                <?php
                $status_arr = array("Item Accepted By Courier", "Collected", "Shipped", "In-Transit", "Arrived At Destination", "Out of Delivery", "Ready for Pickup", "Delivered", "Picked-Up", "Unsuccessful Delivery Attempt");

                ?>
                <div class="d-flex w-100 px-1 justify-content align-items">
                    <form action="reports.php" method="POST" class="report-form">
                        <label for="date-from" class="mx-1">Status</label>
                        <select name="status" id="status" class="select-sm col-sm">
                            <option value="all" <?php echo $status == 'all' ? "selected" : '' ?>>All</option>
                            <?php foreach ($status_arr as $k => $v) : ?>
                                <option value="<?php echo $k; ?>" <?php echo $status != 'all' && $status == $k ? "selected" : '' ?>><?php echo $v; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <label for="date_from" class="mx-1">From</label>
                        <input type="date" class="form-control col-sm" id="mydate" name="from" required>
                        <label for="date_to" class="mx-1">To</label>
                        <input type="date" class="form-control col-sm" id="mydate2" name="to" required>
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
                                        <th class="rhead">Sender</th>
                                        <th class="rhead">Recepient</th>
                                        <th class="rhead">Amount</th>
                                        <th class="rhead">Status</th>
                                        <th class="rhead">Date Dispatched</th>
                                        <th class="rhead">Date Delivered</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (isset($_POST['filter'])) {
                                        $status = $_POST['status'];
                                        $from_date = $_POST['from'];
                                        $to_date = $_POST['to'];
                                        if ($status == 'all') {
                                            $query = "SELECT * FROM parcels WHERE date_created BETWEEN '$from_date' AND '$to_date'";
                                            $result = mysqli_query($con, $query);
                                            $result = mysqli_query($con, $query);
                                            if ($result) {
                                                $rows = mysqli_num_rows($result);
                                                if ($rows > 0) {
                                                    foreach ($result as $data) {
                                                        $status_id = $data['status'];
                                                        $i++
                                    ?>
                                                        <tr class="trow">
                                                            <td class="rbody"><?php echo $i ?></td>
                                                            <td class="rbody"><?php echo $data['sname'] ?></td>
                                                            <td class="rbody"><?php echo $data['rname'] ?></td>
                                                            <td class="rbody"><?php
                                                                                $amount = number_format($data['amount'], 2);
                                                                                echo $amount ?></td>
                                                            <td class="rbody"><?php
                                                                                $update = $status_arr[$data['status']];
                                                                                echo "<span class='status-btn'>$update</span>"; ?>
                                                            </td>
                                                            <td class="rbody"><?php
                                                                                $date_sent = date("M d, Y H:i:s", strtotime($data['date_created']));
                                                                                echo $date_sent ?>
                                                            </td>
                                                            <td class="rbody"><?php
                                                                                if ($status_id == 0) {
                                                                                    echo "<span class='status-btn2'>Pending</span>";
                                                                                } else if ($status_id == 2) {
                                                                                    echo "<span class='status-btn2'>Pending</span>";
                                                                                } else if ($status_id == 3) {
                                                                                    echo "<span class='status-btn2'>Pending</span>";
                                                                                } else if ($status_id == 9) {
                                                                                    echo "<span class='status-btn2'>Pending</span>";
                                                                                } else {
                                                                                    $date_arrived = date("M d, Y H:i:s", strtotime($data['status_date']));
                                                                                    echo $date_arrived;
                                                                                }

                                                                                ?>
                                                            </td>
                                                        </tr>
                                                    <?php
                                                    }
                                                } else if ($rows <= 0) {
                                                    array_push($err_array, "<span style='color: red;'>No Records Found</span><br>");
                                                }
                                            }
                                            ?>
                                                <table class="columns center-div">
                                                    <tbody class="width-1">
                                                        <tr>
                                                            <td><div id="piechart" style="border: 1px solid #ccc"></div></td>
                                                        </tr>
                                                    </tbody>
                                                </table>


                                        <!-- end chart -->
                                        <?php
                                        } else if ($status == 0) {
                                            $query2 = "SELECT * FROM parcels WHERE date_created BETWEEN '$from_date' AND '$to_date' AND status = '$status'";
                                            $result2 = mysqli_query($con, $query2);
                                            if ($result2) {
                                                $rows2 = mysqli_num_rows($result2);
                                                if ($rows2 > 0) {
                                                    foreach ($result2 as $data2) {
                                                        $i++;
                                                    ?>
                                                        <tr class="trow">
                                                            <td class="rbody"><?php echo $i ?></td>
                                                            <td class="rbody"><?php echo $data2['sname'] ?></td>
                                                            <td class="rbody"><?php echo $data2['rname'] ?></td>
                                                            <td class="rbody"><?php
                                                                                $amount = number_format($data2['amount'], 2);
                                                                                echo $amount ?></td>
                                                            <td class="rbody"><?php
                                                                                $update = $status_arr[$data2['status']];
                                                                                echo "<span class='status-btn'>$update</span>"; ?></td>
                                                            <td class="rbody"><?php
                                                                                $date_sent = date("Y-m-d H:i:s", strtotime($data2['date_created']));
                                                                                echo $date_sent ?>
                                                            </td>
                                                            <td class="rbody"><?php
                                                                                echo "<span class='status-btn2'>Pending</span>";
                                                                                ?>
                                                            </td>

                                                        </tr>
                                                    <?php
                                                    }
                                                } else if ($rows2 <= 0) {
                                                    array_push($err_array, "<span style='color: red;'>No Records Found</span><br>");
                                                }
                                            }
                                        } else if ($status == 0) {
                                            $query2 = "SELECT * FROM parcels WHERE date_created BETWEEN '$from_date' AND '$to_date' AND status = '$status'";
                                            $result2 = mysqli_query($con, $query2);
                                            if ($result2) {
                                                $rows2 = mysqli_num_rows($result2);
                                                if ($rows2 > 0) {
                                                    foreach ($result2 as $data2) {
                                                        $i++;
                                                    ?>
                                                        <tr class="trow">
                                                            <td class="rbody"><?php echo $i ?></td>
                                                            <td class="rbody"><?php echo $data2['sname'] ?></td>
                                                            <td class="rbody"><?php echo $data2['rname'] ?></td>
                                                            <td class="rbody"><?php
                                                                                $amount = number_format($data2['amount'], 2);
                                                                                echo $amount ?></td>
                                                            <td class="rbody"><?php
                                                                                $update = $status_arr[$data2['status']];
                                                                                echo "<span class='status-btn'>$update</span>"; ?></td>
                                                            <td class="rbody"><?php
                                                                                $date_sent = date("Y-m-d H:i:s", strtotime($data2['date_created']));
                                                                                echo $date_sent ?>
                                                            </td>
                                                            <td class="rbody"><?php
                                                                                echo "<span class='status-btn2'>Pending</span>";
                                                                                ?>
                                                            </td>

                                                        </tr>
                                                    <?php
                                                    }
                                                } else if ($rows2 <= 0) {
                                                    array_push($err_array, "<span style='color: red;'>No Records Found</span><br>");
                                                }
                                            }
                                        } else if ($status == 2) {
                                            $query2 = "SELECT * FROM parcels WHERE date_created BETWEEN '$from_date' AND '$to_date' AND status = '$status'";
                                            $result2 = mysqli_query($con, $query2);
                                            if ($result2) {
                                                $rows2 = mysqli_num_rows($result2);
                                                if ($rows2 > 0) {
                                                    foreach ($result2 as $data2) {
                                                        $i++;
                                                    ?>
                                                        <tr class="trow">
                                                            <td class="rbody"><?php echo $i ?></td>
                                                            <td class="rbody"><?php echo $data2['sname'] ?></td>
                                                            <td class="rbody"><?php echo $data2['rname'] ?></td>
                                                            <td class="rbody"><?php
                                                                                $amount = number_format($data2['amount'], 2);
                                                                                echo $amount ?></td>
                                                            <td class="rbody"><?php
                                                                                $update = $status_arr[$data2['status']];
                                                                                echo "<span class='status-btn'>$update</span>"; ?></td>
                                                            <td class="rbody"><?php
                                                                                $date_sent = date("Y-m-d H:i:s", strtotime($data2['date_created']));
                                                                                echo $date_sent ?>
                                                            </td>
                                                            <td class="rbody"><?php
                                                                                echo "<span class='status-btn2'>Pending</span>";
                                                                                ?>
                                                            </td>

                                                        </tr>
                                                    <?php
                                                    }
                                                } else if ($rows2 <= 0) {
                                                    array_push($err_array, "<span style='color: red;'>No Records Found</span><br>");
                                                }
                                            }
                                        } else if ($status == 3) {
                                            $query2 = "SELECT * FROM parcels WHERE date_created BETWEEN '$from_date' AND '$to_date' AND status = '$status'";
                                            $result2 = mysqli_query($con, $query2);
                                            if ($result2) {
                                                $rows2 = mysqli_num_rows($result2);
                                                if ($rows2 > 0) {
                                                    foreach ($result2 as $data2) {
                                                        $i++;
                                                    ?>
                                                        <tr class="trow">
                                                            <td class="rbody"><?php echo $i ?></td>
                                                            <td class="rbody"><?php echo $data2['sname'] ?></td>
                                                            <td class="rbody"><?php echo $data2['rname'] ?></td>
                                                            <td class="rbody"><?php
                                                                                $amount = number_format($data2['amount'], 2);
                                                                                echo $amount ?></td>
                                                            <td class="rbody"><?php
                                                                                $update = $status_arr[$data2['status']];
                                                                                echo "<span class='status-btn'>$update</span>"; ?></td>
                                                            <td class="rbody"><?php
                                                                                $date_sent = date("Y-m-d H:i:s", strtotime($data2['date_created']));
                                                                                echo $date_sent ?>
                                                            </td>
                                                            <td class="rbody"><?php
                                                                                echo "<span class='status-btn2'>Pending</span>";
                                                                                ?>
                                                            </td>

                                                        </tr>
                                                    <?php
                                                    }
                                                } else if ($rows2 <= 0) {
                                                    array_push($err_array, "<span style='color: red;'>No Records Found</span><br>");
                                                }
                                            }
                                        } else if ($status == 9) {
                                            $query2 = "SELECT * FROM parcels WHERE date_created BETWEEN '$from_date' AND '$to_date' AND status = '$status'";
                                            $result2 = mysqli_query($con, $query2);
                                            if ($result2) {
                                                $rows2 = mysqli_num_rows($result2);
                                                if ($rows2 > 0) {
                                                    foreach ($result2 as $data2) {
                                                        $i++;
                                                    ?>
                                                        <tr class="trow">
                                                            <td class="rbody"><?php echo $i ?></td>
                                                            <td class="rbody"><?php echo $data2['sname'] ?></td>
                                                            <td class="rbody"><?php echo $data2['rname'] ?></td>
                                                            <td class="rbody"><?php
                                                                                $amount = number_format($data2['amount'], 2);
                                                                                echo $amount ?></td>
                                                            <td class="rbody"><?php
                                                                                $update = $status_arr[$data2['status']];
                                                                                echo "<span class='status-btn'>$update</span>"; ?></td>
                                                            <td class="rbody"><?php
                                                                                $date_sent = date("Y-m-d H:i:s", strtotime($data2['date_created']));
                                                                                echo $date_sent ?>
                                                            </td>
                                                            <td class="rbody"><?php
                                                                                echo "<span class='status-btn2'>Pending</span>";
                                                                                ?>
                                                            </td>

                                                        </tr>
                                                    <?php
                                                    }
                                                } else if ($rows2 <= 0) {
                                                    array_push($err_array, "<span style='color: red;'>No Records Found</span><br>");
                                                }
                                            }
                                        } else {
                                            $query2 = "SELECT * FROM parcels WHERE date_created BETWEEN '$from_date' AND '$to_date' AND status = '$status'";
                                            $result2 = mysqli_query($con, $query2);
                                            if ($result2) {
                                                $rows2 = mysqli_num_rows($result2);
                                                if ($rows2 > 0) {
                                                    foreach ($result2 as $data2) {
                                                        $i++;
                                                    ?>
                                                        <tr class="trow">
                                                            <td class="rbody"><?php echo $i ?></td>
                                                            <td class="rbody"><?php echo $data2['sname'] ?></td>
                                                            <td class="rbody"><?php echo $data2['rname'] ?></td>
                                                            <td class="rbody"><?php
                                                                                $amount = number_format($data2['amount'], 2);
                                                                                echo $amount ?></td>
                                                            <td class="rbody"><?php
                                                                                $update = $status_arr[$data2['status']];
                                                                                echo "<span class='status-btn'>$update</span>"; ?></td>
                                                            <td class="rbody"><?php
                                                                                $date_sent = date("Y-m-d H:i:s", strtotime($data2['date_created']));
                                                                                echo $date_sent ?>
                                                            </td>
                                                            <td class="rbody"><?php
                                                                                $date_arrived = date("Y-m-d H:i:s", strtotime($data2['status_date']));
                                                                                echo $date_arrived; ?>
                                                            </td>

                                                        </tr>
                                    <?php
                                                    }
                                                } else if ($rows2 <= 0) {
                                                    array_push($err_array, "<span style='color: red;'>No Records Found</span><br>");
                                                }
                                            }
                                        }
                                    }
                                    ?>
                                    <tr>
                                        <div class="error-display">
                                            <?php if (in_array("<span style='color: red;'>No Records Found</span><br>", $err_array)) {
                                                echo "<span style='color: red;'>No Records Found</span><br>";
                                            } ?>
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
    <!-- <div class="chart-row">
        <div id="chart_div" class="my-chart"></div>
    </div> -->
</div>

<script src="assets/js/date.js"></script>
<script src="assets/js/handler.js"></script>