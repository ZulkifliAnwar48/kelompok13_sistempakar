<?php
	if(isset($_GET['aksi']) == 'delete'){
		
		$delete = mysqli_query($koneksi, "DELETE FROM gejala WHERE kode_gejala='$_GET[id]'");
		if($delete){
			echo '<div class="alert alert-success" role="alert">
				  <strong>Sukses!</strong> Data berhasil Dihapus
				  </div>';
		}else{
			echo '<div class="alert alert-danger" role="alert">
				  <strong>Sukses!</strong> Data gagal dihapus
				  </div>';
		}
	}
	
?>
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Data Gejala</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="?module=home">Home</a></li>
          <li class="breadcrumb-item active">Data Gejala</li>
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
            <div class="card-header">
              <h3 class="card-title"> <a href="?module=input_gejala"><button class="btn btn-primary">Tambah Data</button></a></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
				<tr>
					<th>No</th>
					<th>Kode Gejala</th>
					<th>Nama Gejala</th>
					<th>aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$sql =  mysqli_query($koneksi, "SELECT * FROM gejala");
					$no = 1;
					while($row = mysqli_fetch_array($sql)){
				?>
						
						<tr>	
							<td><?php echo $no ?></td>
							<td><?php echo $row['kode_gejala'];?></td>
							<td><?php echo $row['nama_gejala'];?></td>
							<td>
								<a href="?module=edit_gejala&id=<?php echo $row['kode_gejala']; ?>" title="Edit Data" class="btn btn-primary btn-sm"><i class="nav-icon fas fa-edit"></i></a>
								
								<a href="?module=gejala&aksi=delete&id=<?php echo $row['kode_gejala']; ?>" title="Hapus Data" onclick="return confirm('Anda yakin akan menghapus data')" class="btn btn-danger btn-sm"> <i class="nav-icon fas fa-trash"></i></a>
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
						<th>Kode Gejala</th>
						<th>Nama Gejala</th>
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

	