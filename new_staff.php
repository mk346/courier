<?php
require 'config/config.php';
include 'header.php';
include 'sidebar.php';
include 'topbar.php';
?>
<div class="sub-wrapper">
    <h1 class="main-header1">New Staff</h1>
    <hr class="line">
</div>
<div class="container-fluid">
    <div class="col-3">
        <div class="card-1 card-outline card-primary">
            <div class="card-body">
                <form action="#">
                    <div class="row">
                        <div class="form-col2">
                            <div class="row">
                                <div class="form-group2 form-col2">
                                    <label for class="control-label">First Name</label>
                                    <input type="text" name="fname" id="" class="form-control" required>
                                </div>
                                <div class="form-group2 form-col2">
                                    <label for class="control-label">Middle Name</label>
                                    <input type="text" name="mname" id="" class="form-control" required>
                                </div>
                                <div class="form-group2 form-col2">
                                    <label for class="control-label">Last Name</label>
                                    <input type="text" name="lname" id="" class="form-control" required>
                                </div>
                                <div class="form-group2 form-col2">
                                    <label for class="control-label">Branch</label>
                                    <select name="branches" id="" class="form-control" required>
                                        <option value="">--Select--</option>
                                        <option value="">Nairobi</option>
                                        <option value="">Kisumu</option>
                                        <option value="">Mombasa</option>
                                        <option value="">Nakuru</option>
                                    </select>
                                </div>
                                <div class="form-group2 form-col2">
                                    <label for class="control-label">Email</label>
                                    <input type="email" name="email" id="" class="form-control" required>
                                </div>
                                <div class="form-group2 form-col2">
                                    <label for class="control-label">Password</label>
                                    <input type="password" name="password" id="" class="form-control" required>
                                </div>
                            </div>
                            <hr class="line3">
                            <div class="col-2">
                                <input type="submit" name="save" value="Save" class="btn1">
                                <a href="#" class="btn2">Cancel</a>
                            </div>

                        </div>
                    </div>
                </form>
            </div>


        </div>
    </div>
</div>


<script src="assets/js/handler.js"></script>