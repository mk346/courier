<?php
require '../config/pdo.php';
require '../config/config.php';

$VAT = 0.16;
$tax = 0;
$amount = 0;
$total = 0;
$reference_number = "";
$date_created = "";

//NEW DATA TO UPDATE THE DATABASE
$id = $_POST['memi'];
$a = $_POST['sname'];
$b = $_POST['saddress'];
$c = $_POST['scontact'];
$d = $_POST['rname'];
$e = $_POST['raddress'];
$f = $_POST['rcontact'];
$g = $_POST['type'];
$h = $_POST['status'];
$i = $_POST['processed_br'];
$j = $_POST['pickup_br'];
$k = $_POST['delivery_loc'];
$l = $_POST['weight'];
$l = intval($l);
$m = $_POST['price'];
$m = intval($m);
$n = $_POST['charge'];
$n = intval($n);
$amount = $n + ($l * $m);
$tax = $amount * $VAT;
$total = $amount + $tax;
$reference_number;
$date_created = date("Y-m-d");

// $sql = "UPDATE parcels SET sname=?, saddress=?, scontact=?,rname=?,raddress=?,rcontact=?,type=?,processed_br=?,pickup_br=?,deliver_loc=?,weight=?,height=?,length=?,width=?,price=?,amount=?,reference_number=?,status=?,date_created=? WHERE parcel_id=?";
// $qry = $db_con->prepare($sql);
// $qry->execute(array($a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n,$o,$p,$amount,$reference_number,$date_created,$id));

//update status
$update = $con->query("UPDATE parcels SET sname='$a',saddress='$b',scontact ='$c',rname='$d',raddress='$e',rcontact='$f',type='$g',status='$h',processed_br='$i',pickup_br='$j',deliver_loc='$k',weight='$l',charge='$n',price='$m',amount='$total',date_created='$date_created' WHERE parcel_id = '$id'");

header("Location: ../list_parcel.php");



?>