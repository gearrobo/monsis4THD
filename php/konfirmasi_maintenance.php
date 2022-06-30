<?php
include '../safe.php';
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['device'])) {
	$id = $_POST['device'];
	$info = $_POST['data'];

	$sql = "SELECT * FROM `hardware` WHERE `id_device`='$id'";
	$row = mysqli_fetch_assoc($conn->query($sql));
	$totalnow = (int)$row['total'];
	$counter = (int)$row['counter'];
	$batas = (int)$row['batas'];
	$diff = $counter - $batas;

	$sql = "UPDATE `hardware` SET `counter`=$diff WHERE `id_device`='$id'";
	if ($conn->query($sql)) {
		$tanggal = date("Y-m-d");
		$jam = date("H:i:s");
		$sql = "INSERT INTO `maintenance` (`id`, `device`, `tanggal`, `jam`, `jam_ke`, `info`) VALUES (NULL, '$id', '$tanggal', '$jam', '$totalnow', '$info');";
		if ($conn->query($sql)) {
			echo "OK";
		} else {
			echo "FAILED";
		}
	} else {
		echo "FAILED";
	}
	
}