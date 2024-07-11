<?php
require 'config/session.php';
require 'config/config.php';
include 'header.php';
include 'sidebar.php';
include 'topbar.php';
require 'form_handler/save_parcel.php';
// $options = "";
// $options2 = "";

$my_array = array()
?>
<!-- <div class="wrapper-main"> -->
<div class="sub-wrapper2">
    <h1 class="main-header1">New Parcel</h1>
    <hr class="line">
</div>
<div class="container-fluid">
    <div class="main-col">
        <div class="card-1 card-outline card-primary">
            <div class="card-body">
                <form action="add_parcel.php" method="POST" class="add-parcel" id="manage-parcel">
                    <div class="row">
                        <div class="main-col col-span">
                            <b class="form-title">Sender Information</b>
                            <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
                            <input type="hidden" name="origin" value="<?php echo isset($user_branch) ? $user_branch : '' ?>">
                            <input type="hidden" name="reference_number">
                            <div class="form-group spacing">
                                <label for class="control-label">Name</label>
                                <input type="text" name="sname" id="" class="form-control" required>
                            </div>
                            <div class="form-group spacing">
                                <label for class="control-label">Address</label>
                                <input type="text" name="saddress" id="" class="form-control" required>
                            </div>
                            <div class="form-group spacing">
                                <label for class="control-label">Contact</label>
                                <input type="text" name="scontact" id="sender" class="form-control" required>
                                <?php
                                if (in_array("<span style='color:red;'>Phone Number Must be atleast 10 Digits</span><br>", $my_array)) {
                                    echo "<span style='color:red;'>Phone Number Must be atleast 10 Digits</span><br>";
                                }

                                ?>
                            </div>
                            <div class="form-group spacing">
                                <label for class="control-label">Email</label>
                                <input type="email" name="semail" id="" class="form-control" required>
                            </div>
                        </div>
                        <div class="main-col col-span">
                            <b class="form-title">Recipient Information</b>
                            <div class="form-group spacing">
                                <label for class="control-label">Name</label>
                                <input type="text" name="rname" id="" class="form-control" required>
                            </div>
                            <div class="form-group spacing">
                                <label for class="control-label">Address</label>
                                <input type="text" name="raddress" id="" class="form-control" required>
                            </div>
                            <div class="form-group spacing">
                                <label for class="control-label">Contact</label>
                                <input type="text" name="rcontact" id="receiver" class="form-control" required>
                                <?php
                                if (in_array("<span style='color:red;'>Phone Number Must be atleast 10 Digits</span><br>", $my_array)) {
                                    echo "<span style='color:red;'>Phone Number Must be atleast 10 Digits</span><br>";
                                }
                                ?>
                            </div>
                            <div class="form-group spacing">
                                <label for class="control-label">Email</label>
                                <input type="email" name="remail" id="" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <hr class="line3">
                    <div class="row">
                        <div class="main-col col-span">
                            <div class="form-group spacing">
                                <label for="choose-delivery">Choose Delivery Option</label>
                                <select name="type" id="type" class="form-control" required onchange="changeStatus();">
                                    <option value="Deliver">Deliver to Recipient Address</option>
                                    <option value="Pickup">Pickup at the Nearest Branch</option>
                                </select>
                            </div>

                        </div>
                        <div class="main-col col-span">
                            <div class="form-group spacing">
                                <?php
                                $query = "SELECT street,city FROM branch ORDER BY id DESC";
                                $result = mysqli_query($con, $query);
                                ?>
                            </div>

                            <div class="form-group spacing">
                                <label for="deliver-loc" id="mylabel">Pick-Up Branch</label>
                                <select name="pickup_br" id="pickup" class="form-control hide-select">
                                    <?php
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo '<option value="' . htmlspecialchars($row["street"]) . '">' . htmlspecialchars($row["street"]) . ' - ' . htmlspecialchars($row["city"]) . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group spacing" id="hide-div">
                                <label>Delivery Location</label>
                                <input type="text" name="delivery_loc" class="form-control hide-input" id="address">
                            </div>

                        </div>
                    </div>
                    <hr class="line3">

                    <b>Parcel Information</b>
                    <table class="branch-table margin-top" id="parcel_details">
                        <thead>
                            <tr>
                                <th class="rhead">Weight (Kg)</th>
                                <th class="rhead">Price</th>
                                <th class="rhead">Transit Charge</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                            <tr>
                                <td class="rbody">
                                    <input type="text" name="weight" id="weight" class="form-control" onkeyup="calcPrice(this)" required>
                                </td>
                                <td class="text-right tx-center  rbody" id="price">
                                    0.00

                                </td>
                                <td class="rbody">
                                    <input type="text" name="charge" id="charge" class="form-control" onkeyup="calcPrice(this)" required>
                                </td>
                            </tr>
                        </tbody>
                        <?php if (!isset($id)) : ?>
                            <tfoot class="border">
                                <tr>
                                    <th colspan="2" class="text-right rhead">Total (VAT Inclusive 16%)</th>
                                    <td class="text-right text-align rhead" id="amount">0.00</td>
                                    <!-- <th class="rhead"></th> -->
                                </tr>
                            </tfoot>
                        <?php endif; ?>
                    </table>
                    <hr class="line3">
                    <b>Payment</b>
                    <div class="row">
                        <div class="main-col col-span">
                            <div class="radio-box">
                                <label class="myradio">
                                    <input name="payment" type="radio" value="Not Paid" checked>
                                    <span>Not Paid</span>
                                </label>
                                <label class="myradio">
                                    <input name="payment" type="radio" value="Paid">
                                    <span>Paid</span>
                                </label>
                            </div>

                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="cardfooter-items">
                            <input type="submit" name="save_parcel" value="Save" class="card-btn1">
                            <!-- <button class="card-btn1" form="manage-parcel">Save</button> -->
                            <a href="list_parcel.php" class="card-btn2">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<div id="tbl-clone" class="d-none">
    <table>
        <tr>
            <td class="rbody">
                <input type="text" name="weight[]" class="form-control" required value="">
            </td>
            <td class="rbody">
                <input type="text" name="price[]" class="form-control" required>
            </td>
            <td class="rbody">
                <input type="text" name="charge[]" class="form-control" required>
            </td>
            <td class="rbody">
                <button class="btn-main btn-del">
                    <i class="fa fa-times"></i>
                </button>
            </td>
        </tr>
    </table>
</div>
<!-- </div> -->
<script>
    //phone number validation
    document.getElementById("manage-parcel").addEventListener('submit', function(event){
        // event.preventDefault();
        var sender_phone = document.getElementById('sender').value;
        var receiver_phone = document.getElementById('receiver').value;

        var phonePattern = /^\+2547\d{8}$|^07\d{8}$/;

        if (!phonePattern.test(sender_phone) || !phonePattern.test(receiver_phone)){
            event.preventDefault();
            alert('Senders Phone and Receivers Phone must be valid phone numbers');
        }

        
    })
</script>
<script src="assets/js/handler.js"></script>
<script src="assets/js/status.js"></script>
<script src="assets/js/calcp.js"></script>