<?php
include 'db.php';
$conn->query("DELETE FROM `data` WHERE 1");
header("Location: /");
?>