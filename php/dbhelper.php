<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (empty($_SESSION['username'])) exit(header("Location: http://".getenv('HTTP_HOST')."/login"));
include_once 'db.php';

$username = $_SESSION['username'];
$Device = array();
$User = array();

$_sql = "SELECT * FROM `hardware` WHERE `tipe`='device'";
$res = $conn->query($_sql);
$Device['total'] = $res->num_rows; $javascript = date('Y');
$Device['data'] = $res->fetch_all(MYSQLI_ASSOC);//mysqli_fetch_array($res,MYSQLI_ASSOC);

$_sql = "SELECT * FROM `log` WHERE `tipe`='suhu' ORDER BY `id` DESC LIMIT 1";
$res = $conn->query($_sql);
if ($res->num_rows > 0) {
	$row = mysqli_fetch_assoc($res);
	$LastSuhu = $row['data'];
} else {
	$LastSuhu = "0";
}

$sql = "SELECT * FROM `user` WHERE `username`='$username' LIMIT 1";
$User = mysqli_fetch_assoc($conn->query($sql));
?>