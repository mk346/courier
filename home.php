    <?php
    // call the required pages
    require 'config/session.php';
    require 'config/config.php';

    if (isset($_SESSION['reference_number'])) {
        $track_no = $_SESSION['reference_number'];

        $parcel_details = mysqli_query($con, "SELECT * FROM parcels WHERE reference_number='$track_no'");;
        $results = mysqli_fetch_array($parcel_details);
    } else {
        header("Location: customer_login.php");
    }

    ?>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/0fe3bc1f22.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="assets/css/style.css">
        <title>Customer Page</title>
    </head>

    <body>
        <?php include 'sidebar2.php' ?>
        <?php include 'topbar2.php'; ?>
        <div class="container-fluid" id="container">
            <div class="row-2">
                <div class="table-col">
                    <table class="branch-table">
                        <thead>
                            <tr class="trow">
                            <tr class="trow">
                                <th class="rhead">#</th>
                                <th class="rhead">Sender's Name</th>
                                <th class="rhead">Recepient's Name</th>
                                <!-- <th class="rhead">Status</th> -->
                                <th class="rhead">Date Dispatched</th>
                                <th class="rhead">Date Delivered</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = $con->query("SELECT * FROM parcels WHERE reference_number ='$track_no'");
                            $i = 0;
                            while ($rows = $query->fetch_assoc()) {
                                $i++;
                            ?>
                                <tr class="trow">
                                    <td class="rbody">
                                        <?php echo $i ?>
                                    </td>
                                    <td class="rbody">
                                        <?php echo $rows['sname'] ?>
                                    </td>
                                    <td class="rbody">
                                        <?php echo $rows['rname'] ?>
                                    </td>
                                    <!-- <td class="rbody">
                                        <?php //echo $rows['status'] ?>
                                    </td> -->
                                    <td class="rbody">
                                        <?php echo $rows['date_created'] ?>
                                    </td>
                                    <td class="rbody">
                                        <?php
                                        if($rows['status'] == 0){
                                            echo "<span class='status-btn2'>Pending</span>";
                                        }else if($rows['status'] == 2){
                                            echo "<span class='status-btn2'>Pending</span>";
                                        } else if ($rows['status'] == 3) {
                                            echo "<span class='status-btn2'>Pending</span>";
                                        } else if ($rows['status'] == 9) {
                                            echo "<span class='status-btn2'>Pending</span>";
                                        }else{
                                            $date_arrived = date("M d, Y H:i:s", strtotime($rows['status_date']));
                                            echo $date_arrived;
                                        }

                                        
                                        
                                        ?>
                                    </td>


                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <script src="assets/js/top_menu.js"></script>
    </body>

    </html>