<?php
include 'db.php';
$statrelay = $conn->query("SELECT * FROM `relay` WHERE 1")->fetch_all(MYSQLI_ASSOC);
echo "@";
foreach($statrelay as $row) {
    echo ($row['relay'] == "mati") ? "0" : "1" ;
}
echo "$";
?>