<?php
include '../config/pdo.php'; //database connection

//edit data capture
$id = $_POST['memi'];
$a = $_POST['street'];
$b = $_POST['city'];
$c = $_POST['code'];
$d = $_POST['postal'];
$e = $_POST['county'];
$f = $_POST['contact'];

//query to update the data into the database
$sql = "UPDATE branch SET street=?, city=?, code=?,postal=?,county=?,contact=? WHERE id=?";
$query = $db_con->prepare($sql);
$query->execute(array($a,$b,$c,$d,$e,$f,$id));

header("location: ../branchlist.php");




?>