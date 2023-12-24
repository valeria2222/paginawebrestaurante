<?php
require_once('config.php');

$conn = mysqli_connect($hostname, $username, $password, $database);

if (!$conn) {
    error_log("Connection failed: " . mysqli_connect_error());
    return;
} 

error_log("Listening Server MySQL on port 3306...");

?>