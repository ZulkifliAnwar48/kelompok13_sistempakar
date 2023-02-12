<?php
	if(isset($_GET['aksi']) == 'delete_all'){
		
		$delete = mysqli_query($koneksi, "DELETE FROM penyakit WHERE kode_penyakit='$_GET[id]'");
		if($delete){
			echo '<div class="alert alert-success" role="alert">
				  <strong>Sukses!</strong> Data berhasil Dihapus
				  </div>';
		}else{
			echo '<div class="alert alert-danger" role="alert">
				  <strong>Sukses!</strong> Data berhasil Dihapus
				  </div>';
		}
	}
	
?>
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Hasil Konsultasi</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="?module=home">Home</a></li>
          <li class="breadcrumb-item active">Hasil Konsultasi</li>

        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
  <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">

          <div class="card">
             
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
				<tr>
					<th>No</th>
					<th>Tanggal</th>
					<th>Nama Pasien</th>
					<th>Nama Penyakit</th>
					<th>Keterangan</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$sql =  mysqli_query($koneksi, "SELECT * FROM konsultasi, pasien, penyakit WHERE konsultasi.kode_pasien=pasien.kode_pasien AND konsultasi.hasil=penyakit.kode_penyakit");
					$no = 1;
					while($row = mysqli_fetch_array($sql)){
				?>	
						<tr>	
							<td><?php echo $no ?></td>
							<td><?php echo $row['tanggal'];?></td>
							<td><?php echo $row['nama'];?></td>
							<td><?php echo $row['nama_penyakit'];?></td>
							<td><?php echo $row['keterangan'];?></td>
						</tr>
						
						<?php
						$no++;
				}
				?>
				</tbody>
				
				</table>
				
				</div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content --

	