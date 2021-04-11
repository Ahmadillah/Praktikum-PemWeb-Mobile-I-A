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

    <table>
		<p> Data proyek</p>
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

    <hr>

    <div>
        <h1> Tambah data </h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER ["PHP_SELF"]);?>"> 
        <div>
            <label for="nama_proyek">nama_proyek</label>
            <input type="text" id="nama_proyek" name="nama_proyek" placeholder="nama_proyek">
            <label for="id_departemen">id_departemen</label>
            <input type="text" id="id_departemen" name="id_departemen" placeholder="id_departemen">
            <input type="submit" name="tambah_data" value="Tambah Data" >
        </div>
        </form>
    </div> 

    <hr>

    <div>
        <h1> Update data </h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER ["PHP_SELF"]);?>"> 
        <div>
            <label for="id_proyek2">id_proyek yang ingin di-update</label>
            <input type="text" id="id_proyek2" name="id_proyek2" placeholder="id_proyek"><br><br>
            <label for="nama_proyek2">nama_proyek</label>
            <input type="text" id="nama_proyek2" name="nama_proyek2" placeholder="nama_proyek">
            <label for="id_departemen2">id_departemen</label>
            <input type="text" id="id_departemen2" name="id_departemen2" placeholder="id_departemen">
            <input type="submit" name="Update_data" value="Update Data" >
        </div>
        </form>
    </div> 

    <hr>

    <div>
        <h1>Hapus Data</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER ["PHP_SELF"]);?>"> 
        <div>
            Pilih id_proyek yang ingin dihapus<br>
            <label for="id_proyek">id_proyek</label>
            <input type="text" id="id_proyek" name="id_proyek" placeholder="id_proyek">
            <input type="submit" name="hapus_data" value="Hapus Data" >
        </div>
        </form>
    </div>

    <?php
        error_reporting (E_ALL ^ E_NOTICE);
        $id_proyek = $nama_proyek = $id_departemen = "";
        if ($_POST['tambah_data']){
            $nama_proyek = mysqli_real_escape_string($conn, $_REQUEST['nama_proyek']);
            $id_departemen = mysqli_real_escape_string($conn, $_REQUEST['id_departemen']);
            $sql = "INSERT INTO proyek (nama_proyek, id_departemen)
                    VALUES ('$nama_proyek', '$id_departemen')";
            if (mysqli_query($conn, $sql)) {
                header("Refresh:0");
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }

        if ($_POST['Update_data']){
            $id_proyek = mysqli_real_escape_string($conn, $_REQUEST['id_proyek2']);
            $nama_proyek = mysqli_real_escape_string($conn, $_REQUEST['nama_proyek2']);
            $id_departemen = mysqli_real_escape_string($conn, $_REQUEST['id_departemen2']);
            $sql = "UPDATE proyek SET
                    nama_proyek = '$nama_proyek',
                    id_departemen = '$id_departemen'
                    WHERE id_proyek = '$id_proyek'";
            if (mysqli_query($conn, $sql)) {
                header("Refresh:0");
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }

        if ($_POST['hapus_data']){
            $id_proyek = mysqli_real_escape_string($conn, $_REQUEST['id_proyek']);
            $sql = "DELETE FROM proyek WHERE id_proyek = '$id_proyek'";
            if (mysqli_query($conn, $sql)) {
                header("Refresh:0");
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
    ?>

</body>
</html>