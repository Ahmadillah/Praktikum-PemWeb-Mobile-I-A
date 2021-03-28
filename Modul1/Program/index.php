<!__
Dzikri Ahmadillah
193020503039
__>

<!Doctype html>
<head>
	<?php
		include_once('soal1.php');
		include_once('soal2.php');
		include_once('soal3.php');
		include_once('soal4.php');
	?>
</head>

<body>
    <?php
		for($x = 0; $x < count($nama); $x++){
            echo $nama[$x]."<br>";
			cek_nama($nama[$x]);
			balik_nama($nama[$x]);
			cek_huruf($nama[$x]);
			echo "<br>";
        }
    ?>
</body>
</html>