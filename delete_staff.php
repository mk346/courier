<?php
require 'config/config.php';
require 'check_login.php';
if(isset($_GET['del_id'])){
    $id = $_GET['del_id']; //id to delete

    //sql query
    $sql = "DELETE FROM users WHERE id = $id";
    $result = mysqli_query($con,$sql);

    header("location: staff.php");
}


?>