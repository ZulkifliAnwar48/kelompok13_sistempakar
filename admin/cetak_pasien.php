<style>
	table{
		font: normal 13px Arial, sans-serif;
	}
	.zui-table {
		border: solid 1px #333;
		border-collapse: collapse;
		border-spacing: 0;
		font: normal 13px Arial, sans-serif;
	}

	.zui-table thead th {
		background-color: #d6d6d2;
		border: solid 1px #333;
		color: #292928;
		padding: 10px;
		text-align: left;
		text-shadow: 1px 1px 1px #fff;
	}

	.zui-table tbody td {
		border: solid 1px #333;
		color: #333;
		padding: 10px;
		text-shadow: 1px 1px 1px #fff;
	}

	.garistipis {
    display: block;
    height: 1px;
    border: 0;
    border-top: 1px solid #000;
    margin: 1em 0;
    padding: 0;
	}

	.garistebal {
    display: block;
    height: 1px;
    border: 0;
    border-top: 5px solid #000;
    margin: 1em 0;
    margin-top: -15;
    padding: 0;
	}
</style>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<table style="width: 100%">
		<tr>
			
			<td style="text-align: center; vertical-align: middle;"><h1>DATA PASIEN<br>KONSULTASI PENYAKIT ISPA<br></h1></td>
			
		</tr>
	</table>
		<hr class="garistipis">
		<hr class="garistebal">

	<?php 
	include 'config.php';
	include 'function.php';
	?>
	<br>
	<table border="1" style="width: 100%" class="zui-table">
		<thead>
			<th>No</th>
					<th>Username</th>
					<th>Nama</th>
					<th>Jenis Kelamin</th>
					<th>Alamat</th>
					<th>Telepon</th>
		</thead>
		<?php
				$sql =  mysqli_query($koneksi, "SELECT * FROM pasien");
					$no = 1;
					while($row = mysqli_fetch_assoc($sql)){
				?>
		<tbody>
			<td><?php echo $no++; ?></td>
			<td><?php echo $row['username'];?></td>
			<td><?php echo $row['nama'];?></td>
			<td><?php echo $row['jenis_kelamin'];?></td>
			<td><?php echo $row['alamat'];?></td>
			<td><?php echo $row['telp'];?></td>
		<?php $no++;
		}
		?>
	</table>
	<br><br>
	<table style="width: 100%">
		<tr>
			<td style="width: 65%"></td>
			<td>Pasir Pangaraian, <?php echo tgl_indo(date("Y-m-d")) ?></td>
		</tr>
		<tr>
			<td></td>
			<td>Mengetahui,</td>
		</tr>
		<tr style="height: 80px">
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td>(Mr.x)</td>
		</tr>
		
	</table>
	<script>
		window.print();
	</script>

</body>

</html>