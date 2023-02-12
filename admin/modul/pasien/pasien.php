<?php
	if(isset($_GET['aksi']) == 'delete'){
		$kode_pasien = $_GET['kode_pasien'];
		$delete = mysqli_query($koneksi, "DELETE FROM pasien WHERE kode_pasien='$kode_pasien'");
		if($delete){
			echo '<div class="alert alert-success" role="alert">
				  <strong>Sukses!</strong> Data berhasil Dihapus
				  </div>';
		}else{
			echo '<div class="alert alert-danger" role="alert">
				  <strong>Gagal!</strong> Data gagal dihapus
				  </div>';
		}
	}
?>
<div class="content-header">
  <div class="container-flukode_petani">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Pasien</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="?module=home">Home</a></li>
          <li class="breadcrumb-item active">Pasien</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-flukode_petani -->
</div>
<!-- /.content-header -->
  <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">

          <div class="card">
            <div class="card-header">
              <h3 class="card-title"> <a href="?module=input_pasien"><button class="btn btn-primary">Tambah Data</button>  <a href="cetak_pasien.php"><button class="btn btn-primary">Cetak Data Pasien</button></a>
              	
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
				<tr>
					<th>No</th>
					<th>Username</th>
					<th>Nama</th>
					<th>Jenis Kelamin</th>
					<th>Alamat</th>
					<th>Telepon</th>
					<th>aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$sql =  mysqli_query($koneksi, "SELECT * FROM pasien");
					$no = 1;
					while($row = mysqli_fetch_assoc($sql)){
				?>	
						<tr>
							
							<td><?php echo $no ?></td>
							<td><?php echo $row['username'];?></td>
							<td><?php echo $row['nama'];?></td>
							<td><?php echo $row['jenis_kelamin'];?></td>
							<td><?php echo $row['alamat'];?></td>
							<td><?php echo $row['telp'];?></td>
							<td>
								<a href="?module=edit_pasien&kode_pasien=<?php echo $row['kode_pasien']; ?>" title="Edit Data" class="btn btn-primary btn-sm"><i class="nav-icon fas fa-edit"></i></a>
								
								<a href="?module=pasien&aksi=delete&kode_pasien=<?php echo $row['kode_pasien']; ?>" title="Hapus Data" onclick="return confirm('Anda yakin akan menghapus data <?php echo $row['nama']; ?>?')" class="btn btn-danger btn-sm"> <i class="nav-icon fas fa-trash"></i></a>
							</td>
						</tr>
						
						<?php
						$no++;
					
				}
				?>
				</tbody>
				<tfoot>
					<tr>
						<th>No</th>
						<th>Username</th>
						<th>Nama</th>
						<th>Jenis Kelamin</th>
						<th>Alamat</th>
						<th>Telepon</th>
						<th>aksi</th>
					</tr>
				</tfoot>
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

	