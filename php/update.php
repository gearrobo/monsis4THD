<?php


date_default_timezone_set("Asia/Jakarta");
include 'db.php';
include 'variable.php';

$suhu = $_GET['suhu'];
$kelembaban = $_GET['hm'];
$waktu = date("Y-m-d H:i:s");

$conn->query("INSERT INTO `data`(`tipe`, `data`, `waktu`) VALUES ('suhu','$suhu','$waktu')");
$conn->query("INSERT INTO `data`(`tipe`, `data`, `waktu`) VALUES ('kelembaban','$kelembaban','$waktu')");

echo "OK";


?>