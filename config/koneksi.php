<?php
	$server = "localhost";
	$username = "root";
	$password = "";
	$database = "sispak_ispa";
	// koneksi dan memilih database di server 
	$koneksi = mysqli_connect($server, $username, $password, $database) or die("koneksi gagal");
?>