<?php
	if(isset($_GET['aksi']) == 'delete'){
		$kode_pakar = $_GET['kode_pakar'];
		$delete = mysqli_query($koneksi, "DELETE FROM pakar WHERE kode_pakar='$kode_pakar'");
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
  <div class="container-flukode_pakar">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Pakar</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="?module=home">Home</a></li>
          <li class="breadcrumb-item active">Pakar</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-flukode_pakar -->
</div>
<!-- /.content-header -->
  <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">

          <div class="card">
            <div class="card-header">
              <h3 class="card-title"> <a href="?module=input_pakar"><button class="btn btn-primary">Tambah Data</button></a></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
				<tr>
					<th>No</th>
					<th>Kode Pakar</th>
					<th>Username</th>
					<th>Nama</th>
					<th>aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$sql =  mysqli_query($koneksi, "SELECT * FROM pakar");
					$no = 1;
					while($row = mysqli_fetch_assoc($sql)){
				?>	
						<tr>
							
							<td><?php echo $no ?></td>
							<td><?php echo $row['kode_pakar'];?></td>
							<td><?php echo $row['username'];?></td>
							<td><?php echo $row['nama'];?></td>
							<td>
								<a href="?module=edit_pakar&kode_pakar=<?php echo $row['kode_pakar']; ?>" title="Edit Data" class="btn btn-primary btn-sm"><i class="nav-icon fas fa-edit"></i></a>
								
								<a href="?module=pakar&aksi=delete&kode_pakar=<?php echo $row['kode_pakar']; ?>" title="Hapus Data" onclick="return confirm('Anda yakin akan menghapus data <?php echo $row['nama']; ?>?')" class="btn btn-danger btn-sm"> <i class="nav-icon fas fa-trash"></i></a>
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
						<th>Kode Pakar</th>
						<th>Username</th>
						<th>Nama Lengkap</th>
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

	