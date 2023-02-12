<?php
include "koneksi.php";

$q = mysqli_query($koneksi, "SELECT * FROM alergi");
$response["data"] = array();
while ($a = mysqli_fetch_array($q)){
	$response["jumlah"] = mysqli_num_rows($q);
	$output = array();
	$output["kode_alergi"]=$a["kode_alergi"];
	$output["nama_alergi"]=$a["nama_alergi"];
	$output["deskripsi"]=$a["deskripsi"];
	$output["pengobatan"]=$a["pengobatan"];
	$output["probabilitas"]=$a["probabilitas"];	
	array_push($response["data"], $output);
}
echo json_encode($response);
?>