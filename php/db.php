<?php
$serverdb   = "localhost";
$userdb     = "root";
$passdb     = "";
$dbname     = "air_monitor";
$conn       = new mysqli($serverdb, $userdb, $passdb, $dbname);
if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);} 
?>