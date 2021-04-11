<?php
    $servername = "localhost";
    $username = "root";
    $database = "193020503039_modul3";
    $password = "";
    // Membuat Hubungan
    $conn = mysqli_connect($servername, $username, $password, $database);
    // Memeriksa Hubungan
    if (!$conn){
        die("Connection failed: " . mysqli_connect_error());
    }
?>