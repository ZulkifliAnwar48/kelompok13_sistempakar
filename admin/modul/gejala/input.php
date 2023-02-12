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
<section class="content">
      <div class="container-fluid">
      <div class="row">
        <div class="col-12">
			
			<?php
			if(isset($_POST['add'])){
				//cari id terakhir
				$a=mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM gejala WHERE kode_gejala='$_POST[kode_gejala]'"));
				if($a==0){				
					$kode_gejala		= $_POST['kode_gejala'];
					$nama_gejala		= $_POST['nama_gejala'];
					
					$insert = mysqli_query($koneksi, "INSERT INTO gejala(kode_gejala, nama_gejala)VALUES('$kode_gejala','$nama_gejala')") or die(mysqli_error($koneksi));
						
					if($insert){
						echo '<div class="alert alert-success" role="alert" window.location="?module=gejala";>
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
								<label class="col-sm-3 control-label">Kode Gejala</label>
								<div class="col-sm-12">
									<input type="text" name="kode_gejala" class="form-control" onkeyup="this.value = this.value.toUpperCase()" placeholder="Kode Gejala" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Nama Gejala</label>
								<div class="col-sm-12">
									<input type="text" name="nama_gejala" class="form-control" onkeyup="this.value = this.value.toUpperCase()" placeholder="Nama Gejala" required>
								</div>
							</div>		
							<div class="form-group">
								<label class="col-sm-3 control-label">&nbsp;</label>
								<div class="col-sm-12">
									<input type="submit" name="add" class="btn btn-sm btn-primary" value="simpan">
									<a href="?module=gejala" class="btn btn-sm btn-danger">Batal</a>
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