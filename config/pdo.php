<?php
//using pdo to connect to the database
//PDO enables prepared statements, which improve security by reducing the risk of SQL injection attacks.

use Dotenv\Dotenv;
require 'vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();
$timezone = date_default_timezone_set("Africa/Nairobi");


// Database configuration
$db_host = $_ENV['HOSTNAME'];
$db_user = $_ENV['USERNAME'];
$db_pass = $_ENV['PASSWORD'];
$db_name = $_ENV['DATABASE'];

$db_con = new PDO('mysql:host='.$db_host. ';dbname='.$db_name, $db_user,$db_pass);

$db_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>