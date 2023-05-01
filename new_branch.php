<?php
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
                                <textarea name="street" id="" cols="30" rows="2" class="form-control" required></textarea>
                            </div>
                            <div class="col-1 form-group">
                                <label for class="control-label">City/Town</label>
                                <textarea name="city" id="" cols="30" rows="2" class="form-control" required></textarea>
                            </div>
                            <div class="col-1 form-group">
                                <label for class="control-label">Branch Code</label>
                                <textarea name="code" id="" cols="30" rows="2" class="form-control" required></textarea>
                            </div>
                            <div class="col-1 form-group">
                                <label for class="control-label">Postal Code</label>
                                <textarea name="postal" id="" cols="30" rows="2" class="form-control" required></textarea>
                            </div>
                            <div class="col-1 form-group">
                                <label for class="control-label">County</label>
                                <textarea name="county" id="" cols="30" rows="2" class="form-control" required></textarea>
                            </div>
                            <div class="col-1 form-group">
                                <label for class="control-label">Contact</label>
                                <textarea name="contact" id="" cols="30" rows="2" class="form-control" required></textarea>
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