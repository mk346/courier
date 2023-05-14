<?php
require 'config/session.php';
require 'config/config.php';
include 'header.php';
?>

<div class="modal fade show" role="dialog" id="modal-parcel">
    <div class="modal-dialog modal-md large" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Parcel's Details</h5>
            </div>
            <div class="modal-body">
                <div class="container-fluid2">
                    <div class="colum-main">
                        <div class="row">
                            <div class="column-main">
                                <div class="info-1 info-head">
                                    <dl>
                                        <dt>Tracking Number:</dt>
                                        <dd>
                                            <h4 class="track-no"><b class="stronger">12303777377</b></h4>
                                        </dd>
                                    </dl>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="column-small">
                                <div class="info-1 info-head">
                                    <b class="border-bottom border-primary">Sender Information</b>
                                    <dl>
                                        <dt>Name:</dt>
                                        <dd>John Kim</dd>
                                        <dt>Address:</dt>
                                        <dd>Kikuyu</dd>
                                        <dt>Contact:</dt>
                                        <dd>01887881819</dd>
                                    </dl>
                                </div>
                                <div class="info-1 info-head">
                                    <b class="border-bottom border-primary">Recipient Information</b>
                                    <dl>
                                        <dt>Name:</dt>
                                        <dd>Rubi Kim</dd>
                                        <dt>Address:</dt>
                                        <dd>Mombasa</dd>
                                        <dt>Contact:</dt>
                                        <dd>01885681819</dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="column-small">
                                <div class="info-1 info-head">
                                    <b class="border-bottom border-primary">Parcel Details</b>
                                    <div class="row">
                                        <div class="column-small">
                                            <dl>
                                                <dt>Weight:</dt>
                                                <dd>10</dd>
                                                <dt>Height:</dt>
                                                <dd>12</dd>
                                                <dt>Price</dt>
                                                <dd>700.00</dd>
                                            </dl>
                                        </div>
                                        <div class="column-small">
                                            <dl>
                                                <dt>Width</dt>
                                                <dd>5</dd>
                                                <dt>Length:</dt>
                                                <dd>12</dd>
                                                <dt>Type:</dt>
                                                <dd><span class="status-btn">Pickup</span></dd>

                                            </dl>
                                        </div>
                                    </div>
                                    <dl>
                                        <dt>Processing Branch:</dt>
                                        <dd>020 Nairobi</dd>
                                        <dt>Pickup Branch:</dt>
                                        <dd>090 Ongata Rongai</dd>
                                        <dt>Status:</dt>
                                        <dd><span class="status-btn">Item Accepted by Courier</span>
                                            <span class="status-btn" id="update-status">
                                                <i class="fa fa-edit"></i>
                                                Update Status
                                            </span>
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-main close-modal" data-close-button="close-btn">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal-two" id="modal-status">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Status of: 132455626277</h5>
            </div>
            <div class="modal-body">
                <div class="container-fluid2">
                    <form action="#" method="POST" id="update-status">
                        <div class="form-group-lg">
                            <label for="">Update Status</label>
                            <?php $status_arr = array("Item Accepted By Courier", "Collected", "Shipped", "In-Transit", "Arrived At Destination", "Out of Delivery", "Ready for Pickup", "Delivered", "Picked-Up", "Unsuccessful Delivery Attempt"); ?>
                            <select name="status" id="" class="select-sm">
                                <?php foreach ($status_arr as $k => $v) : ?>
                                    <option value="<?php echo $k ?>"><?php echo $v; ?></option>
                                <?php endforeach; ?>
                            </select>

                        </div>
                    </form>
                </div>
                <div class="modal-footer padding-margin">
                    <button type="button" form="update-status" class="btn-main btn-update">Update</button>
                    <button type="button" class="btn-main close-modal" id="close-modal2">Close</button>

                </div>
            </div>
        </div>
    </div>

</div>


<div id="modal-overlay"></div>