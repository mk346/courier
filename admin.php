<?php
ob_start();
date_default_timezone_set("Africa/Nairobi");
$action = $_GET['action'];
include 'functions.php';
$crud = new Action();

if($action == 'get_parcel_data'){
    $get = $crud->get_parcel_data();
    if($get)
        echo $get;
}



?>