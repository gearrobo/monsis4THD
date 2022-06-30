<?php
include '../safe.php';
$_sql = "SELECT * FROM `log` WHERE `tipe`='suhu' ORDER BY `id` DESC LIMIT 1";
$res = $conn->query($_sql);
if ($res->num_rows > 0) {
	$row = mysqli_fetch_assoc($res);
	$LastSuhu = $row['data'];
} else {
	$LastSuhu = "0";
}
echo $LastSuhu;
?>