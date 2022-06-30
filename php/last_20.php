<?php
function remakeDate($time) {
	$array_bulan = array(
        "1" => "Januari",
        "2" => 'Februari',
        "3" => 'Maret',
        "4" => 'April',
        "5" => 'Mei',
        "6" => 'Juni',
        "7" => 'Juli',
        "8" => 'Agustus',
        "9" => 'September',
        "10" => 'Oktober',
        "11" => 'November',
        "12" => 'Desember'
    );
	$date = strtotime($time);
	$bulan = $array_bulan[date("n", $date)];
    $tanggal = date("j", $date);
    $tahun = date("Y", $date);
	return "$tanggal $bulan $tahun ".date("H:i:s", $date);
}

function ambilData($tipe) {
	global $conn;
	$array = array(
		"data" => array(),
		"tanggal" => array()
	);
	$sqldata = $conn->query("SELECT * FROM (SELECT * FROM `data` WHERE `tipe`='$tipe' ORDER BY `id` DESC LIMIT 20) tmp ORDER BY tmp.id asc")->fetch_all(MYSQLI_ASSOC);
	if (count($sqldata) > 0) {
		foreach ($sqldata as $row) {
			array_push($array['data'], (double)$row['data']);
			array_push($array['tanggal'], remakeDate($row['waktu']));
		}
	} 
	return $array;
}


include 'db.php';
if (empty($_GET['tipe'])) { exit(header("Location: /")); }

$tipe = $_GET['tipe'];
$arr=ambilData($tipe);

// $temperature = $conn->query("SELECT * FROM (SELECT * FROM `temperature` WHERE `device_id`='$id' ORDER BY `id` DESC LIMIT 30) tmp ORDER BY tmp.id asc")->fetch_all(MYSQLI_ASSOC);
// if (count($temperature) > 0) {
// 	foreach ($temperature as $row) {
// 		array_push($arr['temperature']['data'], $row['data']);
// 	}
	
// } 

echo json_encode($arr, true);
?>