<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
?>
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
		echo"<div class=col-lg-12>
				<div class=\"well\">
					<a href=\"#\">
						<h1><strong><span class=\"glyphicon glyphicon-modal-window\"></span> Hasil Diagnosa</strong></h1>
					</a>
					<hr class=featurette-divider>
					<br><h4>Berdasarkan gejala yang anda pilih,  anda di diagnosa mengidap penyakit :</h4>
					<h3><strong><a href=#>$hasilAkhir[0]</a></strong> dengan persentase <label class=\"label label-$warna\">$persen %</label></h3><br>
					<hr class=featurette-divider>
					<p>$deskripsi</p>
					<p>$pengobatan</p>
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
		echo"<div class=col-lg-12>
				<div class=\"well\">
					<a href=\"#\">
						<strong><i class=\"glyphicon glyphicon-modal-window\"></i> Hasil Diagnosa</strong>
					</a>
					<br><h4>Belum ada gejala yang anda pilih, harap ulang proses konsultasi<a id='back' href='konsultasi.php'> klik disni</a></h4>
				</div>
			</div>";
	}
} else {
	echo"<div class=\"col-lg-8 col-lg-offset-3 col-md-8 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-3\">
			<div class=\"col-lg-8\">
				<a href=\"#\">
					<strong><i class=\"glyphicon glyphicon-modal-window\"></i> Konsultasi</strong>
				</a>
				<div class=\"panel panel-primary\">
					<div class=\"panel-heading\"><center><strong>Pilih Gejala</strong></center></div>
					<div class=\"panel-body\">
						<form id='diagnosa_form' method='post' enctype='multipart/form-data' class=\"form-horizontal\" role=\"form\" action='konsultasi.php?aksi=diagnosa'>";
					
						$query = "SELECT * FROM gejala ORDER BY kode_gejala ASC";
  						$result = mysqli_query($koneksi, $query);
  						while($baris=mysqli_fetch_array($result)) {
  							echo "<div class=col-lg-6>
    								<input class=input_control type=checkbox value=$baris[kode_gejala] onclick=EnableDisableTextBox(this) name='gejala[]'> $baris[nama_gejala]
  								</div>";	
  						}
  				
						echo "<div class=col-lg-12>&nbsp</div>
							<button id=diagnosa type=\"submit\" class=\"btn btn-sm btn-primary col-md-12\"><i class=\"glyphicon glyphicon-repeat\"></i> Diagnosa</button>
						</form>
					</div>
					</div>
				</div>
			</div>
		</div>";
}

?>