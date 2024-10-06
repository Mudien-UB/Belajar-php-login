<?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'belajarcrud';
    
    $conn = new mysqli ($servername, $username, $password, $dbname);

    if($conn->connect_error){
        die("Koneksi Gagal, NT bro: " . $conn->connect_error);
    }

    echo "Koneksi Berhasil";

?>