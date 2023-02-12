<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

function fetchAlergi(){
	$conn = mysqli_connect("mysql.idhostinger.com","u250074714_frolo","deklarasi", "u250074714_fadli");
	$kode_alergi = array();
	$response = array();
	$result = mysqli_query($conn, "SELECT * FROM alergi");
	$i = 0;
	while ($row = mysqli_fetch_array($result)){
		$kode_alergi[$i]=$row["kode_alergi"];
		$i++;
		//$response["data"] = array();
		//array_push($response["data"], $kode_alergi);
		//echo $kode_alergi["kode_alergi"];
	}
	return $kode_alergi;
}

function getRowCount(){
	$conn = mysqli_connect("mysql.idhostinger.com","u250074714_frolo","deklarasi", "u250074714_fadli");
	$result = mysqli_query($conn, "SELECT * FROM alergi");
	$rowCount = mysqli_num_rows($result);
	return $rowCount;
}

function getNamaPenyakit($kode_alergi){
	$conn = mysqli_connect("mysql.idhostinger.com","u250074714_frolo","deklarasi", "u250074714_fadli");
	$result = mysqli_query($conn, "SELECT nama_alergi FROM alergi WHERE kode_alergi='$kode_alergi'") ;
	if (mysqli_num_rows($result) > 0){
			$data = mysqli_fetch_assoc($result);
	}
	//echo "Probabilitas Kode Gejala $kode_alergi : $row";
	$nama = $data['nama_alergi'];
	return $nama;
}

function getProbabilitasPenyakit($kode_alergi){
	$conn = mysqli_connect("mysql.idhostinger.com","u250074714_frolo","deklarasi", "u250074714_fadli");
	$result = mysqli_query($conn, "SELECT probabilitas FROM alergi WHERE kode_alergi='$kode_alergi'");
	if (mysqli_num_rows($result) > 0){
			$data = mysqli_fetch_assoc($result);
	}
	$ph = $data['probabilitas'];
	//echo "Probabilitas Kode Gejala $kode_alergi : $row";
	return $ph;
}

function getProbabilitasAturan($kode_alergi, $kode_gejala){
	$conn = mysqli_connect("mysql.idhostinger.com","u250074714_frolo","deklarasi", "u250074714_fadli");
	$result = mysqli_query($conn, "SELECT probabilitas FROM rule WHERE kode_alergi='$kode_alergi' AND kode_gejala='$kode_gejala'");
	if (mysqli_num_rows($result) > 0){
			$data = mysqli_fetch_assoc($result);
	}
	$phe = $data['probabilitas'];
	return $phe;
}

/* function showArray(){
	$arr = fetchAlergi();
	$arrLength = count(fetchAlergi());
	//fetchAlergi();
	//echo $arrLength;
	for($x=0; $x<$arrLength; $x++){
		echo $arr[$x];
	}
} */

function bayesian(){
	$hasil = array();
	$rowCount = getRowCount();
	$alergi = fetchAlergi();
	$gejala = $_POST['gejala'];
	$gejalaLength = count($gejala);
	$probabilitasGejala = array();
	$hasil = array();
	$response["data"] = array();
	for($x=0; $x<$gejalaLength; $x++){
		$temp = 0.0;
		
		for($y=0; $y<$rowCount; $y++){
				$value = getProbabilitasAturan($alergi[$y], $gejala[$x]);
				$temp += $value * getProbabilitasPenyakit($alergi[$y]);
		}
		$probabilitasGejala[$x] = $temp;
	}
	
	for($x=0; $x<$rowCount; $x++){
		$temp = 0.0;
		for($y=0; $y<$gejalaLength; $y++){
				$value = getProbabilitasAturan($alergi[$x], $gejala[$y]);
				$temp += ($value * getProbabilitasPenyakit($alergi[$x])) / $probabilitasGejala[$y];
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
	$finalResult["hasil"] = getNamaPenyakit($alergi[$index]);
	$finalResult["persentase"] = $hasil[$index];
	array_push($response["data"], $finalResult);
	return $response;
	/* return getNamaPenyakit($alergi[$index]); */
	//echo getNamaPenyakit($alergi[$index]);
}
//bayesian();

echo json_encode(bayesian());
//echo getProbabilitasAturan('AL001', 'GJ009');
//showArray();
?>