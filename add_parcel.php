<?php
require 'config/config.php';
include 'header.php';
include 'sidebar.php';
include 'topbar.php';
?>
<div class="wrapper-main">
    <div class="sub-wrapper">
        <h1 class="main-header1">New Parcel</h1>
        <hr class="line">
    </div>
    <div class="container-fluid">
        <div class="main-col">
            <div class="card-1 card-outline card-primary">
                <div class="card-body">
                    <form action="#" class="add-parcel">
                        <div class="row">
                            <div class="main-col col-span">
                                <b class="form-title">Sender Information</b>
                                <div class="form-group spacing">
                                    <label for class="control-label">Name</label>
                                    <input type="text" name="name" id="" class="form-control" required>
                                </div>
                                <div class="form-group spacing">
                                    <label for class="control-label">Address</label>
                                    <input type="text" name="address" id="" class="form-control" required>
                                </div>
                                <div class="form-group spacing">
                                    <label for class="control-label">Contact</label>
                                    <input type="text" name="contact" id="" class="form-control" required>
                                </div>
                            </div>
                            <div class="main-col col-span">
                                <b class="form-title">Recipient Information</b>
                                <div class="form-group spacing">
                                    <label for class="control-label">Name</label>
                                    <input type="text" name="name" id="" class="form-control" required>
                                </div>
                                <div class="form-group spacing">
                                    <label for class="control-label">Address</label>
                                    <input type="text" name="address" id="" class="form-control" required>
                                </div>
                                <div class="form-group spacing">
                                    <label for class="control-label">Contact</label>
                                    <input type="text" name="contact" id="" class="form-control" required>
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
                                    <select name="branch-pr" id="" class="form-control">
                                        <option value="#">--Branch Processed--</option>
                                        <option value="#">Nairobi</option>
                                        <option value="#">Kisumu</option>
                                        <option value="#">Mombasa</option>
                                    </select>
                                </div>
                                <div class="form-group spacing">
                                    <select name="branch-pc" id="pickup" class="form-control hide-select">
                                        <option value="#">--Pickup Branch--</option>
                                        <option value="#">Nairobi</option>
                                        <option value="#">Kisumu</option>
                                        <option value="#">Mombasa</option>
                                    </select>
                                </div>
                                <div class="form-group spacing" id="hide-div">
                                    <label for="deliver-loc">Delivery Location</label>
                                    <input type="text" name="delivery-location" class="form-control hide-input" id="address">
                                </div>
                            </div>


                            <hr class="line3">
                            <table class="branch-table margin-top">
                                <thead>
                                    <tr>
                                        <th class="rhead">Weight</th>
                                        <th class="rhead">Height</th>
                                        <th class="rhead">Length</th>
                                        <th class="rhead">Width</th>
                                        <th class="rhead">Price</th>
                                        <th class="rhead"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="rbody">
                                            <input type="text" name="weight" class="form-control" required>
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
                                            <input type="text" name="price" class="form-control" required>
                                        </td>
                                        <td class="rbody">
                                            <button class="btn-main btn-del">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>

                            </table>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="assets/js/handler.js"></script>
<script src="assets/js/status.js"></script>