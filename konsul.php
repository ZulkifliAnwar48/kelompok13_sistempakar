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
				<div class="icon fa-dribbble"><span class="label">Dribbble</span> TEOREMA BAYES</div>
				<nav>
					<a href="#menu">Menu</a>
				</nav>
			</header>

		<!-- Nav -->
			<nav id="menu">
				<ul class="links">
					<li><a href="index.php">Home</a></li>
					<li><a href="konsul.php">Konsultasi</a></li>
					<li><a href="admin/index.php" target="blank">Login</a></li>
				</ul>
			</nav>

		<!-- Heading -->
			<div id="heading" >
				<H1><div class="icon fa-leaf"><span class="label">Leaf</span> SISPAK ISPA</div></H1>
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
													if(isset($_POST['gejala'])){
														$listGejala = $_POST['gejala'];
														$hasilAkhir = bayesian($koneksi);
														$persen = substr($hasilAkhir[1], 0, 5);
														$kode = $hasilAkhir[2];
														//echo $kode;
														$query = mysqli_query($koneksi, "SELECT * FROM penyakit WHERE kode_penyakit='$kode'");
														$r = mysqli_fetch_array($query);
														$deskripsi = $r['deskripsi'];
														$pengobatan = $r['pengobatan'];
														$warna = "green";
														if ((int)$persen > 80) {
															$warna = "danger";
														} else if ((int)$persen < 80 && (int)$persen >= 50) {
															$warna = "warning";
														} else {
															$warna = "success";
														}
														echo"<div class='content'>
																<div class=\"well\">
																	<a href=\"#\">
																		<h1><strong><span class=\"glyphicon glyphicon-modal-window\"></span> Hasil Diagnosa</strong></h1>
																	</a>
																	<hr class=featurette-divider>
																	<br><h4>Berdasarkan gejala yang anda pilih,  anda di diagnosa terkena penyakit :</h4>
																	<h3><strong><a href=#>$hasilAkhir[0]</a></strong> dengan persentase <label class=\"label label-$warna\">$persen %</label></h3><br>
																	<hr class=featurette-divider>
																	<p align='justify'>$deskripsi</p>
																	<p align='justify'>$pengobatan</p>
																	<center><a href='konsul.php' class='button primary'>Back</a></center>
																</div>
															</div>";
													} else {
														?>
														<script type="text/javascript">
															$(document).ready(function() {
																$('#back').click(function() {
																	var url = $(this).attr('href');
																	$('#content').html("<div class=\"label label-danger col-md-12\"><img src=gambar/loading.gif> Loading...</div>").load(url);
																	return false;
																});
															});
														</script>
														<?php
														echo"<div class='content'>
																<div class=\"well\">
																	<a href=\"#\">
																		<strong><i class=\"glyphicon glyphicon-modal-window\"></i> Hasil Diagnosa</strong>
																	</a>
																	<br><h4>Belum ada gejala yang anda pilih, harap ulang proses konsultasi<a id='back' href='konsul.php'> klik disni</a></h4>
																</div>
															</div>";
													}
												} else {
													echo"<div class='content'>
															<div class='content'>
																<a href=\"#\">
													 				<h1>Konsultasi</h1>
																</a>
																<div class='content'>
																	<h3>Pilih Gejala Yang Anak Anda Alami</h3>
																	
																		<form method='post' enctype='multipart/form-data' action='konsul.php?aksi=diagnosa'>";
																		$no=1;
																		$query = "SELECT * FROM gejala ORDER BY kode_gejala ASC";
												  						$result = mysqli_query($koneksi, $query);
												  						while($baris=mysqli_fetch_array($result)) {
												  							

												  								?>
												  									<div class="col-6 col-12-small">
																						<input type="checkbox" id="checkbox-beta[<?php echo $no; ?>]" name="gejala[]" value='<?php echo $baris["kode_gejala"] ?>'>
																					<label for="checkbox-beta[<?php echo $no; ?>]"><?php echo $baris["nama_gejala"] ?></label>
												  								<?php 	
												  								$no++;
												  						}
												  				
																		echo "<div class='col-lg-12'>&nbsp</div>
																			<button id=diagnosa type=\"submit\" class=\"btn btn-sm btn-primary col-md-12\"><i class=\"glyphicon glyphicon-repeat\"></i> Diagnosa</button>
																		</form>

																	</div>
																</div>
															</div>
														</div>";
												}

											?>
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