<?php date_default_timezone_set('Asia/Jakarta'); ?>
<!DOCTYPE HTML>
<!--
	Industrious by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>PENYAKIT IKAN LELE</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="stylesheet" href="assets/css/main.css" />

		<script type="text/javascript">
		$(document).ready(function() {
			$('#diagnosa_form').submit(function(event) {
	        	var $form = $(this);

			    $.ajax({
			        type: $form.attr('method'),
			        url: $form.attr('action'),
			        data: $form.serialize(),
			        beforesend : $('#loading').show(),
			        success: function(data, status) {
			        	$('#content').html(data);
			        	$('#loading').hide()
			        }, 
			        error: function() {
			        	alert(status);
			        }
			    });
	        	event.preventDefault();
	    	});
		});
		</script>


	</head>
	<body class="is-preload">

		<!-- Header -->
			<header id="header">
				<span class="label">TEOREMA BAYES</span>
				<nav>
					<a href="#menu">Menu</a>
				</nav>
			</header>

		<!-- Nav -->
			<nav id="menu">
				<ul class="links">
					<li><a href="index.php">Home</a></li>
					<li><a href="konsul.php">Registrasi</a></li>
					<li><a href="pasien/index.php" target="blank">Login</a></li>
				</ul>
			</nav>

		<!-- Heading -->
			<div id="heading" >
				<H1><span class="label"></span> SISPAK IKAN LELE</H1>
			</div>

		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="inner">
					<div class="content">

					<!-- Elements -->
						<div class="row">
							<div class="content">
								<?php
									include "config/koneksi.php";
									include "metode_bayes.php";
									if(isset($_GET['aksi'])){
										
									}
								?>
								<section class="content">
								      <div class="container-fluid">
								      <div class="row">
								        <div class="col-12">
											
											<?php

											if(isset($_POST['add'])){
												$username		= $_POST['username'];
												$password		= md5($_POST['password']);
												$nama			= $_POST['nama'];
												$jenis_kelamin	= $_POST['jenis_kelamin'];
												$alamat			= $_POST['alamat'];
												$telp			= $_POST['telp'];
															
												$cek = mysqli_query($koneksi, "SELECT * FROM pasien WHERE username='$username'");
												if(mysqli_num_rows($cek) == 0) {
												    $insert = mysqli_query($koneksi, "INSERT INTO pasien(username, password, nama, jenis_kelamin, alamat, telp)VALUES('$username','$password','$nama','$jenis_kelamin','$alamat','$telp')") or die(mysqli_error($koneksi));
													if($insert){
														echo '<script type="text/javascript">
															   alert("Pendaftarn berhasil, silahkan login untuk melakukan konsultasi");
															   window.location = "pasien/index.php";
															  </script>';
													}else{
														echo '<script type="text/javascript">
															   alert("Pendaftarn gagal, silahkan ulangi lagi");
															   window.location = "registrasi.php";
															  </script>';
													}	
												}else{
													echo '<script type="text/javascript">
															   alert("Pendaftarn gagal, Username sudah terdaftar silahkan ulangi lagi");
														   window.location = "registrasi.php";
														  </script>';
												}
											}
											$now = strtotime(date("Y-m-d"));
											$maxage = date('Y-m-d', strtotime('-16 year', $now));
											$minage = date('Y-m-d', strtotime('-40 year', $now));
											
											?>
											<div class="card card-primary">
								              	<div class="card-header">
								                    <h3 class="card-title">Form Registrasi</h3>
														<form class="form-horizontal" action="" method="post">
															<div class="form-group">
																<label class="col-sm-3 control-label">Username</label>
																<div class="col-sm-12">
																	<input type="text" name="username" class="form-control" placeholder="Username" required size="300">
																</div>
															</div> 
															<div class="form-group">
																<label class="col-sm-3 control-label">Password</label>
																<div class="col-12">
																	<input type="password" name="password" class="form-control" placeholder="Password" required size="300">
																</div>
															</div>
															<div class="form-group">
																<label class="col-sm-3 control-label">Nama Lengkap</label>
																<div class="col-sm-12">
																	<input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" required size="300">
																</div>
															</div>
															<div class="form-group">
																<label class="col-sm-3 control-label">Jenis Kelamin</label>
																<div class="col-12">
																	<select name="jenis_kelamin" class="form-control" required="">
																		<option value="">Pilih</option>
																		<option value="Laki Laki">Laki Laki</option>
																		<option value="Perempuan">Perempuan</option>
																	</select>
																</div>
															</div> 
															<div class="form-group">
																<label class="col-sm-3 control-label">Alamat</label>
																<div class="col-12">
																	<input type="text" name="alamat" class="form-control" placeholder="Alamat" required size="300">
																</div>
															</div> 
															<div class="form-group">
																<label class="col-sm-3 control-label">Telepon</label>
																<div class="col-12">
																	<input type="text" name="telp" class="form-control" placeholder="Telpeon" required size="300">
																</div>
															</div> 
															<div class="form-group">
																<label class="col-sm-3 control-label">&nbsp;</label>
																<div class="col-12">
																	<input type="submit" name="add" class="btn btn-sm btn-primary" value="simpan">
																	
																</div>
															</div>
														</form>
														
													</div>	
											</div>
										</div>
									</div>
								</section>
							</div>
						</div>
					</div>
				</div>
			</section>

		<!-- Footer -->
			<!-- Footer -->
			<footer id="footer">
				<div class="inner">
					<div class="content">
						
					</div>
					<div class="copyright">
						 <?php echo date("Y") ?>.
					</div>
				</div>
			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>