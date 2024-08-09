<?php
require 'config/session.php';
require 'config/config.php';
require 'check_login.php';
include 'header.php';
include 'sidebar.php';
include 'topbar.php';
// require 'config/pdo.php';
?>
<div class="sub-wrapper2">
    <h1 class="main-header1">Branch List</h1>
    <hr class="line">
</div>
<div class="container-fluid">
    <div class="col-3">
        <div class="card-1 card-outline card-primary">
            <div class="card-header">
                <div class="card-item">
                    <a href="new_branch.php" class="btn3">
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
                                        <th class="rhead">Branch Code</th>
                                        <th class="rhead">Street/Building</th>
                                        <th class="rhead">City/Town</th>
                                        <th class="rhead">County</th>
                                        <th class="rhead">Postal Code</th>
                                        <th class="rhead">Contact</th>
                                        <th class="rhead">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    $query = $con->query("SELECT * FROM branch order by id desc");
                                    while ($row = $query->fetch_assoc()) :
                                    ?>
                                        <tr>
                                            <td class="rbody"><?php echo $i++ ?></td>
                                            <td class="rbody">
                                                <b>
                                                    <?php echo $row['code'] ?>
                                                </b>
                                            </td>
                                            <td class="rbody">
                                                <b>
                                                    <?php echo $row['street'] ?>
                                                </b>
                                            </td>
                                            <td class="rbody">
                                                <b>
                                                    <?php echo $row['city'] ?>
                                                </b>
                                            </td>
                                            <td class="rbody">
                                                <b>
                                                    <?php echo $row['county'] ?>
                                                </b>
                                            </td>
                                            <td class="rbody">
                                                <b>
                                                    <?php echo $row['postal'] ?>
                                                </b>
                                            </td>
                                            <td class="rbody">
                                                <b>
                                                    <?php echo $row['contact'] ?>
                                                </b>
                                            </td>
                                            <td class="rbody">
                                                <div class="btn-group">
                                                    <a href="edit_branch.php?&id=<?php echo $row['id'] ?>" class="btn-main btn-edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="delete_branch.php?&del_id=<?php echo $row['id'] ?>" class="btn-main btn-del">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
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