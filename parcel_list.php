<?php
require 'config/config.php';
include 'header.php';
include 'sidebar.php';
include 'topbar.php';
require 'config/pdo.php';
?>
<div class="sub-wrapper2">
    <h1 class="main-header1">Parcel List</h1>
    <hr class="line">
</div>
<div class="container-fluid">
    <div class="col-3">
        <div class="card-1 card-outline card-primary">
            <div class="card-header">
                <div class="card-item">
                    <a href="#" class="btn3">
                        <i class="fa fa-plus"></i>
                        Add New
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="container-wrapper">
                    <div class="row-1">
                        <div class="col-search">
                            <div class="list-filter">
                                <label for="search" class="search">Search:
                                    <input type="search" class="search-control">
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row-1">
                        <div class="table-col">
                            <table class="branch-table">
                                <thead>
                                    <tr role="row" class="trow">
                                        <th class="rhead">#</th>
                                        <th class="rhead">Reference Number</th>
                                        <th class="rhead">Sender Name</th>
                                        <th class="rhead">Recipient Name</th>
                                        <th class="rhead">Status</th>
                                        <th class="rhead">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    while ($i <= 5) :
                                    ?>
                                        <tr>
                                            <td class="rbody"><?php echo $i++ ?></td>
                                            <td class="rbody">NFRT45901</td>
                                            <td class="rbody">Caleb Munene</td>
                                            <td class="rbody">John Smith</td>
                                            <td class="rbody">Collected</td>
                                            <td class="rbody">
                                                <div class="btn-group">
                                                    <a href="#" class="btn-main btn-edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <button type="button" class="btn-main btn-del">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endwhile; ?>


                                </tbody>

                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

<script src="assets/js/handler.js"></script>