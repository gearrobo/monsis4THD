<?php
function reformatTime($time) {
    $time = strtotime($time);
    return date("m/d/Y", $time);
}

function getJam($time) {
    $date = strtotime($time);
    return date("H:i:s", $date);
}

function getTanggal($time) {
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
    return "$tanggal $bulan $tahun";
}

require_once 'db.php';
if ($_SERVER['REQUEST_METHOD'] == "POST") {
	$tipe = $_POST['tipe'];
	$sql = "SELECT * FROM `data` WHERE `tipe`='$tipe' ORDER BY `id` DESC LIMIT 1";
	$res = $conn->query($sql);
	$output = mysqli_fetch_assoc($res);

	if (count($output) > 0) {
		$output['tanggal'] = getTanggal($output['waktu']);
		$output['jam'] = getJam($output['waktu']);
	}
	echo json_encode($output, true);
}
?>