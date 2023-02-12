<?php
include "koneksi.php";

if(isset($_GET['kode_alergi'])){
  $kode_alergi = $_GET['kode_alergi'];  
  $result = mysqli_query($koneksi, "SELECT * FROM alergi WHERE kode_alergi='$kode_alergi'") or die(mysql_error());
  $response = array();
  if(!empty($result)){
    if(mysqli_num_rows($result) > 0){
		$a = mysqli_fetch_array($result);
		$output = array();
		$output["kode_alergi"]=$a["kode_alergi"];
		$output["nama_alergi"]=$a["nama_alergi"];
		$output["deskripsi"]=$a["deskripsi"];
		$output["pengobatan"]=$a["pengobatan"];
		$output["probabilitas"]=$a["probabilitas"];	
		$response["success"] = 1;
		$response["data"] = array();
		array_push($response["data"], $output);
		echo json_encode($response);
    } else {
	$response["success"] = 0;
	$response["message"] = "Tidak Ada Data";
	echo json_encode($response);
    }
   } else {
   $response["success"] = 0;
   $response["message"] = "Tidak Ada Data";
   echo json_encode($response);  
  }
}
?>