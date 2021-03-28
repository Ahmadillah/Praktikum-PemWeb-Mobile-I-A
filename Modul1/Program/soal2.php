<?php
	function cek_nama($nama){	
		echo "Banyak kata = ".str_word_count($nama)."<br>";
		
		$nama = str_replace(' ', '', $nama);
		echo "Banyak huruf = ".strlen($nama)."<br>";
	}
?>