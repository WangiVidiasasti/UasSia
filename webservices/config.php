<?php
// definisikan koneksi ke database
$baseURL = "http://localhost/UasSia";
$server = "26.224.39.33";
$username = "root";
$password = "";
$database = "uas_sia";

// Koneksi dan memilih database di server
$koneksi = new mysqli($server, $username, $password, $database);

// Check connection
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}


?>