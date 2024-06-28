<?php

use Dotenv\Dotenv;

require 'vendor/autoload.php';
//fetch environment variables 
$dotenv = Dotenv::createImmutable(__DIR__.'/../');
//load environment variables
$dotenv->load();

//SET TIMEZONE
$timezone = date_default_timezone_set("Africa/Nairobi");

//CONNECTION STRING
$con = mysqli_connect($_ENV['HOSTNAME'], $_ENV['USERNAME'], $_ENV['PASSWORD'], $_ENV['DATABASE']);

//check for errors during connection
if (mysqli_connect_errno()){
    echo "Failed to connect". mysqli_connect_errno();
}
?>