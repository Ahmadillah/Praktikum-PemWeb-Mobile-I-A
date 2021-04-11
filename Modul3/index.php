<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<?php
		include_once('koneksi.php');
	?>
	<style>
		table, th, td {
		border: 1px solid black;
		border-collapse: collapse;
		}
	</style>
</head>

<body>
	<nav>
		<a href = "index.php"> Lihat Semua Tabel </a> |
		<a href = "pegawai.php"> Ubah Data Tabel Pegawai </a> |
		<a href = "departemen.php"> Ubah Data Tabel Departemen </a> |
		<a href = "proyek.php"> Ubah Tabel Proyek </a> |
	</nav>

	<hr>

	<div>
    <table align = "center";>
		<p align = "center"> Data Pegawai</p>
		<tr>
			<th> id_pegawai </th>
			<th> firstname </th>
			<th> lastname </th>
			<th> salary </th>
            <th> id_departemen </th>
		</tr>
		<?php
            $result = mysqli_query($conn, "SELECT * FROM pegawai");
			while($rows = mysqli_fetch_assoc($result))
			{
		?>
				<tr>
					<td><?php echo $rows['id_pegawai']; ?></td>
					<td><?php echo $rows['firstname']; ?></td>
					<td><?php echo $rows['lastname']; ?></td>
					<td><?php echo $rows['salary']; ?></td>
                    <td><?php echo $rows['id_departemen']; ?></td>
				</tr>
		<?php
			}
		?>
	</table>

    <table align = "center";>
		<p align = "center"> Data departemen</p>
		<tr>
			<th> id_departemen </th>
			<th> nama_departemen </th>
            <th> id_manager </th>
		</tr>
		<?php
            $result2 = mysqli_query($conn, "SELECT * FROM departemen");
			while($rows = mysqli_fetch_assoc($result2))
			{
		?>
				<tr>
					<td><?php echo $rows['id_departemen']; ?></td>
					<td><?php echo $rows['Nama_departemen']; ?></td>
                    <td><?php echo $rows['id_manager']; ?></td>
				</tr>
		<?php
			}
		?>
	</table>

    <table align = "center";>
		<p align = "center"> Data proyek</p>
		<tr>
			<th> id_proyek </th>
			<th> nama_proyek </th>
            <th> id_departemen </th>
		</tr>
		<?php
            $result3 = mysqli_query($conn, "SELECT * FROM proyek");
			while($rows = mysqli_fetch_assoc($result3))
			{
		?>
				<tr>
					<td><?php echo $rows['id_proyek']; ?></td>
					<td><?php echo $rows['Nama_proyek']; ?></td>
                    <td><?php echo $rows['id_departemen']; ?></td>
				</tr>
		<?php
			}
		?>
	</table>
	</div>
</body>
</html>