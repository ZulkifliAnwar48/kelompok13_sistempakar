<?php
include "koneksi.php";;
   
$q = mysqli_query($koneksi, "SELECT * FROM gejala");
$response["data"] = array();
while ($a = mysqli_fetch_array($q)){
 $response["jumlah"] = mysqli_num_rows($q);
 $output = array();
 $output["kode_gejala"]=$a["kode_gejala"];
 $output["nama_gejala"]=$a["nama_gejala"];
 array_push($response["data"], $output);
}
echo json_encode($response);
?>