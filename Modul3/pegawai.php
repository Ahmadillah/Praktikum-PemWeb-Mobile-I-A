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
    <table>
		<p> Data Pegawai</p>
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
    </div>
    
    <hr>

    <div>
        <h1> Tambah data </h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER ["PHP_SELF"]);?>"> 
        <div>
            <label for="firstname">firstname</label>
            <input type="text" id="firstname" name="firstname" placeholder="firstname">
            <label for="lastname">lastname</label>
            <input type="text" id="lastname" name="lastname" placeholder="lastname">
            <label for="salary">salary</label>
            <input type="text" id="salary" name="salary" placeholder="salary">
            <label for="id_departemen">id_departemen</label>
            <input type="text" id="id_departemen" name="id_departemen" placeholder="id_departemen">
            <input type="submit" name="tambah_data" value="Tambah Data" >
        </div>
        </form>
    </div> 

    <hr>

    <div>
        <h1>Update data</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER ["PHP_SELF"]);?>"> 
        <div>
            <label for="id_pegawai2">id_pegawai yang ingin di-update</label>
            <input type="text" id="id_pegawai2" name="id_pegawai2" placeholder="id_pegawai"><br><br>
            <label for="firstname2">firstname</label>
            <input type="text" id="firstname2" name="firstname2" placeholder="firstname">
            <label for="lastname2">lastname</label>
            <input type="text" id="lastname2" name="lastname2" placeholder="lastname">
            <label for="salary2">salary</label>
            <input type="text" id="salary2" name="salary2" placeholder="salary">
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
            Pilih id_pegawai yang ingin dihapus<br>
            <label for="id_pegawai">id_pegawai</label>
            <input type="text" id="id_pegawai" name="id_pegawai" placeholder="id_pegawai">
            <input type="submit" name="hapus_data" value="Hapus Data" >
        </div>
        </form>
    </div>

    <?php
        error_reporting (E_ALL ^ E_NOTICE);
        $id_pegawai = $firstname = $lastname = $salary = $id_departemen = "";
        if ($_POST['tambah_data']){
            $firstname = mysqli_real_escape_string($conn, $_REQUEST['firstname']);
            $lastname = mysqli_real_escape_string($conn, $_REQUEST['lastname']);
            $salary = mysqli_real_escape_string($conn, $_REQUEST['salary']);
            $id_departemen = mysqli_real_escape_string($conn, $_REQUEST['id_departemen']);
            $sql = "INSERT INTO pegawai (firstname, lastname, salary, id_departemen)
                    VALUES ('$firstname', '$lastname', '$salary', '$id_departemen')";
            if (mysqli_query($conn, $sql)) {
                header("Refresh:0");
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }

        if ($_POST['Update_data']){
            $id_pegawai = mysqli_real_escape_string($conn, $_REQUEST['id_pegawai2']);
            $firstname = mysqli_real_escape_string($conn, $_REQUEST['firstname2']);
            $lastname = mysqli_real_escape_string($conn, $_REQUEST['lastname2']);
            $salary = mysqli_real_escape_string($conn, $_REQUEST['salary2']);
            $id_departemen = mysqli_real_escape_string($conn, $_REQUEST['id_departemen2']);
            $sql = "UPDATE pegawai SET
                    firstname = '$firstname',
                    lastname = '$lastname',
                    salary = '$salary',
                    id_departemen = '$id_departemen'
                    WHERE id_pegawai = '$id_pegawai'";
            if (mysqli_query($conn, $sql)) {
                header("Refresh:0");
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }

        if ($_POST['hapus_data']){
            $id_pegawai = mysqli_real_escape_string($conn, $_REQUEST['id_pegawai']);
            $sql = "DELETE FROM pegawai WHERE id_pegawai = '$id_pegawai'";
            if (mysqli_query($conn, $sql)) {
                header("Refresh:0");
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
    ?>
    
</body>
</html>