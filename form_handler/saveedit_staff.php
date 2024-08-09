<?php
require '../config/pdo.php';
require '../config/config.php';
// require './check_login.php';

//new data to update database
$id = $_POST['memi'];
$a = $_POST['fname'];
$b = $_POST['lname'];
$c = $_POST['email'];
$d = $_POST['password'];
$e = $_POST['role'];
$f = $_POST['branch'];
$g = date("Y-m-d");

// Fetch the branch_id from the branches table based on the branch name
$my_query = "SELECT id FROM branch WHERE street = '$f' ";
$result = mysqli_query($con, $my_query);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $h = $row['id'];

//query to update the database
$sql =  "UPDATE users SET fname=?, lname=?, email=?, password=?, role=?, branch=?, date_created=?, branch_id=? WHERE id=?";
$query = $db_con->prepare($sql);
$query->execute(array($a,$b,$c,md5($d),$e,$f,$g,$h,$id));

} else {
    echo 'branch not found';
}

header("location: ../staff.php");

?>