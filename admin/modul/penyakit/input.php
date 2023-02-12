<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Data</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="?module=home">Home</a></li>
          <li class="breadcrumb-item active">Data Penyakit</li>
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
				//cari id terakhir
				$a=mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM penyakit WHERE kode_penyakit='$_POST[kode_penyakit]'"));
				if($a==0){
					
					
					$kode_penyakit		= $_POST['kode_penyakit'];
					$nama_penyakit		= $_POST['nama_penyakit'];
					$deskripsi			= $_POST['deskripsi'];
					$pengobatan			= $_POST['pengobatan'];
					$probabilitas		= $_POST['probabilitas'];
					
					$insert = mysqli_query($koneksi, "INSERT INTO penyakit(kode_penyakit, nama_penyakit, deskripsi, pengobatan, probabilitas)VALUES('$kode_penyakit','$nama_penyakit', '$deskripsi', '$pengobatan', '$probabilitas')") or die(mysqli_error($koneksi));
						
					if($insert){
						echo '<div class="alert alert-success" role="alert" window.location="?module=penyakit";>
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
								<label class="col-sm-3 control-label">Kode Penyakit</label>
								<div class="col-sm-12">
									<input type="text" name="kode_penyakit" class="form-control" onkeyup="this.value = this.value.toUpperCase()" placeholder="Kode Penyakit" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Nama Penyakit</label>
								<div class="col-sm-12">
									<input type="text" name="nama_penyakit" class="form-control" onkeyup="this.value = this.value.toUpperCase()" placeholder="Nama Penyakit" required>
								</div>
							</div>		
							<div class="form-group">
								<label class="col-sm-3 control-label">Deskripsi</label>
								<div class="col-sm-12">
									<textarea name="deskripsi" cols="6" rows="3" class="form-control" required=""></textarea>
								</div>
							</div>	
							<div class="form-group">
								<label class="col-sm-3 control-label">Pengobatan</label>
								<div class="col-sm-12">
									<textarea name="pengobatan" cols="6" rows="3" class="form-control" required=""></textarea>
								</div>
							</div>	
							<div class="form-group">
								<label class="col-sm-3 control-label">Probabilitas</label>
								<div class="col-sm-12">
									<input type="text" name="probabilitas" class="form-control" onkeypress="return hanyaAngka(event)" placeholder="" required>
								</div>
							</div>		
							<div class="form-group">
								<label class="col-sm-3 control-label">&nbsp;</label>
								<div class="col-sm-12">
									<input type="submit" name="add" class="btn btn-sm btn-primary" value="simpan">
									<a href="?module=penyakit" class="btn btn-sm btn-danger">Batal</a>
								</div>
							</div>

						</form>
						
					</div>	
			</div>
		</div>
	</div>
</section>


<script>
	function Desimal(obj){
    a=obj.value; 
    var reg=new RegExp(/[0-9]+(?:\.[0-9]{0,2})?/g)
    b=a.match(reg,'');
    if(b==null){
        obj.value='';
    }else{
        obj.value=b[0];
    }
   
}
</script>