<!DOCTYPE html>
<html>
<head>
	<title>CETAK PRINT DATA DARI DATABASE DENGAN PHP - WWW.MALASNGODING.COM</title>
</head>
<body>

	<center>

		<h2>DATA LAPORAN BARANG</h2>
		<h4>WWW.MALASNGODING.COM</h4>

	</center>

	<?php 
	include 'koneksi.php';
	?>

	<table border="1" style="width: 100%">
		<tr>
			<th>No</th>
					<th>Tanggal</th>
					<th>Nama Pasien</th>
					<th>Nama Penyakit</th>
					<th>Deskripsi</th>
		</tr>
		<?php
				$sql =  mysqli_query($koneksi, "SELECT * FROM konsultasi, pasien, penyakit WHERE konsultasi.kode_pasien=pasien.kode_pasien AND konsultasi.hasil=penyakit.kode_penyakit AND pasien.username='$_SESSION[username]' ORDER BY konsultasi.kode_konsultasi DESC");
					$no = 1;
					while($row = mysqli_fetch_array($sql)){
				?>	
		<tr>	
							<td><?php echo $no ?></td>
							<td><?php echo $row['tanggal'];?></td>
							<td><?php echo $row['nama'];?></td>
							<td><?php echo $row['nama_penyakit'];?></td>
							<td><?php echo $row['keterangan'];?></td>
							<td>
           						
           					</td>
						</tr>
						
						<?php
						$no++;
				}
				?>
	</table>

	<script>
		window.print();
	</script>

</body>
</html>