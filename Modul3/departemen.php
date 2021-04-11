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
		<p> Data departemen</p>
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

    <hr>

    <div>
        <h1> Tambah data </h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER ["PHP_SELF"]);?>"> 
        <div>
            <label for="nama_departemen">nama_departemen</label>
            <input type="text" id="nama_departemen" name="nama_departemen" placeholder="nama_departemen">
            <label for="id_manager">id_manager</label>
            <input type="text" id="id_manager" name="id_manager" placeholder="id_manager">
            <input type="submit" name="tambah_data" value="Tambah Data" >
        </div>
        </form>
    </div> 

    <hr>

    <div>
        <h1> Update data </h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER ["PHP_SELF"]);?>"> 
        <div>
            <label for="id_departemen2">id_departemen yang ingin di-update</label>
            <input type="text" id="id_departemen2" name="id_departemen2" placeholder="id_departemen"><br><br>
            <label for="nama_departemen2">nama_departemen</label>
            <input type="text" id="nama_departemen2" name="nama_departemen2" placeholder="nama_departemen">
            <label for="id_manager2">id_manager</label>
            <input type="text" id="id_manager2" name="id_manager2" placeholder="id_manager">
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
            <label for="id_departemen">id_departemen</label>
            <input type="text" id="id_departemen" name="id_departemen" placeholder="id_departemen">
            <input type="submit" name="hapus_data" value="Hapus Data" >
        </div>
        </form>
    </div>

    <?php
        error_reporting (E_ALL ^ E_NOTICE);
        $id_departemen = $nama_departemen = $id_manager = "";
        if ($_POST['tambah_data']){
            $nama_departemen = mysqli_real_escape_string($conn, $_REQUEST['nama_departemen']);
            $id_manager = mysqli_real_escape_string($conn, $_REQUEST['id_manager']);
            $sql = "INSERT INTO departemen (nama_departemen, id_manager)
                    VALUES ('$nama_departemen', '$id_manager')";
            if (mysqli_query($conn, $sql)) {
                header("Refresh:0");
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }

        if ($_POST['Update_data']){
            $id_departemen = mysqli_real_escape_string($conn, $_REQUEST['id_departemen2']);
            $nama_departemen = mysqli_real_escape_string($conn, $_REQUEST['nama_departemen2']);
            $id_manager = mysqli_real_escape_string($conn, $_REQUEST['id_manager2']);
            $sql = "UPDATE departemen SET
                    nama_departemen = '$nama_departemen',
                    id_manager = '$id_manager'
                    WHERE id_departemen = '$id_departemen'";
            if (mysqli_query($conn, $sql)) {
                header("Refresh:0");
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }

        if ($_POST['hapus_data']){
            $id_departemen = mysqli_real_escape_string($conn, $_REQUEST['id_departemen']);
            $sql = "DELETE FROM departemen WHERE id_departemen = '$id_departemen'";
            if (mysqli_query($conn, $sql)) {
                header("Refresh:0");
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
    ?>
</body>
</html>