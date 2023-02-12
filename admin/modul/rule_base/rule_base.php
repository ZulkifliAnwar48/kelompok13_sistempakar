<style type="text/css">
	#dropdown-menu ul li {
    list-style: disc outside none;
    [color=red]margin-left: 1rem;
    padding-left: 1rem;[/color]
    width: 100%;
}
</style>
<script type="text/javascript">
    function EnableDisableTextBox(chkGejala) {
        var txtProbabilitas = document.getElementById(chkGejala.value);
        txtProbabilitas.disabled = chkGejala.checked ? false : true;
        if (!txtProbabilitas.disabled) {
            txtProbabilitas.focus();
            txtProbabilitas.placeholder = "Probabilitas";
        } else {
        	txtProbabilitas.placeholder = "";
        	txtProbabilitas.value = "";
        }
    }

    $(document).ready(function() {
		$("a[href!='#']").click(function() {
			var url = $(this).attr('href');
			$('#content').html("<div class=\"label label-danger col-md-12\"><img src=gambar/loading.gif> Loading...</div>").load(url, function(){
				$('.dropdown.open .dropdown-toggle').dropdown('toggle');
			});
			return false;
		});

		$('#formAtur').submit(function(event) {
        	event.preventDefault();
        	var $form = $(this);

		    $.ajax({
		        type: $form.attr('method'),
		        url: $form.attr('action'),
		        data: $form.serialize(),
		        beforesend : $('#loading-rule').show(),
		        success: function(data, status) {
		        	$('#loading-rule').hide();
		            $('#content').html(data);
				    $('.label-success').fadeOut(4000);
		        }
		    });
    	});
	});

</script>
<?php
include "../config/koneksi.php";

