<?php
    require 'config/session.php';
    require 'functions.php';
    require 'config/config.php';
    require 'check_login.php';
    include 'header.php';
?>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <div class="wrapper" id="mywrapper">
        <?php include 'sidebar.php' ?>
        <?php include 'topbar.php'; ?>
        <div class="sub-wrapper">
            <h1 class="main-header1">Dashboard</h1>
            <hr class="line">
        </div>
        <div class="container-1">
            <div class="cards">
                <div class="card-single">
                    <div>
                        <h2>
                            <?php
                            if ($_SESSION['login_type'] == 1) {
                                echo $con->query("SELECT * FROM parcels where status = 0")->num_rows;
                            }else if ($_SESSION['login_type'] == 2) {
                                echo $con->query("SELECT * FROM parcels where status = 0 AND branch_id = '$branch_id' ")->num_rows;
                            }
                            ?>
                        </h2>
                        <small>Delivered</small>
                    </div>
                    <div>
                        <span class="fa fa-shopping-cart"></span>
                    </div>
                </div>

                <div class="card-single">
                    <div>
                        <h2>
                            <?php
                            if ($_SESSION['login_type'] == 1) {
                                echo $con->query("SELECT * FROM parcels where status = 6")->num_rows;
                            } else if ($_SESSION['login_type'] == 2) {
                                echo $con->query("SELECT * FROM parcels where status = 6 AND branch_id = '$branch_id' ")->num_rows;
                            }

                            ?>
                        </h2>
                        <small>Collected</small>
                    </div>
                    <div>
                        <span class="fa fa-newspaper-o"></span>
                    </div>
                </div>


                <div class="card-single">
                    <div>
                        <h2>
                            <?php
                                if ($_SESSION['login_type'] == 1) {
                                    echo $con->query("SELECT * FROM parcels where status = 3")->num_rows;
                                } else if ($_SESSION['login_type'] == 2) {
                                    echo $con->query("SELECT * FROM parcels where status = 3 AND branch_id = '$branch_id' ")->num_rows;
                                }

                            ?>
                        </h2>
                        <small>In-Transit</small>
                    </div>
                    <div>
                        <span class="fa fa-outdent"></span>
                    </div>
                </div>

                <div class="card-single">
                    <div>
                        <h2>
                            <?php
                            if ($_SESSION['login_type'] == 1) {
                                echo $con->query("SELECT * FROM parcels where status = 5")->num_rows;
                            } else if ($_SESSION['login_type'] == 2) {
                                echo $con->query("SELECT * FROM parcels where status = 5 AND branch_id = '$branch_id' ")->num_rows;
                            }

                            ?>
                        </h2>
                        <small>Ready for Pick-Up</small>
                    </div>
                    <div>
                        <span class="fa fa-group"></span>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="chart-row">
                    <div class="my-chart">
                        <table class="columns">
                            <tbody>
                                <tr class="trow">
                                    <td class="rbody">
                                        <!-- create chart canvas -->
                                        <canvas id="myChart" width="500px" height="300px"></canvas>
                                        <?php
                                        $status_arr = array("Item Accepted By Courier", "Collected", "Shipped", "In-Transit", "Arrived At Destination", "Ready for Pickup", "Delivered", "Unsuccessful Delivery");
                                        $data_1 = array(); //array one to hold data point 1
                                        $data_2 = array(); //array two to hold data point 2
                                        foreach ($status_arr as $x => $y) {
                                            if ($_SESSION['login_type'] == 1) {
                                                $count = $con->query("SELECT * FROM parcels WHERE status = {$x}")->num_rows;
                                            }else if($_SESSION['login_type'] == 2) {
                                                $count = $con->query("SELECT * FROM parcels WHERE status = {$x} AND branch_id = '$branch_id'")->num_rows;
                                            }
                                            $data_1[] = $count;
                                            $data_2[] = $y;
                                            // echo "<h4>$count</h4>" . "<p>$y</p>";
                                        }
                                        ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="columns">
                            <tbody>
                                <tr class="trow">
                                    <td class="rbody">
                                        <!-- create chart canvas -->
                                        <canvas id="myChart2" width="500px" height="300px"></canvas>
                                        <?php
                                        $status_arr = array("Item Accepted By Courier", "Collected", "Shipped", "In-Transit", "Arrived At Destination", "Ready for Pickup", "Delivered", "Unsuccessful Delivery");
                                        $data_3 = array(); //array one to hold data point 1
                                        $data_4 = array(); //array two to hold data point 2
                                        foreach ($status_arr as $x => $y) {
                                            if($_SESSION['login_type'] == 1){
                                                $count = $con->query("SELECT * FROM parcels WHERE status = {$x}")->num_rows;
                                            }else if($_SESSION['login_type'] == 2){
                                                $count = $con->query("SELECT * FROM parcels WHERE status = {$x} AND branch_id = '$branch_id'")->num_rows;
                                            }
                                            $data_3[] = $count;
                                        }
                                        $branches = $con->query("SELECT processed_br FROM parcels");
                                        while ($rows = $branches->fetch_assoc()) {
                                            $data_4[] = $rows['processed_br'];
                                        }

                                        ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>


        </div>
    </div>

    <script src="assets/js/menu.js"></script>
    <script>
        //console.log(<?php //echo json_encode($data_1); 
                        ?>)
        const count = <?php echo json_encode($data_1); ?>;
        const status = <?php echo json_encode($data_2); ?>;
        const count2 = <?php echo json_encode($data_3); ?>;
        const branch = <?php echo json_encode($data_4); ?>;


        // setting up
        const data = {
            labels: status,
            datasets: [{
                label: 'Transit Summary',
                data: count,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(201, 203, 207, 0.2)'
                ],
                borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)',
                    'rgb(153, 102, 255)',
                    'rgb(201, 203, 207)'
                ],
                borderWidth: 1
            }],
        };
        // CONFIG
        const config = {
            type: 'bar',
            data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }

        };

        // Rendering
        const mychart = new Chart(
            document.getElementById('myChart'), config

        );

        // chart 2
        // setting up
        const data2 = {
            labels: branch,
            datasets: [{
                label: 'Daily Summary',
                data: count2,
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)',
                    'rgb(201, 203, 207)',
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                ],
                hoverOffset: 4
            }],
        };
        // CONFIG
        const config2 = {
            type: 'pie',
            data: data2,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }

        };

        // Rendering
        const mychart2 = new Chart(
            document.getElementById('myChart2'), config2

        );
    </script>
    </body>

    </html>