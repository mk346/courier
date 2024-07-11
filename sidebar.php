<?php
//require 'config/session.php';
require 'config/config.php';
?>
<div class="sidebar">
    <h2 class="text">OnTime Courier</h2>
    <nav class="menus">
        <ul class="list">
            <li class="flex">
                <a href="index.php"><i class="fa-solid fa-gauge"></i>Dashboard
                </a>
            </li>
            <?php if ($_SESSION['login_type'] == 1) : ?>
                <li>
                    <a href="#" class="btn-1"><i class="fa-solid fa-code-branch"></i>Branch
                        <span class="fas fa-caret-down first"></span>
                    </a>
                    <ul class="show-1">
                        <li><a href="new_branch.php"><i class="fas fa-caret-right"></i>Add New</a></li>
                        <li><a href="branchlist.php"><i class="fas fa-caret-right"></i>List</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="btn-2"><i class="fa-solid fa-users"></i>Branch Staff
                        <span class="fas fa-caret-down second"></span>
                    </a>
                    <ul class="show-2">
                        <li><a href="new_staff.php"><i class="fas fa-caret-right"></i>Add New</a></li>
                        <li><a href="staff.php"><i class="fas fa-caret-right"></i>List</a></li>
                    </ul>
                </li>
            <?php endif; ?>
            <li>
                <a href="#" class="btn-3"><i class="fa-solid fa-box"></i>Parcels
                    <span class="fas fa-caret-down third"></span>
                </a>
                <ul class="show-3">
                    <li><a href="add_parcel.php?"><i class="fas fa-caret-right"></i>Add New</a></li>
                    <li><a href="list_parcel.php"><i class="fas fa-caret-right"></i>List All</a></li>
                    <li><a href="parcel_list.php?&status=0"><i class="fas fa-caret-right"></i>Item Accepted</a></li>
                    <li><a href="parcel_list.php?&status=1"><i class="fas fa-caret-right"></i>Collected</a></li>
                    <li><a href="parcel_list.php?&status=2"><i class="fas fa-caret-right"></i>Shipped</a></li>
                    <li><a href="parcel_list.php?&status=3"><i class="fas fa-caret-right"></i>In-Transit</a></li>
                    <li><a href="parcel_list.php?&status=4"><i class="fas fa-caret-right"></i>Arrived at Destination</a></li>
                    <li><a href="parcel_list.php?&status=5"><i class="fas fa-caret-right"></i>Ready for Pickup</a></li>
                    <li><a href="parcel_list.php?&status=6"><i class="fas fa-caret-right"></i>Delivered</a></li>
                    <li><a href="parcel_list.php?&status=7"><i class="fas fa-caret-right"></i>Unsuccessful Delivery</a></li>
                </ul>
            </li>
            <li><a href="track.php"><i class="fa-solid fa-magnifying-glass"></i>Track Parcel</a></li>
            <!-- <li><a href="reports.php"><i class="fa-solid fa-book"></i>Reports</a></li> -->
            <li>
                <a href="#" class="btn-4"><i class="fa-solid fa-box"></i>Reports
                    <span class="fas fa-caret-down fourth"></span>
                </a>
                <ul class="show-4">
                    <?php if ($_SESSION['login_type'] == 1) : ?>
                        <li><a href="branch_reports.php?"><i class="fas fa-caret-right"></i>Branch Reports</a></li>
                    <?php endif; ?>
                    <li><a href="reports.php?"><i class="fas fa-caret-right"></i>Status Reports</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</div>