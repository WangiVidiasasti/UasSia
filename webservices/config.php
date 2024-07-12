<?php
// Mendeklarasikan base URL
$baseURL = 'http';
if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
    $baseURL .= 's';
}
$baseURL .= '://' . $_SERVER['HTTP_HOST'] . '/SistemInformasiLaundry';

// Jika website Anda berada di subfolder tertentu, Anda dapat menambahkan subfolder tersebut ke base URL.
// Misal, jika website Anda berada di http://example.com/myapp/, maka $baseURL akan menjadi:
// $baseURL = 'http://example.com/myapp';

// mendefinisikan variabel untuk koneksi
$serverName = "localhost";
$userName = "root";
$dbPassword = "";
$database = "uas_sia";

// koneksi ke mysql
$conn = mysqli_connect($serverName, $userName, $dbPassword, $database);

// error handling
if (!$conn) {
    die("Connection failed:" . mysqli_connect_error());
} else {
}
