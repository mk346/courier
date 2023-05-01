<?php
// Database configuration

$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'courier';

$db_con = new PDO('mysql:host='.$db_host. ';dbname='.$db_name, $db_user,$db_pass);

$db_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>