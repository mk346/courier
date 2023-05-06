<?php
require 'config/config.php';
include 'header.php';
include 'sidebar.php';
include 'topbar.php';
$options = "";
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
                <form action="form_handler/save_parcel.php" method="POST" class="add-parcel" id="manage-parcel">
                    <div class="row">
                        <div class="main-col col-span">
                            <b class="form-title">Sender Information</b>
                            <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
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
                                <input type="text" name="scontact" id="" class="form-control" required>
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
                                <input type="text" name="rcontact" id="" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <hr class="line3">
                    <div class="row">
                        <div class="main-col col-span">
                            <div class="form-group spacing">
                                <select name="type" id="type" class="form-control" required onchange="changeStatus();">
                                    <option value="Deliver">Deliver to Recipient Address</option>
                                    <option value="Pickup">Pickup at the Nearest Branch</option>
                                </select>
                            </div>

                        </div>
                        <div class="main-col col-span">
                            <div class="form-group spacing">
                                <?php
                                $query = "SELECT code,city FROM branch ORDER BY id DESC";
                                $result = mysqli_query($con, $query);
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $options = $options . "<option>" . $row['code'] . " " . $row['city'] . "</option>";
                                    }
                                }
                                ?>
                                <select name="processed_br" id="" class="form-control">
                                    <option value="#">Branch Processed</option>
                                    <option value="<?php $options; ?>"><?php echo $options; ?></option>
                                </select>
                            </div>
                            <div class="form-group spacing">
                                <select name="pickup_br" id="pickup" class="form-control hide-select">
                                    <option value="#">Pickup Branch</option>
                                    <option value="<?php $options; ?>"><?php echo $options; ?></option>
                                </select>
                            </div>
                            <div class="form-group spacing" id="hide-div">
                                <label for="deliver-loc">Delivery Location</label>
                                <input type="text" name="delivery_loc" class="form-control hide-input" id="address">
                            </div>
                        </div>
                    </div>
                    <hr class="line3">

                    <b>Parcel Information</b>
                    <table class="branch-table margin-top" id="parcel_details">
                        <thead>
                            <tr>
                                <th class="rhead">Weight</th>
                                <th class="rhead">Height</th>
                                <th class="rhead">Length</th>
                                <th class="rhead">Width</th>
                                <th class="rhead">Price</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                            <tr>
                                <td class="rbody">
                                    <input type="text" name="weight" class="form-control" required value="">
                                </td>
                                <td class="rbody">
                                    <input type="text" name="height" class="form-control" required>
                                </td>
                                <td class="rbody">
                                    <input type="text" name="length" class="form-control" required>
                                </td>
                                <td class="rbody">
                                    <input type="text" name="width" class="form-control" required>
                                </td>
                                <td class="rbody">
                                    <input type="text" name="price" class="form-control" value="" id="price" onkeyup="calcPrice(this)" required>
                                </td>
                            </tr>
                        </tbody>
                        <?php if (!isset($id)) : ?>
                            <tfoot class="border">
                                <tr>
                                    <th colspan="4" class="text-right rhead">Total VAT Inclusive (16%)</th>
                                    <td class="text-right text-align rhead" id="amount">0.00</td>
                                    <!-- <th class="rhead"></th> -->
                                </tr>
                            </tfoot>
                        <?php endif; ?>
                    </table>
                </form>
            </div>
            <div class="card-footer">
                <div class="cardfooter-items">
                    <!-- <input type="submit" name="save" value="Save" class="btn1"> -->
                    <button class="card-btn1" form="manage-parcel">Save</button>
                    <a href="list_parcel.php" class="card-btn2">Cancel</a>
                </div>

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
                <input type="text" name="height[]" class="form-control" required>
            </td>
            <td class="rbody">
                <input type="text" name="length[]" class="form-control" required>
            </td>
            <td class="rbody">
                <input type="text" name="width[]" class="form-control" required>
            </td>
            <td class="rbody">
                <input type="text" name="price[]" class="form-control" required>
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
<!-- <script src="assets/js/menu.js"></script> -->
<script src="assets/js/handler.js"></script>
<script src="assets/js/status.js"></script>
<script src="assets/js/calcp.js"></script>