<?php  
$query = mysqli_query($koneksi, "SELECT * FROM pasien WHERE kode_pasien='$_GET[kode_pasien]'");
$row = mysqli_fetch_assoc($query);
?>

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Petani</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="?module=home">Home</a></li>
          <li class="breadcrumb-item active">Petani</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<section class="content">
      <div class="container-fluid">
      <div class="row">
        <div class="col-12">
			<?php
			if(isset($_POST['add'])){
				$kode_pasien	= $_POST['kode_pasien'];
				$username		= $_POST['username'];
				$password		= md5($_POST['password']);
				$nama			= $_POST['nama'];
				$jenis_kelamin	= $_POST['jenis_kelamin'];
				$alamat			= $_POST['alamat'];
				$telp			= $_POST['telp'];
				
				
				$update = mysqli_query($koneksi, "UPDATE pasien SET username='$username',  
																				nama='$nama', 
																				password='$password',
																				jenis_kelamin='$jenis_kelamin',
																				alamat='$alamat',
																				telp='$telp'
																				WHERE kode_pasien='$kode_pasien'") or die(mysqli_error($koneksi));
				if($update){
						echo '<div class="alert alert-success" role="alert";>
							  <strong>Sukses!</strong> Data berhasil diupdate
							  </div>';
					}else{
						echo '<div class="alert alert-danger" role="alert">
							  <strong>Gagal!</strong> Data gagal diupdate
							  </div>';
					}	
				
				
			}
			$now = strtotime(date("Y-m-d"));
			$maxage = date('Y-m-d', strtotime('-16 year', $now));
			$minage = date('Y-m-d', strtotime('-40 year', $now));
			
			?>

			<div class="card card-primary">
              	<div class="card-header">
                    <h3 class="card-title">Form</h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                    </div>
                  </div>
						<form class="form-horizontal" action="" method="post">
							<input type="hidden" name="id" value="<?php echo $row['id'];?>">
							<input type="hidden" name="kode_pasien" value="<?php echo $row['kode_pasien'];?>" class="form-control" placeholder="Username" required readonly>
							<div class="form-group">
								<label class="col-sm-3 control-label">Username</label>
								<div class="col-sm-12">
									<input type="text" name="username" value="<?php echo $row['username'];?>" class="form-control" placeholder="Username" required>
								</div>
							</div> 
							<div class="form-group">
								<label class="col-sm-3 control-label">Password</label>
								<div class="col-sm-12">
									<input type="password" name="password" class="form-control" placeholder="Password" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Nama Lengkap</label>
								<div class="col-sm-12">
									<input type="text" name="nama" value="<?php echo $row['nama'];?>" class="form-control" placeholder="Nama Lengkap" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Jenis Kelamin</label>
								<div class="col-sm-12">
									<select name="jenis_kelamin" class="form-control" required="">
										<option value="<?php echo $row['jenis_kelamin'];?>"><?php echo $row['jenis_kelamin'];?></option>
										<option value="Laki Laki">Laki Laki</option>
										<option value="Perempuan">Perempuan</option>
									</select>
								</div>
							</div> 
							<div class="form-group">
								<label class="col-sm-3 control-label">Alamat</label>
								<div class="col-sm-12">
									<input type="text" name="alamat" value="<?php echo $row['alamat'];?>" class="form-control" placeholder="Alamat" required>
								</div>
							</div> 
							<div class="form-group">
								<label class="col-sm-3 control-label">Telepon</label>
								<div class="col-sm-12">
									<input type="text" name="telp" value="<?php echo $row['telp'];?>" class="form-control" placeholder="Telpeon" required>
								</div>
							</div> 
							<div class="form-group">
								<label class="col-sm-3 control-label">&nbsp;</label>
								<div class="col-sm-12">
									<input type="submit" name="add" class="btn btn-sm btn-primary" value="simpan">
									<a href="?module=petani" class="btn btn-sm btn-danger">Batal</a>
								</div>
							</div>
						</div>
						</form>
					</div>	
			</div>
		</div>
	</div>
</section>