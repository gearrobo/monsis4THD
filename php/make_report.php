<?php
require_once 'db.php';
require_once 'fpdf/fpdf.php';

class ReportDevice extends FPDF {
	private $array_bulan = array(
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

	function getJam($time) {
	    $date = strtotime($time);
	    return date("H:i:s", $date);
	}

	function BuatHeader($nama, $deskripsi) {
		//Logo Perusahaan
		//$this->Image('assets/images/users/'.$logo,10,6,25);

		//Nama Perusahaan
		$this->Cell(80);
		$this->Cell(30,10,$nama,0,0,'C');
		$this->Ln(); 

		//Deskripsi Singkat
		$this->SetFont('Times','',15);
		$this->Cell(80);
		$this->Cell(30,5,$deskripsi,0,0,'C');
		$this->Ln(); 
	}

	function ListDevice($hardware) {
		$this->SetFont('Times','',14);
		$this->Ln();
		$this->Cell(0,10,'List Device : ',0,0,'L'); $this->Ln();
		for ($i=1; $i < count($hardware); $i++) { 
	        $this->Cell(0,7," $i. ".$hardware[$i]['nama'],0,0,'L'); $this->Ln();
	    }
	}

	function InfoDevice($tglawal, $tglakhir, $jamawal, $jamakhir) {
		$this->SetFont('Times','',14);
		$this->Ln();
		$this->Cell(0,5,'Tanggal : '.$this->getTanggal($tglawal).' sampai '.$this->getTanggal($tglakhir),0,0,'L');$this->Ln();
		$this->Cell(0,10,'Jam : '.$jamawal.' sampai '.$jamakhir,0,0,'L');$this->Ln();
	}

	function BuatTtd($lokasi) {
		$bulan = $this->array_bulan[date("n")];
		$tanggal = date("j");
		$tahun = date("Y");
		$this->Cell(0);
		$this->Cell(-10,25,"$lokasi, $tanggal $bulan $tahun",0,0,'R'); $this->Ln();  
		$this->Cell(0);
		$this->SetFont('', 'U'); 
		$spacing = ""; for ($i=5; $i < strlen("$lokasi, $tanggal $bulan $tahun"); $i++) $spacing .= "  ";
		$this->Cell(-10,20,$spacing,0,0,'R');
	} 

	function Tabel($judul, $data) {
		$this->SetFont('Times','B',14);
		$this->Cell(0,10,"Tabel $judul",0,0,'L');$this->Ln();
		// Colors, line width and bold font
	    $this->SetFillColor(25,175,255);
	    $this->SetTextColor(255);
	    $this->SetDrawColor(128,0,0);
	    $this->SetLineWidth(.3);
	    $this->SetFont('','B');

	    $size = array(25, 50, 45, 45);

	    $this->Cell($size[0],8,"Nomor",1,0,'C',true);
	    $this->Cell($size[1],8,"Tanggal",1,0,'C',true);
	    $this->Cell($size[2],8,"Jam",1,0,'C',true);
	    $this->Cell($size[3],8,"Data",1,0,'C',true);
	    $this->Ln();
	    // Color and font restoration
	    $this->SetFillColor(224,235,255);
	    $this->SetTextColor(0);
	    $this->SetFont('');
	    // Data
	    $fill = false;
	    $counter=0;

	    foreach($data as $row)
	    {
	    	$time = $row['waktu'];
	    	$counter++;
	    	$this->Cell($size[0],6,$counter,'LR',0,'C',$fill);
	        $this->Cell($size[1],6,$this->getTanggal($time),'LR',0,'C',$fill);
	        $this->Cell($size[2],6,$this->getJam($time),'LR',0,'C',$fill);
	        $this->Cell($size[3],6,$row['data'],'LR',0,'C',$fill);
	        $this->Ln();
	        $fill = !$fill;
	    }
	    // Closing line
	    $this->Cell(array_sum($size),0,'','T');
	    $this->Cell(-10,10," ",0,0,'R'); 
	}

	function BuatTabel($header, $data) {
	    // Colors, line width and bold font
	    $this->SetFillColor(25,175,255);
	    $this->SetTextColor(255);
	    $this->SetDrawColor(128,0,0);
	    $this->SetLineWidth(.3);
	    $this->SetFont('','B');
	    // Header
	    $w = array(15, 55, 45, 45, 30);
	    for($i=0;$i<count($header);$i++)
	        $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
	    $this->Ln();
	    // Color and font restoration
	    $this->SetFillColor(224,235,255);
	    $this->SetTextColor(0);
	    $this->SetFont('');
	    // Data
	    $fill = false;
	    $counter=0;
	    foreach($data as $row)
	    {
	    	$counter++;
	    	$this->Cell($w[0],6,$counter,'LR',0,'C',$fill);
	        $this->Cell($w[1],6,$row['device_id'],'LR',0,'C',$fill);
	        $this->Cell($w[2],6,$row['tanggal'],'LR',0,'C',$fill);
	        $this->Cell($w[3],6,$row['jam'],'LR',0,'C',$fill);
	        $this->Cell($w[4],6,$row['data'],'LR',0,'C',$fill);
	        $this->Ln();
	        $fill = !$fill;
	    }
	    // Closing line
	    $this->Cell(array_sum($w),0,'','T');
	    $this->Cell(-10,10," ",0,0,'R'); 
	}

	function BuatTabelKeseluruhan($header, $data) {
		$this->SetFont('Times','',14);
		$this->Ln();
		$this->Cell(0,10,'Rekapitulasi data terakhir : ',0,0,'L'); $this->Ln();
	    // Colors, line width and bold font
	    $this->SetFillColor(25,175,255);
	    $this->SetTextColor(255);
	    $this->SetDrawColor(128,0,0);
	    $this->SetLineWidth(.3);
	    $this->SetFont('','B');
	    // Header
	    $w = array(15, 55, 45, 45, 30);
	    for($i=0;$i<count($header);$i++)
	        $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
	    $this->Ln();
	    // Color and font restoration
	    $this->SetFillColor(224,235,255);
	    $this->SetTextColor(0);
	    $this->SetFont('');
	    // Data
	    $fill = false;
	    $counter=0;

	    foreach($data as $row)
	    {
	    	$date_data = strtotime($row['tanggal']);
	    	$bulan = $this->array_bulan[date("n", $date_data)];
			$tanggal = date("j", $date_data);
			$tahun = date("Y", $date_data);

	    	$counter++;
	    	$this->Cell($w[0],6,$counter,'LR',0,'C',$fill);
	        $this->Cell($w[1],6,$row['device_id'],'LR',0,'C',$fill);
	        $this->Cell($w[2],6,"$tanggal $bulan $tahun",'LR',0,'C',$fill);
	        $this->Cell($w[3],6,$row['jam'],'LR',0,'C',$fill);
	        $this->Cell($w[4],6,$row['data'],'LR',0,'C',$fill);
	        $this->Ln();
	        $fill = !$fill;
	    }
	    // Closing line
	    $this->Cell(array_sum($w),0,'','T');
	    $this->Cell(-10,10," ",0,0,'R'); 
	}
}

?>