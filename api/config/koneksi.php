<?php
	$server = "mysql.idhostinger.com";
	$username = "u250074714_frolo";
	$password = "deklarasi";
	$database = "u250074714_fadli";
	// koneksi dan memilih database di server 
	$koneksi = mysqli_connect($server, $username, $password, $database) or die("koneksi gagal");
?>