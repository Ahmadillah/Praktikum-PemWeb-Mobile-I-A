<!DOCTYPE html>
<html>
<head>
	<title>Soal1_193020503039_Dzikri Ahmadillah</title>
	<script type="text/javascript" src="Chart.js"></script>
	<?php 
		include 'koneksi.php';
	?>
</head>
<body>
	<center>
		<h2>Grafik Daftar Pengunjung Perpustakaan</h2>
	</center>

	<div style="width: 800px;margin: 0px auto;">
		<canvas id="myChart"></canvas>
	</div>
 
	<br/>
	<br/>
 
	<table border="1" align = "center";>
		<h3 align = "center";>Tabel Pengunjung</h3>
		<thead>
			<tr>
				<th>Id</th>
				<th>Nama</th>
				<th>Jk</th>
				<th>Jenis</th>
				<th>Perlu</th>
				<th>tanggal</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$no = 1;
			$data = mysqli_query($koneksi,"select * from t_pengunjung");
			while($d=mysqli_fetch_array($data)){
				?>
				<tr>
					<td><?php echo $d['id']; ?></td>
					<td><?php echo $d['nama']; ?></td>
					<td><?php echo $d['jk']; ?></td>
					<td><?php echo $d['jenis']; ?></td>
					<td><?php echo $d['perlu']; ?></td>
					<td><?php echo $d['tgl']; ?></td>
				</tr>
				<?php 
			}
			?>
		</tbody>
	</table>
 
 
	<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ["Mahasiswa", "Dosen", "Tanpa Keterangan"],
				datasets: [{
					label: '',
					data: [
					<?php 
						$jumlah_mahasiswa = mysqli_query($koneksi,"select * from t_pengunjung where jenis='Mahasiswa'");
						echo mysqli_num_rows($jumlah_mahasiswa);
					?>, 
					<?php 
						$jumlah_donny = mysqli_query($koneksi,"select * from t_pengunjung where jenis='Dosen'");
						echo mysqli_num_rows($jumlah_donny);
					?>,  
					<?php 
						$jumlah_unknown = mysqli_query($koneksi,"select * from t_pengunjung where jenis=''");
						echo mysqli_num_rows($jumlah_unknown);
					?>
					],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>
</body>
</html>