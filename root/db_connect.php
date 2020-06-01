<?php

//four variables for database connection to mysqli
$host = "localhost";
$username = "root";
$user_pass = "usbw";
$database_in_use = "test";

//create database connection instance
$mysqli = new mysqli($host, $username, $user_pass, $database_in_use);

?>
