<?php
include '../safe.php';

if (isset($_POST['device'])) {
	$id = $_POST['device'];
	$sql = "DELETE FROM `log` WHERE `device_id`='$id'";
	if ($conn->query($sql)) {
		$sql = "UPDATE `hardware` SET `total`='0',`counter`='0' WHERE `id_device`='$id'";
		$conn->query($sql);
		
		echo "OK";
	} else {
		echo "FAILED";
	}
}
?>