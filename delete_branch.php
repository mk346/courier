<?php
require 'config/config.php';
if(isset($_GET['del_id'])){
    $id = $_GET['del_id'];

    $sql = "DELETE FROM branch WHERE id=$id";
    $result = mysqli_query($con,$sql);

    header("location: branchlist.php");
}



?>