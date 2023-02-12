<div class="content-header">
  <div class="container-fluid">
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
  </div><!-- /.container-fluid -->
</div>
<section class="content">
      <div class="container-fluid">
      <div class="row">
        <div class="col-12">
			
			<?php

			if(isset($_POST['add'])){
				$kode_pakar	= $_POST['kode_pakar'];
				$username		= $_POST['username'];
				$nama			= $_POST['nama'];
				$password		= md5($_POST['password']);
							
				$cek = mysqli_query($koneksi, "SELECT * FROM pakar WHERE kode_pakar='$kode_pakar'");
				if(mysqli_num_rows($cek) == 0) {
				    $insert = mysqli_query($koneksi, "INSERT INTO pakar(kode_pakar, nama, username, password)VALUES('$kode_pakar','$nama','$username','$password')") or die(mysqli_error($koneksi));
					if($insert){
						echo '<div class="alert alert-success" role="alert";>
							  <strong>Sukses!</strong> Data berhasil disimpan
							  </div>';
					}else{
						echo '<div class="alert alert-danger" role="alert">
							  <strong>Gagal!</strong> Data gagal disimpan
							  </div>';
					}	
				}else{
					echo '<div class="alert alert-danger" role="alert">
						  <strong>Gagal!</strong> Data sudah ada
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
							<div class="form-group">
								<label class="col-sm-3 control-label">Kode</label>
								<div class="col-sm-12">
									<input type="text" name="kode_pakar" class="form-control" placeholder="Kode pakar" required>
								</div>
							</div> 
							<div class="form-group">
								<label class="col-sm-3 control-label">Username</label>
								<div class="col-sm-12">
									<input type="text" name="username" class="form-control" placeholder="Username" required>
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
									<input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" required>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-3 control-label">&nbsp;</label>
								<div class="col-sm-12">
									<input type="submit" name="add" class="btn btn-sm btn-primary" value="simpan">
									<a href="?module=pakar" class="btn btn-sm btn-danger">Batal</a>
								</div>
							</div>
						</form>
						
					</div>	
			</div>
		</div>
	</div>
</section>