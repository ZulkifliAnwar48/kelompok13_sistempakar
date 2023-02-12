<?php
//include "koneksi.php";
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
?>
<?php

function getRowCount($conn){
	$result = mysqli_query($conn, "SELECT * FROM penyakit");
	$rowCount = mysqli_num_rows($result);
	return $rowCount;
}

function fetchAlergi($conn){
	$kode_penyakit = array();
	$response = array();
	$result = mysqli_query($conn, "SELECT * FROM penyakit");
	$i = 0;
	while ($row = mysqli_fetch_array($result)){
		$kode_penyakit[$i]=$row["kode_penyakit"];
		$i++;
		//$response["data"] = array();
		//array_push($response["data"], $kode_penyakit);
		//echo $kode_penyakit["kode_penyakit"];
	}
	return $kode_penyakit;
}

function getNamaPenyakit($kode_penyakit, $conn){
	//$ph = 0;
	$result = mysqli_query($conn, "SELECT nama_penyakit FROM penyakit WHERE kode_penyakit='$kode_penyakit'");
	if (mysqli_num_rows($result) > 0){
			$data = mysqli_fetch_assoc($result);
	}
	$nama=$data['nama_penyakit'];
	//echo "Probabilitas Kode Gejala $kode_penyakit : $row";
	return $nama;
}

function getProbabilitasPenyakit($kode_penyakit, $conn){
	//$ph = 0;
	$result = mysqli_query($conn, "SELECT probabilitas FROM penyakit WHERE kode_penyakit='$kode_penyakit'");
	if (mysqli_num_rows($result) > 0){
			$data = mysqli_fetch_assoc($result);
	}
	$ph = $data['probabilitas'];
	//echo "Probabilitas Kode Gejala $kode_penyakit : $row";
	return $ph;
}

function getProbabilitasAturan($kode_penyakit, $kode_gejala, $conn){
	$phe = 0;
	$result = mysqli_query($conn, "SELECT probabilitas FROM rule WHERE kode_penyakit='$kode_penyakit' AND kode_gejala='$kode_gejala'") or die(mysqli_error ($kode_gejala));
	if (mysqli_num_rows($result) > 0){
			$data = mysqli_fetch_assoc($result);
	}
	$phe = $data['probabilitas'];
	//echo $row;
	return $phe;
}

function bayesian($conn) {
	$hasil = array();
	$rowCount = getRowCount($conn);
	$penyakit = fetchAlergi($conn);
	$gejala = $_POST['gejala'];
	$gejalaLength = count($gejala);
	$probabilitasGejala = array();
	$hasil = array();
	for($x=0; $x<$gejalaLength; $x++){
		$temp = 0.0;
		
		for($y=0; $y<$rowCount; $y++){
				$value = getProbabilitasAturan($penyakit[$y], $gejala[$x], $conn);
				$temp += $value * getProbabilitasPenyakit($penyakit[$y], $conn);
		}
		$probabilitasGejala[$x] = $temp;
	}
	
	for($x=0; $x<$rowCount; $x++){
		$temp = 0.0;
		for($y=0; $y<$gejalaLength; $y++){
				$value = getProbabilitasAturan($penyakit[$x], $gejala[$y], $conn);
				$temp += ($value * getProbabilitasPenyakit($penyakit[$x], $conn)) / $probabilitasGejala[$y];
		}
		$hasil[$x] = $temp;
	}
	
	$jumlahHasil = 0;
	for($x=0; $x<$rowCount; $x++){
		$jumlahHasil += $hasil[$x];
	}
	
	for($x=0; $x<$rowCount; $x++){
		$hasil[$x] = ($hasil[$x] / $jumlahHasil) * 100;
	}
	
	$index = 0;
	$tempValue = 0;
	for($x=0; $x<$rowCount; $x++){
		if($hasil[$x] > $tempValue){
			$tempValue = $hasil[$x];
			$index = $x;
		}
	}
	$finalResult = array();
	$finalResult[0]= getNamaPenyakit($penyakit[$index], $conn);
	$finalResult[1]= $hasil[$index];
	$finalResult[2]= $penyakit[$index];
	return $finalResult;
	/* return getNamaPenyakit($penyakit[$index]); */
}

//echo json_encode(bayesian());
//echo getProbabilitasAturan('AL001', 'GJ009');
//showArray();
?>