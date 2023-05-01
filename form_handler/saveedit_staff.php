<?php
include '../config/pdo.php';

//new data to update database
$id = $_POST['memi'];
$a = $_POST['fname'];
$b = $_POST['lname'];
$c = $_POST['email'];
$d = $_POST['password'];
$e = $_POST['role'];
$f = $_POST['branch'];
$g = date("Y-m-d");

//query to update the database
$sql =  "UPDATE users SET fname=?, lname=?, email=?, password=?, role=?, branch=?, date_created=? WHERE id=?";
$query = $db_con->prepare($sql);
$query->execute(array($a,$b,$c,md5($d),$e,$f,$g,$id));

header("location: ../staff.php");

?>