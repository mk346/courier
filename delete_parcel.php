<?php
require 'config/config.php';
if (isset($_GET['del_id'])){
    $id = $_GET['del_id'];

    $sql = "DELETE FROM parcels WHERE parcel_id =$id";
    $result = mysqli_query($con,$sql);

    header("Location: list_parcel.php");
}


?>