if (isset($_GET['aksi'])){
	if($_GET['aksi'] == 'proses_atur'){
		$kode = $_GET['kode_penyakit'];
		$query = "DELETE FROM rule WHERE kode_penyakit = '$kode'";
		$result = mysqli_query($koneksi, $query);

		$listGejala = $_POST['gejala'];
		$listProbabilitas = $_POST['probabilitas'];
		$jumlah_gejala = count($listGejala);
		for ($i=0; $i<$jumlah_gejala; $i++){
			$prob = (float)$listProbabilitas[$i];
			$query = "INSERT INTO rule(kode_penyakit, kode_gejala, probabilitas) VALUES('$kode','$listGejala[$i]','$prob')";
			$result = mysqli_query($koneksi, $query);
		}
		//echo "<span class=\"label label-success col-md-8 col-md-offset-2\">Data Tersimpan</span>";
		?>
			<script type="text/javascript">
			   alert("Data tersimpan");
			   window.location = "?module=rule_base";
			</script>
		<?php 
	}

	if($_GET['aksi'] == 'atur'){
	?>
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">Rule Base</h1>
	      </div><!-- /.col -->
	      <div class="col-sm-6">
	        <ol class="breadcrumb float-sm-right">
	          <li class="breadcrumb-item"><a href="?module=home">Home</a></li>
	          <li class="breadcrumb-item active">Rule Base</li>
	        </ol>
	      </div><!-- /.col -->
	    </div><!-- /.row -->
	  </div><!-- /.container-fluid -->
	</div>
	<section class="content">
	      <div class="row">
	        <div class="col-12">
	          <div class="card">
	          	<div class="card-body">
					<?php 
					$kode = $_GET['kode_penyakit'];
					?>
					<div class="well col-lg-12">
							<div class="panel panel-primary">
								<div class="panel-heading"><center><h3><strong>Pilih Gejala Rule Base</strong></h3></center></div>
								<div class="panel-body">
									<?php 
									echo "
								<form id='formAtur' onSubmit=\"return validasi(this)\" method='post' enctype='multipart/form-data' class=\"form-horizontal\" role=\"form\" action='?module=rule_base&aksi=proses_atur&kode_penyakit=$kode'>";
								?>

								<table id="example" class="table table-bordered">
								<thead><tr><th>Gejala</th><th>Probabilitas</th></tr></thead><tbody>
								<?php
								$query = "SELECT * FROM gejala ORDER BY id ASC";
				  				$result = mysqli_query($koneksi, $query);
				  				$a=1;
				  				while($baris=mysqli_fetch_array($result)){


				  					echo "<tr>
				  					<td>
				  					<div class='icheck-success d-inline'>
				        				<input id=checkboxSuccess[$a] class=input_control type=checkbox value='$baris[kode_gejala]' onclick=EnableDisableTextBox(this) name='gejala[]'> <label for='checkboxSuccess[$a]'>$baris[nama_gejala] </label>
				  					</td>
				  					<td>
										<input type=number min=0.1 max=0.9 step=0.1 class=form-control id='$baris[kode_gejala]' name='probabilitas[]' disabled>	
				  					</td></tr>";	
				  					$a++;
				  				}
				  				echo "</tbody>";
				  				echo "</table>";
								echo "<div class=col-lg-12>&nbsp</div>
									<button type=\"submit\" class=\"btn btn-sm btn-primary\"><i class=\"glyphicon glyphicon-save\"></i> Simpan</button>
									
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
</section>
<?php 
}else{
?>
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Rule Base</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="?module=home">Home</a></li>
          <li class="breadcrumb-item active">Rule Base</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
          	<div class="card-body">
				<div class="well">
					<div id=loading-rule class="label label-danger col-md-12" style="display:none"><img src="gambar/loading.gif"> Loading...</div> 	
					<table class="table table-bordered" style="background-color:white;">
						<tr>
							<td>
								<div class="btn-group">
					  				<button type=button class="btn btn-info dropdown-toggle" data-toggle=dropdown aria-haspopup=true aria-expanded=false>
								    	Pilih Penyakit <span class=caret></span>
								  	</button>
					  				<ul class=dropdown-menu>
					  				<?php 
					  				$query = "SELECT kode_penyakit, nama_penyakit FROM penyakit ORDER BY kode_penyakit ASC";
					  				$result = mysqli_query($koneksi, $query);
					  				while($baris=mysqli_fetch_array($result)){
					  					echo "<li><p><font size='2px'><a href=?module=rule_base&kode_penyakit=$baris[kode_penyakit]>$baris[nama_penyakit]</a></font></p></li>";	
					  				}
					  				?>
					    			</ul>
								</div>
							</td>
					  	<?php 
					if(isset($_GET['kode_penyakit'])) {
						$kode = $_GET['kode_penyakit'];
						?>
						<td><a class="btn btn-primary" href="?module=rule_base&aksi=atur&kode_penyakit=<?php echo $kode ?>" role="button">
								<i class="glyphicon glyphicon-alt-list"></i> Atur Rule Base
					  	</a></td></table>
						<div class=col-lg-12>&nbsp</div>
						<?php 
						$query = "SELECT nama_penyakit FROM penyakit WHERE kode_penyakit = '$kode'";
			  			$result = mysqli_query($koneksi, $query);
			  			$nama = mysqli_fetch_array($result);
			  			?>
						<table class="table table-bordered" style="background-color:white;">
							<thead>
								<tr>
									<th colspan=4><center><?php echo $nama['nama_penyakit'] ?></center></th>
								</tr>
								<tr>
									<th><center>No</center></th>
									<th>Nama Gejala</th>
									<th><center>Probabilitas</center></th>
								<tr>
							</thead>
							<?php 
							$per_hal = 10;
							$jumlah_record = mysqli_query($koneksi, "SELECT * FROM rule WHERE kode_penyakit='$kode'");
							$jum = mysqli_num_rows($jumlah_record);
							$halaman = ceil($jum/$per_hal);
							$page = (isset($_GET['halaman'])) ? (int)$_GET['halaman'] : 1;
							$start = ($page - 1) * $per_hal;
							
							$hasil = mysqli_query($koneksi, "SELECT * FROM v_rule WHERE kode_penyakit='$kode' LIMIT $start, $per_hal");	
							$no = $start+1;
							while ($baris = mysqli_fetch_array($hasil)){
								echo "<tbody>
										<tr>";
											echo '<td><center>'.$no.'</center></td>';
											echo '<td>'.$baris['nama_gejala'].'</td>';
											echo '<td><center>'.$baris['probabilitas'].'</center></td>';
											// echo '<td><center><a href=home.php?page=gejala&aksi=edit&kode_gejala='.$baris['kode_gejala'].'><i class=\'glyphicon glyphicon-edit\'></i> Edit</a> || 
											// 	<a href=home.php?page=gejala&aksi=hapus&kode_gejala='.$baris['kode_gejala'].'><i class=\'glyphicon glyphicon-remove\'></i> Hapus</a></center></td>
										echo '</tr>';
								echo "<tbody>";
								$no++;
							}

							echo "</table>";
							
					} else {
						echo "</td></table>
						<div class=col-lg-12>&nbsp</div>";
					}
				echo "</div>";

			?>
			</div>
		</div>
	</div>
</section>
<?php } ?>