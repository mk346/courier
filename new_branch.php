<?php
require 'config/session.php';
require 'config/config.php';
include 'header.php';
include 'sidebar.php';
include 'topbar.php';
require 'form_handler/save_branch.php';
?>
<div class="sub-wrapper2">
    <h1 class="main-header1">New Branch</h1>
    <hr class="line">
</div>
<!-- <section class="content"> -->
<div class="container-fluid">
    <div class="card-1 card-outline card-primary">
        <div class="card-body">
            <form action="new_branch.php" method="POST">
                <div class="form-row">
                    <div class="form-col">
                        <div class="form-row">
                            <div class="col-1 form-group">
                                <label for class="control-label">Street/Building</label>
                                <input type="text" name="street" class="form-control" placeholder="Afya Center" required>
                            </div>
                            <div class="col-1 form-group">
                                <label for class="control-label">City/Town</label>
                                <input type="text" name="city" class="form-control" placeholder="Nakuru" required>
                            </div>
                            <div class="col-1 form-group">
                                <label for class="control-label">Branch Code</label>
                                <input type="number" class="form-control" name="code" placeholder="0001" required>
                            </div>
                            <div class="col-1 form-group">
                                <label for class="control-label">Postal Code</label>
                                <input type="text" class="form-control" name="postal" placeholder="000-000" required>
                            </div>
                            <div class="col-1 form-group">
                                <label for class="control-label">County</label>
                                <input type="text" name="county" class="form-control" placeholder="Nairobi" required>
                            </div>
                            <div class="col-1 form-group">
                                <label for class="control-label">Contact</label>
                                <input type="number" class="form-control" name="contact" placeholder="0700000000" required>
                            </div>
                            <hr class="line2">
                            <div class="col-2">
                                <input type="submit" name="save_branch" value="Save" class="btn1">
                                <a href="branchlist.php" class="btn2">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>

    </div>

</div>

<!-- </section> -->

<script src="assets/js/handler.js"></script>