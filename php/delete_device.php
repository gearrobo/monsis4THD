<?php
include '../safe.php';
if ($_SERVER['REQUEST_METHOD'] == "POST") {
	$id = $_POST['device'];
	$sql = "DELETE FROM `hardware` WHERE `id_device`='$id';";
	$conn->query($sql);

	$sql = "DELETE FROM `log` WHERE `device_id`='$id';";
	$conn->query($sql);

	unlink(dirname(__FILE__).DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."logger".DIRECTORY_SEPARATOR.$id.".php");
}

?>