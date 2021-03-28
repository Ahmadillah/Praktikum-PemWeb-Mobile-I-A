<?php
	function cek_huruf ($nama){
			
			$nama = str_replace(' ', '', $nama);
			$ukuran = strlen($nama)-1;
			$huruf_vokal = array("a","i","u","e","o");
			
			$vokal = 0;
			$konsonan = 0;
			
			for($x = 0; $x<=$ukuran; $x++){
				if(in_array($nama[$x], $huruf_vokal)){
					$vokal++;
				} else {
					$konsonan++;
				}
			}
			echo "Banyak huruf konsonan = ".$konsonan."<br>";
			echo "Banyak huruf vokal = ".$vokal."<br>";
		}
?>